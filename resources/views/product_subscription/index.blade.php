@extends('welcome')
@section('content')
<?php
    $item = request()->route('clientID');
    $items = request()->route('projectID');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Product Subscription</div>
                    <div class="card-body">
                        <a href="{{ url('client/' . $item . '/project/' . $items . '/product-subs/create') }}" class="btn btn-success btn-sm" title="Add New P.S">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Plan Name</th>
                                        <th>Validity</th>
                                        <th>Creation Date</th>
                                        <th>Source</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcriptions as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->plan_name }}</td>
                                            <td>{{ $data->validity }}</td>
                                            <td>{{ $data->date_created }}</td>
                                            <td>{{ $data->source }}</td>

                                            {{-- <td>{{ $data->mobile }}</td> --}}
                                            <td>
                                                <a href="{{ url('/client/' . $item . '/project/' . $items . '/product-subs/' . $data->id. '/product-payment') }}" title="Product Payments Subscription "><button
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                            aria-hidden="true"></i> Payments</button></a>
                                                <a href="{{ url('client/' . $item . '/project/' . $items . '/product-subs/' .  $data->id. '/edit') }}"
                                                    title="Edit Payment Subscription"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</button></a>

                                                <form method="POST" action="{{ url('/client/' . $item . '/project/' . $items . '/product-subs/' . $data->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{-- {{ method_field('DELETE') }} --}}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete "
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
