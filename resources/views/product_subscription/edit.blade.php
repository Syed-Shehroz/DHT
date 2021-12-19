@extends('welcome')
@section('content')
<?php
    $clientId = request()->route('clientID');
    $projectId = request()->route('projectID');
    ?>
    <div class="card">
        <div class="card-header">EDIT PRODUCT SUBSCRIPTION</div>
        <div class="card-body">

            <form action="{{ url('client/' . $clientId . '/project/' . $projectId . '/product-subs/' . $subcription['id'] .'/update') }}" method="post">
                {!! csrf_field() !!}
                {{-- @method("PATCH") --}}
                <input type="hidden" name="id" id="id" value="{{ $subcription['id'] }}" id="id" />

                <label>Plan Name</label></br>
                <input type="text" name="plan_name" id="plan_name" value="{{ $subcription['plan_name'] }}" class="form-control"></br>

                <label>Product</label>
                <select name="product_id" id="product_id" class="form-control">
                    @foreach ( $products as $product )
                    <option value="{{ $product['id'] }}" {{ $product['id'] == $subcription['product_id'] ? 'selected' : '' }}>{{ $product['name'] }}</option>

                    @endforeach
                </select>

                <label>Validity</label></br>
                <input type="date" name="validity" id="validity" value="{{ $subcription['validity'] }}" class="form-control"></br>

                <label>Creation Date</label></br>
                <input type="date" name="date_created" id="date_created" value="{{ $subcription['date_created'] }}" class="form-control"></br>

                <label>Source</label></br>
                <input type="text" name="source" id="source" value="{{ $subcription['source'] }}" class="form-control"></br>

                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
