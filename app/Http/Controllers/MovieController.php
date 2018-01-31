<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set;
use Illuminate\Support\Facades\Storage;
use Image;
use File;
use App\Movie;

class MovieController extends Controller
{



	public function __construct()
	{
	$this->middleware('auth:admin');
	}


  // movies index
  public function index(){

      $sets = Set::all();
      $movies = Movie::all();
      return view('admin.movies.show',compact('sets','movies'));
    }
  

// movies create view
 	public function create(){

 		$sets = Set::all();
 		return view('admin.movies.create',compact('sets'));

 	}

//store movies data into database
 	public function store(Request $request){


 		$this->validate($request,[
 		'title' => 'required',
 		'description'=>'required',
 		'image' => 'required'
 		]);


 		$movie = new Movie;

 		$movie->set_id= $request->set;
 		$movie->title = $request->title;
 		$movie->description = $request->description;
 		$movie->status = $request->status;


 		if($request->hasFile('image')){

 		$image=$request->file('image');
 		$filename=time(). '.' .$image->getClientOriginalExtension();
 		$location=public_path('images/movies/' . $filename);
 		Image::make($image)->resize(200,250)->save($location);
 		$movie->image=$filename;

 		}

 		$movie->save();

 		return redirect(route('movie.index'));
 		}



// Edit Movie View
    public function edit($id){
    	
    	$sets=Set::all();
		$movie=Movie::where('id',$id)->first();

    	return view('admin.movies.edit',compact('sets','movie'));
    }



// Update Movie 
    public function update(Request $request,$id){

    

 		$this->validate($request,[
 		'title' => 'required',
 		'description'=>'required',
 		]);


    	$movie=Movie::find($id);

 		$movie->set_id= $request->set;
 		$movie->title = $request->title;
 		$movie->description = $request->description;
 		$movie->status = $request->status;


 		if($request->hasFile('image')){

 		$image=$request->file('image');
 		$filename=time(). '.' .$image->getClientOriginalExtension();
 		$location=public_path('images/movies/' . $filename);
 		Image::make($image)->resize(200,250)->save($location);
		$oldFilename=$movie->image;
		$movie->image=$filename;
		File::delete(public_path('images/movies/'. $oldFilename));
 		}

 		$movie->save();

 		return redirect(route('movie.index'));	
    }





// Activation and Deactivation of Movies

public function activation(Request $request,$id){

	  $movie = Movie::find($id);

      $movie->status= $request->status;

      $movie->save();

      return redirect(route('movie.index'));

}

// List Of Activated Movies

  public function active(){
    $movies =Movie::where('status',1)->get();
    return view('admin.movies.active',compact('movies'));
  }

// Delete Movie
  
public function destroy($id)
{
$movie=Movie::find($id)->delete();
return redirect()->back();
}
}
