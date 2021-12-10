@extends('product_subscription_payment.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form action="{{ url('product-payment/' . $payments->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{ $payments->id }}" id="id" />

                <label>Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="">Select Any One</option>
                    <option value="PRODUCT" {{ $payments->type == "PRODUCT" ? 'selected' : '' }}>Product</option>
                    <option value="PROJECT" {{ $payments->type == "PROJECT" ? 'selected' : '' }}>Project</option>
                </select>

                <label>Amount</label></br>
                <input type="text" name="amount" id="amount" value="{{ $payments->amount }}" class="form-control"></br>

                <label>Plan</label></br>
                <input type="text" name="plan" id="plan" value="{{ $payments->plan }}" class="form-control"></br>

                <label>Validity</label></br>
                <input type="text" name="validity" id="validity" value="{{ $payments->validity }}" class="form-control"></br>

                <label>Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="">Select Any One</option>
                    <option value="INVOICE_SENT" {{ $payments->status == "INVOICE_SENT" ? 'selected' : '' }}>Invoice Sent</option>
                    <option value="INVOICE_PAID" {{ $payments->status == "INVOICE_PAID" ? 'selected' : '' }}>Invoice Paid</option>
                </select>

                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
