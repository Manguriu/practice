	
@extends('admin.master')

@section('admin')

<div class="col-lg-12">
									<div class="card card-default">
									@if(session('success'))
                      				  <div class="alert alert-success alert-dismissible fade show" role="alert">
                       					 <strong>{{ session('success') }}</strong> .
                   						     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   				     </div>
                 				    @endif
										<div class="card-header card-header-border-bottom">
											<h2>Edit Slider</h2>
										</div>
										<div class="card-body">
											<form action ="{{url('slider/update/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
												<input type="hidden" name="old_image" value="{{$sliders ->image}}" />
												<div class="form-group">
													<label for="exampleFormControlInput1">Update Tittle Slider</label>
													<input type="text" value="{{$sliders->title}}" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter Tittle...">
													</div>
												
												
													<div class="form-group">
													<label for="exampleFormControlTextarea1">update Slider Description</label>
													<textarea class="form-control" value="{{$sliders-> description}} id="exampleFormControlTextarea1" placeholder="Description..." name="description" rows="3">{{$sliders-> description}} </textarea>
												</div>
												<div class="form-group">
													<label for="exampleFormControlFile1">Update Slider Image</label>
													<input type="file" name="image" value="{{$sliders-> image}} class="form-control-file" id="exampleFormControlFile1">
												</div>

                                                <div class="form-group">
                                                <img src="{{asset($sliders->image)}}" style="width:400px; height:200px;" />
                                                </div>


												<div class="form-footer  pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Update Slider Data</button>
												</div>
											</form>
										</div>
									</div>

									




@endsection