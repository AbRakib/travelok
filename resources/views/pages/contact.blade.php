@extends('welcome')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Contact</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Booking Start -->
    @include('partials.booking')
    <!-- Booking End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact</h6>
                <h1>Contact For Any Query</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input name="name" type="text" class="form-control p-4" placeholder="Your Name" required/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input name="email" type="email" class="form-control p-4" placeholder="Your Email" required/>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input name="subject" type="text" class="form-control p-4" placeholder="Subject" required/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea name="message" class="form-control py-3 px-4" rows="5" placeholder="Message" required></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit" >Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection