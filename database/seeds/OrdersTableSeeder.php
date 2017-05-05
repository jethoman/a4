<?php

use Illuminate\Database\Seeder;
use App\Order;
class OrdersTableSeeder extends Seeder
{
    /**
    *Need to add an array with complete orders.
    *
    */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_id = Item::where('item_desc', '=', $item_desc)->pluck('id')->first();

        Order::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'order_desc' => 'Parts to fix computers',
        'item_id' => $item_id
        ]);

        Order::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'order_desc' => 'Access Points for Schools'
        ]);

        Order::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'order_desc' => 'New Laptop for IT Manager'
        ]);
    }
}
