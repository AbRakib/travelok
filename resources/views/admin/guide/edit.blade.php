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
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('guide.index')}}">Guide List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Guide Add</li>
      </ol>
    </nav>
  </div>
  
  <form class="forms-sample" action="{{ route('guide.update', $user->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title text-center">Guide Add</h4>
                <p class="card-description text-center"> Guide form layout  for add information</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name', $user->name)}}" placeholder="Name" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father Name</label>
                        <input type="text" name="father_name" value="{{old('father_name', $user->father_name)}}" class="form-control @error('father_name') is-invalid @enderror" id="father_name" placeholder="Father Name" required>
                        @error('father_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{old('email', $user->email)}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Guide Email" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" value="{{old('phone', $user->phone)}}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Guide Phone" required>
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Birth Date</label>
                        <input type="date" name="birth_date" value="{{old('birth_date', $user->birth_date)}}" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" placeholder="Guide Birth Date" required>
                        @error('birth_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nid">NID Number</label>
                        <input type="text" name="nid" value="{{old('nid', $user->nid)}}" class="form-control @error('nid') is-invalid @enderror" id="nid" placeholder="Guide NID" required>
                        @error('nid')
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
                        <label for="profession">Profession</label>
                        <input type="text" name="profession" value="{{old('profession', $user->profession)}}" class="form-control @error('profession') is-invalid @enderror" id="profession" placeholder="Profession" required>
                        @error('profession')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-4">
                        <label for="present_address" class="mb-2">Present Address</label>
                        <div class="col">
                            <select class="form-control @error('country_id') is-invalid @enderror" name="country_id" id="country-dropdown" required>
                                <option>Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}" @if ($country->id == $user->country->id) selected @endif >{{$country->name}}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <select class="form-control @error('division_id') is-invalid @enderror" name="division_id" id="division" required>
                                <option>Select Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{$division->id}}" @if ($division->id == $user->division->id) selected @endif>{{$division->name}}</option>
                                @endforeach
                            </select>
                            @error('division_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <select class="form-control @error('district_id') is-invalid @enderror" name="district_id" id="district" required>
                                <option>Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{$district->id}}" @if ($district->id == $user->district->id) selected @endif>{{$district->name}}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="marital_status">Marital Status</label>
                        <div>
                            <input class="mx-2" type="radio" name="marital_status" value="1" @if($user->marital_status == 1) checked @endif> Married
                            <input class="mx-2" type="radio" name="marital_status" value="0" @if($user->marital_status == 0) checked @endif> Unmarried
                        </div>
                        @error('marital_status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="visited_places">Visited Places</label>
                        <input type="text" name="visited_places" value="{{old('visited_places', $user->visited_places)}}" class="form-control @error('visited_places') is-invalid @enderror" id="visited_places" placeholder="Visited Places" required>
                        @error('visited_places')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Guide Image</label>
                        <input type="file" name="image" accept="png" class="form-control @error('image') is-invalid @enderror" id="image">
                        <span class="small text-muted">Note: Only png file accept</span>
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