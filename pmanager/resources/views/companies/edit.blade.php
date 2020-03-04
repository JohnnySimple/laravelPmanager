@extends('layouts.app')

@section('content')


    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->

      <!-- Example row of columns -->
      <div class="row" style="background-color:#fff;margin:10px;">
            <form method="post" action="{{ route('companies.update', [$company->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="company-name">Name<span class="required">*</span></label>
                    <input type="text" name="name" id="company-name" placeholder="Enter name"
                    required spellcheck="false" class="form-control" value="{{ $company->name }}">
                </div>
                <div class="form-group">
                    <label for="company-description">Description</label>
                    <textarea name="description" id="company-description" placeholder="Company description"
                     cols="30" rows="5" spellcheck="false" class="form-control autosize-target text-left"
                     style="resize:vertical;">{{ $company->description }}</textarea>
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
              <li><a href="/companies/{{ $company->id }}">View company</a></li>
              <li><a href="/companies">All companies</a></li>
            </ol>
          </div>
          
        </div>
    @endsection