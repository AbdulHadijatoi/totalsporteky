@extends('layouts/layoutMaster')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Add /</span> Matches
</h4>

<div class="row">
  
<form action="{{ route('save-matches') }}" method="POST">
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
            <option value="">Select League</option>
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
          <option value="">Select home team</option>
          @foreach ($teams as $match )
          <option value="{{ $match->id }}">{{ $match->name }}</option>
          @endforeach
         
         
        </select>
      </div>
    </div>

      <div class="mb-3 row">
        <label for="html5-text-input" class="col-md-2 col-form-label">Away Team</label>
        <div class="col-md-10">

        <select class="select2 form-select form-select-lg" name="away_team" required id="html5-text-input" required data-allow-clear="true">
          <option value="">Select away team</option>
          @foreach ($teams as $match )
          <option value="{{ $match->id }}">{{ $match->name }}</option>
          @endforeach
         
         
        </select>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
      <div class="col-md-10">
        <input class="form-control" type="date" required name="date_of_match" value="2021-06-18" id="html5-date-input" />
      </div>
    </div>
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
          <div class="col-md-10">
            <input class="form-control" type="time" name="start_time" value="12:30:00"  required id="html5-time-input" />
          </div>
        </div>
       
        <div id="container">
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Live Stream Url</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="stream_url[]" value="" required id="html5-text-input" />
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-primary" onclick="addDiv()">Add</button>

  
        <button type="submit" class="btn btn-primary">Save</button>
       
      </div>
    </div>

   
  </div>
</form>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   function addDiv() {
    var container = document.getElementById("container");
    var originalDiv = container.querySelector(".mb-3.row:last-of-type");

    // Get the previous input value
    var previousInput = originalDiv.querySelector("input");
    var previousValue = previousInput.value;

    // Create a copy of the original div
    var newDiv = originalDiv.cloneNode(true);

    // Clear the value of the new input field
    var newInput = newDiv.querySelector("input");
    newInput.value = "";

    // Append the new div to the container
    container.appendChild(newDiv);
  }
  </script>
