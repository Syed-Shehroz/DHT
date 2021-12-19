@extends('template.layout')

@section('content')
    <form action="{{ url('project/') }}" method="POST">
        {!! csrf_field() !!}

        {{-- Project Section --}}
        <div class="card">
            <div class="card-header">ADD PROJECTS</div>
            <div class="card-body">
                <label>Project Name</label>
                <input type="text" name="project_name" id="project_name" class="form-control"></br>

                <label>Client</label>
                <select name="client_id" id="client_id" class="form-control">
                    <option value="">Select Client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client['id'] }}"> {{ $client['client_name'] }} </option>
                    @endforeach
                </select></br>

                <label>Combine Plan</label>
                <select name="combined_plan" id="combined_plan" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select></br>

                {{-- COMBINE PLAN YES FIELDS --}}
                <div id="otherType" style="display:none;">
                    <label>Plan Description</label>
                    <textarea name="project_description" id="project_description" class="form-control"
                        style="height: 100px"></textarea></br>

                    <label>Project Cost</label></br>
                    <input type="number" name="project_cost" id="project_cost" class="form-control"></br>

                    <label>Recurring</label>
                    <select name="project_recurring" id="project_recurring" class="form-control">
                        <option value="NO">No</option>
                        <option value="YES">Yes</option>
                    </select></br>

                    <label>Frequency Amount</label>
                    <input type="number" name="project_frequency_amount" id="project_frequency_amount" class="form-control"></br>

                    <label>Frequency Unit</label>
                    <select name="project_frequency_unit" id="project_frequency_unit" class="form-control">
                        <option value="MONTHS">Months</option>
                        <option value="YEAR">Year</option>
                        <option value="DAY">Day</option>
                    </select></br>

                    <label>Validity</label></br>
                    <input type="date" name="project_validity" id="project_validity" class="form-control"></br>

                    <label>Source</label></br>
                    <input type="text" name="project_source" id="project_source" class="form-control"></br>
                </div>

                {{-- COMBINE PLAN YES FIELDS --}}

                <label>Project Start Date</label></br>
                <input type="date" name="project_date" id="project_date" class="form-control"></br>



            </div>
        </div>

        {{-- Product Subscription Section --}}
        <div class="card">
            <div class="card-header">Product Subscription</div>

            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-copy" title="Add New Client">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>

            <div class="card-body" id="tobeCopy">

                <div class="col-md-6">
                    <label>Product</label>
                    <select name="product_id[]" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product['id'] }}"> {{ $product['name'] }} </option>
                        @endforeach
                    </select>
                    {{-- </div> --}}

                    {{-- <div class="col-md-6"> --}}
                    <label>Plan Name</label>
                    <input type="text" name="product_plan_name[]" class="form-control">
                </div>
                {{-- COMBINE PLAN NO FIELDS --}}
                <div id="productDiv">

                    <label>Plan Description</label>
                    <textarea name="product_description[]" class="form-control"
                        style="height: 100px"></textarea></br>

                    <label>Product Cost</label></br>
                    <input type="number" name="product_cost[]" class="form-control"></br>

                    <label>Recurring</label>
                    <select name="product_recurring[]" class="form-control">
                        <option value="NO">No</option>
                        <option value="YES">Yes</option>
                    </select></br>

                    <label>Frequency Amount</label>
                    <input type="number" name="product_frequency_amount[]" class="form-control"></br>

                    <label>Frequency Unit</label>
                    <select name="product_frequency_unit[]" class="form-control">
                        <option value="MONTHS">Months</option>
                        <option value="YEAR">Year</option>
                        <option value="DAY">Day</option>
                    </select></br>

                    <label>Validity</label></br>
                    <input type="date" name="product_validity[]" class="form-control"></br>

                    <label>Source</label></br>
                    <input type="text" name="product_source[]" class="form-control"></br>
                </div>
                {{-- COMBINE PLAN NO FIELDS --}}

                <label>Creation Date</label>
                <input type="date" name="date_created[]" class="form-control"></br>

            </div>

            <div id="copyHere">

            </div>
        </div>


        {{-- Product Subscription Payments Section --}}

        <div class="card">
            <div class="card-header">Payment</div>
            <div class="card-body">

                <label>Amount</label></br>
                <input type="number" name="payment_amount" id="payment_amount" class="form-control"></br>

                <label>Frequency Amount</label>
                <input type="number" name="payment_frequency_amount" id="payment_frequency_amount" class="form-control"></br>

                <label>Frequency Unit</label>
                <select name="payment_frequency_unit" id="payment_frequency_unit" class="form-control">
                    <option value="MONTHS">Months</option>
                    <option value="YEAR">Year</option>
                    <option value="DAY">Day</option>
                </select></br>

                <label>Plan</label></br>
                <input type="text" name="payment_plan" id="payment_plan" class="form-control"></br>

                <label>Validity</label></br>
                <input type="date" name="payment_validity" id="payment_validity" class="form-control"></br>

                <label>Status</label>
                <select name="payment_status" id="payment_status" class="form-control">
                    <option value="" selected disabled>Select any one</option>
                    <option value="INVOICE_PAID">Invoice Paid</option>
                    <option value="INVOICE_SENT">Invoice Send</option>
                </select></br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </div>
        </div>


    </form>

    {{-- <script>
        $(document).ready(function() {
            $('select').selectpicker();

            $("#combined_plan").change(function() {
                var val = $('this').val();

                alert(val);
            });
        });
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $('#combined_plan').change(function() {
            selection = $(this).val();
            switch (selection) {
                case '1':
                    $('#otherType').show();
                    $('#productDiv').hide();
                    break;
                default:
                    $('#otherType').hide();
                    $('#productDiv').show();

                    break;
            }
        });


        $('.btn-copy').click(function() {
            $("#copyHere").append($("#tobeCopy").clone());
        });
    </script>


@stop
