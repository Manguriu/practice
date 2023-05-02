@extends('admin.master')

@section('admin')

                                    <div class="col-lg-12">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Create About</h2>
										</div>
										<div class="card-body">
											<form action ="{{route('about.store')}}"method="POST">
                                                @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">About title</label>
													<input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter Tittle...">
													</div>
												
												
													<div class="form-group">
													<label for="exampleFormControlTextarea1">Short Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="short Description..." name="short_Desc" rows="3"></textarea>
												    </div>

                                                    <div class="form-group">
													<label for="exampleFormControlTextarea1">Long Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="long Description..." name="long_Desc" rows="3"></textarea>
												    </div>
												
												<div class="form-footer  pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Add</button>
												</div>
											</form>
										</div>
									</div>




@endsection