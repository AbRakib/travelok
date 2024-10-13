@php
    $countries = App\Models\Country::all();
@endphp
@extends('welcome')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Login Member</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{route('home')}}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Member Login</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-fluid">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="card w-100 mt-5">
                    <div class="card-body">
                        <p class="card-text">
                            <form class="forms-sample" action="{{ route('member.check') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                            <h4 class="card-title text-center">Member Login</h4>
                                            <p class="card-description text-center"> Login form layout for add information</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 grid-margin stretch-card mt-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required>
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                                    <small class="mt-2 d-block text-muted"><input type="checkbox" onclick="showPassword()"> Show Password</small>
                                                    @error('password')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                        <button type="reset" class="btn btn-secondary">Clear</button>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    If you want to register <a href="{{route('register.member')}}">Click For Registration </a>Free.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </form>
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
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
    </script>
@endpush