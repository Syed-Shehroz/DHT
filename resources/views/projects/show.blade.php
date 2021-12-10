@extends('projects.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <div class="card-body">
                <h5 class="card-title">Project Name : {{ $projects->project_name }}</h5>
                <p class="card-text">Combined Plan : {{ $projects->combined_plan }}</p>
                <p class="card-text">Date : {{ $projects->project_date }}</p>

            </div>

            </hr>

        </div>
    </div>
