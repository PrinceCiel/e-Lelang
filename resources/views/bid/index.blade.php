@extends('layouts.kerangkabackend')
@section('content')
<div class="content-wrapper">
            <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @foreach($lelang as $item)
            <div class="col-md-6 col-lg-4 order-2 mb-6">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">{{ $item->barang->nama }}</h5>
                    </div>
                    <div class="card-body pt-4">
                        <ul class="p-0 m-0">
                            @foreach($item->bid as $bid)
                            <li class="d-flex align-items-center mb-6">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{asset ('assets/img/icons/unicons/wallet.png') }}" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="d-block">Wallet</small>
                                        <h6 class="fw-normal mb-0">Mac'D</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-2">
                                        <h6 class="fw-normal mb-0">{{ $bid->bid }}</h6>
                                        <span class="text-body-secondary">IDR</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection