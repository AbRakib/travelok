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
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('package.index')}}">Package List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Package Add</li>
      </ol>
    </nav>
  </div>
  
  <form class="forms-sample" action="{{ route('package.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title text-center">Package Add</h4>
                <p class="card-description text-center"> Package form layout  for add information</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}" placeholder="Title" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" value="{{old('start_date')}}" class="form-control @error('start_date') is-invalid @enderror" id="start_date" placeholder="package Birth Date" required>
                        @error('start_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" value="{{old('end_date')}}" class="form-control @error('end_date') is-invalid @enderror" id="end_date" placeholder="package Birth Date" required>
                        @error('end_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="available_seat">Available Seat</label>
                        <input type="text" name="available_seat" value="{{old('available_seat')}}" class="form-control @error('available_seat') is-invalid @enderror" id="available_seat" placeholder="package Available Seat" required>
                        @error('available_seat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_cost">Total Cost</label>
                        <input type="text" name="total_cost" value="{{old('total_cost')}}" class="form-control @error('total_cost') is-invalid @enderror" id="total_cost" placeholder="package Cost" required>
                        @error('total_cost')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" name="details" id="details" cols="10" rows="5">{{old('details')}}</textarea>
                        @error('details')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-4">
                        <label for="location" class="mb-2">Location</label>
                        <div class="col">
                            <select class="form-control" name="country_id" id="country-dropdown" required>
                                <option>Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="division_id" id="division" required>
                                <option>Select Division</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="district_id" id="district" required>
                                <option>Select District</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Package Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="images">Package Images</label>
                        <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" id="images" multiple>
                        @error('images')
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