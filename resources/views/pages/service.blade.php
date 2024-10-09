@extends('layouts.app')
@section('pageTitle')Service @endsection
@section('breadcrumb_text_heading')
    Service
@endsection
@section('breadcrumb_text_label')
    <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
@endsection
@section('content')
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user-tie text-warning mb-4"></i>
                            <h5>Master Chefs</h5>
                            <p>Chef: Heap ChhengHeang<br>
                               Knives: Servant</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-utensils text-warning mb-4"></i>
                            <h5>Quality Food</h5>
                            <p>Food quality involves using fresh ingredients.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cart-plus text-warning mb-4"></i>
                            <h5>Online Order</h5>
                            <p>Get 10% off all first time online orders.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-headset text-warning mb-4"></i>
                            <h5>24/7 Service</h5>
                            <p>All included with online and physical reservation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    @include('includes.page_testimonial')
    @include('includes.page_footer')
@endsection
