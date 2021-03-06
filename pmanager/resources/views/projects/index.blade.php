@extends("layouts.app")

@section('content')
<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
<div class="panel panel-primary">
    <div class="panel-heading">Projects
        <div class="pull-right">
            <a href="projects/create" style="color:white;">
                <button class="btn btn-success btn-sm" style="margin-bottom:20px;">
                    Add New 
                </button>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            @foreach($projects as $project)
                <li class="list-group-item">
                    <a href="projects/{{ $project->id }}">{{ $project->name }}</a> - <small>{{ $project->description }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</div>
@endsection