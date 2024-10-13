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
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('destination.index')}}">Destination List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Destination Add</li>
      </ol>
    </nav>
  </div>
  
  <form class="forms-sample" action="{{ route('destination.update', $destination->slug) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('POST')
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{old('title', $destination->title)}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Sub Title</label>
                        <input type="text" name="subtitle" value="{{old('subtitle', $destination->subtitle)}}" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" placeholder="Sub Title" required>
                        @error('subtitle')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-4">
                        <label for="" class="mb-2">Destination Address</label>
                        <div class="col">
                            <select class="form-control" name="country_id" id="country-dropdown" required>
                                <option>Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}" @if($destination->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="division_id" id="division" required>
                                <option>Select Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{$division->id}}" @if($destination->division_id == $division->id) selected @endif>{{ $division->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="district_id" id="district" required>
                                <option>Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{$district->id}}" @if($destination->district_id == $district->id) selected @endif>{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="10" rows="5" required>{{old('description', $destination->description)}}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-center">
                        <img class="img-fluid w-25" src="{{asset('uploads/images')}}/{{$destination->image}}" alt="{{$destination->name}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-light">Clear</button>
                </div>
            </div>
        </div>
    </div>
  </form>
@endsection

@push('script')
    <script>
        function showPassword() {
            var data = document.getElementById('password');
            if (data.type === "password") {
                data.type = "text";
            } else {
                data.type = "password";
            }
        }

        $(document).ready(function () {
            $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#division").html('');
                $.ajax({
                    url: "{{route('getDivision')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#division').html('<option value="">-- Select Division --</option>');
                        result.divisions.forEach(value => {
                            $("#division").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

            $('#division').on('change', function () {
                var division_id = this.value;
                $("#district").html('');
                $.ajax({
                    url: "{{route('getDistrict')}}",
                    type: "POST",
                    data: {
                        division_id: division_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#district').html('<option value="">-- Select District --</option>');
                        result.districts.forEach(value => {
                            $("#district").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush