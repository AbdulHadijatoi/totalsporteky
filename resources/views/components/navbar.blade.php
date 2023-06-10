

<header>
    <div>
        <div class="row d-flex position-relative justify-content-center align-items-center" style="min-height: 36px;">
            <div class="col-lg-2 col-md-4 col-6 mb-0 position-absolute" style="top:0; left: 20px;">
                <strong>
                    <a href="{{url('/')}}">
                        <img src="{{Storage::url('logo.png')}}" style="margin-top:0.1rem !important; height: 35px;" alt="Footybite" class="img-fluid d-block  mt-2 ml-4">
                    </a>
                </strong>
            </div>
            <div class="nav-res margin-auto" id="showDiv">
                <span id="crossbtn" class="font-weight-bolder a-main-text font-24 float-right p-3 pointer-event showBtn d-lg-none crossbtn">
                    X
                </span>
                <nav>
                    <ul class="d-flex flex-wrap" style="list-style-type: none; margin-bottom: 0px;">
                        <li>
                            <a href="{{ route('all-leagues') }}" class="text-white text-u-h font-17 px-3 font-weight-bold1">
                                All
                            </a>
                        </li>
                        @isset($allleagues)
                            @foreach ($allleagues as $item)
                                <li>
                                    <a class="text-white text-u-h font-17 px-3 font-weight-bold1" href="{{ route('all-leagues', $item->id) }}">{{ $item->name ?? 'N/A' }}</a>
                                </li>
                            @endforeach
                        @endisset
                        <li>
                            <a href="{{ route('all-blogs') }}" class="text-white text-u-h font-17 px-3 font-weight-bold1">
                                Blogs
                            </a>
                        </li>
                        
                        {{-- <li>
                            <div class="dropdown">
                                <button class="teams-btn2 text-white text-u-h font-17 px-3 font-weight-bold1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    More
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">NBA</a>
                                    <a class="dropdown-item" href="#">NFL</a>
                                    <a class="dropdown-item" href="#">Cricket</a>
                                    <a class="dropdown-item" href="#">Tennis</a>
                                    <a class="dropdown-item" href="#">MOTOGP</a>
                                    <a class="dropdown-item" href="#">Rugby</a>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-lg-none navbtndiv" style="padding-right:25px;">
                <i class="fas fa-align-justify font-24 text-white showBtn " id="showBtn"></i>
            </div>
        </div>
    </div>
</header>

<div class="teams">
    @foreach ($allleagues as $item)
        <a href="#" class="round-icon">
            <img src="{{ Storage::url(''.$item->image) }}" style="width: 45px; height: auto; object-fit: cover;" alt="Menu A">
        </a>
    @endforeach
</div>