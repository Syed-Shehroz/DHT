@extends('template.layout')
@section('content')


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Projects</h5>
                        <a href="{{ url('/project/create') }}" class="btn btn-success btn-sm" title="Add New Client">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Combined Plan</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($projects as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data['project_name'] }}</td>
                                        <td>{{ !empty($data['get_client']['client_name']) ? $data['get_client']['client_name'] : "-" }}</td>
                                        <td>{{ (isset($data['combined_plan']) && $data['combined_plan'] == 0) ? "NO" : "YES" }}</td>
                                        <td>{{ $data['project_date'] }}</td>
                                        {{-- <td>{{ $data->mobile }}</td> --}}
                                        <td>
                                            <a href="{{ url('/project/' . $data['id'] . '/edit') }}"
                                                title="Edit Project"><button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button></a>
                                            <form method="POST" action="{{ url('/project/' . $data['id']) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Project"
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
