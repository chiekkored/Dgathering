<!-- View event modal -->
  	<div id="viewEvent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header bg-info">
			        <span class="modal-title text-white">View Event</span>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
		      	<div class="modal-body">
			      	<div class="container">
			      		<div id="ph">
			      		</div>
			      		<div id="content">
			      			<div class="row">
				      			<div class="col-sm-8">
				      				<div class="row">
				      					<span id="status"></span>
				      					<span id="type"></span>
				      				</div>
				      				<div class="row" style="margin-bottom: -10px">
				      					<h2 id="title"></h2>
				      				</div>
				      				<div class="row border-bottom pb-2">
				      					<small class="form-text text-muted font-italic" id="meta-data"></small>
				      				</div>
				      				<div class="row mt-3">
				      					<div class="col-3">
				      						<div class="row pt-2 pb-2 text-muted">
				      							Judges
				      						</div>
				      						<div class="row py-2 text-muted">
				      							Event Date
				      						</div>
				      						<div class="row py-2 text-muted">
				      							Event Time
				      						</div>
				      						<div class="row pt-2 pb-2 text-muted">
				      							Event Venue
				      						</div>
				      					</div>
				      					<div class="col-9">
				      						<div class="row">
				      							<span id="judges"></span>
				      						</div>
				      						<div class="row py-2">
				      							<span class=" font-weight-bold" id="date"></span>
				      						</div>
				      						<div class="row py-2">
				      							<span class=" font-weight-bold" id="time"></span>
				      						</div>
				      						<div class="row py-2">
				      							<span class=" font-weight-bold" id="venue"></span>
				      						</div>
				      					</div>
				      				</div>
				      			</div>
				      			<div class="col-sm-4">
				      				<img src="../resources/images/uploads/" id="thumbnail" class="img-fluid">
				      			</div>
				      		</div>
				      		<div class="row">
				      			<div class="col-2">
				      				<div class="row pt-2 pb-2 text-muted">
		      							Remark
		      						</div>
				      				<div class="row pt-2 pb-2 text-muted">
		      							Mechanics/Guidelines
		      						</div>
				      			</div>
				      			<div class="col-10">
		      						<div class="row py-2">
		      							<span class=" font-weight-bold" id="remark"></span>
		      						</div>
				      			</div>
				      		</div>
				      		<div class="row">
				      			<div class="col-12 py-2">
				      				<div class="" id="guide"></div>
				      			</div>
				      		</div>
				      		<div class="row">
				      			<div class="col-12" id="Tblparticipants">
				      				<table class="table table-borderless table-striped border-0"
								    id="get_participants"
								    data-toggle="table"
								    data-pagination="true">
								      <thead>
								        <tr>
								          <th data-formatter="Index" data-width="5"></th>
								          <th data-field="fname">Participants Name</th>
								          <th data-field="bname">Battle Name</th>
								          <th data-field="hometown">Hometown</th>
								          <th data-formatter="remark">Remarks</th>
								        </tr>
								      </thead>
								    </table>
				      			</div>
				      		</div>
				      		<div class="row">
				      			<div class="col-12 border-top mt-2" id="Tblwinners">
				      				<div class="row">
				      					<h4>Ranks</h4>
				      					<a data-target="#viewEvent-detailed" class="btn btn-link btn-sm text-info" href="#" data-toggle="modal" id="view_detailed"><small>View Detailed</small></a>
				      				</div>
				      				<table class="table table-borderless table-striped border-0"
								    id="get_win"
								    data-toggle="table"
								    data-pagination="true">
								      <thead>
								        <tr>
								          <th data-formatter="Index" data-width="5" data-cell-style="rowStyle">Rank</th>
								          <th data-field="fname" data-cell-style="rowStyle">Participants Name</th>
								          <th data-formatter="toDecimal" data-cell-style="rowStyle">Scores</th>
								        </tr>
								      </thead>
								    </table>
				      			</div>
				      		</div>
			      		</div>
			      	</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
			      </div>
			    </div>
		  	</div>
		</div>
	</div>