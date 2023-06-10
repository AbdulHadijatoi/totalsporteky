@extends('layouts/layoutMaster')

@section('title', 'Update User')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Edit /</span> User
</h4>

<div class="row">
  
<form action="{{ route('update-user') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="col-xl-8">
    <!-- HTML5 Inputs -->
    <div class="card mb-4">
      <h5 class="card-header">User</h5>
      <div class="card-body">
        <div class="mb-3 row">
          <input type="hidden" name="id" value="{{ $user->id }}">
          <label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="name" value="{{ $user->name }}" id="html5-text-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Email</label>
          <div class="col-md-10">
            <input class="form-control" type="email" name="email" value="{{ $user->email }}" id="html5-text-input" />
          </div>
        </div>
        
        <div class="mb-3 row">
          <label for="html5-date-input" class="col-md-2 col-form-label">Password</label>
          <div class="col-md-10">
            <input class="form-control" type="password" name="password" value="{{ $user->password }}" id="html5-date-input" />
          </div>
        </div>


        <div class="m-0 px-4 pb-3 d-block template-customizer-layoutType">
          <label for="customizerStyle" class="form-label d-block template-customizer-t-layout_label">Status</label>
          <div class="row row-cols-lg-auto g-3 align-items-center template-customizer-layouts-options">
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="layoutRadios-static" value="1" {{ $user->status === 1 ? 'checked' : '' }}>
                <label class="form-check-label template-customizer-t-layout_static" for="layoutRadios-static">Active</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="layoutRadios-fixed" value="0" {{ $user->status != 1 ? 'checked' : '' }}>
                <label class="form-check-label template-customizer-t-layout_fixed" for="layoutRadios-fixed">Inactive</label>
              </div>
            </div>
          </div>
        </div>


        <button type="submit" class="btn btn-primary">UPDATE</button>
       
      </div>
    </div>

   
  </div>
</form>
</div>
@endsection
