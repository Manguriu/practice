@extends('admin.master')

@section('admin')

                                    <div class="col-lg-12">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Create Contact</h2>
										</div>
										<div class="card-body">
											<form action ="{{route('contact.add')}}"method="POST">
                                                @csrf
												    <div class="form-group">
													<label for="exampleFormControlInput1">Contact Email</label>
													<input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Enter email...">
													</div>

                                                    <div class="form-group">
                                                    <label for="exampleFormControlInput1">Contact Phone</label>
													<input type="text" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Enter phone...">
													</div>
												
												
													<div class="form-group">
													<label for="exampleFormControlTextarea1">Conatct Address</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Address..." name="address" rows="3"></textarea>
												    </div>

                                            
												
												<div class="form-footer  pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Add</button>
												</div>
											</form>
										</div>
									</div>




@endsection