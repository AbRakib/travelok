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
        <li class="breadcrumb-item active" aria-current="page">Service Active List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.pending')}}">Service Pending List</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.create')}}">Service Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Service Active List</h4>
            <p class="card-description text-center"> Total<code>({{$services->count()}})</code>
            </p>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Icon </th>
                  <th> Service name </th>
                  <th> Service Details </th>
                  <th> Created Date </th>
                  <th> Updated Date </th>
                  <th> Status </th>
                </tr>
              </thead>
              <tbody>
                @if ($services->count() > 0)
                  @foreach ($services as $service)
                    <tr class="table-info">
                      <td> {{$service->id}} </td>
                      <td> <img src="{{ asset('/uploads/images/') }}/{{ $service->icon }}" alt="{{$service->icon}}"> </td>
                      <td> 
                        {{$service->name}}
                        <div class="mt-2">
                          <a class="text-primary text-decoration-none h4" href="{{route('service.show', $service->slug)}}">
                            <i class="mdi mdi-eye"></i>
                          </a>
                          <a class="text-secondary text-decoration-none h4" href="{{route('service.edit', $service->slug)}}">
                            <i class="mdi mdi-tooltip-edit"></i>
                          </a>
                          <a class="text-danger text-decoration-none h4" onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('service.delete', $service->id) }}">
                            <i class="mdi mdi-delete"></i>
                          </a>
                        </div>
                      </td>
                      <td> {{$service->details}} </td>
                      <td> {{$service->created_at}} </td>
                      <td> {{$service->updated_at}} </td>
                      <td> <label class="badge badge-danger">{{ ($service->status == 1)?'Active':'Pending' }}</label> </td>
                    </tr>
                  @endforeach
                @else
                  <tr class="table-info text-center">
                    <td colspan="8">No Data Avilable</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection