<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_blog" tabindex="-1" aria-labelledby="create_blog" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px;">
      <form id="addBlog">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_blog">Create Blog</h5>
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
                <label class="form-label">Description</label>
                <textarea id="desp" ></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" id="img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                <img id="blah" class="mt-3" src="" width="100" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_blog">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>