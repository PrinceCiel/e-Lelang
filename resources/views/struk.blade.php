@extends('layouts.kerangkafrontend')
@section('content')
<div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="./index.html">Home</a>
                </li>
                <li>
                    <a href="#0">My Account</a>
                </li>
                <li>
                    <span>Personal profile</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{ asset('sbidu/assets/images/banner/hero-bg.png') }}"></div>
    </div>
    <section class="dashboard-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="user">
                                    <div class="thumb-area">
                                        <div class="thumb">
                                            <img src="{{ asset('sbidu/assets/images/dashboard/user.png') }}" alt="user">
                                        </div>
                                        <label for="profile-pic" class="profile-pic-edit"><i class="flaticon-pencil"></i></label>
                                        <input type="file" id="profile-pic" class="d-none">
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="#0">Percy Reed</a></h5>
                                        <span class="username">john@gmail.com</span>
                                    </div>
                                </div>
                                @if($struk )
                                <div class="header">
                                    <h4 class="title">Personal Details</h4>
                                    <span class="edit"><i class="flaticon-edit"></i> Edit</span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Name</div>
                                        <div class="info-value">Albert Owens</div>
                                    </li>
                                    <li>
                                        <div class="info-name">Date of Birth</div>
                                        <div class="info-value">15-03-1974</div>
                                    </li>
                                    <li>
                                        <div class="info-name">Address</div>
                                        <div class="info-value">8198 Fieldstone Dr.La Crosse, WI 54601</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection