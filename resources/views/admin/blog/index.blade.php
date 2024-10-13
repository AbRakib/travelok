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
        <li class="breadcrumb-item active" aria-current="page">blog List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('blog.create')}}">blog Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">blog List</h4>
            <p class="card-description text-center"> Total<code>({{$blogs->count()}})</code>
            </p>
            <table class="table table-bordered" id="example">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Image </th>
                  <th> Title </th>
                  <th> Details </th>
                  <th> Created Date </th>
                  <th> Tag </th>
                </tr>
              </thead>
              <tbody>
                @if ($blogs->count() > 0)
                  @foreach ($blogs as $blog)
                    <tr class="table-info">
                      <td> {{$blog->id}} </td>
                      <td> <img src="{{ asset('/uploads/images/') }}/{{ $blog->image }}" alt="{{$blog->title}}"> </td>
                      <td> 
                        {{$blog->title}}
                        <div class="mt-2">
                          <a class="text-primary text-decoration-none h4" href="{{route('blog.show', $blog->id)}}">
                            <i class="mdi mdi-eye"></i>
                          </a>
                          <a class="text-secondary text-decoration-none h4" href="{{route('blog.edit', $blog->id)}}">
                            <i class="mdi mdi-tooltip-edit"></i>
                          </a>
                          <a class="text-danger text-decoration-none h4" onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('blog.delete', $blog->id) }}">
                            <i class="mdi mdi-delete"></i>
                          </a>
                        </div>
                      </td>
                      <td> {{ Str::substr($blog->details, 0, 200) }}... </td>
                      <td> {{$blog->created_at}} </td>
                      <td> <span class="badge badge-gradient-info">{{$blog->tag}}</span> </td>
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