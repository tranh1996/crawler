@extends("layouts.app")
@section('content')
<div class="container">

    
   <div class="channel">
      @foreach($channels as $channel)

          <a href="{{ route('channels.index', $channel->id) }}"> {{ $channel->title }} </a> |
      @endforeach

   </div>
   <hr>
   @include('flash::message')
   <form action="{{ route('channels.index', $id) }}" method="GET">
      {{ csrf_field() }}
      <div class="input-group">
      <input class="form-control" id="system-search" name="search" placeholder="Search for" required>
         <span class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
         </span>
          <input class="form-control" value="{{ $id }}" name="channel_id" hidden="hidden">
      </div>
   </form>
   <br>

   @if($items !== null)
   <div class="custyle">
    <table class="table table-striped custab">
      <thead>
        @can('create-item')
          <a href="{{ route('item.create', $id) }}" class="btn btn-primary btn-xs pull-right" id="add"><b>+</b> Add new item</a>
        @endcan
         <tr class="text-center">
            <th>Image</th>
            <th width="100">Title</th>
            <th>Description</th>
            <th>Link</th>
            <th>pubDate</th>
            @can('update-item', $channel)
            <th>Edit</th>
            @endcan
            @can('delete-item', $channel)
            <th>Delete</th>
            @endcan
        </tr>
      </thead>
      <tbody>
            @foreach($items as $item)
            <tr>
               <td><img src="{{ $item->descriptionImageLink }}"></td>
               <td>{{ $item->title }}</td>
               <td>{{ $item->descriptionContent }}</td>
               <td><a href="{{ $item->guid }}">{{ $item->guid }}</a></td>
               <td>{{ $item->pubDate }}</td>
               @can('update-item')
                <td>
                  <div class="abc">
                     <a class='btn btn-info' href="{{ route('item.edit', $item->id) }}"> <span class="glyphicon glyphicon-edit"></span>Edit</a></td>
                  </div>
                @endcan
              @can('delete-item')
               <td>
               <div class="abc"> 
                  <a class="btn btn-danger" href="{{ route('item.delete', $item->id) }}" id="btn-delete"> <span class="glyphicon glyphicon-remove"></span>Del</a></td>
               </div>
               @endcan
            </tr>
            @endforeach
     </tbody>       
    </table>
    
    </div>
    <div class="col-md-6 col-md-offset-4">
      {{$items->appends($keyWords)->links()}}
    </div>
    @else
    <h3> No Result </h3>
    @endif
</div>
<script>
  $(document).ready(function(){
    $("#btn-delete").click(function() {
      confirm("Are you sure want to delete?");
    });
  });
</script>

@endsection()

