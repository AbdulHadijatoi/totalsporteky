@extends('layouts/layoutMaster')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Edit /</span> Matches
</h4>

<div class="row">
  
  <form action="{{ route('update-matches',$match->id) }}" method="POST">
    @csrf
    <div class="col-xl-8">
      <!-- HTML5 Inputs -->
      <div class="card mb-4">
        <h5 class="card-header">Matches</h5>
        <div class="card-body">
        
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Select League</label>
            <div class="col-md-10">
  
            <select class="select2 form-select form-select-lg" name="league_id" required id="html5-text-input" required data-allow-clear="true">
              <option value="{{ $match->league->id }}">{{ $match->league->name }}</option>

              @foreach ($leagues as $league )
              <option value="{{ $league->id }}">{{ $league->name }}</option>
              @endforeach
             
             
            </select>
          </div>
        </div>
       
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Home Team</label>
          <div class="col-md-10">
  
          <select class="select2 form-select form-select-lg" name="home_team" required id="html5-text-input" required data-allow-clear="true">
            <option value="{{ $match->home_team }}"> @php
              $awayTeam = $team->firstWhere('id', $match->home_team);
              if ($awayTeam) {
                  echo $awayTeam->name;
              } else {
                  echo 'Select home team';
              }
          @endphp</option>
            @foreach ($team as $league )
            <option value="{{ $league->id }}">{{ $league->name }}</option>
            @endforeach
           
           
          </select>
        </div>
      </div>
  
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Away Team</label>
          <div class="col-md-10">
  
          <select class="select2 form-select form-select-lg" name="away_team" required id="html5-text-input" required data-allow-clear="true">
            <option value="{{ $match->away_team }}"> @php
              $awayTeam = $team->firstWhere('id', $match->away_team);
              if ($awayTeam) {
                  echo $awayTeam->name;
              } else {
                  echo 'Select away team';
              }
          @endphp</option>
            @foreach ($team as $league )
            <option value="{{ $league->id }}">{{ $league->name }}</option>
            @endforeach
           
           
          </select>
        </div>
      </div>
  
        
          <div class="mb-3 row">
            <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
            <div class="col-md-10">
              <input class="form-control" type="time" name="start_time" value="{{ $match->start_time }}"  required id="html5-time-input" />
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
            <div class="col-md-10">
              <input class="form-control" type="date" name="date_of_match" value="{{ $match->date_of_match }}" id="html5-date-input" />
            </div>
          </div>
           @foreach ($streamUrls as $item)
               
            <div class="mb-3 row">
              <label for="html5-text-input" class="col-md-2 col-form-label">Live Stream Url</label>
              <div class="col-md-10">
                <input class="form-control" type="text" name="stream_url[]" value="{{ $item }}" required id="html5-text-input" />
              </div>
            </div>
           @endforeach

           <div class="m-0 px-4 pb-3 d-block template-customizer-layoutType">
            <label for="customizerStyle" class="form-label d-block template-customizer-t-layout_label">Status</label>
            <div class="row row-cols-lg-auto g-3 align-items-center template-customizer-layouts-options">
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="layoutRadios-static" value="1" {{ $match->status === 1 ? 'checked' : '' }}>
                  <label class="form-check-label template-customizer-t-layout_static" for="layoutRadios-static">Active</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="layoutRadios-fixed" value="0" {{ $match->status != 1 ? 'checked' : '' }}>
                  <label class="form-check-label template-customizer-t-layout_fixed" for="layoutRadios-fixed">Inactive</label>
                </div>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
         
        </div>
      </div>
  
     
    </div>
  </form>
</div>
@endsection
