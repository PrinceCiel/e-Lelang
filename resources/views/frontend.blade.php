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
                    @foreach($barang->lelang as $lelang)
                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2" data-aos="zoom-out-up" data-aos-duration="1600">
                            <div class="auction-thumb">
                                <a href="{{ route('single.index', $barang->slug) }}"><img src="{{ Storage::url($barang->foto) }}" alt="watches"></a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="{{ route('single.index', $barang->slug) }}">{{$barang->nama}}</a>
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
    <!--============= Watches Auction Section Ends Here =============-->


    <!--============= Popular Auction Section Starts Here =============-->
    <section class="popular-auction padding-top pos-rel">
        <div class="popular-bg bg_img" data-background="{{ asset('sbidu/assets/images/auction/popular/popular-bg.png') }}"></div>
        <div class="container">
            <div class="section-header cl-white" data-aos="fade-down" data-aos-duration="1000">
                <span class="cate">Closing Within 24 Hours</span>
                <h2 class="title" data-aos="fade-down" data-aos-duration="1500">Popular Auctions</h2>
                <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p>
            </div>
            <div class="popular-auction-wrapper">
                <div class="row justify-content-center mb-30-none">
                    <div class="col-lg-6">
                        <div class="auction-item-3" data-aos="zoom-out-up" data-aos-duration="1500">
                            <div class="auction-thumb">
                                <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/popular/auction-1.jpg') }}" alt="popular"></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="./product-details.html">Apple Macbook Pro Laptop</a>
                                </h6>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">$876.00</div>
                                    </div>
                                </div>
                                <div class="bids-area">
                                    Total Bids : <span class="total-bids">130 Bids</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="auction-item-3" data-aos="zoom-out-up" data-aos-duration="900">
                            <div class="auction-thumb">
                                <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/popular/auction-2.jpg') }}" alt="popular"></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="./product-details.html">Canon EOS Rebel T6I
                                        Digital Camera</a>
                                </h6>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">$876.00</div>
                                    </div>
                                </div>
                                <div class="bids-area">
                                    Total Bids : <span class="total-bids">130 Bids</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="auction-item-3" data-aos="zoom-out-up" data-aos-duration="1000">
                            <div class="auction-thumb">
                                <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/popular/auction-3.jpg') }}" alt="popular"></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="./product-details.html">14k Gold Geneve Watch,
                                        24.5g</a>
                                </h6>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">$876.00</div>
                                    </div>
                                </div>
                                <div class="bids-area">
                                    Total Bids : <span class="total-bids">130 Bids</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="auction-item-3" data-aos="zoom-out-up" data-aos-duration="1200">
                            <div class="auction-thumb">
                                <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/popular/auction-4.jpg') }}" alt="popular"></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="./product-details.html">14K White Gold 185.60
                                        Grams 5.95 Carats</a>
                                </h6>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">$876.00</div>
                                    </div>
                                </div>
                                <div class="bids-area">
                                    Total Bids : <span class="total-bids">130 Bids</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="auction-item-3" data-aos="zoom-out-up" data-aos-duration="1300">
                            <div class="auction-thumb">
                                <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/popular/auction-5.jpg') }}" alt="popular"></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="./product-details.html">2009 Toyota Prius
                                        (Medford, NY 11763)</a>
                                </h6>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">$876.00</div>
                                    </div>
                                </div>
                                <div class="bids-area">
                                    Total Bids : <span class="total-bids">130 Bids</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="auction-item-3" data-aos="zoom-out-up" data-aos-duration="1400">
                            <div class="auction-thumb">
                                <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/popular/auction-6.jpg') }}" alt="popular"></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="./product-details.html">.6 Gram Pure Gold
                                        Nugget</a>
                                </h6>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">$876.00</div>
                                    </div>
                                </div>
                                <div class="bids-area">
                                    Total Bids : <span class="total-bids">130 Bids</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Popular Auction Section Ends Here =============-->


    <!--============= Coins and Bullion Auction Section Starts Here =============-->
    <section class="coins-and-bullion-auction-section padding-bottom padding-top pos-rel pb-max-xl-0">
        <div class="jewelry-bg d-none d-xl-block"><img src="{{ asset('sbidu/assets/images/auction/coins/coin-bg.png') }}" alt="coin"></div>
        <div class="container">
            <div class="section-header-3" data-aos="zoom-out-down" data-aos-duration="1200">
                <div class="left">
                    <div class="thumb">
                        <img src="{{ asset('sbidu/assets/images/header-icons/coin-1.png') }}" alt="header-icons">
                    </div>
                    <div class="title-area">
                        <h2 class="title">Coins & Bullion</h2>
                        <p>Discover rare, foreign, & ancient coins that are worth collecting</p>
                    </div>
                </div>
                <a href="#0" class="normal-button">View All</a>
            </div>
            <div class="row justify-content-center mb-30-none">
                <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="auction-item-2" data-aos="zoom-out-up" data-aos-duration="1900">
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/coins/auction-1.jpg') }}" alt="coins"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                        </div>
                        <div class="auction-content">
                            <h6 class="title">
                                <a href="./product-details.html">Ancient & World Coins</a>
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
                                    <div id="bid_counter17"></div>
                                </div>
                                <span class="total-bids">30 Bids</span>
                            </div>
                            <div class="text-center">
                                <a href="#0" class="custom-button">Submit a bid</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="auction-item-2" data-aos="zoom-out-up" data-aos-duration="2000">
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/coins/auction-2.jpg') }}" alt="coins"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                        </div>
                        <div class="auction-content">
                            <h6 class="title">
                                <a href="./product-details.html">2018 Hyundai Sonata</a>
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
                                    <div id="bid_counter18"></div>
                                </div>
                                <span class="total-bids">30 Bids</span>
                            </div>
                            <div class="text-center">
                                <a href="#0" class="custom-button">Submit a bid</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="auction-item-2" data-aos="zoom-out-up" data-aos-duration="2100">
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/coins/auction-3.jpg') }}" alt="coins"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                        </div>
                        <div class="auction-content">
                            <h6 class="title">
                                <a href="./product-details.html">2018 Hyundai Sonata</a>
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
                                    <div id="bid_counter19"></div>
                                </div>
                                <span class="total-bids">30 Bids</span>
                            </div>
                            <div class="text-center">
                                <a href="#0" class="custom-button">Submit a bid</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Coins and Bullion Auction Section Ends Here =============-->


    <!--============= Real Estate Section Starts Here =============-->
    <section class="real-estate-auction padding-top padding-bottom pos-rel oh">
        <div class="car-bg"><img src="{{ asset('sbidu/assets/images/auction/realstate/real-bg.png') }}" alt="realstate"></div>
        <div class="container">
            <div class="section-header-3" data-aos="zoom-out-down" data-aos-duration="1200">
                <div class="left">
                    <div class="thumb">
                        <img src="{{ asset('sbidu/assets/images/header-icons/coin-1.png') }}" alt="header-icons">
                    </div>
                    <div class="title-area">
                        <h2 class="title">Real Estate</h2>
                        <p>Find auctions for Homes, Condos, Residential & Commercial Properties.</p>
                    </div>
                </div>
                <a href="#0" class="normal-button">View All</a>
            </div>
            <div class="auction-slider-4 owl-theme owl-carousel">
                <div class="auction-item-4">
                    <div class="auction-thumb">
                        <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/realstate/auction-1.png') }}" alt="realstate"></a>
                        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                    </div>
                    <div class="auction-content">
                        <h4 class="title">
                            <a href="./product-details.html">Brand New Apartments In Esenyurt, Istanbul</a>
                        </h4>
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
                                <div id="bid_counter30"></div>
                            </div>
                            <span class="total-bids">30 Bids</span>
                        </div>
                        <div class="text-center">
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-4">
                    <div class="auction-thumb">
                        <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/realstate/auction-1.png') }}" alt="realstate"></a>
                        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                    </div>
                    <div class="auction-content">
                        <h4 class="title">
                            <a href="./product-details.html">Brand New Apartments In Esenyurt, Istanbul</a>
                        </h4>
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
                                <div id="bid_counter31"></div>
                            </div>
                            <span class="total-bids">30 Bids</span>
                        </div>
                        <div class="text-center">
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-4">
                    <div class="auction-thumb">
                        <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/realstate/auction-1.png') }}" alt="realstate"></a>
                        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                    </div>
                    <div class="auction-content">
                        <h4 class="title">
                            <a href="./product-details.html">Brand New Apartments In Esenyurt, Istanbul</a>
                        </h4>
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
                                <div id="bid_counter32"></div>
                            </div>
                            <span class="total-bids">30 Bids</span>
                        </div>
                        <div class="text-center">
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-4">
                    <div class="auction-thumb">
                        <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/realstate/auction-1.png') }}" alt="realstate"></a>
                        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                    </div>
                    <div class="auction-content">
                        <h4 class="title">
                            <a href="./product-details.html">Brand New Apartments In Esenyurt, Istanbul</a>
                        </h4>
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
                                <div id="bid_counter33"></div>
                            </div>
                            <span class="total-bids">30 Bids</span>
                        </div>
                        <div class="text-center">
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-4">
                    <div class="auction-thumb">
                        <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/realstate/auction-1.png') }}" alt="realstate"></a>
                        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                    </div>
                    <div class="auction-content">
                        <h4 class="title">
                            <a href="./product-details.html">Brand New Apartments In Esenyurt, Istanbul</a>
                        </h4>
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
                                <div id="bid_counter34"></div>
                            </div>
                            <span class="total-bids">30 Bids</span>
                        </div>
                        <div class="text-center">
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-nav real-style ml-auto">
                <a href="#0" class="real-prev"><i class="flaticon-left-arrow"></i></a>
                <div class="pagination"></div>
                <a href="#0" class="real-next active"><i class="flaticon-right-arrow"></i></a>
            </div>
        </div>
    </section>
    <!--============= Real Estate Section Starts Here =============-->


    <!--============= Art Auction Section Starts Here =============-->
    <section class="art-and-electronics-auction-section padding-top">
        <div class="container">
            <div class="row justify-content-center mb--50">
                <div class="col-xl-6 col-lg-8 mb-50">
                    <div class="section-header-2">
                        <div class="left">
                            <div class="thumb">
                                <img src="{{ asset('sbidu/assets/images/header-icons/camera-1.png') }}" alt="header-icons">
                            </div>
                            <h2 class="title">Electronics</h2>
                        </div>
                        <div class="slider-nav">
                            <a href="#0" class="electro-prev"><i class="flaticon-left-arrow"></i></a>
                            <a href="#0" class="electro-next active"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                    <div class="auction-slider-1 owl-carousel owl-theme  mb-30-none">
                        <div class="slide-item">
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/electronics/auction-1.jpg') }}" alt="electronics"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">Magnifying Glasses, Jewelry Loupe odit qui corporis</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter1"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/electronics/auction-2.jpg') }}" alt="electronics"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">Surveillance WiFi Exterieur, 1080P Camera</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter2"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/electronics/auction-3.jpg') }}" alt="electronics"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">WiFi Doorbell Camera for Apartments</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter3"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/electronics/auction-4.jpg') }}" alt="electronics"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">GPD Pocket 2 Ultrabook 7" inch</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter4"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/electronics/auction-1.jpg') }}" alt="electronics"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">Magnifying Glasses, Jewelry Loupe odit qui corporis</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter5"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/electronics/auction-2.jpg') }}" alt="electronics"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">Surveillance WiFi Exterieur, 1080P Camera</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter6"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/electronics/auction-3.jpg') }}" alt="electronics"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">WiFi Doorbell Camera for Apartments</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter7"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/electronics/auction-4.jpg') }}" alt="electronics"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">GPD Pocket 2 Ultrabook 7" inch</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter8"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 mb-50">
                    <div class="section-header-2">
                        <div class="left">
                            <div class="thumb">
                                <img src="{{ asset('sbidu/assets/images/header-icons/art-1.png') }}" alt="header-icons">
                            </div>
                            <h2 class="title">Art</h2>
                        </div>
                        <div class="slider-nav">
                            <a href="#0" class="art-prev"><i class="flaticon-left-arrow"></i></a>
                            <a href="#0" class="art-next active"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                    <div class="auction-slider-2 owl-carousel owl-theme mb-30-none">
                        <div class="slide-item">
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/art/auction-1.jpg') }}" alt="art"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">Magnifying Glasses, Jewelry Loupe odit qui corporis</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter9"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/art/auction-2.jpg') }}" alt="art"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">Surveillance WiFi Exterieur, 1080P Camera</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter10"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/art/auction-3.jpg') }}" alt="art"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">WiFi Doorbell Camera for Apartments</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter11"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/art/auction-4.jpg') }}" alt="art"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">GPD Pocket 2 Ultrabook 7" inch</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter12"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/art/auction-1.jpg') }}" alt="art"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">Magnifying Glasses, Jewelry Loupe odit qui corporis</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter13"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/art/auction-2.jpg') }}" alt="art"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">Surveillance WiFi Exterieur, 1080P Camera</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter14"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/art/auction-3.jpg') }}" alt="art"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">WiFi Doorbell Camera for Apartments</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter15"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-item-1">
                                <div class="auction-thumb">
                                    <a href="./product-details.html"><img src="{{ asset('sbidu/assets/images/auction/art/auction-4.jpg') }}" alt="art"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="./product-details.html">GPD Pocket 2 Ultrabook 7" inch</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="countdown-area">
                                        <div class="countdown">
                                            <div id="bid_counter16"></div>
                                        </div>
                                        <span class="total-bids">30 Bids</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Art Auction Section Ends Here =============-->


    <!--============= How Section Starts Here =============-->
    <section class="how-section padding-top">
        <div class="container">
            <div class="how-wrapper section-bg">
                <div class="section-header text-lg-left" data-aos="zoom-out-up" data-aos-duration="1200">
                    <h2 class="title">How it works</h2>
                    <p>Easy 3 steps to win</p>
                </div>
                <div class="row justify-content-center mb--40">
                    <div class="col-md-6 col-lg-4">
                        <div class="how-item">
                            <div class="how-thumb" data-aos="zoom-out-up" data-aos-duration="1000">
                                <img src="{{ asset('sbidu/assets/images/how/how1.png') }}" alt="how">
                            </div>
                            <div class="how-content" data-aos="zoom-out-up" data-aos-duration="1200">
                                <h4 class="title">Sign Up</h4>
                                <p>No Credit Card Required</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="how-item">
                            <div class="how-thumb" data-aos="zoom-out-up" data-aos-duration="1200">
                                <img src="{{ asset('sbidu/assets/images/how/how2.png') }}" alt="how">
                            </div>
                            <div class="how-content" data-aos="zoom-out-up" data-aos-duration="1400">
                                <h4 class="title">Bid</h4>
                                <p>Bidding is free Only pay if you win</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="how-item">
                            <div class="how-thumb" data-aos="zoom-out-up" data-aos-duration="1400">
                                <img src="{{ asset('sbidu/assets/images/how/how3.png') }}" alt="how">
                            </div>
                            <div class="how-content" data-aos="zoom-out-up" data-aos-duration="1600">
                                <h4 class="title">Win</h4>
                                <p>Fun - Excitement - Great deals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= How Section Ends Here =============-->


    <!--============= Client Section Starts Here =============-->
    <section class="client-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header" data-aos="zoom-out-down" data-aos-duration="1200">
                <h2 class="title">Don’t just take our word for it!</h2>
                <p>Our hard work is paying off. Great reviews from amazing customers.</p>
            </div>
            <div class="m--15">
                <div class="client-slider owl-theme owl-carousel">
                    <div class="client-item">
                        <div class="client-content">
                            <p>I can't stop bidding! It's a great way to spend some time and I want everything on Sbidu.</p>
                        </div>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="{{ asset('sbidu/assets/images/client/client01.png') }}" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">Alexis Moore</a></h6>
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="client-item">
                        <div class="client-content">
                            <p>I came I saw I won. Love what I have won, and will try to win something else.</p>
                        </div>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="{{ asset('sbidu/assets/images/client/client02.png') }}" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">Darin Griffin</a></h6>
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="client-item">
                        <div class="client-content">
                            <p>This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                        </div>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="{{ asset('sbidu/assets/images/client/client03.png') }}" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">Tom Powell</a></h6>
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Client Section Ends Here =============-->

@endsection