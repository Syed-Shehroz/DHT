@extends('product_subscription.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form action="{{ url('product-subs') }}" method="post">
                {!! csrf_field() !!}
                <label>Plan Name</label></br>
                <input type="text" name="plan_name" id="plan_name" class="form-control"></br>

                <label>Validity</label></br>
                <input type="date" name="validity" id="validity" class="form-control"></br>

                <label>Creation Date</label></br>
                <input type="date" name="date_created" id="date_created" class="form-control"></br>

                <label>Source</label></br>
                <input type="text" name="source" id="source" class="form-control"></br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
