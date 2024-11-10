<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="update_seo" tabindex="-1" aria-labelledby="update_seo" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 900px;">
      <form id="updateSeo">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="update_seo">update SEO Page</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="hidden" class="form-control" id="seo_id">
                    <input type="text" class="form-control" id="up_slug">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" id="up_title">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" id="up_description">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Keywords</label>
                    <input type="text" class="form-control" id="up_keywords">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Published Time</label>
                    <input type="date" class="form-control" id="up_published_time">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Modified Time</label>
                    <input type="date" class="form-control" id="up_modified_time">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" class="form-control" id="up_author">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Canonical</label>
                    <input type="text" class="form-control" id="up_canonical">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Og Locale</label>
                    <input type="text" class="form-control" id="up_og_locale">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Og URL</label>
                    <input type="text" class="form-control" id="up_og_url">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Og Type</label>
                    <input type="text" class="form-control" id="up_og_type">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Twitter Card</label>
                    <input type="text" class="form-control" id="up_twitter_card">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Twitter Site</label>
                    <input type="text" class="form-control" id="up_twitter_site">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Twitter Label</label>
                    <input type="text" class="form-control" id="up_twitter_label">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Twitter Data</label>
                    <input type="text" class="form-control" id="up_twitter_data">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" id="up_img" onchange="document.getElementById('imgblah').src = window.URL.createObjectURL(this.files[0])">
                    <img id="imgblah" class="mt-3" src="" width="100" height="100" />
                  </div>
                </div>
              </div>
              
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white up_seo">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>