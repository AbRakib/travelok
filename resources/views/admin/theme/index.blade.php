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
        <li class="breadcrumb-item active" aria-current="page">Theme List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('theme.create')}}">Theme Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Theme List</h4>
            <p class="card-description text-center"> Total<code>({{$themes->count()}})</code>
            </p>
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Image </th>
                  <th> Tag </th>
                  <th> Title </th>
                  <th> Create Date </th>
                </tr>
              </thead>
              <tbody>
                @if ($themes->count() > 0)
                  @foreach ($themes as $theme)
                    <tr class="table-info">
                      <td> {{$theme->id}} </td>
                      <td> <img src="{{ asset('/uploads/images/') }}/{{ $theme->image }}" alt="{{$theme->tag}}"> </td>
                      <td> 
                        {{$theme->tag}}
                        <div class="mt-2">
                            <a class="text-secondary text-decoration-none h4" href="{{route('theme.edit', $theme->id)}}">
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="{{ route('theme.delete', $theme->id) }}" class="text-danger text-decoration-none h4" onclick="return confirm('Are you sure you want to delete this record?')">
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </div>
                      </td>
                      <td> {{$theme->title}} </td>
                      <td> {{$theme->created_at}} </td>
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