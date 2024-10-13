@extends('welcome')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Destination Detail</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{route('home')}}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Destination Detail</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Booking Start -->
    @include('partials.booking')
    <!-- Booking End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{asset('assets/img/blog-1.jpg')}}" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1">{{$destination->created_at->format('d')}}</h6>
                                    <small class="text-white text-uppercase">{{$destination->created_at->format('M')}}</small>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none" href="">{{$destination->subtitle}}</a>
                            </div>
                            <h2 class="mb-3">{{$destination->title}}</h2>
                            <p>{{$destination->description}}</p>
                        </div>
                    </div>
                    <!-- Blog Detail End -->
                </div>
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                        <h3 class="text-primary mb-3">Hey You Want To Join Us</h3>
                        <p>
                            <a class="btn btn-success" href="{{route('register.member')}}">Register Now</a>
                        </p>
                    </div>
                    
                    <!-- Recent Post -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h4>
                        @foreach ($blogs as $blog)
                            <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="{{route('blog.details', $blog->slug)}}">
                                <img class="img-fluid w-25" src="{{asset('uploads/images')}}/{{$blog->image}}" alt="">
                                <div class="pl-3">
                                    <h6 class="m-1">
                                        {{$blog->title}}
                                    </h6>
                                    <small>
                                        {{$blog->created_at->format('d M y')}}
                                    </small>
                                </div>
                            </a>
                        @endforeach
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection