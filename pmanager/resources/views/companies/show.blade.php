@extends('layouts.app')

@section('content')


    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{ $company->description }}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

      <!-- Example row of columns -->
      <!-- <div style="margin-left:10px;">
        <button class="btn btn-success">Add Project 
        <span class="glyphicon glyphicon-plus"></span></button>
      </div> -->
      <div class="row" style="background-color:#fff;margin:10px;">
      <li><a href="/projects/create" class="pull-right btn btn-primary btn-sm">Add Project</a></li>
      @if(count($company->projects) != 0)
        @foreach($company->projects as $project)
            <div class="col-lg-4">
            <h2>{{ $project->name }}</h2>
            <!-- <p class="text-danger">As of v9.1.2, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p> -->
            <p>{{$company->description}}</p>
            <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View Project »</a></p>
            </div>
        @endforeach
      @else
        <h2>You do not have any projects now.</h2>
      @endif
      </div>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
              <li><a href="/projects/create">Add Project</a></li>
              <li><a href="/companies">Companies</a></li>
              <li><a href="/companies/create">Create new company</a></li>
              <br>
              <li>
                <a href="#"
                onclick="
                var result = confirm('Are you sure you wish to delete this Company?');
                  if( result ){
                    event.preventDefault();
                    document.getElementById('delete-form').submit();
                  }
                "
                >
                Delete
                </a>

                <form id="delete-form" action="{{ route('companies.destroy', [$company->id]) }}"
                method="POST" style="display:none;">
                  <input type="hidden" name="_method" value="delete">
                  {{ csrf_field() }}
                </form>
              </li>
              <!-- <li><a href="#">Add member</a></li> -->
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Members</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div>
          
        </div>
    @endsection