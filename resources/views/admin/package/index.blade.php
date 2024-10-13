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
        <li class="breadcrumb-item active" aria-current="page">package List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('package.create')}}">package Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">package List</h4>
            <p class="card-description text-center"> Total<code>({{$packages->count()}})</code>
            </p>
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Image </th>
                  <th> Title </th>
                  <th> Added By </th>
                  <th> Location </th>
                  <th> Start Date </th>
                  <th> End Date </th>
                  <th> Available Seat </th>
                  <th> Total Cost </th>
                </tr>
              </thead>
              <tbody>
                @if ($packages->count() > 0)
                  @foreach ($packages as $package)
                    <tr class="table-info">
                      <td> {{$package->id}} </td>
                      <td> <img src="{{ asset('/uploads/images/') }}/{{ $package->image }}" alt="{{$package->image}}"> </td>
                      <td> 
                        {{$package->title}}
                        <div class="mt-2">
                          <a class="text-primary text-decoration-none h4" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$package->id}}" href="">
                            <i class="mdi mdi-eye"></i>
                          </a>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal_{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Gude Details</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="card py-3">
                                    <div class="card-title text-center">
                                      <img class="img-fluid w-25 h-25 border border-1" src="{{asset('uploads/images')}}/{{$package->image}}" alt="{{$package->name}}">
                                      <div class="h4">{{$package->name}}</div>
                                    </div>
                                    <div class="card-body text-center">
                                      <table class="table table-bordered">
                                        <tr>
                                          <td>Title</td>
                                          <td>{{ $package->title }}</td>
                                        </tr>
                                        <tr>
                                          <td>Package Details</td>
                                          <td>{{ nl2br($package->details) }}</td>
                                        </tr>
                                        <tr>
                                          <td>Added By</td>
                                          <td>{{ $package->user->name }}</td>
                                        </tr>
                                        <tr>
                                          <td>Location</td>
                                          <td>{{ $package->country->name }}, 
                                            {{ $package->division->name }}, 
                                            {{ $package->district->name }}
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>Start Date</td>
                                          <td>{{ $package->title }}</td>
                                        </tr>
                                        <tr>
                                          <td>End Date</td>
                                          <td>{{ $package->title }}</td>
                                        </tr>
                                        <tr>
                                          <td>Available Seat</td>
                                          <td>{{ $package->title }}</td>
                                        </tr>
                                        <tr>
                                          <td>Total Cost</td>
                                          <td>{{ $package->title }}</td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <a class="text-secondary text-decoration-none h4" href="{{route('package.edit', $package->slug)}}">
                            <i class="mdi mdi-tooltip-edit"></i>
                          </a>
                          <a class="text-danger text-decoration-none h4" onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('package.delete', $package->slug) }}">
                            <i class="mdi mdi-delete"></i>
                          </a>
                        </div>
                      </td>
                      <td> {{$package->user->name}} </td>
                      <td> 
                        {{ $package->country->name }} <br>
                        {{ $package->division->name }} <br>
                        {{ $package->district->name }} <br>
                      </td>
                      <td> {{$package->start_date}} </td>
                      <td> {{$package->end_date}} </td>
                      <td> {{$package->available_seat}} </td>
                      <td> {{$package->total_cost}} </td>
                    </tr>
                  @endforeach
                @else
                  <tr class="table-info text-center">
                    <td colspan="9">No Data Avilable</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection