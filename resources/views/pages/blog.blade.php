@extends('welcome')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Blog</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{route('home')}}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Blog</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Blog</h6>
                <h1>Latest From Our Blog</h1>
            </div>
            <div class="row pb-3">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ asset('uploads/images') }}/{{$blog->image}}" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1"> {{$blog->created_at->format('d')}} </h6>
                                    <small class="text-white text-uppercase">{{$blog->created_at->format('M')}}</small>
                                </div>
                            </div>
                            <div class="bg-white p-4" style="height:120px">
                                <div class="d-flex mb-2">
                                    <a class="text-primary text-uppercase text-decoration-none" href="">
                                        {{$blog->user->name}}
                                    </a>
                                    <span class="text-primary px-2">|</span>
                                    <a class="text-primary text-uppercase text-decoration-none" href="">
                                        {{$blog->tag}}
                                    </a>
                                </div>
                                <a class="h5 m-0 text-decoration-none" href="{{route('blog.details', $blog->slug)}}">
                                    {{$blog->title}}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection