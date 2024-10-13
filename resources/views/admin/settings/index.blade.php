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
      </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Site Settings</h4>
            <form class="form-sample" method="POST" action="{{route('setting.update', $setting->id)}}" enctype="multipart/form-data">
                @csrf
              <p class="card-description"> All setting your website </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="title" class="form-control" value="{{$setting->title}}" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sub Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="sub_title" class="form-control" value="{{$setting->sub_title}}" required/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                      <input type="text" name="phone" class="form-control" value="{{$setting->phone}}" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email Address</label>
                    <div class="col-sm-9">
                      <input type="text" name="email" class="form-control" value="{{$setting->email}}" required/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Facebook Url</label>
                    <div class="col-sm-9">
                      <input type="text" name="facebook" class="form-control" value="{{$setting->facebook}}" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Twitter Url</label>
                    <div class="col-sm-9">
                      <input type="text" name="twitter" class="form-control" value="{{$setting->twitter}}" required/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Youtube Url</label>
                    <div class="col-sm-9">
                      <input type="text" name="youtube" class="form-control" value="{{$setting->youtube}}" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Instagram Url</label>
                    <div class="col-sm-9">
                      <input type="text" name="instagram" class="form-control" value="{{$setting->instagram}}" required/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Linkedin Url</label>
                    <div class="col-sm-9">
                      <input type="text" name="linkedin" class="form-control" value="{{$setting->linkedin}}" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Site Developer By</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="developer" value="{{$setting->developer}}" required/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <textarea name="address" id="address" cols="10" rows="5" class="form-control" required>{{ $setting->address }}</textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Logo</label>
                    <div class="col-sm-9">
                      <input type="file" name="logo" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Icon</label>
                    <div class="col-sm-9">
                      <input type="file" name="icon" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>

              <div class="text-end">
                <button type="submit" class="btn btn-success">Update</button>
              </div>

            </form>
          </div>
        </div>
    </div>
</div>
@endsection