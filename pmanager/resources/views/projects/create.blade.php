@extends('layouts.app')

@section('content')


    <div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background:white;">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
    <h1>Create new project</h1>
      <!-- Example row of columns -->
      <div class="row" style="background-color:#fff;margin:10px;">
            <form method="post" action="{{ route('projects.store') }}">
                {{ csrf_field() }}
                <!-- <input type="hidden" name="_method" value="put"> -->
                <div class="form-group">
                    <label for="project-name">Name<span class="required">*</span></label>
                    <input type="text" name="name" id="project-name" placeholder="Enter project Name"
                    required spellcheck="false" class="form-control">
                </div>
                @if($companies == null)
                  <div><input type="hidden" name="company_id" value="{{ $company_id }}"></div>
                @endif

                @if($companies != null)
                <div class="form-group">
                    <label for="company-content">Select company</label>
                    <select name="company_id" class="form-control">
                        @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group">
                    <label for="project-description">Description</label>
                    <textarea name="description" id="project-description" placeholder="project description"
                     cols="30" rows="5" spellcheck="false" class="form-control autosize-target text-left"
                     style="resize:vertical;"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
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
              <li><a href="/projects">My projects</a></li>
              <li><a href="/projects">All projects</a></li>
            </ol>
          </div>
          
        </div>
    @endsection