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
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('blog.index')}}">blog List</a></li>
        <li class="breadcrumb-item active" aria-current="page">blog Add</li>
      </ol>
    </nav>
  </div>
  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center">Blog Add</h4>
          <p class="card-description text-center"> Blog form layout  for add information</p>
          <form class="forms-sample" action="{{ route('blog.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label for="tag">Blog Tag</label>
                <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" id="tag" placeholder="Blog tag" value="{{old('tag')}}" required>
                @error('tag')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            <div class="form-group">
              <label for="title">Blog Title</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Blog Title" value="{{old('title')}}" required>
              @error('title')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="details">Blog Details</label>
              <textarea name="details" class="form-control @error('details') is-invalid @enderror" id="details" cols="10" rows="5" required>{{old('details')}}</textarea>
              @error('details')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="file">Image</label>
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file">
              @error('image')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            <button type="reset" class="btn btn-light">Clear</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection