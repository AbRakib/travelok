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
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="body">
                            <img class="img-fluid w-100" src="{{asset('uploads/images')}}/{{$package->image}}" alt="{{$package->title}}">
                            <div class="p-3">
                                <h4 class="">{{$package->title}}</h4>
                                <p>{{nl2br($package->details)}}</p>
                                <div>
                                    <b>Publish:</b> {{$package->created_at->format('d M Y')}},
                                    <b>Location:</b> {{ $package->division->name }}, {{ $package->district->name }}
                                    <b>Available Seat:</b> {{ $package->available_seat }}
                                </div>
                                <div>
                                    <b>Start Date:</b> {{$package->start_date}},
                                    <b>End Date:</b> {{$package->end_date}},
                                </div>
                                <div class="text-center my-3">
                                    <a class="btn btn-success" href="{{route('booking', $package->slug)}}">Enroll Your Tour</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="body">
                            <div class="d-flex flex-column text-center bg-white mb-5 pt-5 px-4">
                                @if ($package->user->image)
                                    <img src="{{asset('uploads/images')}}/{{$package->user->image}}" class="img-fluid mx-auto mb-3" style="width: 100px;">
                                @else
                                    <img src="{{asset('uploads/images/user.png')}}" class="img-fluid mx-auto mb-3" style="width: 100px;">
                                @endif
                                <h3 class="text-primary mb-3">
                                    {{$package->user->name}}
                                </h3>
                                <p class="fw-bold">
                                    {{$package->user->country->name}} | {{$package->user->division->name}} | {{$package->user->district->name}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mt-3 pt-2 px-4">
                        <div class="body">
                            <!-- Recent Packages -->
                            <div class="mb-5">
                                <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Package</h4>
                                @foreach ($packages as $package)
                                    <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="{{route('package.details', $package->slug)}}">
                                        <img class="img-fluid w-25" src="{{asset('uploads/images')}}/{{$package->image}}" alt="">
                                        <div class="pl-3">
                                            <h6 class="m-1">
                                                {{$package->title}}
                                            </h6>
                                            <small> {{$package->created_at->format('d M Y')}} </small>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Packages End -->
@endsection