<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\Account;
use Session;

class OrderController extends Controller
{
    public function index(){
        return view('OrderTracker.orderHome');
    }

    public function createNewOrder(Request $request) {
        $accountsForDropdown = Account::getAccountsForDropdown();
        $itemsForCheckboxes = Item::getItemsForCheckboxes();

        return view('OrderTracker.newOrder')->with([
            'accountsForDropdown' => $accountsForDropdown,
            'itemsForCheckboxes' => $itemsForCheckboxes
        ]);
    }
    public function storeNewOrder(Request $request) {

        $messages = [
            'account_id.not_in' => 'Account not selected.',
        ];
        $this->validate($request, [
            'order_desc' => 'required|min:3',
            'account_id' => 'not_in:0',
        ], $messages);

        $order = new Order();
        $order->order_desc = $request->order_desc;
        $order->account_id = $request->account_id;
        $order->save();

        $items = ($request->items) ?: [];
        $order->items()->sync($items);
        $order->save();

        Session::flash('message', 'The Order '.$request->order_desc.' was added.');

        return redirect('/orders');
    }
    public function viewAllOrders(Request $request) {

        $orders = Order::orderBy('order_desc')->get();

        return view('OrderTracker.index')->with([
            'orders' => $orders,
        ]);

    }

    public function show($id) {

        $order = Order::with('items')->find($id);

        if(!$order) {
            Session::flash('message', 'The order you requested could not be found.');
            return redirect('/');
        }
        $accountsForDropdown = Account::getAccountsForDropdown();

        $itemsForCheckboxes = Item::getItemsForCheckboxes();

        $itemsForThisOrder = [];
        foreach($order->items as $item) {
            $itemsForThisOrder[] = $item->item_desc;
        }

        return view('OrderTracker.show')->with([
            'id' => $id,
            'order' => $order,
            'accountsForDropdown' => $accountsForDropdown,
            'itemsForCheckboxes' => $itemsForCheckboxes,
            'itemsForThisOrder' => $itemsForThisOrder,
        ]);
    }

    public function edit($id) {

        $order = Order::with('items')->find($id);

        if(is_null($order)) {
            Session::flash('message', 'The order you requested was not found.');
            return redirect('/orders');
        }

        $accountsForDropdown = Account::getAccountsForDropdown();

        $itemsForCheckboxes = Item::getItemsForCheckboxes();

        $itemsForThisOrder = [];
        foreach($order->items as $item) {
            $itemsForThisOrder[] = $item->item_desc;
        }

        return view('OrderTracker.edit')->with([
            'id' => $id,
            'order' => $order,
            'accountsForDropdown' => $accountsForDropdown,
            'itemsForCheckboxes' => $itemsForCheckboxes,
            'itemsForThisOrder' => $itemsForThisOrder,
        ]);

    }

    public function saveEdits(Request $request) {

        $messages = [
            'account_id.not_in' => 'account not selected.',
        ];

        $this->validate($request, [
            'order_desc' => 'required|min:3',
            'account_id' => 'not_in:0'
        ], $messages);

        $order = Order::find($request->id);

        $order->order_desc = $request->order_desc;
        $order->account_id = $request->account_id;

        if($request->items) {
            $items = $request->items;
        }
        else {
            $items = [];
        }

        $order->items()->sync($items);
        $order->save();

        Session::flash('message', 'Your changes to '.$order->order_desc.' were saved.');
        return redirect('/orders/edit/'.$request->id);

    }

    public function confirmDeletion($id) {

        $order = Order::find($id);

        if(!$order) {
            Session::flash('message', 'Order not found.');
            return redirect('/orders');
        }

        return view('OrderTracker.delete')->with('order', $order);
    }

    public function delete(Request $request) {

        $order = Order::find($request->id);

        if(!$order) {
            Session::flash('message', 'Deletion failed; order not found.');
            return redirect('/orders');
        }

        $order->items()->detach();

        $order->delete();

        Session::flash('message', $order->order_desc.' was deleted.');
        return redirect('/orders');
    }

}
