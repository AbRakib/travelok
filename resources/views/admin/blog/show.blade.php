@extends('admin.app')
@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span><i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> Overview
        </li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('blog.index')}}">Blog List</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('blog.create')}}">Blog Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid" src="{{asset('uploads/images')}}/{{$blog->image}}" alt="{{$blog->title}}">
                    <div class="mt-2 fw-bold">
                        <span class="mx-2">{{$blog->user->name}}</span>|<span class="mx-2">{{ $blog->tag }}</span>
                    </div>
                    <h2 class="my-3">{{ $blog->title }}</h2>
                    <p>{{ $blog->details }}</p>
                </div>
                <div class="col-md-4 text-center">
                    @if ($blog->user->image)
                    <img class="img-fluid w-50" src="{{asset('uploads/images')}}/{{ $blog->user->image }}" alt="{{ $blog->title }}">
                    @else
                    <img class="img-fluid w-50" src="{{asset('uploads/images/user.png')}}" alt="{{ $blog->title }}">
                    @endif
                    <div class="py-3">
                        <h3> {{$blog->user->name}} </h3>
                        <p>{{$blog->user->profession}}</p>
                        <div class="fw-bold">{{$blog->user->country->name}} | {{$blog->user->division->name}} | {{$blog->user->district->name}}</div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection