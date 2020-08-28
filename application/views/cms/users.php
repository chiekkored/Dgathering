<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>
<?php $this->load->view('includes/vertical-nav'); ?>
<?php $this->load->view('includes/modals/users/add'); ?>
<?php $this->load->view('includes/modals/users/edit'); ?>

  	<div class="bg-white card mx-3 my-3 px-4 shadow-sm">
        <h1 class="py-3"><i class="fa fa-users"></i> Users</h1>
    </div>
        <!-- <span class="text-muted">Overview</span> -->
    <div class="bg-white card mx-3 my-3 px-4 shadow-sm">
        <div class="py-3">
    		<div class="row">
    			<div id="users-toolbar">
				  	<a class="btn btn-success rounded-pill" href="#" data-toggle="modal"
			          data-target="#addUser">
		          		<span class="d-sm-block d-md-none"><i class="fa fa-user-plus fa-lg"></i></span>
			          	<span class="d-none d-md-block"><i class="fa fa-user-plus"></i> Add User</span>
			        </a>
    			</div>
        		<div class="col-12">
        			<table class="table table-borderless"
					  	id="users_list"
					  	data-toggle="table"
					    data-toolbar="#users-toolbar"
					    data-pagination="true"
					    data-search="true"
					  	data-url="<?= base_url() ?>cms/get_users">
					  	<thead>
						    <tr>
								<th data-formatter="Image" data-width="25"></th>
								<th data-field="f_name" data-width="200">Name</th>
								<th data-field="username">Username</th>
								<th data-field="role">Role</th>
								<th data-field="operate" data-formatter="TableActions" data-events="operateEvents">Actions</th>
						    </tr>
					  	</thead>
					</table>
        		</div>
    		</div>
        </div>
      </div>

<?php $this->load->view('includes/vertical-footer'); ?>
<script type="text/javascript" src="<?=base_url(); ?>resources/js/cms-users.js"></script>
<?php $this->load->view('includes/footer'); ?>