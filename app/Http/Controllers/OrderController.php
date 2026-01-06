<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items'); // Assuming relationship exists
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        // Update Google Sheets
        try {
            $spreadsheetId = config('google.post_spreadsheet_id');
            $sheetName = config('google.post_sheet_id');

            if ($spreadsheetId) {
                $sheets = \Revolution\Google\Sheets\Facades\Sheets::spreadsheet($spreadsheetId)->sheet($sheetName);
                $rows = $sheets->all();

                // Cari baris yang sesuai dengan Order ID (Asumsi ID ada di kolom pertama/index 0)
                $rowIndex = -1;
                foreach ($rows as $index => $row) {
                    // Cek jika kolom ID (index 0) sama dengan order ID
                    if (isset($row[0]) && $row[0] == $order->id) {
                        $rowIndex = $index + 1; // Google Sheets row index (1-based)
                        break;
                    }
                }

                if ($rowIndex > 0) {
                    // Update kolom Status (Kolom F / ke-6)
                    $sheets->range('F' . $rowIndex)->update([[$request->status]]);
                }
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('GSheet Update Error: ' . $e->getMessage());
        }

        return redirect()->route('admin.orders')->with('success', 'Status order berhasil diubah dan disinkronkan');
    }
    public function sync()
    {
        try {
            $spreadsheetId = config('google.post_spreadsheet_id');
            $sheetName = config('google.post_sheet_id');

            if ($spreadsheetId) {
                // Ambil semua order
                $orders = Order::with('items')->oldest()->get();

                $rows = [];
                foreach ($orders as $order) {
                    $itemString = $order->items->map(function ($item) {
                        return $item->name . ' (' . $item->qty . ')';
                    })->implode(', ');

                    $rows[] = [
                        $order->id,
                        $order->customer_name,
                        $order->phone,
                        $itemString,
                        $order->total,
                        $order->status,
                        $order->created_at->toDateTimeString(),
                    ];
                }

                if (!empty($rows)) {
                    // Clear data lama (range aman A2 sampai G1000)
                    \Revolution\Google\Sheets\Facades\Sheets::spreadsheet($spreadsheetId)
                        ->sheet($sheetName)
                        ->range('A2:G2000') // Asumsi max 2000 order
                        ->clear();

                    // Tulis ulang semua data dari A2
                    \Revolution\Google\Sheets\Facades\Sheets::spreadsheet($spreadsheetId)
                        ->sheet($sheetName)
                        ->range('A2')
                        ->update($rows);
                }
            }
            return back()->with('success', 'Google Sheets berhasil disinkronisasi ulang!');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Sync Error: ' . $e->getMessage());
            return back()->with('error', 'Gagal sinkronisasi: ' . $e->getMessage());
        }
    }
}
