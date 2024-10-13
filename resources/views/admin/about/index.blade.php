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
        <li class="breadcrumb-item active" aria-current="page">About List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('about.create')}}">About Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">About List</h4>
            <p class="card-description text-center"> Total<code>({{$abouts->count()}})</code>
            </p>
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Image </th>
                  <th> Title </th>
                  <th> Details </th>
                  <th> Create Date </th>
                </tr>
              </thead>
              <tbody>
                @if ($abouts->count() > 0)
                  @foreach ($abouts as $about)
                    <tr class="table-info">
                      <td> {{$about->id}} </td>
                      <td> <img src="{{ asset('/uploads/images/') }}/{{ $about->image }}" alt="{{$about->image}}"> </td>
                      <td> 
                        {{$about->title}}
                        <div class="mt-2">
                          <a class="text-primary text-decoration-none h4" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$about->id}}" href="">
                            <i class="mdi mdi-eye"></i>
                          </a>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal_{{$about->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">About Us Details</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="card py-3">
                                    <div class="card-title text-center">
                                      <img class="img-fluid w-25 h-25 border border-1" src="{{asset('uploads/images')}}/{{$about->image}}" alt="{{$about->title}}">
                                    </div>
                                    <div class="card-body text-center">
                                      <div class="h4">{{ $about->title }}</div>
                                      <div>{{ $about->details }}</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                            <a class="text-secondary text-decoration-none h4" href="{{route('about.edit', $about->id)}}">
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="{{ route('about.delete', $about->id) }}" class="text-danger text-decoration-none h4" onclick="return confirm('Are you sure you want to delete this record?')">
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </div>
                      </td>
                      <td> {{$about->details}} </td>
                      <td> {{$about->created_at}} </td>
                    </tr>
                  @endforeach
                @else
                  <tr class="table-info text-center">
                    <td colspan="5">No Data Avilable</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection