	
@extends('admin.master')

@section('admin')


<div class="py-12">  
    <div class='py-2'>
        <div class='container'>
            <div class='row'>

            <div class=' col-md-12'>
                <div class='card'>
                    <div class="card-header">Contact</div>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" width="5%">SL.No</th>
                            <th scope="col" width="15%">Contact Name</th>
                            <th scope="col" width="10%">Contact Email</th>
                            <th scope="col" width="15%">Contact Subject</th>
                            <th scope="col" width="25">Contact Messsage</th>
                            <th scope="col" width="5%">Action</th>
                            
                            </tr>
                        </thead>
                         <tbody>
                            <!-- data fetching -->
                        @php($i = 1)
                         @foreach($message  as $cont) 
                        <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$cont -> name}}</td>
                        <td>{{$cont -> email}}</td>
                        <td>{{$cont -> subject}}</td>
                        <td>{{$cont -> message}}</td>


                        <td>
                            <a href="{{url('message/delete/'.$cont->id)}}" onClick="return confirm('Are you sure you want to delete this')"
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

