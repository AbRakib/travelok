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
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('about.index')}}">About List</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Add</li>
      </ol>
    </nav>
  </div>
  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center">About Add</h4>
          <p class="card-description text-center"> About form layout  for add information</p>
          <form class="forms-sample" action="{{ route('about.store') }}" id="formData" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">About Title</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="About Title" value="{{old('title')}}" required>
              @error('title')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="details">About Details</label>
              <textarea name="details" class="form-control @error('details') is-invalid @enderror" id="details" cols="10" rows="5" required>{{old('details')}}</textarea>
              @error('details')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="file">About Image</label>
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file">
              <span class="small text-muted">Note: Only png file accept</span>
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