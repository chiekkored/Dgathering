<!-- Add user modal -->
        <div id="editUser" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <span class="modal-title text-muted">Edit User</span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form enctype="multipart/form-data" novalidate>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="txtEditFname">First Name</label>
                        <input type="text" class="form-control" id="txtEditFname">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="txtEditLname">Last Name</label>
                        <input type="text" class="form-control" id="txtEditLname">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label class="text-muted" for="txtEditUsername">Username</label>
                        <input type="text" class="form-control" id="txtEditUsername">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label class="text-muted" for="txtPassword">New Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" id="checkNewPass">
                          </div>
                        </div>
                        <input type="password" class="form-control" id="txtEditPassword" disabled>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label class="text-muted" for="txtPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="txtConfirmPassword" disabled>
                        <small id="pwValidate" class="form-text text-danger">Password does not match</small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label class="text-muted" for="txtEditRole">Role</label>
                          <select class="custom-select" name="txtEditRole" id="txtEditRole" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="Judge">Judge</option>
                          <option value="Administrator">Administrator</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label class="text-muted" for="Edituser_image">Image</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="Edituser_image" id="Edituser_image">
                        <label class="custom-file-label" for="event_image"><span id="#file-label">Choose file</span></label>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
              <button id="btnEdit" type="submit" class="btn btn-success">Edit</button>
            </div>
          </div>
        </div>
      </div>
    </div>