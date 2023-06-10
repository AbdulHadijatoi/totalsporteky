@extends('layouts.home.main')

@section('content')
    

  {{-- <div class="row">
    <h1>Blog</h1>
    @foreach ($getblogs as $blog)
    <a href="{{ route('detail-blog',$blog->id) }}">
            <div class="card">
                <img src="{{ Storage::url('blogs/' . $blog->image) }}" style="width: 200px; height: auto; object-fit: cover;" alt="Image">
              
                <h2 style="color:white">  {{ Str::limit($blog->title, 20) }}</h2>
            </div>
          </a>
        @endforeach
</div> --}}

<div class="row news_section">
  <h2 class="col-md-12">Blog</h2>
  @if($getblogs)
    @foreach ($getblogs as $blog)
      <div class="col-md-3 news-right-sec2">
        <div class="news-right-sec-div2">
              <div class="">
                  <a href="{{ route('detail-blog',$blog->id) }}">
                      <div class="containee">
                        <img style="width:100%; border-radius: 5px" class="img-fluid" src="{{ Storage::url('blogs/' . $blog->image) }}" alt="Blog Image">
                        <div class="text-blockk1 pad-10">
                          <p class="txt-white font-weight-bold" style="word-wrap: break-word;">{{$blog->title??""}} </p>
                        </div>
                      </div>
                  </a>
              </div>
          </div>
      </div>
    @endforeach
  @endif
</div>



@endsection
