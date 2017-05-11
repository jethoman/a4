@extends('layouts.master')

@section('title')
    New Order
@endsection

@push('head')
    <link href='/css/style.css' rel='stylesheet'>
@endpush


@section('content')
    <h1>Create a New Department Order</h1>

    <form method='POST' action='/orders/new'>
        {{ csrf_field() }}
        <small>* Required fields</small>

        <label for='order_desc'>* Order Description</label>
        <input type='text' name='order_desc' value'{{ old('order_desc', 'Stuff to Order')}}'>

        <label for='item_id'>* Select Items</label>
        <ul id='items'>
            @foreach($itemsForCheckboxes as $id => $item_desc)
                <li><input
                    type='checkbox'
                    value='{{$id}}'
                    id='item_{{$id}}'
                    name='items[]'
                    >&nbsp;
                    <label for='item_{{$id}}'>{{$item_desc}}</label></li>
            @endforeach
        </ul>
        <label for='account_id'>* Account:</label>
        <select id='account_id' name='account_id'>
            <option value='0'>Choose</option>
            @foreach($accountsForDropdown as $account_id => $account_desc)
                <option value='{{ $account_id }}'>
                    {{ $account_desc }}
                </option>
            @endforeach
        </select>

        @include('errors')

        <input class='btn btn-primary' type='submit' value='Add New Order'>
    </form>
    @endsection
