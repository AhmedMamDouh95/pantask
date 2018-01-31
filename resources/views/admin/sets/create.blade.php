@extends('admin.layouts.app')
@section('headSection')


@endsection



@section('main-content')

            <div class="wrapper wrapper-content animated fadeInRight">
               

            @include('admin.layouts.messages')


               <div class="row">
                  <div class="col-lg-12">
                     <div class="ibox float-e-margins">
                        <div class="ibox-title  back-change">
                           <h5>  Add Set </h5>
                        </div>
                        
                            
                       
                        <div class="ibox-content">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <div class="row">

                                   <form action="{{ route('sets.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          									  {{ csrf_field() }}

                                              
                                	
                                        <div class="col-md-4">
                                            <div class="x_content">
                                                <div class="wrap">
                                                    <h4>Set Image</h4>
                                                    <div class="upload-thumb thumbnail"> <img id="img" src="{{ asset('img/no.jpg')}}" alt="" /></div>
                                                        <label for="upload" class="btn btn-primary">Change Image
                                                            <input type="file" name="image" id="upload">
                                                        </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class=" form-control" type="text" name="title" placeholder="Title">
                                            </div>

                                           
                                          
                                            <div class="form-group">
                                            <label>Description</label>
                                            
                                                <textarea class="resizable_textarea form-control" placeholder="Description" name="description" rows="8"></textarea>
                                         
                                        </div>

               
								<div class="form-group">
								  <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
								  <label class="form-check-label" for="exampleRadios1">
								    Active
								  </label>

								  <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
								  <label class="form-check-label" for="exampleRadios2">
								  	Not Active
								  </label>
								</div>
								


                                        <div class="col-md-12">
                                            <div class="x_content text-right">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="submit" class="btn btn-red">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                                              </form>

                        </div>
                     </div>
                  </div>
               </div>
             
                
               
            </div>



@endsection
