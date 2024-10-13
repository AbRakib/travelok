@extends('welcome')
@section('content')
    <!-- Carousel Start -->
    @include('partials.carousel')
    <!-- Carousel End -->

    <!-- Booking Start -->
    @include('partials.booking')
    <!-- Booking End -->

    <!-- About Start -->
    @include('partials.about')
    <!-- About End -->

    <!-- Destination Start -->
    @include('partials.destination')
    <!-- Destination Start -->

    <!-- Service Start -->
    @include('partials.service')
    <!-- Service End -->

    <!-- Packages Start -->
    @include('partials.packages')
    <!-- Packages End -->

    <!-- Registration Start -->
    @include('partials.registration')
    <!-- Registration End -->

    <!-- Team Start -->
    @include('partials.team')
    <!-- Team End -->

    <!-- Blog Start -->
    @include('partials.blog')
    <!-- Blog End -->
@endsection