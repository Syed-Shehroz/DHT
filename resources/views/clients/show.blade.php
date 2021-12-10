@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <div class="card-body">
                <h5 class="card-title">Name : {{ $clients->client_name }}</h5>
                <p class="card-text">Email : {{ $clients->email }}</p>
                <p class="card-text">Office Phone : {{ $clients->phone_1 }}</p>
                <p class="card-text">Cell Phone : {{ $clients->phone_2 }}</p>
                <p class="card-text">Home Phone : {{ $clients->phone_3 }}</p>
                <p class="card-text">Address : {{ $clients->address }}</p>
            </div>

            </hr>

        </div>
    </div>
