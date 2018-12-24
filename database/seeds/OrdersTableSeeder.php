<?php

use Book\Order;
use Book\OrderDetail;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 20)->create()->each(function ($order) {
            $order->orderDetails()->save(factory(OrderDetail::class)->make());
            $order->orderDetails()->save(factory(OrderDetail::class)->make());
        });
    }
}
