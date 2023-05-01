	
@extends('admin.master')

@section('admin')


<div class="py-12">  
    <div class='py-2'>
        <div class='container'>
            <div class='row'>

            <h4> Home slider </h4> 
            <a href="{{route('slider.add')}}"><button class="btn btn-info"> Create </button></a> <br>


            <div class=' col-md-12'>
                <div class='card'>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header">Sliders</div>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" width="5%">SL.No</th>
                            <th scope="col" width="15%">Title</th>
                            <th scope="col" width="25%">Slider Description</th>
                            <th scope="col" width="15%">Image</th>
                            <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                         <tbody>
                            <!-- data fetching -->
                        @php($i = 1)
                         @foreach($sliders as $slider) 
                        <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$slider -> title}}</td>
                        <td>{{$slider -> description}}</td>
                        <td><img src="{{ asset($slider->image)}}" style="height:40px; width:70px;" /></td>
                  
                       <td>
                        <a href="{{url('slider/edit/'.$slider->id)}}" type=button class= "btn btn-warning"> Edit </a>
                        <a href="{{url('slider/delete/'.$slider->id)}}" onClick="return confirm('Are you sure you want to delete this')"
                        class= "btn btn-danger"> Delete </a>
                        </td>

                        </tr>
                        @endforeach 
                    </tbody>
                    </table>

                </div>

    </div>
</div>   
</div>


</div>
   




@endsection

