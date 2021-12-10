@extends('projects.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form action="{{ url('project') }}" method="post">
                {!! csrf_field() !!}
                <label>Project Name</label></br>
                <input type="text" name="project_name" id="project_name" class="form-control"></br>

                <label>Combined Plan</label></br>
                <input type="text" name="combined_plan" id="combined_plan" class="form-control" disabled></br>

                <label>Date</label></br>
                <input type="date" name="project_date" id="project_date" class="form-control"></br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
