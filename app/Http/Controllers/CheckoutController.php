<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use Revolution\Google\Sheets\Facades\Sheets;

class CheckoutController extends Controller
{
    public function saveCart(Request $request)
    {
        $items = $request->input('items', []);
        // Basic normalization
        $cart = [];
        foreach ($items as $it) {
            $cart[] = [
                'name' => (string) ($it['name'] ?? ''),
                'price' => (int) ($it['price'] ?? 0),
                'qty' => max(1, (int) ($it['qty'] ?? 1)),
                'image' => (string) ($it['image'] ?? ''),
                'comments' => (string) ($it['comments'] ?? '')
            ];
        }
        Session::put('cart', $cart);
        return response()->json(['ok' => true]);
    }

    public function show(Request $request)
    {
        $cart = Session::get('cart', []);
        $total = collect($cart)->reduce(function ($s, $i) {
            return $s + ($i['price'] * $i['qty']);
        }, 0);
        return view('user.checkout', ['cart' => $cart, 'total' => $total]);
    }

    public function place(Request $request)
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect('/menu')->with('error', 'Cart is empty');
        }
        $data = $request->validate([
            'customer_name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:30',
        ]);
        $total = collect($cart)->reduce(function ($s, $i) {
            return $s + ($i['price'] * $i['qty']);
        }, 0);

        $order = Order::create([
            'customer_name' => $data['customer_name'],
            'phone' => $data['phone'] ?? null,
            'total' => $total,
            'status' => 'pending',
        ]);
        foreach ($cart as $it) {
            OrderItem::create([
                'order_id' => $order->id,
                'name' => $it['name'],
                'price' => (int) $it['price'],
                'qty' => (int) $it['qty'],
                'image' => $it['image'] ?? null,
                'comments' => $it['comments'] ?? null,
            ]);
        }

        // Kirim ke Google Sheets
        try {
            $range = config('google.post_sheet_id'); // Nama Sheet, misal 'Sheet1'
            $spreadsheetId = config('google.post_spreadsheet_id');

            // Format data sesuai urutan kolom di Spreadsheet
            $rows = [
                [
                    $order->id,
                    $order->customer_name,
                    $order->phone, // Menambahkan info telepon
                    implode(', ', array_map(function ($item) {
                        return $item['name'] . ' (' . $item['qty'] . ')';
                    }, $cart)),
                    $order->total,
                    $order->status,
                    now()->toDateTimeString(),
                ]
            ];

            if ($spreadsheetId) {
                Sheets::spreadsheet($spreadsheetId)
                    ->sheet($range)
                    ->append($rows);
            }
        } catch (\Exception $e) {
            // Lanjutkan eksekusi meski gagal kirim ke sheet, tapi log errornya
            \Illuminate\Support\Facades\Log::error('Google Sheet Error: ' . $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('checkout.show')->with('success', 'Order placed successfully');
    }
}
