<form action="{{ route('fighters.store') method="POST" }}">
  @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="form-group">
    <label>Entry Song</label>
    <input type="text" name="entry_song" class="form-control">
  </div>
  <div class="form-group">
    <label>Artist</label>
    <input type="text" name="artist" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>