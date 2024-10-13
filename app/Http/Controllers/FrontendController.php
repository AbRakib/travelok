<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Destination;
use App\Models\District;
use App\Models\Division;
use App\Models\Package;
use App\Models\Service;
use App\Models\TourRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FrontendController extends Controller {
    // home page
    public function index() {
        $guides       = User::where('is_admin', 2)->take(4)->get();
        $about        = About::where('id', 1)->take(1)->first();
        $services     = Service::orderBy('created_at', 'DESC')->take(3)->get();
        $destinations = Destination::take(6)->get();
        $packages     = Package::take(6)->get();
        $blogs        = Blog::orderBy('created_at', 'DESC')->take(3)->get();
        return view('home', compact('guides', 'destinations', 'about', 'services', 'blogs', 'packages'));
    }

    // login
    public function memberLogin() {
        return view('pages.login');
    }

    // about page
    public function about() {
        $about = About::orderBy('created_at', 'desc')->first();
        return view('pages.about', compact('about'));
    }

    // services page
    public function services() {
        $services = Service::orderBy('created_at', 'desc')->get();
        return view('pages.service', compact('services'));
    }

    // packages page
    public function packages() {
        $packages = Package::orderBy('created_at', 'desc')->get();
        return view('pages.package', compact('packages'));
    }

    // package details
    public function package_details(Request $request) {
        $slug     = $request->slug;
        $package  = Package::where('slug', $slug)->first();
        $packages = Package::where('slug', '!=', $slug)->orderBy('created_at', 'DESC')->get();
        return view('pages.package-view', compact('package', 'packages'));
    }

    //contact page
    public function contact() {
        return view('pages.contact');
    }

    // blog page
    public function blogs() {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        return view('pages.blog', compact('blogs'));
    }

    // blog details
    public function blog_details(Request $request) {
        $blog  = Blog::where('slug', $request->slug)->first();
        $blogs = Blog::whereNotIn('slug', [$request->slug])->get();
        return view('pages.single', compact('blog', 'blogs'));
    }

    // destination
    public function destination() {
        $destinations = Destination::orderBy('created_at', 'DESC')->get();
        return view('pages.destination', compact('destinations'));
    }

    // destination
    public function destination_details(Request $request) {
        $destination = Destination::where('slug', $request->slug)->orderBy('created_at', 'DESC')->first();
        $blogs       = Blog::all();
        return view('pages.destination-details', compact('destination', 'blogs'));
    }

    // guide
    public function guide() {
        $guides = User::where('is_admin', 2)->get();
        return view('pages.guide', compact('guides'));
    }

    // testimonial
    public function testimonial() {
        return view('pages.testimonial');
    }

    //check login
    public function memberCheck(Request $request) {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            if (Auth::user()) {
                toastr()->addSuccess('You Logged In Successfully Done.');
                return redirect()->route('packages');
            }
        } else {
            toastr()
                ->escapeHtml(false)
                ->addError('<strong>We’re sorry</strong>, but an error occurred.');
            return redirect()->back();
        }
    }

    public function booking(Request $request) {
        $slug        = $request->slug;
        $package     = Package::where('slug', $slug)->first();
        $user_id     = Auth::user()->id;
        $tourRequest = TourRequest::where('user_id', $user_id)->where('package_id', $package->id)->first();
        if ($tourRequest) {
            toastr()->addWarning('Your have already requested');
            return redirect()->back();
        } else {
            TourRequest::create([
                'user_id'    => $user_id,
                'package_id' => $package->id,
            ]);
        }

        toastr()->addSuccess('Your Booking Successfully Done');
        return redirect()->back();
    }

    //logout member
    public function memberLogout(Request $request) {
        $user = User::findOrFail(Auth::user()->id);
        if ($user) {
            Auth::logout();
        }
        toastr()->addSuccess('Logout Successfully Done');
        return redirect()->route('home');
    }

    // contact store
    public function store(Request $request) {
        $contact          = new Contact();
        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        toastr()->addSuccess('Your Message Accepted');
        return redirect()->back();
    }

    //member store
    public function memberCreate() {
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        return view('pages.register', compact('countries', 'divisions', 'districts'));
    }

    //member store
    public function memberStore(Request $request) {
        $validateData = $request->validate([
            'name'           => ['required'],
            'father_name'    => ['required'],
            'email'          => ['required', 'unique:users'],
            'password'       => ['required', 'min:6'],
            'phone'          => ['required'],
            'birth_date'     => ['required'],
            'nid'            => ['required', 'min:10'],
            'profession'     => ['required'],
            'country_id'     => ['required'],
            'division_id'    => ['required'],
            'district_id'    => ['required'],
            'marital_status' => ['required'],
            'visited_places' => ['required'],
            'image'          => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:2024'],
        ]);

        try {
            $user                 = new User();
            $user->name           = $request->name;
            $user->slug           = Str::slug($request->name);
            $user->father_name    = $request->father_name;
            $user->email          = $request->email;
            $user->password       = Hash::make($request->password);
            $user->phone          = $request->phone;
            $user->birth_date     = $request->birth_date;
            $user->nid            = $request->nid;
            $user->profession     = $request->profession;
            $user->country_id     = $request->country_id;
            $user->division_id    = $request->division_id;
            $user->district_id    = $request->district_id;
            $user->marital_status = $request->marital_status;
            $user->visited_places = $request->visited_places;
            $user->is_admin       = 0;

            $image     = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path      = public_path('/uploads/images');
            $image->move($path, $imageName);

            $user->image = $imageName;
            $user->save();

            toastr()->addSaved("Registration Successful");
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->addSaved($th);
            return redirect()->route('login.member');
        }
    }
}
