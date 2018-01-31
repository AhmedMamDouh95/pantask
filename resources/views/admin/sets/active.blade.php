@extends('admin.layouts.app')
@section('headSection')


@endsection



@section('main-content')


  <div class="wrapper wrapper-content animated fadeInRight">
              <div class="row">
                <div class="col-lg-12">
                  <div class="ibox float-e-margins">
                    <div class="ibox-title">
                      <h5>Sets</h5>
                      
                    </div>
                     <div class="ibox-content">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 100%; ">
                          <thead>
                            <tr>
                              <th>Index</th>
                              <th>Title</th>
                              
                              <th>Image</th>
                              <th>Description</th>
                              <th>Status</th>
                              
                              
                              <td></td>
                            </tr>
                          </thead>
                          <tbody>
                            
                           @foreach($sets as $set)
                             
                                <tr class="gradeX">
                                  <td>{{$loop ->index +1}}</td>


                                  <td class="center">{{$set->title}}  </td>
                                  
                                  <td class="center">
                                  	<img class="img-responsive" src="{{asset('images/sets/'.$set->image)}}"  alt="image" style="    max-width: 200px; height: 150px;">

                                  	</td>

                                


								  <td class="center">
								  	                 <div class="checkbox pull-left">


								  	<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal__{{$set->id}}">
                                    <span class="glyphicon glyphicon-modal-window"></span>
                                      </button>&nbsp;&nbsp;<span>Read Description</span>
                                  </div>
                                  </td>



               <td class="center">
 										
                 <div class="checkbox pull-left">

                              

					@if ($set->status == 1)
					<button class="btn btn-primary btn-xs" data-toggle="modal" id="ahmed" title="Deactivate" data-target="#editstatus_{{ $set->id }}"  data-id="{{$set->id}}" data-name="{{$set->name}}" ><span class="glyphicon glyphicon-ok">
					</button>&nbsp;&nbsp;
					<span>
						Active
					</span>
					@else
					<button class="btn btn-primary btn-xs" data-toggle="modal" id="ahmed" title="Activate" data-target="#editstatus_{{ $set->id }}"  data-id="{{$set->id}}" data-name="{{$set->name}}" ><span class="glyphicon glyphicon-remove">
					</button>&nbsp;&nbsp;
					<span>
						Inactive
					</span>
					@endif
										  
				  </div>
			 </td>
								



            <td class="text-center">






            	<a  href="{{ route('set.edit',$set->id) }}" class="btn btn-primary btn-xs" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
            	&nbsp;&nbsp;



<a  href="{{route('movies',$set->id)}}" class="btn btn-primary btn-xs" title="Movie"><span class="glyphicon glyphicon-eye-open"></span></a>
              &nbsp;&nbsp;

            

                                 

              <form class="myform-{{$set->id}}" action="{{route('set.destroy',$set->id)}}" style="display: none;" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
              </form>
              <Button id="{{$set->id}}" class="btn btn-danger btn-xs delete" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span>
              </Button>
                                        
                 </td>




                 </tr>






<!-- Status Modal -->

     <div id="editstatus_{{ $set->id }}" class="modal fade" role="dialog">
                                 <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                       <div class="modal-body">
                                          <div class="row">
                                             <div class="col-sm-12 ">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <h3 class="home-color bold">Edit Status</h3>
                                                <br>
                                                <form role="form" action="{{ route('set.activation',$set->id) }}" method="post">
                                                    {{ csrf_field() }}         

           											 {{method_field('PUT')}}

                                    
                                                 <!--  -->
                              <div class="form-group">
                                  
								  <label class="form-check-label" for="exampleRadios1"> 
								  	 <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" @if ($set->status == 1)
                        {{'checked'}}
                      @endif >
								    Active
								  </label>

							
								  <label class="form-check-label" for="exampleRadios2" >
								  		  <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0"  @if ($set->status == 0)
                        {{'checked'}}
                      @endif >
								  	InActive
								  </label>
                             
                                             </div>
                                             <div class="col-md-12">
                                                <button class="btn btn-md btn-primary btn-block m-t-n-xs" type="submit"><strong>save</strong></button>
                                             </div>
                                          </div>
                                       </div>
                                   </form>
                                    </div>
                                 </div>
                              </div>
                          </div>



                                        


      <!-- Modal -->
                                   <div id="myModal__{{ $set->id }}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Description</h4>
                                          </div>

                                          <div class="modal-body">
                                            <!-- model  -->
                                            
                                            <p>
                                                  {{ $set -> description }}

                                            </p>
                                            

                                            <!--  -->
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>

                                      </div>
                                    </div>


                                        
                                      </tbody>
                                      
                                    

                                  @endforeach
                                    </table>

                                    <!-- Modal -->

                                
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              
                            </div>
                          </div>
                          
                        


@endsection


@section('footerSection')
<script type="text/javascript">
$('button.delete').on('click', function(e){
    e.preventDefault();
    var del = $(this);
    swal({   
      title: "Are You Sure?!",
      text: "You won't get this set back!",
      type: "warning",   
      showCancelButton: true,   
      confirmButtonColor: "#DD6B55",
      cancelButtonColor: "#f00",
      confirmButtonText: "Yes,Delete!",
      cancelButtonText: "No,Cancel!ر",
      closeOnConfirm: true,
      closeOnCancel: false 
    },
    function(isConfirm){
      if (isConfirm) {
        $(".myform-"+del.attr('id')).submit();
      }else {
        swal("Cancel", "Set is safe! ", "error");
      }
    });
  });
</script>
@endsection