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
        <li class="breadcrumb-item active" aria-current="page">destination List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('destination.create')}}">destination Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">destination List</h4>
            <p class="card-description text-center"> Total<code>({{$destinations->count()}})</code>
            </p>
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Image </th>
                  <th> Title </th>
                  <th> Subtitle </th>
                  <th> Location </th>
                  <th> Description </th>
                </tr>
              </thead>
              <tbody>
                @if ($destinations->count() > 0)
                  @foreach ($destinations as $destination)
                    <tr class="table-info">
                      <td> {{$destination->id}} </td>
                      <td> <img src="{{ asset('/uploads/images/') }}/{{ $destination->image }}" alt="{{$destination->image}}"> </td>
                      <td> 
                        {{$destination->title}}
                        <div class="mt-2">
                          <a class="text-primary text-decoration-none h4" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$destination->id}}" href="">
                            <i class="mdi mdi-eye"></i>
                          </a>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal_{{$destination->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Destination Details</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="card py-3">
                                    <div class="card-title text-center">
                                      <img class="img-fluid w-25 h-25 border border-1" src="{{asset('uploads/images')}}/{{$destination->image}}" alt="{{$destination->title}}">
                                      <div class="h4">{{$destination->title}}</div>
                                    </div>
                                    <div class="card-body text-center">
                                      <div><b>Subtitle:</b> {{$destination->subtitle}}</div>
                                      <div><b>Location:</b> {{$destination->country->name}},{{$destination->division->name}},{{$destination->district->name}}</div>
                                      <div><b>Description:</b> {{$destination->description}}</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <a class="text-secondary text-decoration-none h4" href="{{route('destination.edit', $destination->slug)}}">
                            <i class="mdi mdi-tooltip-edit"></i>
                          </a>
                          <a class="text-danger text-decoration-none h4" onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('destination.delete', $destination->slug) }}">
                            <i class="mdi mdi-delete"></i>
                          </a>
                        </div>
                      </td>
                      <td> {{$destination->subtitle}} </td>
                      <td> {{$destination->country->name}} {{$destination->division->name}}, {{$destination->district->name}} </td>
                      <td> {{ Str::substr($destination->description, 0, 250) }}... </td>
                    </tr>
                  @endforeach
                @else
                  <tr class="table-info text-center">
                    <td colspan="6">No Data Avilable</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection