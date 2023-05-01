<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\slider;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function HomeSlider() {
        $sliders = slider::latest()->get();
        return view ('admin.slider.index', compact('sliders'));

    }

    public function AddSlider(){
        return view('admin.slider.add');
    }

    public function  SliderAdd(Request $request){
     

        $slider_image = $request -> file('image');

        
        // use of image intervention package
        $name_gen = hexdec(uniqid()).'.'.$slider_image ->getClientOriginalExtension();
        Image::make($slider_image)-> resize(1920,1088) ->save('image/slider/'. $name_gen);
        $last_img ='image/slider/'.$name_gen;



        // insert the data to the db
         slider:: insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()

        ]);

        return Redirect()->route('home.slider')->with('success', 'Your slider has been added');
    }

}
