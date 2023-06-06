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
  
  <form action="{{ route('update-matches',$findleagues->id) }}" method="POST">
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
              <option value="{{ $findleagues->league->id }}">{{ $findleagues->league->name }}</option>

              @foreach ($allleagues as $league )
              <option value="{{ $league->id }}">{{ $league->name }}</option>
              @endforeach
             
             
            </select>
          </div>
        </div>
       
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Home Team</label>
          <div class="col-md-10">
  
          <select class="select2 form-select form-select-lg" name="home_team" required id="html5-text-input" required data-allow-clear="true">
            <option value="{{ $findleagues->home_team }}"> @php
              $awayTeam = $team->firstWhere('id', $findleagues->home_team);
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
            <option value="{{ $findleagues->away_team }}"> @php
              $awayTeam = $team->firstWhere('id', $findleagues->away_team);
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
              <input class="form-control" type="time" name="start_time" value="{{ $findleagues->start_time }}"  required id="html5-time-input" />
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
            <div class="col-md-10">
              <input class="form-control" type="date" name="date_of_match" value="{{ $findleagues->date_of_match }}" id="html5-date-input" />
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

          <button type="submit" class="btn btn-primary">Update</button>
         
        </div>
      </div>
  
     
    </div>
  </form>
</div>
@endsection
