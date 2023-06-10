@extends('layouts/layoutMaster')

@section('title', 'Create User')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Add /</span> User
</h4>

<div class="row">
  
<form action="{{ route('save-user') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="col-xl-8">
    <!-- HTML5 Inputs -->
    <div class="card mb-4">
      <h5 class="card-header">Create User Form</h5>
      <div class="card-body">
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
          <div class="col-md-10">
            <input class="form-control" type="text" required name="name" value="" id="html5-text-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Email</label>
          <div class="col-md-10">
            <input class="form-control" type="email" required name="email" value="" id="html5-text-input" />
          </div>
        </div>
        
        <div class="mb-3 row">
          <label for="html5-date-input" class="col-md-2 col-form-label">Password</label>
          <div class="col-md-10">
            <input class="form-control" type="password" required name="password" value="" id="html5-date-input" />
          </div>
        </div>
  
        <button type="submit" class="btn btn-primary">ADD</button>
       
      </div>
    </div>

   
  </div>
</form>
</div>
@endsection
