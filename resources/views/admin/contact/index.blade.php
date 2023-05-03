	
@extends('admin.master')

@section('admin')


<div class="py-12">  
    <div class='py-2'>
        <div class='container'>
            <div class='row'>

            <h4> Contact Info </h4> 
            <a href="{{route('add.Contact')}}"><button class="btn btn-info"> Add New </button></a> <br>


            <div class=' col-md-12'>
                <div class='card'>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header">Contact</div>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" width="5%">SL.No</th>
                            <th scope="col" width="15%">Conatct Address</th>
                            <th scope="col" width="25%">Contact Email</th>
                            <th scope="col" width="15%">Contact Phone</th>
                            <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                         <tbody>
                            <!-- data fetching -->
                        @php($i = 1)
                         @foreach($contacts as $cont) 
                        <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$cont -> address}}</td>
                        <td>{{$cont -> email}}</td>
                        <td>{{$cont -> phone}}</td>
                  
                       <td>
                        <a href="{{url('contact/edit/'.$cont->id)}}" type=button class= "btn btn-warning"> Edit </a>
                        <a href="{{url('contact/delete/'.$cont->id)}}" onClick="return confirm('Are you sure you want to delete this')"
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

