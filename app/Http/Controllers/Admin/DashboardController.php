<?php

namespace App\Http\Controllers\Admin;use Illuminate\Support\Facades\Auth;


use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon; 


class DashboardController extends Controller
{
public function index()
{
$today = Carbon::today();

    $id = auth()->user()->id;
    // Get the currently authenticated user...
    $user = Auth::user();
        $category= Category::where('status', '0')->get();
         $data=Post::select('id','created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('D d');
        });

        $months=[];
        $monthCount=[];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }
    $postdata= Post::all();
    $users = DB::table('users')->count(); 
    $songs = DB::table('songs')->count(); 
    $events = DB::table('event')->count();  
    $allusers = User::all(); 
    $comments = DB::table('comments')->count();
    $categories = DB::table('categories')->count();
    
    return view('dashboard.index', compact('user','users','comments','categories','category','allusers','events','songs'));
}
}

