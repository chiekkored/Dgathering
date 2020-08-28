<!-- Add event modal -->
      	<div id="addEvent" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  	<div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <span class="modal-title text-muted">Add Event</span>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="container">
			      		<form enctype="multipart/form-data" novalidate>
				      		<div class="row">
					      		<div class="col-sm-8">
					      			<div class="form-group">
					      				<label class="text-muted" for="event_name">Event Name</label>
					      				<input type="text" class="form-control need-validate" name="event_name" id="add_event_name" required>
					      			</div>
					      			<div class="row">
					      				<div class="col-6">
					      					<div class="form-group">
					      						<label class="text-muted" for="event_image">Event Image</label>
					      						<div class="custom-file">
					      							<input type="file" class="custom-file-input need-validate" name="event_image" id="event_image" required>
			  										<label class="custom-file-label text-truncate" for="event_image"><span id="#file-label">Choose file</span></label>
					      						</div>
					      					</div>
					      				</div>
					      				<div class="col-6">
					      					<div class="form-group">
					      						<label class="text-muted" for="event_time">Event Time</label>
					      						<input type="time" class="form-control need-validate" name="event_time" id="event_time" required>
					      					</div>
					      				</div>
					      			</div>
					      			<div class="form-group">
					      				<label class="text-muted" for="event_type">Event Type</label>
					      				<select class="custom-select" name="event_type" id="event_type" required>
										    <option selected disabled value="">Choose...</option>
										    <option value="1">Free Judging</option>
										    <option value="2">Percentage Criteria</option>
										    <option value="3">Score Range</option>
										    <option value="4">Ranking Based</option>
									  	</select>
					      			</div>
					      		</div>
					      		<div class="col-sm-4 text-center">
					      			<div class="row justify-content-center">
					      				<div class="datepicker" id="event_date"></div>
					      			</div>
					      			<div class="row justify-content-center">
					      				<small class="text-danger" id="validate-date"></small>
					      			</div>
					      		</div>
					      	</div>
					      	<div class="row">
					      		<div class="col-sm-6">
					      			<div class="form-group">
					      				<label class="text-muted" for="event_venue">Event Venue</label>
					      				<input type="text" class="form-control" name="event_venue" id="event_venue" />
					      				<small class="form-text text-muted">You can leave this blank</small>
					      			</div>
					      		</div>
					      		<div class="col-sm-6">
					      			<div class="form-group">
					      				<label class="text-muted" for="event_remarks">Event Remarks</label>
					      				<input type="text" class="form-control" name="event_remarks" id="event_remarks" placeholder="Make it short and precise" />
					      				<small class="form-text text-muted">You can leave this blank</small>
					      			</div>
					      		</div>
					      	</div>
					      	<div class="row">
					      		<div class="col-12">
					      			<div class="form-group">
					      				<label class="text-muted" for="event_guide">Event Mechanics/Guidelines</label>
					      				<textarea class="form-control need-validate" name="event_guide" id="event_guide" rows="2" required></textarea>
					      			</div>
					      		</div>
					      	</div>
					      	<div class="row">
					      		<div class="col-12">
					      			<div class="float-left pt-3">
					      				<span class="text-muted">Judges List</span>
					      			</div>
					      			<small>
					      				<table class="table table-borderless"
									    id="judges_list"
									    data-toggle="table"
										data-click-to-select="true"
										data-height="300"
									    data-url="<?= base_url() ?>cms/get_judges"
									    data-pagination="true">
									      <thead>
									        <tr>
									          <th data-field="state" data-checkbox="true"></th>
									          <th data-field="name">Name</th>
									        </tr>
									      </thead>
									    </table>
					      			</small>
					      		</div>
					      	</div>
					      	<div class="row">
					      		<div class="col-12" id="type-section">
					      		</div>
					      	</div>
				      	</form>
			      	</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
			        <button id="btnAddEvent" type="submit" class="btn btn-success">Add</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>