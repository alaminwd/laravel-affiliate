<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_page" tabindex="-1" aria-labelledby="create_page_head" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px;">
      <form id="addPage">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_page_head">Create Page</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" id="title">
              </div>
              <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug">
              </div>
              <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea class="form-control" id="short_desp"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea id="desp" ></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_page">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>