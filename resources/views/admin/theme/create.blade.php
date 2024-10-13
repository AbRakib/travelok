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
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('theme.index')}}">Theme List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Theme Add</li>
      </ol>
    </nav>
  </div>
  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center">Theme Add</h4>
          <p class="card-description text-center"> Theme form layout  for add information</p>
          <form class="forms-sample" action="{{ route('theme.store') }}" id="formData" enctype="multipart/form-data" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="tag">Theme Tag</label>
              <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" id="tag" placeholder="Theme Tag" value="{{old('tag')}}" required>
                @error('tag')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="title">Theme Title</label>
              <textarea name="title" class="form-control @error('title') is-invalid @enderror" id="title" cols="10" rows="5" required>{{old('title')}}</textarea>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="file">Theme Image</label>
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
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