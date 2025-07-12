@extends('layouts.kerangkafrontend')
@section('content')

    <!--============= Banner Section Starts Here =============-->
    <section class="banner-section bg_img" data-background="{{ asset('sbidu/assets/images/banner/banner-bg-1.png') }}">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner-content cl-white">
                        <h5 class="cate" data-aos="fade-down" data-aos-duration="1000">Next Generation Auction</h5>
                        <h1 class="title" data-aos="zoom-out-up" data-aos-duration="1200"><span class="d-xl-block">Find Your</span> Next Deal!</h1>
                        <p class="pras" data-aos="zoom-out-down" data-aos-duration="1300">
                            Online Auction is where everyone goes to shop, sell,and give, while discovering variety and affordability.
                        </p>
                        <a href="#0" class="custom-button yellow btn-large" data-aos="zoom-out-up" data-aos-duration="1500">Get Started</a>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                    <div class="banner-thumb-2">
                        <img src="{{ asset('sbidu/assets/images/banner/banner-1.png') }}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape d-none d-lg-block">
            <img src="{{ asset('sbidu/assets/css/img/banner-shape.png') }}" alt="css">
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->


    <div class="browse-section ash-bg">
        <!--============= Hightlight Slider Section Starts Here =============-->
        <div class="browse-slider-section mt--140">
            <div class="container">
                <div class="section-header-2 cl-white mb-4">
                    <div class="left" data-aos="flip-up" data-aos-duration="1500">
                        <h6 class="title pl-0 w-100">Browse the highlights</h6>
                    </div>
                    <div class="slider-nav">
                        <a href="#0" class="bro-prev"><i class="flaticon-left-arrow"></i></a>
                        <a href="#0" class="bro-next active"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
                <div class="m--15">
                    <div class="browse-slider owl-theme owl-carousel">
                        @foreach($kategori as $item)
                        <a href="{{ route('kategori.show', $item->slug) }}" class="browse-item">
                            <img src="{{ Storage::url($item->foto) }}" alt="auction">
                            <span class="info">{{ $item->nama }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--============= Hightlight Slider Section Ends Here =============-->
    </div>

    <!--============= Watches Auction Section Starts Here =============-->
    @foreach($kategori as $item)
    <section class="watches-auction-section padding-bottom padding-top">
        <div class="container">
            <div class="section-header-3" data-aos="zoom-out-down" data-aos-duration="1200">
                <div class="left">
                    <div class="thumb">
                        <img src="{{ asset('sbidu/assets/images/header-icons/coin-1.png') }}" alt="header-icons">
                    </div>
                    <div class="title-area">
                        <h2 class="title">{{$item->nama}}</h2>
                        <p>Shop for men & women designer brand watches</p>
                    </div>
                </div>
                <a href="#0" class="normal-button">View All</a>
            </div>
            <div class="row justify-content-center mb-30-none">
                @foreach($item->barang as $barang)
                    @php $lelangs = $barang->lelang()->where('status', 'dibuka')->get(); @endphp
                    @foreach($lelangs as $lelang)
                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2" data-aos="zoom-out-up" data-aos-duration="1600">
                            <div class="auction-thumb">
                                <a href="{{ route('lelang.show', $lelang->kode_lelang) }}"><img src="{{ Storage::url($barang->foto) }}" alt="watches"></a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="{{ route('lelang.show', $lelang->kode_lelang) }}">{{$barang->nama}}</a>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div id="bid_counter20"></div>
                                    </div>
                                    <span class="total-bids">30 Bids</span>
                                </div>
                                <div class="text-center">
                                    <a href="#0" class="custom-button">Submit a bid</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
@endsection