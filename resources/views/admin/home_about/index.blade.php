	
@extends('admin.master')

@section('admin')


<div class="py-12">  
    <div class='py-2'>
        <div class='container'>
            <div class='row'>

            <h4> About </h4> 
            <a href="{{route('about.add')}}"><button class="btn btn-info"> Add About </button></a> <br>


            <div class=' col-md-12'>
                <div class='card'>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header">About</div>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" width="5%">SL.No</th>
                            <th scope="col" width="15%">Title</th>
                            <th scope="col" width="25%">Short Description</th>
                            <th scope="col" width="15%">Long Description</th>
                            <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                         <tbody>
                            <!-- data fetching -->
                        @php($i = 1)
                         @foreach($home_abouts as $about) 
                        <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$about -> title}}</td>
                        <td>{{$about -> short_Desc}}</td>
                        <td>{{$about -> long_Desc}}</td>
                  
                       <td>
                        <a href="{{url('about/edit/'.$about->id)}}" type=button class= "btn btn-warning"> Edit </a>
                        <a href="{{url('about/delete/'.$about->id)}}" onClick="return confirm('Are you sure you want to delete this')"
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

