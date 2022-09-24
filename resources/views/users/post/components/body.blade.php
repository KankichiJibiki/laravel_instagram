{{-- photo --}}
<a href="{{route('post.show', $post->id)}}" class="text-dark text-decoration-none">
    <div class="col-12 mb-1">
        <img src="{{asset('storage/images/' . $post->image)}}" alt="Not found" class="post_image img-cover imgFit img-responsive col-12">
    </div>
</a>