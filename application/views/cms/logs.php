<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>
<?php $this->load->view('includes/vertical-nav'); ?>

  	<div class="bg-white card mx-3 my-3 px-4 shadow-sm">
        <h1 class="py-3"><i class="fa fa-users"></i> Logs</h1>
    </div>
        <!-- <span class="text-muted">Overview</span> -->
    <div class="bg-white card mx-3 my-3 px-4 shadow-sm">
        <div class="py-3">
    		<div class="row">
        		<div class="col-12">
        			<table id="tblLogs" class="table table-striped table-sm">
		              <tbody>
		              </tbody>
		            </table>
        		</div>
    		</div>
        </div>
      </div>

<?php $this->load->view('includes/vertical-footer'); ?>
<script type="text/javascript" src="<?=base_url(); ?>resources/js/cms-logs.js"></script>
<?php $this->load->view('includes/footer'); ?>