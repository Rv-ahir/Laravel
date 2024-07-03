<button type="button" class="btn btn-danger btn-sm delete-button" data-bs-toggle="modal" data-bs-target="#delete"
    data-id="{{ $use->id }}">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="deleteform">
                    @csrf
                    @method('delete')
                    <h2 style="margin-top: 0px;">Are you sure you want delete?</h2>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="btn btn-primary mt-2  ">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
                $('.delete-button').on('click', function(event) {
                        var id = $(this).data('id');
                        // console.log(id);
                        var formAction = '{{ route('user.destroy', ':id') }}'.replace(':id', id);
                        $('#deleteform').attr('action', formAction);
                    });
                });
</script>
