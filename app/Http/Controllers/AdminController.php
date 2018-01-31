<?php
namespace App\Http\Controllers;
use App\Admin;
use App\Set;
use App\Movie;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function __construct()
{
$this->middleware('auth:admin');
}


public function index(){

		//Here we Get some counts for the home page 
		// Active movies and sets
         $activesets =Set::where('status',1)->count();
         $activemovies = Movie::where('status',1)->count();

         // count for all the movies and sets
         $movies = Movie::all()->count();
         $sets = Set::all()->count();
         
		return view('admin.index',compact('movies','sets','activesets','activemovies'));
}

}