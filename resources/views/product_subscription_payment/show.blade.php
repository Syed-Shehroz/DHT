@extends('product_subscription_payment.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <div class="card-body">
                <h5 class="card-title">Type : {{ $payments->type }}</h5>
                <p class="card-text">Amount : {{ $payments->amount }}</p>
                <p class="card-text">Plan : {{ $payments->plan }}</p>
                <p class="card-text">Validity : {{ $payments->validity }}</p>
                <p class="card-text">Status : {{ $payments->status }}</p>

            </div>

            </hr>

        </div>
    </div>
