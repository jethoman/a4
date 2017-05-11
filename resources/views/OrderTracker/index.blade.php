@extends('layouts.master')

@section('title')
    Welcome to the Department Order Tracker
@endsection

@section('content')
<div class='order-view'>
        <h1>Department Orders</h1>
        @if(count($orders) == 0)
            You don't have any orders yet; would you like to <a href='/orders/new'>add one</a>?
        @else
            @foreach($orders as $order)



                    <a href='/orders/{{ $order->id }}'><h3>{{ $order->order_desc }}</h3></a>

                    <a class='OrderAction' href='/orders/edit/{{ $order->id }}'><i class='fa fa-pencil'></i></a>
                    <a class='OrderAction' href='/orders/{{ $order->id }}'><i class='fa fa-eye'></i></a>
                    <a class='OrderAction' href='/orders/delete/{{ $order->id }}'><i class='fa fa-trash'></i></a>


            @endforeach
        @endif
    </div>
@endsection
