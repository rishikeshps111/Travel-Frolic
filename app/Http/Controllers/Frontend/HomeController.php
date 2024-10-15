<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Package;
use App\Models\Destination;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Duration;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {

        $latest_packages = Package::select(
            'packages.id',
            'packages.package_name',
            'packages.destination_id',
            'destination.place_name AS destination_name',
            'packages.duration_id',
            'duration.days AS days',
            'duration.nights AS nights',
            'packages.description',
            'packages.price',
            'packages.rating',
            'packages.status',

        )->leftJoin('destination', 'destination.id', 'packages.destination_id')
            ->leftJoin('duration', 'duration.id', 'packages.duration_id')
            ->with(['package_images' => function ($query) {
                $query->latest()->take(1); // Get the latest 3 images
            }])
            ->orderBy('packages.created_at', 'desc')
            ->where('packages.status', 1)
            ->take(6)
            ->get();

        $testimonials = Testimonial::where('status', 1)->get();

        $destinations = Destination::where('status', 1)->withCount('packages')->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $footer_destinations = Destination::where('status', 1)->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $images = Gallery::select('gallery.*', 'destination.place_name AS destination_name')
            ->leftjoin('destination', 'destination.id', 'gallery.destination_id')->orderBy('created_at', 'desc')
            ->take(10)->get();



        return view('1_WebFrontend.2_Pages.1_Home.home', compact('latest_packages', 'testimonials', 'destinations', 'images', 'footer_destinations'));
    }

    public function about()
    {
        $images = Gallery::select('gallery.*', 'destination.place_name AS destination_name')
            ->leftjoin('destination', 'destination.id', 'gallery.destination_id')->orderBy('created_at', 'desc')
            ->take(10)->get();

        $testimonials = Testimonial::where('status', 1)->get();

        $footer_destinations = Destination::where('status', 1)->orderBy('created_at', 'desc')
            ->take(5)
            ->get();


        return view('1_WebFrontend.2_Pages.2_About.about', compact('images', 'footer_destinations', 'testimonials'));
    }

    public function destination_list()
    {
        $images = Gallery::select('gallery.*', 'destination.place_name AS destination_name')
            ->leftjoin('destination', 'destination.id', 'gallery.destination_id')->orderBy('created_at', 'desc')
            ->take(10)->get();

        $destinations = Destination::where('status', 1)->withCount('packages')->orderBy('created_at', 'desc')
            ->get();

        $footer_destinations = Destination::where('status', 1)->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('1_WebFrontend.2_Pages.3_Destination.destination', compact('images', 'footer_destinations', 'destinations'));
    }

    public function tour_list()
    {
        $images = Gallery::select('gallery.*', 'destination.place_name AS destination_name')
            ->leftjoin('destination', 'destination.id', 'gallery.destination_id')->orderBy('created_at', 'desc')
            ->take(10)->get();

        $footer_destinations = Destination::where('status', 1)->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $durations = Duration::where('status', 1)
            ->get();

        $destinations = Destination::where('status', 1)->withCount('packages')
            ->get();

        return view('1_WebFrontend.2_Pages.4_Tour.tour', compact('images', 'footer_destinations', 'durations', 'destinations'));
    }


    public function gallery()
    {
        $images = Gallery::select('gallery.*', 'destination.place_name AS destination_name')
            ->leftjoin('destination', 'destination.id', 'gallery.destination_id')->orderBy('created_at', 'desc')
            ->take(10)->get();

        $footer_destinations = Destination::where('status', 1)->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $gallery_images = Gallery::select('gallery.*', 'destination.place_name AS destination_name', 'destination.state AS destination_state')
            ->leftjoin('destination', 'destination.id', 'gallery.destination_id')->orderBy('created_at', 'desc')
            ->get();

        return view('1_WebFrontend.2_Pages.5_Gallery.gallery', compact('images', 'footer_destinations', 'gallery_images'));
    }


    public function contact()
    {
        $images = Gallery::select('gallery.*', 'destination.place_name AS destination_name')
            ->leftjoin('destination', 'destination.id', 'gallery.destination_id')->orderBy('created_at', 'desc')
            ->take(10)->get();

        $footer_destinations = Destination::where('status', 1)->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('1_WebFrontend.2_Pages.6_Contact.contact', compact('images', 'footer_destinations'));
    }

    public function tour_detail($id)
    {

        $package_detail = Package::select(
            'packages.id',
            'packages.package_name',
            'packages.destination_id',
            'destination.place_name AS destination_name',
            'destination.state AS destination_state',
            'packages.duration_id',
            'duration.days AS days',
            'duration.nights AS nights',
            'packages.description',
            'packages.daywise_details',
            'packages.price',
            'packages.rating',
            'packages.status',

        )->leftJoin('destination', 'destination.id', 'packages.destination_id')
            ->leftJoin('duration', 'duration.id', 'packages.duration_id')
            ->with(['package_images' => function ($query) {
                $query->latest()->take(3); // Get the latest 3 images
            }])
            ->orderBy('packages.created_at', 'desc')
            ->where('packages.status', 1)
            ->take(6)
            ->find($id);

        $daywise_details = json_decode($package_detail->daywise_details, true);


        $images = Gallery::select('gallery.*', 'destination.place_name AS destination_name')
            ->leftjoin('destination', 'destination.id', 'gallery.destination_id')->orderBy('created_at', 'desc')
            ->take(10)->get();

        $footer_destinations = Destination::where('status', 1)->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('1_WebFrontend.2_Pages.7_TourDetail.tourdetail', compact('images', 'footer_destinations', 'package_detail','daywise_details'));
    }
}
