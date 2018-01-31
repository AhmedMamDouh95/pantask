<?php

namespace App\Http\Controllers;
use App\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Movie;
use File;

class SetController extends Controller
{

 public function __construct()
{
$this->middleware('auth:admin');
}


	// sets index
	public function index(){

		$sets=Set::all();
		return view('admin.sets.show',compact('sets'));

	}

	// create view
    public function create(){

    	return view('admin.sets.create');
	}	



// Movies Related to specific set
	
public function set($id){

$movies = Movie::where('set_id',$id)->get();
return view('admin.sets.movies',compact('movies'));

 }




//store sets in database
 public function store(Request $request){

			$this->validate($request,[
			'title' => 'required',
			'description'=>'required',
			'image' => 'required',
			]);
			$set= new Set;

			$set->title= $request->title;
			$set->description = $request->description;
			$set->status = $request->status;

			if($request->hasFile('image')){

			$image=$request->file('image');
			$filename=time(). '.' .$image->getClientOriginalExtension();
			$location=public_path('images/sets/' . $filename);
			Image::make($image)->resize(200,250)->save($location);
			$set->image=$filename;

			}
			$set->save();

			return redirect(route('sets.index'));

    }




    //Edit Set View
    public function edit($id){

		$set=Set::where('id',$id)->first();

    	return view('admin.sets.edit',compact('set'));
    }

    //Update Set
    public function update(Request $request,$id){

    			$this->validate($request,[
			'title' => 'required',
			'description'=>'required',
			]);


    	$sets=Set::find($id);

		if($request->hasFile('image')){

			$image=$request->file('image');
			$filename=time(). '.' .$image->getClientOriginalExtension();
			$location=public_path('images/sets/' . $filename);
			Image::make($image)->resize(200,250)->save($location);
			$oldFilename=$sets->image;
			$sets->image=$filename;
			File::delete(public_path('images/sets/'. $oldFilename));

		}
			
			$sets->title= $request->title;
			$sets->description = $request->description;
			$sets->status = $request->status;
	  	
		



				$sets->save();

		return redirect(route('sets.index'));
    }



// Activation and Deactivation of sets

public function activation(Request $request,$id){

	  $set = Set::find($id);

      $set->status= $request->status;

      $set->save();

      return redirect(route('sets.index'));

}


//List of Activated Sets 
	public function active(){
		$sets =Set::where('status',1)->get();
		return view('admin.sets.active',compact('sets'));
	}


// Delete Set	
public function destroy($id)
{
$set=Set::find($id)->delete();
return redirect()->back();
}


}
