<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function  __construct(){
        $this->middleware('auth');
    }


    public function AllCat() {
        // $categories = DB::table('categories')
        //     ->join('users','categories.user_id','users.id')
        //     ->select('categories.*','users.name')
        //     ->latest()->paginate(4);

        $categories =Category::latest()->paginate(6);
        $trashCat = Category::onlyTrashed()->latest()->paginate(4);

        // $categories = DB::table('categories')->latest()->paginate(4);
        return view('admin.category.index', compact('categories','trashCat'));
    }

    public function AddCat(Request $request) {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        //     // eloquentORM
        // $category = new category;
        // $category -> category_name = $request->category_name;
        // $category -> user_id= Auth::user()->id;
        // $category -> save();

        // //querry builder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);


        return Redirect()->back()->with('success','Data insertion successful');

    }
    

    public function Edit($id){

        // eloquent orm edit functionality
        // $categories = Category::find($id);

        //querry builder 
        $categories =DB::table('categories')->where('id',$id)-> first();
        return view('admin.category.edit', compact('categories'));
    }
    // eloquent Orm edit update functionality
    public function Update(Request $request, $id){ 

        //eloquent ORM
        // $update =Category::find($id)-> update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     // 'updated_at' => Carbon::now()
        // ]);

        //querry builder
        $data = array();
        $data['category_name']= $request -> category_name;
        $data['user_id']= Auth::user()->id;
        DB::table('categories') -> where('id',$id)->update($data);
        return Redirect()->route('all.category')->with('success','Category Update successful');


    }
    public function Delete($id){
        $delete = Category::find($id)-> delete();
        return Redirect()->back()->with('success','Category Trashed successfully');

    }

    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restored successfully');

    }

    public function deleteParmanently($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Deleted parmanently');
    }

    
}

