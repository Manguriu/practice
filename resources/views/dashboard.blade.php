<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi <b> {{ Auth::user()->name }}</b> ,Welcome
            <b style="float:right;"> Users 
            <span class="badge rounded-pill text-bg-primary">
              {{ count($users) }}
            </span>
          </b>
        </h2>
    </x-slot>

    <div class="py-12">
        
    <div class='py-2'>
        <div class='container'>
            <div class='row'>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">SL.No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created.At</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$user ->name}}</td>
      <td>{{$user ->email}}</td>
      <td>{{Carbon\Carbon::parse($user ->created_at)-> diffForHumans()}}</td>
    </tr>
    @endforeach
   
  </tbody>
</table>
            </div>
        </div>
    </div>




    
    </div>
</x-app-layout>
