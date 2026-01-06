<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 dummy orders distributed over the last 7 days
        $products = Product::all();
        if ($products->isEmpty()) {
            return;
        }

        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        $customers = ['John Doe', 'Jane Smith', 'Robert Johnson', 'Emily Davis', 'Michael Brown', 'Sarah Wilson', 'David Lee', 'Jennifer Taylor'];

        for ($i = 0; $i < 50; $i++) {
            $total = 0;
            $orderItems = [];

            // Random number of items per order (1-5)
            $itemCount = rand(1, 5);
            for ($j = 0; $j < $itemCount; $j++) {
                $product = $products->random();
                $qty = rand(1, 3);
                $price = $product->price;
                $total += $price * $qty;

                $orderItems[] = [
                    'name' => $product->name,
                    'price' => $price,
                    'qty' => $qty,
                    'image' => $product->image,
                ];
            }

            // Distribute dates over the last 7 days
            $daysAgo = rand(0, 6);
            $createdAt = Carbon::now()->subDays($daysAgo)->setTime(rand(8, 20), rand(0, 59));

            // Create Order
            $order = Order::create([
                'customer_name' => $customers[array_rand($customers)],
                'phone' => '08' . rand(100000000, 999999999),
                'total' => $total,
                'status' => $statuses[array_rand($statuses)],
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            // Create Order Items
            foreach ($orderItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['qty'],
                    'image' => $item['image'],
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
            }
        }
    }
}
