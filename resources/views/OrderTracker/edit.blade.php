@extends('layouts.master')

@section('title')
    Edit Order
@endsection

@push('head')
    <link href='/css/style.css' rel='stylesheet'>
@endpush


@section('content')
    <h1>Edit an Order</h1>

    <form method='POST' action='/orders/edit'>
        {{ csrf_field() }}
        <small>* Required fields</small>

        <input type='hidden' name='id' value='{{$order->id}}'>

        <label for='order_desc'>* Order Description</label>
        <input type='text' name='order_desc' value='{{ old('order_desc', $order->order_desc)}}'>

        <label>Items</label>
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
        <label for='account_id'>* Account:</label>
        <select id='account_id' name='account_id'>
            <option value='0'>Choose</option>
            @foreach($accountsForDropdown as $account_id => $account_desc)
                <option value='{{ $account_id }}' {{ ($order->account_id == $account_id) ? 'SELECTED' : '' }}>
                    {{ $account_desc }}
                </option>
            @endforeach
        </select>

        @include('errors')

        <input class='btn btn-primary' type='submit' value='Submit Changes'>
    </form>
    @endsection
