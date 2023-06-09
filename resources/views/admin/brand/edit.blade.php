@extends('admin.master')

@section('admin')

    <div class="py-12">
        
    <div class='py-2'>
        <div class='container'>
            <div class='row'>
            <div class=' col-md-8'> 
                <div class='card'>
               
                    <div class="card-header">Edit Brand</div>
                    <div class="card-body">
                    <form  action="{{url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                    <input type="hidden" name="old_image" value="{{$brands ->brand_image}}" />
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">update brand Name</label>
                        <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brands-> brand_name}}">
                        @error('brand_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">update brand image</label>
                        <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brands-> brand_image}}">
                        @error('brand_image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <img src="{{asset($brands->brand_image)}}" style="width:400px; height:200px;" />
                    </div>

                    <button type="submit" class="btn btn-primary">Update brand</button>
                    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>




    
</div>
@endsection
