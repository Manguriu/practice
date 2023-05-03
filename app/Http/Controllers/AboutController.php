<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\MultiplePic;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function About(){
        $home_abouts = HomeAbout::latest()->get();
        return view ('admin.home_about.index', compact('home_abouts'));
    }
    public function AddAbout(){
        return view ('admin.home_about.add');
    }

    public function AboutStore(Request $request){
        //insert data using eloquentORM
        HomeAbout::insert([
            'title' => $request->title,
            'short_Desc' => $request->short_Desc,
            'long_Desc' => $request->long_Desc,
            'created_at' => Carbon::now(),

        ]);

        return Redirect()->route('home.about')->with('success', 'About  added');


    }

    public function Edit($id){
        $home_abouts = HomeAbout::find($id);
        return view('admin.home_about.edit', compact('home_abouts'));

    }
    public function Delete($id){
        $delete = HomeAbout::find($id)-> delete();
        return Redirect()->back()->with('success','About Deleted successfully');

    }
    public function Update(Request $request, $id){ 

        //eloquent ORM
        // $update = HomeAbout::find($id)-> update([
        //     'title' => $request->title,
        //     'short_Desc' => $request->short_Desc,
        //     'long_Desc' => $request->long_Desc,

        // ]);


        //querry builder
        $data = array();
        $data['title']= $request -> title;
        $data['short_Desc']= $request -> short_Desc;
        $data['long_Desc']= $request -> long_Desc;
        DB::table('home_abouts') -> where('id',$id)->update($data);
        return Redirect()->route('home.about')->with('success',' Update successful');




    }

    public function PortF(){
        
        $multipic = MultiplePic::all();
        $multipic = DB::table('multiple_pics')->get();
        return view ('pages.portfolio', compact('multipic'));
    }
}
