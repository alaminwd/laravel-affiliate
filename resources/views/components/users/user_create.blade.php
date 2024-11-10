<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="create_user" tabindex="-1" aria-labelledby="create_user" aria-hidden="true">
    <div class="modal-dialog">
      <form id="addUser">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white" id="create_user">Create User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info add_user">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>