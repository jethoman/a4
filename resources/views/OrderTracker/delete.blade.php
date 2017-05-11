@extends('layouts.master')

@section('title')
    Welcome to the Department Order Tracker
@endsection

@section('content')
<h1>Confirm deletion</h1>
    <form method='POST' action='/orders/delete'>

        {{ csrf_field() }}

        <input type='hidden' name='id' value='{{ $order->id }}'?>

        <h2>Are you sure you want to delete <em>{{ $order->order_desc }}</em>?</h2>

        <input type='submit' value='Yes, delete this order.' class='btn btn-danger'>

    </form>
@endsection
