<div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
    <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="" class="navbar-brand">
                <h1 class="text-primary"><span class="text-white">TRAVE</span>LOK</h1>
            </a>
            <p class="text-capitalize">{{ $setting->sub_title }}</p>
            <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
            <div class="d-flex justify-content-start">
                <a target="_blank" class="btn btn-outline-primary btn-square mr-2" href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a>
                <a target="_blank" class="btn btn-outline-primary btn-square mr-2" href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a target="_blank" class="btn btn-outline-primary btn-square mr-2" href="{{$setting->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                <a target="_blank" class="btn btn-outline-primary btn-square" href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-white-50 mb-2" href="{{route('about')}}"><i class="fa fa-angle-right mr-2"></i>About</a>
                <a class="text-white-50 mb-2" href="javascript:void(0)"><i class="fa fa-angle-right mr-2"></i>Destination</a>
                <a class="text-white-50 mb-2" href="{{route('services')}}"><i class="fa fa-angle-right mr-2"></i>Services</a>
                <a class="text-white-50 mb-2" href="{{route('packages')}}"><i class="fa fa-angle-right mr-2"></i>Packages</a>
                <a class="text-white-50 mb-2" href="javascript:void(0)"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                <a class="text-white-50" href="{{route('blogs')}}"><i class="fa fa-angle-right mr-2"></i>Blog</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Usefull Links</h5>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-white-50 mb-2" href="javascript:void(0)"><i class="fa fa-angle-right mr-2"></i>About</a>
                <a class="text-white-50 mb-2" href="javascript:void(0)"><i class="fa fa-angle-right mr-2"></i>Destination</a>
                <a class="text-white-50 mb-2" href="javascript:void(0)"><i class="fa fa-angle-right mr-2"></i>Services</a>
                <a class="text-white-50 mb-2" href="javascript:void(0)"><i class="fa fa-angle-right mr-2"></i>Packages</a>
                <a class="text-white-50 mb-2" href="javascript:void(0)"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                <a class="text-white-50 mb-2" href="javascript:void(0)"><i class="fa fa-angle-right mr-2"></i>Testimonial</a>
                <a class="text-white-50" href="javascript:void(0javascript:void(0)"><i class="fa fa-angle-right mr-2"></i>Blog</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
            <p><i class="fa fa-map-marker-alt mr-2"></i>{{ $setting->address }}</p>
            <p><i class="fa fa-phone-alt mr-2"></i>{{ $setting->phone }}</p>
            <p><i class="fa fa-envelope mr-2"></i>{{ $setting->email }}</p>
            <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Newsletter</h6>
            <div class="w-100">
                <div class="input-group">
                    <input type="text" name="email" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary px-3">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="row">
        <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
            <p class="m-0 text-white-50">Copyright &copy; <a href="{{route('home')}}">{{ date('Y') }}</a>. All Rights Reserved.</a>
            </p>
        </div>
        <div class="col-lg-6 text-center text-md-right">
            <p class="m-0 text-white-50">Developed by <a target="_blank" href="{{$setting->developer}}">Nirvik Technology</a>
            </p>
        </div>
    </div>
</div>