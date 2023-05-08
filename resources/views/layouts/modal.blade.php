<div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Row</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Approve the action
            </div>
            <div class="modal-footer">

                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <form class="form" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
