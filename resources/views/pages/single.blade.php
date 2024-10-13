@extends('welcome')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Blog Detail</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Blog Detail</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Booking Start -->
    @include('partials.booking')
    <!-- Booking End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{asset('uploads/images')}}/{{$blog->image}}" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1">
                                        {{$blog->created_at->format('d')}}
                                    </h6>
                                    <small class="text-white text-uppercase">
                                        {{$blog->created_at->format('M')}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none" href="">
                                    {{$blog->user->name}}
                                </a>
                                <span class="text-primary px-2">|</span>
                                <a class="text-primary text-uppercase text-decoration-none" href="">
                                    {{$blog->tag}}
                                </a>
                            </div>
                            <h2 class="mb-3">
                                {{$blog->title}}
                            </h2>
                            <p>
                                {{$blog->details}}
                            </p>
                        </div>
                    </div>
                    <!-- Blog Detail End -->
    
                    <!-- Comment List Start -->
                    {{-- <div class="bg-white" style="padding: 30px; margin-bottom: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">3 Comments</h4>
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                    Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                    consetetur at sit.</p>
                                <button class="btn btn-sm btn-outline-primary">Reply</button>
                            </div>
                        </div>
                        <div class="media">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                    Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                    consetetur at sit.</p>
                                <button class="btn btn-sm btn-outline-primary">Reply</button>
                                <div class="media mt-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                        style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                            labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                            eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet
                                            ipsum diam tempor consetetur at sit.</p>
                                        <button class="btn btn-sm btn-outline-primary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Comment List End -->
    
                    <!-- Comment Form Start -->
                    {{-- <div class="bg-white mb-3" style="padding: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Leave a comment</h4>
                        <form>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>
    
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave a comment"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div> --}}
                    <!-- Comment Form End -->
                </div>
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                        @if ($blog->user->image)
                            <img src="{{asset('uploads/images')}}/{{$blog->user->image}}" class="img-fluid mx-auto mb-3" style="width: 100px;">
                        @else
                            <img src="{{asset('uploads/images/user.png')}}" class="img-fluid mx-auto mb-3" style="width: 100px;">
                        @endif
                        <h3 class="text-primary mb-3">
                            {{$blog->user->name}}
                        </h3>
                        <p class="fw-bold">
                            {{$blog->user->country->name}} | {{$blog->user->division->name}} | {{$blog->user->district->name}}
                        </p>
                    </div>
    
                    <!-- Recent Post -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h4>
                        @foreach ($blogs as $blog)
                            <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="{{route('blog.details', $blog->slug)}}">
                                <img class="img-fluid w-25" src="{{asset('uploads/images')}}/{{$blog->image}}" alt="">
                                <div class="pl-3">
                                    <h6 class="m-1">
                                        {{$blog->title}}
                                    </h6>
                                    <small> {{$blog->created_at->format('d M Y')}} </small>
                                </div>
                            </a>
                        @endforeach                        
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection