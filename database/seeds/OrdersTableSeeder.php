<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Account;
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

        $orders =[
            'Parts to fix computers' => ['Repairs'],
            'Access Points for Schools' => ['Infrastructure'],
            'Laptop for IT Manager' => ['Equipment']
        ];
    #    $books = json_decode(file_get_contents(database_path().'/books.json'), True);

        $timestamp=Carbon\Carbon::now()->subDays(count($orders));
        $timestampForThisBook = $timestamp->addDay()->toDateTimeString();
        foreach($orders as $order_desc => $accounts)
        {
            foreach($accounts as $account_desc)
            {
                $account_id = Account::where('account_desc','like',$account_desc)->pluck('id')->first();

            }
            Order::insert([
                'created_at' => $timestampForThisBook,
                'updated_at' => $timestampForThisBook,

                'order_desc' => $order_desc,
                'account_id' => $account_id,

            ]);

        }

    }
}
