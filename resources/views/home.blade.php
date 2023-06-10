@extends('layouts.home.main')

@section('content')


<div class="row mt-4">
    <div class="col-md-9 px-2">
        <style>#follow-button { font: normal normal normal 12px/18px 'Helvetica Neue',Arial,sans-serif; user-select: none; font-size: 13px; line-height: 26px; white-space: nowrap; text-align: left; outline: 0; text-decoration: none; display: inline-block; vertical-align: top; zoom: 1; position: relative; box-sizing: border-box; background-color: #1d9bf0; color: #fff; font-weight: 500; cursor: pointer; height: 28px; border-radius: 9999px; padding: 1px 12px 1px 12px; }#follow-button i { font: normal normal normal 12px/18px 'Helvetica Neue',Arial,sans-serif; user-select: none; font-size: 13px; line-height: 26px; white-space: nowrap; text-align: left; color: #fff; font-weight: 500; cursor: pointer; position: relative; display: inline-block; background: transparent 0 0 no-repeat; background-image: url(data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2072%2072%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h72v72H0z%22%2F%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23fff%22%20d%3D%22M68.812%2015.14c-2.348%201.04-4.87%201.744-7.52%202.06%202.704-1.62%204.78-4.186%205.757-7.243-2.53%201.5-5.33%202.592-8.314%203.176C56.35%2010.59%2052.948%209%2049.182%209c-7.23%200-13.092%205.86-13.092%2013.093%200%201.026.118%202.02.338%202.98C25.543%2024.527%2015.9%2019.318%209.44%2011.396c-1.125%201.936-1.77%204.184-1.77%206.58%200%204.543%202.312%208.552%205.824%2010.9-2.146-.07-4.165-.658-5.93-1.64-.002.056-.002.11-.002.163%200%206.345%204.513%2011.638%2010.504%2012.84-1.1.298-2.256.457-3.45.457-.845%200-1.666-.078-2.464-.23%201.667%205.2%206.5%208.985%2012.23%209.09-4.482%203.51-10.13%205.605-16.26%205.605-1.055%200-2.096-.06-3.122-.184%205.794%203.717%2012.676%205.882%2020.067%205.882%2024.083%200%2037.25-19.95%2037.25-37.25%200-.565-.013-1.133-.038-1.693%202.558-1.847%204.778-4.15%206.532-6.774z%22%2F%3E%3C%2Fsvg%3E); top: 4px; height: 18px; width: 18px;}</style>
        <a id="follow-button" class="btn" title="Follow Footybite on Twitter" href="#" target="_blank"><i></i><span class="label" id="l"><b>Footybite</b></span></a>
        <h2 style="color:#DC3545">NEW HOME OF <a href="#" target="_blank">SOCCER STREAMS</a></h2>

        @if (isset($setvar))
            <div class="tabs-box bg-light-gray rounded-lg p-3 d-flex justify-content-center mt-2">
                <a href="#" class="btn btn-light rounded-pill px-2 px-md-5">Yesterday</a>
                <a href="#" class="btn btn-dark mx-1 mx-md-3 rounded-pill px-2 px-md-5">Today</a>
                <a href="#" class="btn btn-light rounded-pill px-2 px-md-5">Tomorrow</a>
            </div>
        @endif
        
        <div class="bg-light-gray my-2 py-4 px-3 ">
            {{-- <a class="text-uppercase text-dark-light d-block font-weight-bold"></a> --}}
            @if(isset($allleague))
                <div class="my-1">
                    <a href="" class=" text-dark-light">
                        <img src="{{ Storage::url('' . $allleague->image) }}" alt="{{ $allleague->name }}" class="img-icone">
                        <span>{{ $allleague->name }}</span>
                    </a>
                </div>
                @foreach ($allleague->match as $item)
                    <div class="div-main-box rounded-lg overflow-hidden " id="font-md-10">
                        <a target="_blank" href="#">
                            <div class="div-child-box bg-dark-gray  bg-white py-2 position-relative">
                                <div class="d-flex justify-content-center row">
                                    <div class="col-5 text-right">
                                        <span class="d-inline-block mt-2">{{ $item->home_team_name }}</span>    
                                    </div>
                                    <div class="col-2 text-center">
                                        <span class="d-inline-block text-center text-dark-l">
                                            <i class="fas fa-clock"></i><br>
                                            @php
                                                date_default_timezone_set('Asia/Karachi');
                                                $startDateTime = new DateTime($item->date_of_match . ' ' . $item->start_time);
                                                $currentDateTime = new DateTime();
                                                $timeRemaining = '';
                                                
                                                if ($startDateTime > $currentDateTime) {
                                                    $interval = $startDateTime->getTimestamp() - $currentDateTime->getTimestamp();
                                                    $hours = floor($interval / 3600);
                                                    $minutes = floor(($interval % 3600) / 60);
                                                
                                                    if ($hours > 0) {
                                                        $timeRemaining = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' and ' . $minutes . ' minute' . ($minutes > 1 ? 's' : '');
                                                    } elseif ($minutes > 0) {
                                                        $timeRemaining = $minutes . ' minute' . ($minutes > 1 ? 's' : '');
                                                    } else {
                                                        $timeRemaining = 'Less than a minute';
                                                    }
                                                
                                                    $timeRemaining .= ' from now';
                                                } else {
                                                    $timeRemaining = 'The match has started';
                                                }
                                                
                                                echo $timeRemaining;
                                            @endphp
                                        </span>
                                    </div>
                                    <div class="col-5 text-left">
                                        <span class="d-inline-block mt-2"> {{ $item->away_team_name }}</span>    
                                        <div class="text-right d-none d-md-inline-block float-right"><button class="btn btn-sm btn-danger m-2">Live Streams</button></div>    
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else 
                @foreach ($allleagues as $item)
                    @if($item->match->count() > 0 &&  $item->match->count() != 0)
                        <div class="my-1">
                            <a href="" class=" text-dark-light">
                                <img src="{{ Storage::url('' . $item->image) }}" alt="{{ $item->name }}" class="img-icone">
                                <span>{{ $item->name }}</span>
                            </a>
                        </div>
                        @foreach($item->match as $items)
                            
                            <div class="div-main-box rounded-lg overflow-hidden " id="font-md-10">
                                <a target="_blank" href="#">
                                    <div class="div-child-box bg-dark-gray  bg-white py-2 position-relative">
                                        <div class="d-flex justify-content-center row">
                                            <div class="col-5 text-right">
                                                <span class="d-inline-block mt-2">{{ $items->home_team_name }}</span>    
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="d-inline-block text-center text-dark-l">
                                                    <i class="fas fa-clock"></i><br>
                                                    @php
                                                        date_default_timezone_set('Asia/Karachi');
                                                        $startDateTime = new DateTime($items->date_of_match . ' ' . $items->start_time);
                                                        $currentDateTime = new DateTime();
                                                        $timeRemaining = '';
                                                        
                                                        if ($startDateTime > $currentDateTime) {
                                                            $interval = $startDateTime->getTimestamp() - $currentDateTime->getTimestamp();
                                                            $hours = floor($interval / 3600);
                                                            $minutes = floor(($interval % 3600) / 60);
                                                        
                                                            if ($hours > 0) {
                                                                $timeRemaining = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' and ' . $minutes . ' minute' . ($minutes > 1 ? 's' : '');
                                                            } elseif ($minutes > 0) {
                                                                $timeRemaining = $minutes . ' minute' . ($minutes > 1 ? 's' : '');
                                                            } else {
                                                                $timeRemaining = 'Less than a minute';
                                                            }
                                                        
                                                            $timeRemaining .= ' from now';
                                                        } else {
                                                            $timeRemaining = 'The match has started';
                                                        }
                                                        
                                                        echo $timeRemaining;
                                                    @endphp
                                                </span>
                                            </div>
                                            <div class="col-5 text-left">
                                                <span class="d-inline-block mt-2"> {{ $items->away_team_name }}</span>    
                                                <div class="text-right d-none d-md-inline-block float-right"><button class="btn btn-sm btn-danger m-2">Live Streams</button></div>    
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
    </div>

    <div class="col-md-3 news-right-sec">
        <div class="news-right-sec-div" style="color: #212529;">
                         <h2 class="col-md-12 txt-white news-heading">
                   <a href="{{ route('all-blogs') }}" style="color:unset;">
                       Blog
                   </a>
                   </h2>

               
                           
           
                       
                           
           <div class="">
               <a href="#">
                   <div class="containee">
                     <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{Storage::url('ad_image_1.jpg')}}" alt="Tottenham signs Postecoglou as Head Coach after Celtics Domestic Treble ">
                     <div class="text-blockk1 pad-10">
                       <p class="txt-white font-weight-bold">Tottenham signs Postecoglou as Head Coach after Celtics Domestic Treble </p>
                     </div>
                   </div>
               </a>
           </div>
           
                       
                           
           <div class="">
               <a href="#">
                   <div class="containee">
                     <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{Storage::url('ad_image_1.jpg')}}" alt="Legendary Star Zlatan Ibrahimovic Retires at 41 ">
                     <div class="text-blockk1 pad-10">
                       <p class="txt-white font-weight-bold">Legendary Star Zlatan Ibrahimovic Retires at 41 </p>
                     </div>
                   </div>
               </a>
           </div>
           
                       
                           
           <div class="">
               <a href="#">
                   <div class="containee">
                     <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{Storage::url('ad_image_1.jpg')}}" alt="Unleashing the Powerhouses: Predicting the Big Performers in the UEFA Champions League 23-24">
                     <div class="text-blockk1 pad-10">
                       <p class="txt-white font-weight-bold">Unleashing the Powerhouses: Predicting the Big Performers in the UEFA Champions League 23-24</p>
                     </div>
                   </div>
               </a>
           </div>
           
                       
                           
           <div class="">
               <a href="#">
                   <div class="containee">
                     <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{Storage::url('ad_image_1.jpg')}}" alt="Introducing the Lionesses Englands Womens World Cup Squad  ">
                     <div class="text-blockk1 pad-10">
                       <p class="txt-white font-weight-bold">Introducing the Lionesses Englands Womens World Cup Squad  </p>
                     </div>
                   </div>
               </a>
           </div>
           
                       
                           
           <div class="">
               <a href="#">
                   <div class="containee">
                     <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{Storage::url('ad_image_1.jpg')}}" alt="Mbappe makes history as four-time Ligue 1 Player of the Year ">
                     <div class="text-blockk1 pad-10">
                       <p class="txt-white font-weight-bold">Mbappe makes history as four-time Ligue 1 Player of the Year </p>
                     </div>
                   </div>
               </a>
           </div>
           
                       
                           
           <div class="">
               <a href="#">
                   <div class="containee">
                     <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{Storage::url('ad_image_1.jpg')}}" alt="The Top 10 Female Tennis Players Ever">
                     <div class="text-blockk1 pad-10">
                       <p class="txt-white font-weight-bold">The Top 10 Female Tennis Players Ever</p>
                     </div>
                   </div>
               </a>
           </div>
           
                       
                           
           <div class="">
               <a href="#">
                   <div class="containee">
                     <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{Storage::url('ad_image_1.jpg')}}" alt="FIFA President Threatens TV Blackout of Womens World Cup in Europe">
                     <div class="text-blockk1 pad-10">
                       <p class="txt-white font-weight-bold">FIFA President Threatens TV Blackout of Womens World Cup in Europe</p>
                     </div>
                   </div>
               </a>
           </div>
           
                       
                           
           <div class="">
               <a href="#">
                   <div class="containee">
                     <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{Storage::url('ad_image_1.jpg')}}" alt="Bavarians stand firm Hernandez not for sale to PSG ">
                     <div class="text-blockk1 pad-10">
                       <p class="txt-white font-weight-bold">Bavarians stand firm Hernandez not for sale to PSG </p>
                     </div>
                   </div>
               </a>
           </div>
           
                       
                           
           <div class="">
               <a href="#">
                   <div class="containee">
                     <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{Storage::url('ad_image_1.jpg')}}" alt="Lionel Messi Net Worth A Closer Look at the Soccer Star Wealth">
                     <div class="text-blockk1 pad-10">
                       <p class="txt-white font-weight-bold">Lionel Messi Net Worth A Closer Look at the Soccer Star Wealth</p>
                     </div>
                   </div>
               </a>
           </div>
           
                       
           
           <h2 class="col-md-12txt-white news-heading">
                   <a href="#" style="color:unset;">
                       View All
                   </a>
            </h2>
           
        </div>
    </div>
</div>



<br><br>

    
    <style>
    .containee {
      position: relative;
      transition: transform 1.5s;
    }
    
    .containee:hover 
    {
      transform: scale(1.1);
    }
    
    .text-blockk {
      width:98%;
      position: absolute;
      bottom: 5px;
      right: 5px;
      background-color: rgba(0, 0, 0, 0.8);;
      color: white;
      padding-left: 10px;
      padding-right: 10px;
    }
</style>


<br>
        <h1 class="title">Watch <b>Reddit SOCCER STREAMS</b> on FOOTYBITE</h1>
        <p>&nbsp;</p>
<img src="{{ Storage::url('reddit_soccer_streams.jpg') }}" height="114" alt="Reddit Soccer Streams" class="logo">


<p>You can find the latest<strong> Reddit soccer Streams </strong> broadcasts here on <a href="#">Footybite.to</a></p>

<h2 class="subtitle">A Guide to Footybite and Reddit Soccer Streams</h2>
<p>&nbsp;</p>
<p>It is possible for users to post links to articles they find amusing on Reddit, a social networking site. A soccer stream is particularly appealing to soccer fans.</p>
<p>&nbsp;</p>
<p>Soccer fans can watch live <strong>soccer</strong> matches from home with a service called Reddit Soccer Streaming. Simply said, it is that easy. As a result of its many features, including live scoring, comments, and other features, Reddit Soccer Streaming is a fascinating website to visit if you enjoy sports. On Footybite.to, the greatest broadcasters provide a wide selection of free games featuring your favorite teams and athletes from across the globe.</p>
<p>&nbsp;</p>

<h2 class="subtitle">Streaming soccer on Reddit: How to do it</h2>
<p>&nbsp;</p>
<p>Without having to pay for cable or any other app subscription, you can follow your preferred teams and players thanks to Reddit Soccer Streams. The website features a wide range of content, including live streams, video, recaps, and even subreddits for specific games you could be curious about.</p>

<h2 class="subtitle">Use Your Laptop, Smartphone, Or Smart TV To Watch Soccer</h2>
<p>&nbsp;</p>
<p>There are many ways to do things on the internet, including how-to guides and entertaining articles. You can watch live streaming of soccer games on your computer, laptop, or smartphone using Reddit Soccer Streams.</p>

<h2 class="subtitle"><strong>SOCCER STREAMS or Footybite is Same ?</strong></h2>
<p>Yes, Footybite Stream Soccer matches live while soccer streams stands for the same, but it will be a little more difficult to discover soccer links on Reddit while here this website broadcasts matches from all soccer leagues.</p>
<p>&nbsp;</p>
<p>The popularity of soccer is really high. Soccer matches are popular among those who enjoy watching live broadcasts. These individuals may now more easily access the live broadcasts of their favorite teams and stars thanks to the increased use of social media.</p>


@endsection
