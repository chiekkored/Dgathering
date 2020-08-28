<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>
<?php $this->load->view('includes/vertical-nav'); ?>
<?php $this->load->view('includes/modals/events/add'); ?>
<?php $this->load->view('includes/modals/events/add-participants'); ?>
<?php $this->load->view('includes/modals/events/view'); ?>
<?php $this->load->view('includes/modals/events/view-detailed'); ?>
<?php $this->load->view('includes/modals/events/edit'); ?>

  	<div class="bg-white card my-3 px-4 mx-3 shadow-sm">
        <h1 class="py-3">
        	<svg class="bi bi-calendar pb-2" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>
			  <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
			</svg> Events List</h1>
	</div>
	<div class="bg-white card py-3 my-3 px-4 mx-3 shadow-sm">
        <div class="row">
			<div class="col-12 pb-3">
			  <div id="events-toolbar">
			  	<a class="btn btn-success rounded-pill" href="#" data-toggle="modal"
		          data-target="#addEvent">
	          		<span class="d-sm-block d-md-none"><i class="fa fa-calendar-plus-o fa-lg"></i></span>
		          	<span class="d-none d-md-block"><i class="fa fa-calendar-plus-o"></i> Add Event</span>
		        </a>
			  	<a class="btn btn-primary rounded-pill" href="#" data-toggle="modal" id="addEventParticipants"
		          data-target="#addParticipants">
	          		<span class="d-sm-block d-md-none"><i class="fa fa-user-plus fa-lg"></i></span>
		          	<span class="d-none d-md-block"><i class="fa fa-user-plus"></i> Add Participants</span>
		        </a>
			  </div>
			  <span id="event-loading">
			    <div class="text-center">
			      <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
			        <span class="sr-only">Loading...</span>
			      </div>
			    </div>
			  </span>
			  <table
			    id="events_list"
			    data-toggle="table"
			    data-toolbar="#events-toolbar"
			    data-auto-refresh="false"
			    data-auto-refresh-silent="true"
			    data-auto-refresh-interval="10"
			    data-url="<?= base_url() ?>cms/get_all"
			    data-pagination="true"
			    data-search="true">
			      <thead>
			        <tr>
			          <th data-formatter="Image" data-width="25"></th>
			          <th data-field="event_name" data-width="300">Event Name</th>
			          <th data-formatter="fDate">Date</th>
			          <th data-field="event_remarks">Remarks</th>
			          <th data-formatter="Status" >Status</th>
			          <th data-field="operate" data-formatter="TableActions" data-events="operateEvents">Action</th>
			        </tr>
			      </thead>
			    </table>
			</div>
		</div>
      </div>

<?php $this->load->view('includes/vertical-footer'); ?>
<script type="text/javascript" src="<?=base_url(); ?>resources/js/cms-events.js"></script>
<?php $this->load->view('includes/footer'); ?>