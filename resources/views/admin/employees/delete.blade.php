<div>
    <div class="modal fade in" id="modal-default" style="display: none; padding-right: 15px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Deleting the Employee</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove employee {{ $item->name }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('staff.destroy', $item->id) }}" method="post" style="display: inline-block">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
