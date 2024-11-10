<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="update_product" tabindex="-1" aria-labelledby="up_product_head" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px;">
      <form id="updateProduct">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="up_product_head">Update Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Product Link</label>
                <input type="hidden" class="form-control" id="product_id">
                <input type="text" class="form-control" id="up_product_link">
              </div>
              <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" id="up_product_name">
              </div>
              <div class="mb-3">
                 <label class="form-label">Select Category</label>
                 <select id="up_category_id">
                  <option value="">--Select any--</option>
                 </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea id="up_desp" ></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Preview Image</label>
                <input type="file" class="form-control" id="up_preview">
                <div class="mb-3">
                  <img src="" id="perview_img" width="100" alt="">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Gallery Image</label>
                <input type="file" multiple class="form-control" id="up_gallery">
                <div class="mb-3" id="gallery_images">
                    <!-- Gallery images will be appended here -->
                </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info text-white up_product">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>