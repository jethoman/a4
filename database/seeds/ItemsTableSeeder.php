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
        $items = ['HP 460 AP','Dell XPS 15','Belkin Patch Cables','500 GB HDD','Thunderbolt Dock'];

        foreach($items as $item_desc)
        {
            $item = new Item();
            $item->item_desc = $item_desc;
            $item->save();
        }
    }
}
