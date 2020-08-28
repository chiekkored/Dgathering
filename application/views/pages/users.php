<?php $this->load->view('includes/header'); ?>

<div class="container mx-5 mt-5" style="position: relative; z-index: 2;">
    <div class="card" style="width: 24rem;">
      <div class="card-body">
        <div class="row justify-content-center">
            REGISTER
        </div>
          <div class="my-1">
            <strong><div class="alert" role="alert"></div></strong>
          </div>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label class="text-muted" for="txtFname">First Name</label>
                <input type="text" class="form-control" id="txtFname">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="text-muted" for="txtLname">Last Name</label>
                <input type="text" class="form-control" id="txtLname">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
              </div>
            </div>
          </div>
          <div class="form-group my-3">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="txtUsername">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group my-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="txtPassword">
          </div>
          <div class="form-group my-3">
            <label for="exampleInputPassword1">Role</label>
            <input type="text" class="form-control" id="txtRole">
          </div>
          <div class="form-group my-3">
            <label>Image</label>
            <input type="file" name="user_image" id="user_image">
          </div>
        </form>
          <div class="my-2">
            <button id="btnRegister" type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
      <div class="card-footer">
        <small class="form-text text-muted">Powered and Developed by Chiekko Red Aliño</small>
      </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url(); ?>resources/js/users.js"></script>
<?php $this->load->view('includes/footer'); ?>
