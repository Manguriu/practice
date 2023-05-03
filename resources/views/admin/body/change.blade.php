@extends('admin.master')

@section('admin')
<div class="card card-default">
    <div class="card-header-border-bottom">
        <h2>Pasword Reset</h2>

<div class="card-body">
        <form class="form-pill">
            <div class="form-group">
                <label for="exampleFormControlInput3">Current Password</label>
                <input type="password" class="form-control" id="exampleFormControlInput3" placeholder="Old password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm New Password</label>
                <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Confirm New Password">
            </div>
          
        </form>
    </div>
</div>
</div>






@endsection