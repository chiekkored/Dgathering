<!-- Add event modal -->
      	<div id="addParticipants" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  	<div class="modal-dialog modal-xl" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <span class="modal-title text-muted">Add Participants</span>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="container">
			      		<form enctype="multipart/form-data" novalidate>
				      		<div class="row">
					      		<div class="col-12">
					      			<div class="form-group">
					      				<label class="text-muted" for="event_type">Event</label>
					      				<select class="custom-select" name="event_name_dropdown" id="event_name_dropdown" required>
										    <option selected disabled value="">Choose...</option>
									  	</select>
					      			</div>
					      		</div>
					      	</div>
					      	<div class="row">
					      		<div class="col-12">
					      			<div class="row py-3">
				      					<div class="col-12 d-inline">
				      						<label>Participants</label> <button type="button" id="addParticipantsField" class="btn btn-info btn-sm"><i class="fa fa-plus-square"></i></button>
				      					</div>
				      				</div>
					      			<div id="addRowParticipants">
					      			</div>
					      		</div>
					      	</div>
				      	</form>
			      	</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
			        <button id="btnAddParticipants" type="submit" class="btn btn-success">Add</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>