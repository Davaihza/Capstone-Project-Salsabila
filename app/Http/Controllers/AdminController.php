<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $totalSales = Order::sum('total');
        $totalOrders = Order::count();
        $menuItems = Product::where('is_available', true)->count();
        // For new customers, we might need a Customer model or just count unique names/phones in orders for now.
        // Let's just use unique customer names from orders as a proxy for now.
        $newCustomers = Order::distinct('customer_name')->count();

        $recentOrders = Order::latest()->take(5)->get();

        // Data for charts
        $filter = $request->get('filter', 'week');
        $salesData = $this->getSalesData($filter);

        $chartDates = $salesData->pluck('label');
        $chartSales = $salesData->pluck('total_sales');
        $chartOrders = $salesData->pluck('total_orders');

        // Top Selling Items
        $topSellingItems = \App\Models\OrderItem::select('name', DB::raw('SUM(qty) as total_sold'), DB::raw('SUM(qty * price) as total_revenue'))
            ->groupBy('name')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('totalSales', 'totalOrders', 'menuItems', 'newCustomers', 'recentOrders', 'chartDates', 'chartSales', 'chartOrders', 'topSellingItems', 'filter'));
    }

    public function downloadReport(Request $request)
    {
        $filter = $request->get('filter', 'week');
        $salesData = $this->getSalesData($filter);
        $totalSales = $salesData->sum('total_sales');
        $totalOrders = $salesData->sum('total_orders');

        $pdf = Pdf::loadView('admin.reports.sales', compact('salesData', 'filter', 'totalSales', 'totalOrders'));
        return $pdf->download('sales_report_' . $filter . '.pdf');
    }

    private function getSalesData($filter)
    {
        switch ($filter) {
            case 'day':
                $startDate = Carbon::today();
                return Order::select(
                    DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d %H:00:00") as label'),
                    DB::raw('SUM(total) as total_sales'),
                    DB::raw('COUNT(*) as total_orders')
                )
                    ->where('created_at', '>=', $startDate)
                    ->groupBy('label')
                    ->orderBy('label', 'asc')
                    ->get();
            case 'month':
                $startDate = Carbon::now()->subMonth()->startOfDay();
                break;
            case 'week':
            default:
                $startDate = Carbon::now()->subDays(6)->startOfDay();
                break;
        }

        return Order::select(
            DB::raw('DATE(created_at) as label'),
            DB::raw('SUM(total) as total_sales'),
            DB::raw('COUNT(*) as total_orders')
        )
            ->where('created_at', '>=', $startDate)
            ->groupBy('label')
            ->orderBy('label', 'asc')
            ->get();
    }

    public function menu()
    {
        $products = Product::all();
        return view('admin.menu', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('admin.menu')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image if exists and is NOT a seeded image (starts with images/)
            if ($product->image && !str_starts_with($product->image, 'images/')) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.menu')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete image if exists and is NOT a seeded image
        if ($product->image && !str_starts_with($product->image, 'images/')) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.menu')->with('success', 'Product deleted successfully.');
    }
}
