<?php

use Illuminate\Database\Seeder;
use App\Item;
class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'item_desc' => 'Access Point',
        'unit_price' => 676
        ]);

        Item::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'item_desc' => 'Printer',
        'unit_price' => 559
        ]);

        Item::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'item_desc' => 'Toner',
        'unit_price' => 97
        ]);
    }
}
