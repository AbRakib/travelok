@extends('welcome')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Guides</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{route('home')}}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Guides</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Booking Start -->
    @include('partials.booking')
    <!-- Booking End -->

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Guides</h6>
                <h1>Our Travel Guides</h1>
            </div>
            <div class="row">
                @foreach ($guides as $guide)
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                        <div class="team-item bg-white mb-4">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('uploads/images') }}/{{$guide->image}}" alt="{{ $guide->name }}">
                                <div class="team-social">
                                    <a class="btn btn-outline-primary btn-square w-100" href="">{{ $guide->profession }}</a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h5 class="text-truncate">{{ $guide->name }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection