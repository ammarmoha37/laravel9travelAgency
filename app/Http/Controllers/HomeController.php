<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Package;
use App\Models\user;



class HomeController extends Controller
{
    //
    
    public static function maincategorylist(){
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }


    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){
                return view('home');
            }
            else{
                return view(admin.index);
            }
        }
        else{
            redirect()->back();
        }
    }
    
    public function index(){
        $page = 'home';
        $sliderdata = Package::limit(4)->get();
        $packagelist1 = Package::limit(6)->get();
        $setting = Setting::first();

        return view('home.index',[
            'page' => $page,
            'setting' =>$setting,
            'sliderdata' => $sliderdata,
            'packagelist1' => $packagelist1
        ]);
    }


    public function about(){
        $setting = Setting::first();
        return view('home.about',[
            'setting' =>$setting,
        ]);
    }

    public function references(){
        $setting = Setting::first();
        return view('home.references',[
            'setting' =>$setting,
        ]);
    }

    public function contact(){
        $setting = Setting::first();
        return view('home.contact',[
            'setting' =>$setting,
        ]);
    }

    
    public function package($id)
    {
        $data = Package::find($id);
        $packagelist1 = Package::limit(6)->get();
        $images = DB::table('images')->where('package_id', $id)->get();
        return view('home.package', [
            'data' => $data,
            'images' => $images,
            'packagelist1' => $packagelist1
        ]);
    }

    public function categorypackages($id)
    {
        echo "hi bitch";
        exit();

        $category = Package::find($id);
        $packages = DB::table('packages')->where('category_id', $id)->get();
        return view('home.categorypackages', [
            'category' => $category,
            'packages' => $packages
        ]);
    }


    public function test(){
        return view('home.test');
    }

    public function param($id, $number){
        //echo "Parameter 1: ", $id;
        //echo "<br> Parameter 2: ", $number;
        //echo "<br> Sum paramerters : ", $id+$number;
        return view('home.test2',
        [
            'id' => $id,
            'number' => $number
        ]);
    }

    public function save(Request $request){
        echo "Save Function";
        echo "<br>First Name : ", $_REQUEST["fname"];
        echo "<br>Last Name : ", $_REQUEST["lname"];
    }

}
