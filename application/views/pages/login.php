<?php $this->load->view('includes/header'); ?>
<!-- <div class="bg-video">
    <video autoplay muted loop id="myVideo">
          <source src="./resources/videos/bg-video.mp4" type="video/mp4">
    </video>
</div> -->

<div class="container">
    <div class="row mt-5">
      <div class="col-12 mt-5  d-flex justify-content-center">
        <div class="card" style="width: 24rem;">
          <div class="card-body">
            <div class="row justify-content-center">
                <img src="resources/images/logo.png" class="thumb">
            </div>
              <div class="my-1">
                <strong><div class="alert" role="alert"></div></strong>
              </div>
            <form class="form" method="post">
              <label for="txtPassword">Username</label>
              <div class="input-group">
                <input type="text" class="form-control border-right-0" id="txtUsername">
                <div class="input-group-append">
                  <span class="input-group-text bg-transparent">
                      <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                      </svg>
                    </span>
                </div>
              </div>
              <label for="txtPassword">Password</label>
              <div class="input-group">
                <input type="password" class="form-control border-right-0" id="txtPassword">
                <div class="input-group-append">
                  <span class="input-group-text bg-transparent">
                      <svg class="bi bi-lock-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                        <rect width="11" height="9" x="2.5" y="7" rx="2"/>
                        <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 117 0v3h-1V4a2.5 2.5 0 00-5 0v3h-1V4z" clip-rule="evenodd"/>
                      </svg>
                    </span>
                </div>
              </div>
              <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> -->
              <div class="my-2">
                <button id="btnLogin" type="submit" class="btn btn-primary">Login</button>
                <div class="float-right">
                    <!-- <a href="<?=base_url(); ?>users"><small>Login as Guest</small></a> -->
                    <button id="btnLoginAsGuest" type="button" class="btn btn-link"><small>Login as Guest</small></button>
                </div>
              </div>
          </div>
          <div class="card-footer">
            <small class="form-text text-muted">Powered and developed by Chiekko Red Aliño</small>
          </div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url(); ?>resources/js/auth.js"></script>
<?php $this->load->view('includes/footer'); ?>
