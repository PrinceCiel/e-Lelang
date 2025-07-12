@extends('layouts.kerangkafrontend')

@section('content')
<div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('home')}}">Home</a>
                </li>
                <li>
                    <a href="#0">{{$lelang->barang->kategori->nama}}</a>
                </li>a
                <li>
                    <span>{{$lelang->barang->nama}}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{ asset('sbidu/assets/images/banner/hero-bg.png') }}"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Product Details Section Starts Here =============-->
    <section class="product-details padding-bottom mt--240 mt-lg--440">
        <div class="container">
            <div class="product-details-slider-top-wrapper">
                <div class="product-details-slider owl-theme owl-carousel" id="sync1">
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product" height="400px  ">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product" height="400px  ">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product" height="400px  ">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product" height="400px  ">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product" height="400px  ">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product" height="400px  ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-slider-wrapper">
                <div class="product-bottom-slider owl-theme owl-carousel" id="sync2">
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ Storage::url($lelang->barang->foto) }}" alt="product">
                        </div>
                    </div>
                </div>
                <span class="det-prev det-nav">
                    <i class="fas fa-angle-left"></i>
                </span>
                <span class="det-next det-nav active">
                    <i class="fas fa-angle-right"></i>
                </span>
            </div>
            <div class="row mt-40-60-80">
                <div class="col-lg-8">
                    <div class="product-details-content">
                        <div class="product-details-header">
                            <h2 class="title">{{$lelang->barang->nama}}</h2>
                            <ul>
                                <li>Listing ID: 14076242</li>
                                <li>Item #: 7300-3356862</li>
                            </ul>
                        </div>
                        <ul class="price-table mb-30">
                            @if($lelang->status === 'selesai')
                            @php $bidtertinggi = $lelang->pemenang->bid + $lelang->barang->harga; @endphp
                            <li class="header">
                                <h5 class="current">BID Akhir</h5>
                                <h3 class="price">Rp{{ number_format($bidtertinggi, 0, ',', '.') }}</h3>
                            </li>
                            @else
                            <li class="header">
                                <h5 class="current">Current Price</h5>
                                <h3 class="price">Rp{{ number_format($hargaTerbaru, 0, ',', '.') }}</h3>
                            </li>
                            @endif
                            <li>
                                <span class="details">Buyer's Premium</span>
                                <h5 class="info">10.00%</h5>
                            </li>
                            <li>
                                <span class="details">Bid Increment (US)</span>
                                <h5 class="info">$50.00</h5>
                            </li>
                        </ul>
                        @if($lelang->status === 'dibuka')
                        <div class="product-bid-area">
                            <form class="product-bid-form" action="{{ route('lelang.store') }}" method="post">
                                @csrf
                                <div class="search-icon">
                                    <img src="{{ asset('sbidu/assets/images/product/search-icon.png') }}" alt="product">
                                </div>
                                <input type="hidden" name="kode_lelang" value="{{$lelang->kode_lelang}}">
                                <input type="integer" placeholder="Masukkan Kenaikan bid" name="bid">
                                <button type="submit" class="custom-button">Submit a bid</button>
                            </form>
                        </div>
                        @endif
                        <div class="buy-now-area">
                            @if($lelang->status === 'dibuka')
                            <a href="{{ route('struk.show', $lelang->kode_lelang)}}" class="custom-button" data-confirm-delete="true">Buy Now: @php $BeliLangsung = $hargaTerbaru * 10; @endphp Rp.{{$BeliLangsung}}</a>
                            @endif
                            <a href="#0" class="rating custom-button active border"><i class="fas fa-star"></i> Add to Wishlist</a>
                            <div class="share-area">
                                <span>Share to:</span>
                                <ul>
                                    <li>
                                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-sidebar-area">
                        <div class="product-single-sidebar mb-3">
                            <h6 class="title">This Auction Ends in:</h6>
                            <div class="countdown">
                                <div id="bid_counter1"></div>
                            </div>
                            <div class="side-counter-area">
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('sbidu/assets/images/product/icon1.png') }}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">61</span></h3>
                                        <p>Active Bidders</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('sbidu/assets/images/product/icon2.png') }}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">203</span></h3>
                                        <p>Watching</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{ asset('sbidu/assets/images/product/icon3.png') }}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">82</span></h3>
                                        <p>Total Bids</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#0" class="cart-link">View Shipping, Payment & Auction Policies</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-menu-area mb-40-60 mt-70-100">
            <div class="container">
                <ul class="product-tab-menu nav nav-tabs">
                    <li>
                        <a href="#details" class="active" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('sbidu/assets/images/product/tab1.png') }}" alt="product">
                            </div>
                            <div class="content">Description</div>
                        </a>
                    </li>
                    <li>
                        <a href="#history" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{ asset('sbidu/assets/images/product/tab3.png') }}" alt="product">
                            </div>
                            <div class="content">Bid History ({{$countBid}})</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="details">
                    <div class="tab-details-content">
                        <div class="header-area">
                            <h3 class="title">{{$lelang->barang->nama}}</h3>
                            <div class="item">
                                <table class="product-info-table">
                                    <tbody>
                                        <tr>
                                            <th>Kondisi</th>
                                            <td>{{ $lelang->barang->kondisi }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Barang</th>
                                            <td>{{ $lelang->barang->jenis_barang }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="item">
                                <h5 class="subtitle">Deskripsi Barang</h5>
                                <p>{{$lelang->barang->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="history">
                    <div class="history-wrapper">
                        <div class="item">
                            <h5 class="title">Histori Bid</h5>
                            <div class="history-table-area">
                                <table class="history-table">
                                    <thead>
                                        <tr>
                                            <th>Bidder</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>Bid Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bid as $item)
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{ asset('sbidu/assets/images/history/01.png') }}" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        {{$item->users->nama_lengkap}}
                                                    </div>
                                                </div>
                                            </td>
                                            @php $bid = $item->bid + $lelang->barang->harga; @endphp
                                            <td data-history="date">{{ $item->created_at->format('Y-m-d') }}</td>
                                            <td data-history="time">{{ $item->created_at->format('h:i A') }}</td>
                                            <td data-history="unit price">Rp{{ number_format($bid, 0, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')

@endsection