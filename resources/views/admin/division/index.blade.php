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
        <li class="breadcrumb-item active" aria-current="page">division List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.active')}}">division Active List</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.pending')}}">division Pending List</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.create')}}">division Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">division List</h4>
            <p class="card-description text-center"> Total<code>({{$divisions->count()}})</code>
            </p>
            <div class="d-flex align-items-center justify-content-center my-2">
              <form action="{{route('division.store')}}" method="post">
                  @csrf
                  <div class="input-group">
                      <select class="form-control" name="country_id" id="country_id">
                        @foreach ($countries as $country)
                          <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                      </select>
                      <input type="text" name="name" class="form-control form-control-sm">
                      <button type="submit" class="btn btn-sm btn-primary">New division</button>
                  </div>
              </form>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Division Name </th>
                  <th> Districts </th>
                  <th> Created Date </th>
                  <th class="text-center"> Action </th>
                </tr>
              </thead>
              <tbody>
                @if ($divisions->count() > 0)
                  @foreach ($divisions as $division)
                    <tr class="table-info">
                      <td> {{$division->id}} </td>
                      <td> {{$division->name}} </td>
                      <td>
                        @foreach ($division->districts as $district)
                            {{ $district->name }} |
                        @endforeach
                      </td>
                      <td> {{$division->created_at}} </td>
                      <td class="text-center">
                        <a class="text-danger text-decoration-none h3" onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('division.delete', $division->slug) }}"><i class="mdi mdi-delete"></i></a>
                      </td>
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