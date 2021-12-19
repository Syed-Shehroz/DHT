@extends('template.layout')

@section('content')


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Clients</h5>
                        <a href="{{ url('/client/create') }}" class="btn btn-success btn-sm" title="Add New Client">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Office Phone</th>
                                    <th scope="col">Cell Phone</th>
                                    <th scope="col">Home Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($clients as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->client_name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phone_1 }}</td>
                                            <td>{{ $data->phone_2 }}</td>
                                            <td>{{ $data->phone_3 }}</td>
                                            <td>{{ $data->address }}</td>
                                            {{-- <td>{{ $data->mobile }}</td> --}}
                                            <td>
                                                {{-- . '/project' --}}
                                                {{-- <a href="{{ url('/client/' . $data->id . '/project') }}"
                                                    title="View Project"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i>
                                                        Projects</button></a> --}}


                                                <a href="{{ url('/client/' . $data->id . '/edit') }}"
                                                    title="Edit Client"><button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button></a>


                                                <form method="POST" action="{{ url('/client' . '/' . $data->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Client"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
