<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="container bg-white mt-3 py-3">
  
  <div class="row text-center">
    <div class="col-12">
      <div class="row">
        <div class="col-12">
          <img src="./resources/images/uploads/<?= $user['user_image'] ?>" class="animated zoomIn logo rounded-circle" alt="...">
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h3>Welcome <?= $this->session->userdata('SESS_FNAME') ?></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <p class="py-2 text-muted">Please choose an option to proceed.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12 px-5">
          <div class="card-deck">
            <a class="card shadow choice" id="card-choice" href="">
              <div class="mx-auto">
                <p class="pt-3 text-black-50">DASHBOARD</p>
                <img src="resources/images/Dashboard.png" class="animated rotateIn card-img-top thumb" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">CHECK DASHBOARD</h5>
                <p class="card-text pb-3">Monitor participant's performances and scores.</p>
                <!-- <button class="btn btn-warning btn-block my-3" style="border-radius: 12px">START NOW</button> -->
              </div>
            </a>
            <a class="card shadow choice" id="card-choice" href="events">
              <div class="mx-auto">
                <p class="pt-3 text-black-50">JUDGE</p>
                <img src="resources/images/Judge.png" class="animated rotateIn card-img-top thumb" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">BEGIN JUDGING</h5>
                <p class="card-text pb-3">Click here to proceed to judging system.</p>
                <button class="btn btn-warning btn-block text-white my-3" style="border-radius: 12px">START NOW</button>
              </div>
            </a>
            <a class="card shadow choice" id="card-choice" href="">
              <div class="mx-auto">
                <p class="pt-3 text-black-50">HISTORY</p>
                <img src="resources/images/History.png" class="animated rotateIn card-img-top thumb" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">INSPECT HISTORY</h5>
                <p class="card-text pb-3">Explore past event's scores and winners.</p>
                <!-- <button class="btn btn-warning btn-block my-3" style="border-radius: 12px">START NOW</button> -->
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- <div class="bg-light fixed-bottom text-center">
  <small>The KM Project Judging Management System 2020</small>
</div> -->
<script type="text/javascript" src="<?=base_url(); ?>resources/js/home.js"></script>
<?php $this->load->view('includes/footer'); ?>