<?php $this->load->view('includes/header'); ?>
<!-- <?php $this->load->view('includes/nav'); ?> -->
<style type="text/css">
	.modal-backdrop.show {
	    opacity: 0.9;
	}
</style>
<div class="container" style="height: 90vh">
	<div class="row align-items-center h-100">
		<div class="col-12 py-5">
			<div class="card mb-3" style="max-width: auto;" data-event-id="<?= $event['event_id'] ?>">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="<?= base_url() ?>resources/images/uploads/<?= $event['event_image'] ?>" class="img-fluid rounded-lg">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h2 class="card-title"><?php echo $event['event_name']; ?></h2>
			        <p class="card-text"><i><small>This is still a beta test. Please allow us to transcript every inputted scores you made to backup your scores. You will be assisted by our staff.</small></i></p>
			        <small class="text-muted">Participants</small>
			        <div class="row">
			        	<div class="col-12">
			        		<table class="table table-borderless table-striped table-sm border-0"
						    id="get_participants"
							data-height="150"
						    data-toggle="table"
						    data-pagination="false">
						      <thead>
						        <tr>
						          <th data-formatter="Index" data-width="5"></th>
						          <th data-field="fname"></th>
						        </tr>
						      </thead>
						    </table>
			        	</div>
			        </div>
				    <div class="row pt-1">
				    	<div class="col-12 text-center text-sm-left">
				    		<button class="btn btn-success" id="btnStart">START JUDGING</button>
				    	</div>
				    </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<div id="scoreModal"></div>
</div>

<!-- <div class="bg-light fixed-bottom text-center">
  <small>The KM Project Judging Management System 2020</small>
</div> -->

<script type="text/javascript" src="<?=base_url(); ?>resources/js/range-judging.js"></script>
<?php $this->load->view('includes/footer'); ?>