<div class="container-fluid py-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{ asset('/uploads/images/about.jpg') }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pt-5 pb-lg-5">
                <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                    <h1 class="mb-3">{{ $about->title ?? '' }}</h1>
                    <p> {{ $about->details ?? '' }} </p>
                    <div class="row mb-4">
                        <div class="col-6">
                            <img class="img-fluid" src="{{ asset('assets/img/about-1.jpg') }}" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="{{ asset('assets/img/about-2.jpg') }}" alt="">
                        </div>
                    </div>
                    <a href="#packages" class="btn btn-primary mt-1">Top Packages</a>
                </div>
            </div>
        </div>
    </div>
</div>