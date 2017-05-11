<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function orders()
    {
        return $this->belongsToMany('App\Order')->withTimestamps();
    }
    public static function getItemsForCheckboxes() {
        $items = Item::orderBy('item_desc','ASC')->get();
        $itemsForCheckboxes = [];
        foreach($items as $item) {
            $itemsForCheckboxes[$item['id']] = $item->item_desc;
        }
        return $itemsForCheckboxes;
    }
}
