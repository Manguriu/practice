@extends('admin.master')

@section('admin')
<div class="card card-default">
    <div class="card-header-border-bottom">
        <h2>Pasword Reset</h2>

<div class="card-body">
        <form method="POST" action="{{route('password.update')}}" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">Current Password</label>
                <input type="password" name="oldpassword "id="current_password" class="form-control"  placeholder="Current password">
                @error('oldpassword')
                <span class="text-danger">{{$message}}</span>  
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                @error('password"')
                <span class="text-danger">{{$message}}</span>  
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm New Password</label>
                <input type="password" name="password confirmation" id="password_confirmation" class="form-control" id="exampleFormControlPassword3" placeholder="Confirm New Password">
                @error('password confirmation')
                <span class="text-danger">{{$message}}</span>  
                @enderror
         </div>
            
         <button type="submit"class="btn btn-danger btn-default"> Save </button>
          
        </form>
    </div>
</div>
</div>






@endsection