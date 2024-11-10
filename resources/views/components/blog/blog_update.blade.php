<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="update_blog" tabindex="-1" aria-labelledby="update_blog" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px">
      <form id="updateBlog">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="update_blog">Update Blog</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="hidden" class="form-control" id="blog_id">
                <input type="text" class="form-control" id="blog_title">
              </div>
              <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" id="blog_slug">
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea id="blog_desp"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" id="blog_img" onchange="document.getElementById('imgblah').src = window.URL.createObjectURL(this.files[0])">
                <img class="mt-3" id="imgblah" src="" width="100" height="100" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white up_blog">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>