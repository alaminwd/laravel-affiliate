<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="text-white">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" id="user_name" class="form-control" value="{{Auth::user()->name}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control" value="{{Auth::user()->email}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" id="user_pass" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-info text-white up_profile">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="text-white">Update Profile Photo</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Profile Photo</label>
                            <input type="file" id="photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-info text-white profile_photo">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>