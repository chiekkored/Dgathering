<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>
<?php $this->load->view('includes/vertical-nav'); ?>

      <div class="bg-white card mx-3 my-3 px-4 shadow-sm">
        <h1 class="py-3"><i class="fa fa-th-large"></i> Dashboard</h1>
        <!-- <small class="text-muted">Overview</small> -->
        <div class="pb-3">
        	<div class="card border-0">
	        	<div class="card-body">
	        		<div class="row text-center">
	        			<div class="col-3 border-right">
	        				<div class="row ">
	        					<div class="col">
	        						<h1 class="text-info" id="judgesCount"></h1>
	        					</div>
	        					<div class="col-7 mx-2">
	        						<div class="row">
	        							Judges
	        						</div>
	        						<div class="row">
	        							Registered
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        			<div class="col-3 border-right">
	        				<div class="row ">
	        					<div class="col">
	        						<h1 class="text-info" id="guestsCount"></h1>
	        					</div>
	        					<div class="col-7 mx-2">
	        						<div class="row">
	        							Guests
	        						</div>
	        						<div class="row">
	        							<b>Today</b>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        			<div class="col-3 border-right">
	        				<div class="row ">
	        					<div class="col">
	        						<h1 class="text-info" id="eventsCount"></h1>
	        					</div>
	        					<div class="col-7 mx-2">
	        						<div class="row">
	        							Events
	        						</div>
	        						<div class="row">
	        							Upcoming
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        			<div class="col-3">
	        				<div class="row ">
	        					<div class="col">
	        						<h1 class="text-info" id="eventsTotal"></h1>
	        					</div>
	        					<div class="col-7 mx-2">
	        						<div class="row">
	        							Events
	        						</div>
	        						<div class="row">
	        							Total
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
        </div>
      </div>

  	<div class="container-fluid row" style="width: auto;">
      	<div class="col">
	        <div class="pb-3">
	        	<div class="card">
	        		<div class="card-header">
	        			<small class="text-muted">Recent Activity</small>
	        		</div>
		        	<div class="card-body">
		        		<table id="tblLogs" class="table table-borderless">
			              <tbody>
			              </tbody>
			            </table>
		        	</div>
		        </div>
	        </div>
	      </div>
      	<div class="col">
	        <div class="pb-3">
	        	<div class="card shadow-sm">
	        		<div class="card-header">
	        			<small class="text-muted">Scheduled Events</small>
	        		</div>
		        	<div class="card-body">
		        		<div class="row mx-auto">
		        			<div class="col-xl-5">
		        				<div class="datepicker" id="eventdates"></div>
		        			</div>
		        			<div class="col-xl-7">
		        				<table id="tblEvents" class="table table-striped table-sm">
		        					<thead>
									    <tr>
									      <th scope="col">Date</th>
									      <th scope="col">Event Name</th>
									    </tr>
								  	</thead>
					              <tbody>
					              </tbody>
					            </table>
		        			</div>
		        		</div>
		        	</div>
		        </div>
	        </div>
	      </div>
      	</div>
  	</div>

<?php $this->load->view('includes/vertical-footer'); ?>
<script type="text/javascript" src="<?=base_url(); ?>resources/js/cms-home.js"></script>
<?php $this->load->view('includes/footer'); ?>