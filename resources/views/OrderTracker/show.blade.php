@extends('layouts.master')

@section('title')
    Welcome to the Department Order Tracker
@endsection

@section('content')
<div class='order-view'>

        <h1>{{ $order->order_desc }}</h1>
        <ul id='items'>
            @foreach($itemsForCheckboxes as $id => $item_desc)
                <li><input
                    type='checkbox'
                    value='{{ $id }}'
                    id='item_{{ $id }}'
                    name='items[]'
                    {{ (in_array($item_desc, $itemsForThisOrder)) ? 'CHECKED' : '' }}
                    >&nbsp;
                    <label for='item_{{ $id }}'>{{ $item_desc }}</label>
                </li>
            @endforeach
        </ul>
        <label for='account_id'>Account:</label>
        <select id='account_id' name='account_id'>
            <option value='0'>Choose</option>
            @foreach($accountsForDropdown as $account_id => $account_desc)
                <option value='{{ $account_id }}' {{ ($order->account_id == $account_id) ? 'SELECTED' : '' }}>
                    {{ $account_desc }}
                </option>
            @endforeach
        </select>
        <p>Added on: {{ $order->created_at }}</p>

        <p>Last updated: {{ $order->updated_at }}</p>

        <a class='OrderAction' href='/orders/edit/{{ $order->id }}'>
        <img
		src="/images/pencil.jpg"
		alt="picture of an inventory on a clipboard"
		width="50"></a>

        <a class='OrderAction' href='/orders/delete/{{ $order->id }}'>
        <img
		src="/images/delete.png"
		alt="picture of an inventory on a clipboard"
		width="50"></a>

    </div>
@endsection
