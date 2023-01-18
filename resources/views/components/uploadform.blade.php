<form id="uploadform" class="px-3" method="post" action="{{ route('createPost') }}">
    @csrf
    <input type="hidden" name="user_id" value="1">
    <h2 class="text-white">Upload today's story</h2>
    <div class="form-group mb-3">
        <label for="Titel" class="text-white">Titel</label>
        <input name="title" type="text" class="form-control" id="Titel" >
    </div>
    <div class="form-group mb-3">
        <label for="Story" class="text-white">Your Story</label>
        <textarea name="body" rows="7" class="form-control" id="Story" placeholder="What happened today..."></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="I've told my story">
</form>