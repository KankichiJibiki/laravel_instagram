<div class="mb-3 d-flex flex-row justify-content-between">
    <form action="{{route('comments.store')}}" method="post">
        @csrf
        <div class="input-group col-md-7 col-12">
            @error('content')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" name="content" id="content" class="form-control" placeholder="Add a comment as {{Auth::user()->username}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <button type="submit" class="btn btn-success input-group-item">Post</button>
        </div>
    </form>
</div>