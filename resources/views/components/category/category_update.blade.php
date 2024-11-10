<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="update_category" tabindex="-1" aria-labelledby="update_category_head" aria-hidden="true">
    <div class="modal-dialog">
      <form id="updateCategory">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="update_category_head">Update Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="hidden" class="form-control" id="category_id">
                <input type="text" class="form-control" id="up_category_name">
              </div>
              <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" id="up_slug">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white up_category">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>