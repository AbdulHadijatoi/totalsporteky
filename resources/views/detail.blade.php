@extends('layouts.home.main')

@section('content')
    
  {{-- @if (isset($setvar)) --}}

    <div class="table-container">
        <div class="text">
       <img src="{{ Storage::url(''.$detail_match->league->image) }}" style="width: 58px; height: auto; object-fit: cover;" alt="">

          {{ $detail_match->league->name }}
          
         <p style="margin-left:61px;"> {{ $detail_match->date_of_match}}</p> 

        </div>

        
          <div class="additional-text"><img src="{{ Storage::url('team/' . $detail_match->home_image) }}" style="width: 123px; height: 117px; object-fit: cover;" alt="">
            <br>{{ $detail_match->home_name}}
          </div>
          <div class="middle-text"><span style="font-size:28px; font-weight:bold;"id="countdown"></span></div>
          <div class="right-text"><img src="{{ Storage::url('team/' . $detail_match->away_image) }}" style="width: 123px; height: 117px; object-fit: cover;" alt="">
            <br>{{ $detail_match->away_name}}</div>
      </div>

    {{-- @endif --}}
@endsection
   
@section('script_extra')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    <?php
    date_default_timezone_set('Asia/Karachi');
    $startDateTime = new DateTime($detail_match->date_of_match . ' ' . $detail_match->start_time);
    $currentDateTime = new DateTime();
    $startTimestamp = $startDateTime->getTimestamp();
    $currentTimestamp = $currentDateTime->getTimestamp();
    $interval = max(0, $startTimestamp - $currentTimestamp);
    $start_time = $detail_match->start_time;
    ?>

    var countdownElement = document.getElementById('countdown');
    var interval = <?php echo $interval; ?>;
    var start_time = '<?php echo $start_time; ?>'; // Add quotation marks around the variable

    function updateCountdown() {
        var hours = Math.floor(interval / 3600);
        var minutes = Math.floor((interval % 3600) / 60);
        var seconds = interval % 60;

        countdownElement.textContent = hours.toString().padStart(2, '0') + ':' +
            minutes.toString().padStart(2, '0') + ':' +
            seconds.toString().padStart(2, '0');

        interval--;

        if (interval < 0) {
            clearInterval(countdownInterval);
            countdownElement.textContent = start_time;
        }
    }

    var countdownInterval = setInterval(updateCountdown, 1000);
    updateCountdown();
  </script>
@endsection