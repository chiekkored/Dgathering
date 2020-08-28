<!-- Add user modal -->
        <div id="addUser" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <span class="modal-title text-muted">Add User</span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form enctype="multipart/form-data" novalidate>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label class="text-muted" for="txtFname">First Name</label>
                        <input type="text" class="form-control" id="txtFname" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label class="text-muted" for="txtLname">Last Name</label>
                        <input type="text" class="form-control" id="txtLname" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label class="text-muted" for="txtUsername">Username</label>
                        <input type="text" class="form-control" id="txtUsername" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label class="text-muted" for="txtPassword">Password</label>
                        <input type="password" class="form-control" id="txtPassword" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label class="text-muted" for="txtRole">Role</label>
                          <select class="custom-select" name="txtRole" id="txtRole" required>
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
                        <label class="text-muted" for="user_image">Image</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="user_image" id="user_image" required>
                        <label class="custom-file-label" for="event_image"><span id="#file-label">Choose file</span></label>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
              <button id="btnRegister" type="submit" class="btn btn-success">Register</button>
            </div>
          </div>
        </div>
      </div>
    </div>