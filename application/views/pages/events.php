<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-12">
      <div class="pt-5 px-3">
        <h3><i class="fas fa-calendar-day"></i> Event List</h3>
        <span id="message"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <span id="event-loading">
        <div class="text-center">
          <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
      </span>
      <table class="table table-borderless table-striped" 
        id="events_list"
        data-toggle="table"
        data-auto-refresh="true"
        data-auto-refresh-silent="true"
        data-url="events/get"
        data-pagination="true"
        data-search="true">
          <thead>
            <tr>
              <th data-field="event_name" data-width="600">Event Name</th>
              <th data-field="event_date">Date</th>
              <th data-field="event_time">Time</th>
              <th data-field="created_by">Created By</th>
              <th data-field="operate" data-formatter="TableActions" data-events="operateEvents">Action</th>
            </tr>
          </thead>
        </table>
    </div>
  </div>
</div>
<!-- <div class="bg-light fixed-bottom text-center">
  <small>The KM Project Judging Management System 2020</small>
</div> -->
<script type="text/javascript" src="<?=base_url(); ?>resources/js/events.js"></script>
<?php $this->load->view('includes/footer'); ?>