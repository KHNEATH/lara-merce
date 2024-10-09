@extends('layouts.app')

@section('pageTitle') About @endsection

@section('breadcrumb_text_heading')
    About
@endsection

@section('breadcrumb_text_label')
    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
@endsection

@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="/theme-restaurant-kh/img/high-end-khmer-set-menu.jpg" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="/theme-restaurant-kh/img/steam-local-crab.jpg" style="margin-top: 25%; visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="/theme-restaurant-kh/img/kravann-khmer-food-prohok.jpg" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="/theme-restaurant-kh/img/best-real-loca-lunch.jpg" style="visibility: visible; animation-delay: 0.7s; animation-name: zoomIn;">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Ly Heang Catering</h1>
                <p class="mb-4">Everything we do is from our traditional khmer food in our country and also from our family​​ reciep.</p>
                <p class="mb-4">Usually, constellations represent an animal, a person or mythological creature, or an inanimate object.</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                            <div class="ps-4">
                                <p class="mb-0">Years of</p>
                                <h6 class="text-uppercase mb-0">Experience</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                            <div class="ps-4">
                                <p class="mb-0">Popular</p>
                                <h6 class="text-uppercase mb-0">Master Chefs</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
    <!-- About End -->
    @include('includes.page_testimonial')
    @include('includes.page_footer')
@endsection