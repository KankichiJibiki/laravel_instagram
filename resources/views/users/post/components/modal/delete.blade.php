
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="delete-post-{{$post->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <form action="{{route('post.destroy', $post->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="mb-5">
                        <h4 class="text-danger mt-4">Are you sure to delete this post?</h4>
                        <div class="img-thumbnail">
                            <img src="{{asset('/storage/images/' . $post->image)}}" alt="" class="img-thumbnail w-100">
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-around">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>