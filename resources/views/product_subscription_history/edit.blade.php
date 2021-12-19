@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form action="{{ url('client/' . $clients->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{ $clients->id }}" id="id" />

                <label>Name</label></br>
                <input type="text" name="client_name" id="client_name" value="{{ $clients->client_name }}" class="form-control"></br>

                <label>Email</label></br>
                <input type="text" name="email" id="email" value="{{ $clients->email }}" class="form-control"></br>

                <label>Office Phone</label></br>
                <input type="text" name="phone_1" id="phone_1" value="{{ $clients->phone_1 }}" class="form-control"></br>

                <label>Cell Phone</label></br>
                <input type="text" name="phone_2" id="phone_2" value="{{ $clients->phone_2 }}" class="form-control"></br>

                <label>Home Phone</label></br>
                <input type="text" name="phone_3" id="phone_3" value="{{ $clients->phone_3 }}" class="form-control"></br>

                <label>Address</label></br>
                <input type="text" name="address" id="address" value="{{ $clients->address }}" class="form-control"></br>


                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
