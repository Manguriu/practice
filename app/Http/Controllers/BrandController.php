<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\MultiplePic;
use Auth;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image; // Import the Image facade

class BrandController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');
    }


    public function AllBrand(){
        $brands =Brand::latest()->paginate(4);

        return view('admin.brand.index', compact('brands'));
    }

    public function  AddBrand(Request $request){
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:5',
            'brand_image' => 'required|mimes:jpg,jpeg,png,gif',

        ]); 

        $brand_image = $request -> file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image ->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // //upload
        // $up_location = 'image/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image ->move($up_location,$img_name);

        // use of image intervention package
        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)-> resize(300,200) ->save('image/brand/'. $name_gen);
        $last_img ='image/brand/'.$name_gen;



        // insert the data to the db
        Brand :: insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()

        ]);


        //adding toaster

        $notification =array(
            'message' => 'Your brand has been added',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function Edit($id){
        $brands = Brand ::find($id);
        return view('admin.brand.edit', compact('brands'));

    }

    public function Update(Request $request, $id){
        $validatedData = $request->validate([
            'brand_name' => 'required|min:3',

        ]); 

        //remove the existing image
        $old_image = $request -> old_image;
     

        $brand_image = $request -> file('brand_image');

        //update name without image
        if($brand_image){
            $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image ->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        //upload
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        $brand_image ->move($up_location,$img_name);


        //removing the old image
        
        unlink($old_image);


        // insert the data to the db
        Brand :: find($id)->update ([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()

        ]);
        $notification =array(
            'message' => 'Your brand Photo has been updatd',
            'alert-type' => 'info',
        );

        return Redirect()->back()->with($notification);

        }else{
            Brand :: find($id)->update ([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
     
            ]);

            $notification =array(
                'message' => 'Your brand Name has been updated',
                'alert-type' => 'warning',
            );
    
            return Redirect()->back()->with($notification);

        }



    }

    public function Delete($id){

        // image delete in the db
        $image = Brand :: find($id);
        $old_image =$image -> brand_image;
        unlink($old_image);

        //delete the brand
        Brand::find($id) ->delete();
        
        $notification =array(
            'message' => 'Your brand Name has been updated',
            'alert-type' => 'error',
        );
        return Redirect()->back()->with($notification);


    }


//multi image Controller
    public function ImageMulti(){
        $images = MultiplePic ::all();

        //compact alllows data to be fetched from the database.
    
        return view('admin.multipic.index',compact('images'));
    }


    public function AddImage (Request $request){

        $image = $request -> file('image');

        //loading of the images
      
        foreach($image as $multi_img){


        // use of image intervention package
        $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        Image::make($multi_img)-> resize(300,300) ->save('image/Mimages/'. $name_gen);
        $last_img ='image/Mimages/'.$name_gen;



        // insert the data to the db
        MultiplePic :: insert([
     
            'image' => $last_img,
            'created_at' => Carbon::now()

        ]);

    } // end of foreach loop

        return Redirect()->back()->with('success', 'Your images have been inserted');

    }
// creating the logout route, which is inbuilt in laravel
    public function Logout (){
        Auth::logout();
        return Redirect()->route('login') -> with('success', 'user logged out');
    }
    

}
