@extends('admin.master')

@section('admin')
         <div class="col-lg-12">
		    <div class="card card-default">
							<div class="card-header card-header-border-bottom">
									<h2>Edit About</h2>
										</div>
								<div class="card-body">
                                <form action ="{{url('about/update/'.$home_abouts->id)}}" method="POST">
                                                @csrf
												<div class="form-group">
												<label for="exampleFormControlInput1">Edit title</label>
												<input type="text" class="form-control" value="{{$home_abouts->title}}" name="title" id="exampleFormControlInput1" placeholder="Enter Tittle...">
												</div>
												
												
													<div class="form-group">
													<label for="exampleFormControlTextarea1"> Edit short  Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="short Description..." name="short_Desc" rows="3">{{$home_abouts-> short_Desc}}</textarea>
												    </div>

                                                    <div class="form-group">
													<label for="exampleFormControlTextarea1">Edit Long Description</label>
													<textarea class="form-control"  id="exampleFormControlTextarea1" placeholder="long Description..." name="long_Desc" rows="3">{{$home_abouts-> long_Desc}}</textarea>
												    </div>
												
												<div class="form-footer  pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Update</button>
												</div>
											</form>
										</div>
									</div>




@endsection