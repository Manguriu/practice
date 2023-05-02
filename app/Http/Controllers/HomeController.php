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

    public function Edit($id){
        $sliders = slider::find($id);
        return view('admin.slider.edit', compact('sliders'));

    }

    //delete <slider data

    public function Delete($id){

        // image delete in the db
        $image = slider :: find($id);
        $old_image =$image -> image;
        unlink($old_image);

        //delete the brand
        slider::find($id) ->delete();
        return Redirect()->back()->with('success', 'Slider deleted Deleted');


    }


    public function Update(Request $request, $id){

        //remove the existing image
        $old_image = $request -> old_image;
     

        $image = $request -> file('image');

        //update name without image
        if($image){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image ->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //upload
        $up_location = 'image/slider/';
        $last_img = $up_location.$img_name;
        $image ->move($up_location,$img_name);


        //removing the old image
        unlink($old_image);


        // insert the data to the db
        slider :: find($id)->update ([
            'title' => $request->title,
            'description'=>$request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()

        ]);

        return Redirect()->route('home.slider')->with('success', 'Slider updated');
    }else {
        slider :: find($id)->update ([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()
 
        ]);

        return Redirect()->route('home.slider')->with('success', 'Slider updated');

    }

}


}