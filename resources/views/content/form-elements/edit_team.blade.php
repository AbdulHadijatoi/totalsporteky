@extends('layouts/layoutMaster')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Edit /</span> Team
</h4>

<div class="row">
  
  <form action="{{ route('update-team',$team->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-xl-8">
      <!-- HTML5 Inputs -->
      <div class="card mb-4">
        <h5 class="card-header">Team</h5>
        <div class="card-body">
        
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Select League</label>
            <div class="col-md-10">
  
            <select class="select2 form-select form-select-lg" name="league_id" required id="html5-text-input" required data-allow-clear="true">
              <option value="{{ $team->league->id }}">{{ $team->league->name }}</option>

              @foreach ($leagues as $league )
              <option value="{{ $league->id }}">{{ $league->name }}</option>
              @endforeach
             
             
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="name" value="{{ $team->name }}" required id="html5-text-input" />
          </div>
        </div>
  
  
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Country Name</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="country_name" value="{{ $team->country_name }}" required id="html5-text-input" />
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-time-input" class="col-md-2 col-form-label">Uploaded Picture</label>
            <div class="col-md-10">
          <img src="{{ Storage::url('team/' . $team->image) }}" style="width: 300px; height: auto; object-fit: cover;" alt="Uploaded Image">
  
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-time-input" class="col-md-2 col-form-label">Upload Picture</label>
            <div class="col-md-10">
              <input class="form-control" type="file"  name="image"  />
            </div>
    
         </div>

         <div class="m-0 px-4 pb-3 d-block template-customizer-layoutType">
          <label for="customizerStyle" class="form-label d-block template-customizer-t-layout_label">Status</label>
          <div class="row row-cols-lg-auto g-3 align-items-center template-customizer-layouts-options">
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="layoutRadios-static" value="1" {{ $team->status === 1 ? 'checked' : '' }}>
                <label class="form-check-label template-customizer-t-layout_static" for="layoutRadios-static">Active</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="layoutRadios-fixed" value="0" {{ $team->status != 1 ? 'checked' : '' }}>
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
