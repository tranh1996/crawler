
   {{ csrf_field() }}

   <input type="text" class="form-control" name="channel_id" value="{{isset($request->id) ? ($request->id) : $channel_id }}" hidden >
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" name="title" value="{{ isset($item->title) ? ($item->title) : '' }}">
    </div>
    @if ($errors->has('title'))
      <div class="alert alert-danger">
        {{ $errors->first('title') }}
      </div>
    @endif
    <div class="form-group">
      <label for="descriptionContent">Decription:</label>
      <input type="text" class="form-control" id="descriptionContent" name="descriptionContent" value="{{ isset($item->descriptionContent) ? ($item->descriptionContent) : '' }}">
    </div>
      @if ($errors->has('descriptionContent'))
      <div class="alert alert-danger">
        {{ $errors->first('descriptionContent') }}
      </div>
    @endif
    <div class="form-group">
      <label for="pubDate">pubDate:</label>
      <input type="text" class="form-control" name="pubDate" value="{{ isset($item->pubDate) ? ($item->pubDate) : '' }}">
    </div>
      @if ($errors->has('pubDate'))
      <div class="alert alert-danger">
        {{ $errors->first('pubDate') }}
      </div>
    @endif
    <button type="submit" class="btn btn-default">Save</button>    
