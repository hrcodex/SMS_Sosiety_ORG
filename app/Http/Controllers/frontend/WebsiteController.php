<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\webAbout;
use App\Models\WebFaq;
use App\Models\WebFeature;
use App\Models\webHome;
use App\Models\WebPages;
use App\Models\WebProductModel;
use App\Models\WebReview;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{


    

    public function galleryIndex()
    {
        return view('frontend.gallery.gallery');
    }
    public function memberIndex()
    {
        return view('frontend.members.members');
    }

    public function detailsIndex()
    {
        return view('frontend.blog_details.blog_details');
    }
    public function noticeIndex()
    {
        return view('frontend.notice.notice');
    }










    // public function index()
    // {
    //     //home
    //     $home = webHome::where('id', 1)->first();
    //     //about
    //     $about_details = webAbout::where('id', 1)->first();
    //     $about_points = webAbout::whereNotIn('id', [1])->get();
    //     //feathers
    //     $feathers_delivery = WebFeature::where('id', 1)->first();
    //     $feathers_helpline = WebFeature::where('id', 2)->first();
    //     $feathers_cod = WebFeature::where('id', 3)->first();
    //     //product model
    //     $product_model = WebProductModel::where('publication_status', 'Published')->get();
    //     //product
    //     $products = Product::where('deletion_status', 0)->where('publication_status', 'Published')->get();
    //     //review
    //     $review = WebReview::all();
    //     //FAQ
    //     $faq = WebFaq::all();
    //     //Offical Pages
    //     $official_pages = WebPages::where('deletion_status', 0)->get();



    //     return view('frontend.Content.content', [

    //         'homeData' => $home,
    //         'about_details' => $about_details,
    //         'about_points' => $about_points,
    //         'feathers_delivery' => $feathers_delivery,
    //         'feathers_helpline' => $feathers_helpline,
    //         'feathers_cod' => $feathers_cod,
    //         'product_model' => $product_model,
    //         'products' => $products,
    //         'review' => $review,
    //         'faq' => $faq,
    //         'official_pages' => $official_pages,
    //     ]);
    // }
}
