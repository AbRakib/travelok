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
        <li class="breadcrumb-item active" aria-current="page">Country List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.active')}}">Country Active List</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.pending')}}">Country Pending List</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('service.create')}}">Country Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Country List</h4>
            <p class="card-description text-center"> Total<code>({{$countries->count()}})</code>
            </p>
            <div class="d-flex align-items-center justify-content-center my-2">
              <form action="{{route('country.store')}}" method="post">
                  @csrf
                  <div class="input-group">
                    <input type="text" name="name" class="form-control form-control-sm">
                    <button type="submit" class="btn btn-sm btn-primary">New Country</button>
                  </div>
              </form>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Country Name </th>
                  <th> Divitions </th>
                  <th> Created Date </th>
                  <th> Updated Date </th>
                  <th class="text-center"> Action </th>
                </tr>
              </thead>
              <tbody>
                @if ($countries->count() > 0)
                  @foreach ($countries as $country)
                    <tr class="table-info">
                      <td> {{$country->id}} </td>
                      <td>{{$country->name}}</td>
                      <td> 
                        @foreach ($country->divisions as $division)
                            {{ $division->name }} | 
                        @endforeach
                      </td>
                      <td> {{$country->created_at}} </td>
                      <td> {{$country->updated_at}} </td>
                      <td class="text-center">
                        <a class="text-secondary text-decoration-none h3" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$country->slug}}"><i class="mdi mdi-tooltip-edit"></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop{{$country->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Country Edit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="d-flex align-items-center justify-content-center my-2">
                                  <form action="{{route('country.update', $country->slug)}}" method="post">
                                      @csrf
                                      <div class="input-group">
                                        <input type="text" value="{{old('name', $country->name)}}" name="name" class="form-control form-control-sm">
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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