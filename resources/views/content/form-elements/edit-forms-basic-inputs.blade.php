@extends('layouts/layoutMaster')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Edit /</span> Leagues
</h4>

<div class="row">
  
<form action="{{ route('update-leagues') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="col-xl-8">
    <!-- HTML5 Inputs -->
    <div class="card mb-4">
      <h5 class="card-header">Leagues</h5>
      <div class="card-body">
        <div class="mb-3 row">
          <input type="hidden" name="id" value="{{ $findleagues->id }}">
          <label for="html5-text-input" class="col-md-2 col-form-label">Name of League</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="name" value="{{ $findleagues->name }}" id="html5-text-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Location</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="location" value="{{ $findleagues->location }}" id="html5-text-input" />
          </div>
        </div>
        
        <div class="mb-3 row">
          <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
          <div class="col-md-10">
            <input class="form-control" type="date" name="date_of_match" value="{{ $findleagues->date_of_match }}" id="html5-date-input" />
          </div>
        </div>
  
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
          <div class="col-md-10">
            <input class="form-control" type="time" name="start_time" value="{{ $findleagues->start_time }}" id="html5-time-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Uploaded Picture</label>
          <div class="col-md-10">
        <img src="{{ asset('storage/' . $findleagues->image) }}" style="width: 300px; height: auto; object-fit: cover;" alt="Uploaded Image">

          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Upload Picture</label>
          <div class="col-md-10">
            <input class="form-control" type="file"  name="image"  />
          </div>
  
       </div>
        <button type="submit" class="btn btn-primary">UPDATE</button>
       
      </div>
    </div>

   
  </div>
</form>
</div>
@endsection
