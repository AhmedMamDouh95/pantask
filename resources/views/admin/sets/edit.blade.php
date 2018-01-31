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
                           <h5>  Edit Set </h5> 
                        </div>
                        <div class="ibox-content">
                        
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                           
                                
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                       



                        <div class="ibox-content">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <div class="row">
                                 

                                	
     <form class="form-horizontal" action="{{ route('set.update',$set->id) }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}         

            {{method_field('PATCH')}}

                                        <div class="col-md-4">
                                            <div class="x_content">
                                                <div class="wrap">
                                                    <h4>Set Image</h4>
                                                    <div class="upload-thumb thumbnail"> <img id="img" src="{{asset('images/sets/'.$set->image)}}" alt="" /></div>
                                                        <label for="upload" class="btn btn-primary">Change Image
                                                            <input type="file" name="image" id="upload">
                                                        </label>
                                                </div>
                                            </div>
                                        </div>
                                      

                                        <div class="col-md-7">

                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class=" form-control" type="text" name="title" placeholder="Title" value="{{ $set->title }}">
                                            </div>

                                           
                                          
                                            <div class="form-group">
                                            <label>Description</label>
                                            
                                                <textarea class="resizable_textarea form-control" placeholder="Description" name="description" rows="8">{{ $set->description }}</textarea>
                                         
                                            </div>

               
								<div class="form-group">
								
								  <label class="form-check-label" for="exampleRadios1">
                                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" @if ($set->status == 1)
                                        {{'checked'}} @endif >Active
								  </label>

								  
								  <label class="form-check-label" for="exampleRadios2">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" @if ($set->status == 0)
                                      {{'checked'}} @endif >InActive
								  </label>
								</div>
								


                                        <div class="col-md-12">
                                            <div class="x_content text-right">
                                                <button type="submit" class="btn btn-primary">Save Edit</button>
                                                <button type="submit" class="btn btn-red">Cancel</button>
                                            </div>
                                        </div>
                                    </div>

                                              </form>



                                    
                                </div>


                            </div>
                        </div>

                        </div>
                     </div>
                  </div>
               </div>
             
                
               
            </div>

             
                
        



@endsection
