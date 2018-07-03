@extends("layouts.app")
@section('content')
<div class="container">
  <h3> List user </h3>
   @include('flash::message')
   <form action="" method="GET">
      {{ csrf_field() }}
      <div class="input-group">
      <input class="form-control" id="system-search" name="search" placeholder="Search for" required>
         <span class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
         </span>
          <input class="form-control" value="" name="user_id" hidden="hidden">
      </div>
   </form>
   <br>


   <div class="custyle">
    <table class="table table-striped custab">
      <thead>
         
         <tr class="text-center">
            <th>name</th>
            <th>Email</th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
      </thead>
      <tbody>
            @foreach($users as $user)
            <tr>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <td>               
                  <a class='btn btn-info' href=""> <span class="glyphicon glyphicon-edit"></span>Edit</a></td>
               <td>
                  <a class="btn btn-danger" href=""> <span class="glyphicon glyphicon-remove"></span>Del</a></td>
               </div>
            </tr>
            @endforeach
     </tbody>       
    </table>
    
    </div>
    <div class="col-md-6 col-md-offset-4">
      {{$users->links()}}
    </div>
</div>
@endsection()