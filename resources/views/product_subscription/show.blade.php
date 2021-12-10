@extends('product_subscription.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <div class="card-body">
                <h5 class="card-title">Plan Name : {{ $subcriptions->plan_name }}</h5>
                <p class="card-text">Validity : {{ $subcriptions->validity }}</p>
                <p class="card-text">Creation Date : {{ $subcriptions->date_created }}</p>
                <p class="card-text">Source : {{ $subcriptions->source }}</p>

            </div>

            </hr>

        </div>
    </div>
