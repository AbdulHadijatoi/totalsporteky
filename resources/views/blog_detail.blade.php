@extends('layouts.home.main')

@section('content')
    
<div class="row">
    <div class="col-md-9 px-2">
      <h1>{{ $blog->title }}</h1>
      <img src="{{ Storage::url('blogs/' . $blog->image) }}" style="width: 270px; height: auto; object-fit: cover;" alt="Menu A">
      <p style="font-size: 18px; word-wrap: break-word;">{{ strip_tags($blog->description) }}</p>
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
@endsection
