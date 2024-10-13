@extends('welcome')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Packages</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{route('home')}}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Packages</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Booking Start -->
    @include('partials.booking')
    <!-- Booking End -->

    <!-- Packages Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
                <h1>Pefect Tour Packages</h1>
            </div>
            <div class="row">
                @foreach ($packages as $package)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2" style="height:440px">
                        @if ($package->image)
                            <img class="img-fluid" src="{{asset('uploads/images')}}/{{$package->image}}" alt="">
                        @endif
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                {{$package->division->name}}, {{$package->district->name}}
                                </small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 days</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{$package->available_seat}} Person</small>
                            </div>
                            <a class="h5 text-decoration-none" href="{{route('package.details', $package->slug)}}">
                                {{$package->title}}
                            </a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0">
                                        <i class="fa fa-star text-primary mr-2"></i>
                                        <a href="{{route('booking', $package->slug)}}">Enrol Now</a>
                                    </h6>
                                    <h5 class="m-0">{{$package->total_cost}} TK</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Packages End -->
@endsection