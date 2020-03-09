@extends('layouts.app')

@section('content')


    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->

      <!-- Jumbotron -->
      <div class="well well-lg">
        <h1>{{$project->name}}</h1>
        <p class="lead">{{ $project->description }}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

      <!-- Example row of columns -->
      <!-- <div style="margin-left:10px;">
        <button class="btn btn-success">Add Project 
        <span class="glyphicon glyphicon-plus"></span></button>
      </div> -->
      <div class="row" style="background-color:#fff;margin:10px;">
      <!-- <a href="" class="btn btn-default btn-sm">Add Comment</a> -->

     
    <h1>Add comment</h1>
      <!-- Example row of columns -->
      <div class="row" style="background-color:#fff;margin:10px;">
            <form method="post" action="{{ route('comments.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="commentable_type" value="App\Project">
                <input type="hidden" name="commentable_id" value="{{$project->id}}">
                
                <div class="form-group">
                    <label for="comment-content">Comment</label>
                    <textarea name="body" id="comment-content" placeholder="Comment"
                     cols="30" rows="3" spellcheck="false" required class="form-control autosize-target text-left"
                     style="resize:vertical;"></textarea>
                </div>
                <div class="form-group">
                    <label for="comment-content">Proof of work done (url/photos)</label>
                    <textarea name="url" id="comment-content" placeholder="Enter url or screenshots"
                     cols="30" rows="2" spellcheck="false" required class="form-control autosize-target text-left"
                     style="resize:vertical;"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add comment">
                </div>
            </form>
      </div>
      </div>
      <h3>Comments</h3>
       <!-- List of comments on project --> 
       <!-- @foreach($comments as $comment)
          @if($comment->commentable_type == 'Project' AND $comment->commentable_id == $project->id)
            <div>
              <p style="font-size:15px;">{{ $comment->body }}</p>
            </div>
          @endif
          @endforeach -->
        @foreach($project->comments as $comment)
          <div class="col-md-4 col-lg-4 col-sm-4">
            <h3>{{ $comment->body }}</h3>
            <p class="text-danger">{{ $comment->url }}</p>
            <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project >></a></p>
          </div>
        @endforeach
    </div>

           

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
              <li><a href="/projects/create/{{ $project->id }}">Add Project</a></li>
              <li><a href="/projects">projects</a></li>
              <br>
              @if($project->user_id == Auth::user()->id)
                <li>
                  <a href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this project?');
                    if( result ){
                      event.preventDefault();
                      document.getElementById('delete-form').submit();
                    }
                  "
                  >
                  Delete
                  </a>

                  <form id="delete-form" action="{{ route('projects.destroy', [$project->id]) }}"
                  method="POST" style="display:none;">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                  </form>
                </li>
              @endif
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