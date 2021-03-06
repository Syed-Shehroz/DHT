@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form action="{{ url('product-payment') }}" method="post">
                {!! csrf_field() !!}
                {{-- <label>Type</label></br>
                <input type="text" name="type" id="type" class="form-control"></br> --}}

                <label>Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="">Select Any One</option>
                    <option value="PRODUCT">Product</option>
                    <option value="PROJECT">Project</option>
                </select>

                <label>Amount</label></br>
                <input type="text" name="amount" id="amount" class="form-control"></br>

                <label>Frequency Amount</label></br>
                <input type="text" name="frequency_amount" id="frequency_amount" class="form-control"></br>

                <label>Frequent Unit</label>
                <select name="frequent_unit" id="frequent_unit" class="form-control">
                    <option value="">Select Any One</option>
                    <option value="MONTHS">Months</option>
                    <option value="YEAR">Year</option>
                    <option value="DAY">Day</option>
                </select></br>

                <label>Plan</label></br>
                <input type="text" name="plan" id="plan" class="form-control"></br>

                <label>Validity</label></br>
                <input type="date" name="validity" id="validity" class="form-control"></br>

                <label>Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="">Select Any One</option>
                    <option value="INVOICE_SENT">Invoice Sent</option>
                    <option value="INVOICE_PAID">Invoice Paid</option>
                </select>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
