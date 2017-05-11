<?php

#$items = [];
$itemsjson = file_get_contents('itemorders.json');
#print_r ($itemsjson);#
$items = json_decode($itemsjson, true);
#    $books = json_decode(file_get_contents(database_path().'/books.json'), True);

#$timestamp=Carbon\Carbon::now()->subDays(count($items));
#print_r (array_values($items));
foreach((array)$items as $item_desc => $order_id)
{
echo $item_desc.PHP_EOL;

echo $order_id['item_id'].PHP_EOL;

}



$order = Order::where('order_desc','like',$order_desc)->first();
foreach($item_descs as $item_desc)
{
$item_id = Item::where('item_desc','=',$item_desc)->pluck('id')->first();
'item_id' => $item_id;
}
$timestampForThisOrder = $timestamp->addDay()->toDateTimeString();

'created_at' => $timestampForThisOrder,
'updated_at' => $timestampForThisOrder,
'order_desc' => $order_info


$orders =[
    'Parts to fix computers' => ['500 GB HDD'],
    'Access Points for Schools' => ['HP 460 AP','Belkin Patch Cables'],
    'Laptop for IT Manager' => ['Dell XPS 15','Thunderbolt Dock']
];




 ?>
