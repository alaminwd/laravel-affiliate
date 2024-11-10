<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="create_product" tabindex="-1" aria-labelledby="product_head" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px;">
        <form id="addProduct">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="product_head">Create Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Product Link</label>
                        <input type="text" class="form-control" id="product_link">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Category</label>
                        <select id="category_id">
                            <option value="">--Select any--</option>
                        </select>
                    </div>
                    <div class="mb-3 position-relative">
                        <label class="form-label">Description</label>
                        <textarea id="desp"></textarea>
                        <div id="desp-suggestions" class="suggestions-box"></div> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preview Image</label>
                        <input type="file" class="form-control" id="preview">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gallery Image</label>
                        <input type="file" multiple class="form-control" id="gallery">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info text-white add_product">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
