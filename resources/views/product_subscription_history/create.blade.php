@extends('clients.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form action="{{ url('client') }}" method="post">
                {!! csrf_field() !!}
                <label>Name</label></br>
                <input type="text" name="client_name" id="client_name" class="form-control"></br>

                <label>Email</label></br>
                <input type="text" name="email" id="email" class="form-control"></br>

                <label>Office Phone</label></br>
                <input type="text" name="phone_1" id="phone_1" class="form-control"></br>

                <label>Cell Phone</label></br>
                <input type="text" name="phone_2" id="phone_2" class="form-control"></br>

                <label>Home Phone</label></br>
                <input type="text" name="phone_3" id="phone_3" class="form-control"></br>

                <label>Address</label></br>
                <input type="text" name="address" id="address" class="form-control"></br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
