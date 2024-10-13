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
        
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.index')}}">Service List</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.active')}}">Service Active List</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.pending')}}">Service Pending List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Service Show</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.create')}}">Service Add</a></li>
      </ol>
    </nav>
</div>
  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img class="img-fluid w-25" src="{{asset('uploads/images')}}/{{$service->icon}}" alt="{{$service->icon}}" title="({{$service->name}}) Icon">
            </div>
            <h4 class="card-title text-center" title="({{$service->name}}) Title">{{ $service->name }}</h4>
            <p class="card-description text-center" title="({{$service->name}}) Details">{{ $service->details }}</p>
        </div>
      </div>
    </div>
  </div>
@endsection