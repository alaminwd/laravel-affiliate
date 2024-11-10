<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="update_page" tabindex="-1" aria-labelledby="update_page_head" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px">
        <form id="updatePage">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="update_page_head">Update Page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="hidden" class="form-control" id="page_id">
                        <input type="text" class="form-control" id="up_title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" id="up_slug">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Short Description</label>
                        <textarea class="form-control" id="up_short_desp"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea id="up_desp"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info text-white up_page">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
