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
        <li class="breadcrumb-item active" aria-current="page">Service List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.active')}}">Service Active List</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Service List</h4>
            <p class="card-description text-center"> Total<code>({{$tourRequests->count()}})</code>
            </p>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Requested Package </th>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Phone </th>
                  <th> Created Date </th>
                  <th> Updated Date </th>
                </tr>
              </thead>
              <tbody>
                @if ($tourRequests->count() > 0)
                  @foreach ($tourRequests as $tourRequest)
                    <tr class="table-info">
                      <td> {{$tourRequest->id}} </td>
                      <td> {{$tourRequest->package->title}} </td>
                      <td> {{$tourRequest->user->name}} </td>
                      <td> {{$tourRequest->user->email}} </td>
                      <td> {{$tourRequest->user->phone}} </td>
                      <td> {{$tourRequest->created_at->format('d M y')}} </td>
                      <td> {{$tourRequest->updated_at->format('d M y')}} </td>
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