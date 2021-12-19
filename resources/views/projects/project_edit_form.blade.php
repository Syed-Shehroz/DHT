@extends('template.layout')
@section('content')
    <div class="card">
        <div class="card-header">EDIT PROJECTS</div>
        <div class="card-body">

            <form action="{{ url('/project/' . $projects->id . '/update') }}" method="post">
                {!! csrf_field() !!}

                <input type="hidden" name="project_id" id="project_id" value="{{ $projects->id }}" id="id" />

                <label>Project Name</label></br>
                <input type="text" name="project_name" id="project_name" value="{{ $projects->project_name }}"
                    class="form-control"></br>

                <label>Client</label>
                <select name="client_id" id="client_id" class="form-control">
                    <option value="">Select Client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client['id'] }}" @if ($projects->client_id == $client['id']) selected @endif>
                            {{ $client['client_name'] }}
                        </option>
                    @endforeach
                </select>

                <label>Combine Plan</label>
                <select name="combined_plan" id="combined_plan" class="form-control">
                    <option value="0" @if ($projects->combined_plan == 0) selected @endif>No</option>
                    <option value="1" @if ($projects->combined_plan == 1) selected @endif>Yes</option>
                </select>

                <label>Description</label>
                <textarea name="plan_description" id="plan_description" class="form-control"
                    style="height: 100px">{{ $projects->plan_description }}</textarea>


                <label>Date</label></br>
                <input type="date" name="project_date" id="project_date" value="{{ $projects->project_date }}"
                    class="form-control"></br>

                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>



@stop
