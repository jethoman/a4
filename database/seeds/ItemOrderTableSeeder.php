<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Order;
class ItemOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders =[
            'Parts to fix computers' => ['500 GB HDD'],
            'Access Points for Schools' => ['HP 460 AP','Belkin Patch Cables'],
            'Laptop for IT Manager' => ['Dell XPS 15','Thunderbolt Dock']
        ];

        foreach($orders as $order_desc => $items)
        {
            $order = Order::where('order_desc','like',$order_desc)->first();
            foreach($items as $item_desc)
            {
                $item = Item::where('item_desc','like',$item_desc)->first();

                $order->items()->save($item);
            }
        }

    }
}
