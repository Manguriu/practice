@extends('admin.master')

@section('admin')
<div class="card card-default">
    <div class="card-header-border-bottom">
        <h2>Users Profile</h2>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong> .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
<div class="card-body">
        <form method="POST" action="{{route('userP.update')}}" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">User Name</label>
                <input type="text" value="{{ $user->name}}" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput3">User email</label>
                <input type="email" value="{{$user ->email}}" name="email" class="form-control">
            </div>
          
          
            
         <button type="submit"class="btn btn-danger btn-default"> Update </button>
          
        </form>
    </div>
</div>
</div>






@endsection