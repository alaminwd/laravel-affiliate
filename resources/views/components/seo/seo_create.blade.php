<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_seo" tabindex="-1" aria-labelledby="create_seo" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 900px;">
      <form id="addSeo">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_seo">Create SEO Page</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" id="title">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" id="description">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Keywords</label>
                    <input type="text" class="form-control" id="keywords">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Published Time</label>
                    <input type="date" class="form-control" id="published_time">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Modified Time</label>
                    <input type="date" class="form-control" id="modified_time">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" class="form-control" id="author">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Canonical</label>
                    <input type="text" class="form-control" id="canonical">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Og Locale</label>
                    <input type="text" class="form-control" id="og_locale">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Og URL</label>
                    <input type="text" class="form-control" id="og_url">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Og Type</label>
                    <input type="text" class="form-control" id="og_type">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Twitter Card</label>
                    <input type="text" class="form-control" id="twitter_card">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Twitter Site</label>
                    <input type="text" class="form-control" id="twitter_site">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Twitter Label</label>
                    <input type="text" class="form-control" id="twitter_label">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Twitter Data</label>
                    <input type="text" class="form-control" id="twitter_data">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" id="img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    <img id="blah" class="mt-3" src="" width="100" />
                  </div>
                </div>
              </div>
              
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white add_seo">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>