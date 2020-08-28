$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});


$('#event_date').datepicker({
  todayHighlight: true,
  format: 'yyyy/mm/dd',
  toggleActive: true,
  multidate: 2,
  startDate: "now()"
});


$('#event_date_edit').datepicker({
  todayHighlight: true,
  format: 'yyyy/mm/dd',
  toggleActive: true,
  multidate: 2,
  startDate: "now()"
});

$('#tblview_detailed').bootstrapTable({
  formatNoMatches: function () {
    return ''
  }
});

viewIcon = '<svg class="bi bi-info-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
  <path fill-rule="evenodd" d="M8 16A8 8 0 108 0a8 8 0 000 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>\
</svg>'

editIcon = '<svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
  <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>\
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>\
</svg>'

groupIcon = '<svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>\
</svg>'

pauseIcon = '<svg class="bi bi-pause-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
  <path d="M5.5 3.5A1.5 1.5 0 017 5v6a1.5 1.5 0 01-3 0V5a1.5 1.5 0 011.5-1.5zm5 0A1.5 1.5 0 0112 5v6a1.5 1.5 0 01-3 0V5a1.5 1.5 0 011.5-1.5z"/>\
</svg>'

playIcon = '<svg class="bi bi-caret-right-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
  <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 011.659-.753l5.48 4.796a1 1 0 010 1.506z"/>\
</svg>'

//On change criteria dropdown
var percentageSection = '<div id="selected-type"><fieldset class="border p-2">\
                    <legend class="w-auto text-muted">Criteria List <button type="button" id="addPercentField" class="btn btn-info btn-sm"><i class="fa fa-plus-square"></i></button></legend>\
                    <div class="row">\
                      <div class="col-8">\
                        <div class="form-group">\
                          <label class="text-muted">Criteria Name</label>\
                          <input type="text" class="form-control" name="criteria" required>\
                        </div>\
                      </div>\
                      <div class="col-4">\
                        <label class="text-muted">Percentage</label>\
                        <div class="input-group">\
                          <input type="number" class="form-control" name="percent" id="percentage" required>\
                          <div class="input-group-append">\
                          <span class="input-group-text">%</span>\
                        </div>\
                        </div>\
                      </div>\
                    </div>\
                    <div id="criteria-inputs"></div>\
                  </fieldset>\
                  <div class="row justify-content-end">\
                    <div class="col-3">\
                      <div class="input-group">\
                            <input type="text" class="form-control border-0" id="total" disabled>\
                            <div class="input-group-append">\
                                <span class="input-group-text border-0">%</span>\
                          </div>\
                        </div>\
                    </div>\
                  </div></div>';

var rangeSection = '<div id="selected-type"><fieldset class="border p-2">\
                    <legend class="w-auto text-muted">Range List <button type="button" id="addRangeField" class="btn btn-info btn-sm"><i class="fa fa-plus-square"></i></button></legend>\
                    <div class="row">\
                      <div class="col-12">\
                        <div class="row justify-content-start">\
                          <div class="col-4">\
                            <div class="form-group">\
                              <label class="text-muted">Max Range</label>\
                              <input type="number" class="form-control" name="max_range" id="max_range">\
                            </div>\
                          </div>\
                        </div>\
                        <div class="form-group">\
                          <label class="text-muted">Criteria Name</label>\
                          <input type="text" class="form-control" name="criteria" required>\
                        </div>\
                      </div>\
                    </div>\
                    <div id="range-inputs"></div>';
var inputfield = '<div id="type-row"><div class="row">\
                        <div class="col-1">\
                          <button type="button" id="removePercentField" class="btn btn-danger"><i class="fa fa-close"></i></button>\
                        </div>\
                        <div class="col-7">\
                          <div class="form-group">\
                            <input type="text" class="form-control" name="criteria" id="criteria" required>\
                          </div>\
                        </div>\
                        <div class="col-4">\
                          <div class="input-group">\
                            <input type="number" class="form-control" name="percent" id="percentage" required>\
                            <div class="input-group-append">\
                            <span class="input-group-text">%</span>\
                          </div>\
                          </div>\
                        </div>\
                      </div></div>';
var inputRangefield = '<div id="type-row"><div class="row">\
                                <div class="col-1">\
                                  <button type="button" id="removeRangeField" class="btn btn-danger"><i class="fa fa-close"></i></button>\
                                </div>\
                                <div class="col-11">\
                                  <div class="form-group">\
                                    <input type="text" class="form-control" name="criteria" required>\
                                  </div>\
                                </div>\
                              </div></div>';
//Toggle to Active, Pending or Done; View; Edit; Dropdown Cancel Event or Delete Event
//0 = pending, 1 = active, 2 = done, 3 = cancelled, 4 = deleted
function TableActions (value, row, index) {
  if (row.event_status != 3) {
    if (row.event_status == 0) {
      statusReturn = ['<div class="btn-group btn-group-toggle pr-1" data-toggle="buttons">\
                        <label class="btn btn-light active">\
                          <input type="radio" class="btnPause" name="options" id="option2" checked>'+pauseIcon+'\
                        </label>\
                        <label class="btn btn-light">\
                          <input type="radio" class="btnPlay" name="options" id="option3">'+playIcon+'\
                        </label>\
                      </div>'];
      editReturn = ['<a class="btn btn-warning text-white btnEdit">\
                      '+editIcon+'<span class="d-none d-md-inline"> Edit</span>\
                    </a>'];                
    }else if (row.event_status == 1) {
      statusReturn = ['<div class="btn-group btn-group-toggle pr-1" data-toggle="buttons">\
                        <label class="btn btn-light">\
                          <input type="radio" class="btnPause" name="options" id="option2">'+pauseIcon+'\
                        </label>\
                        <label class="btn btn-light active">\
                          <input type="radio" class="btnPlay" name="options" id="option3" checked>'+playIcon+'\
                        </label>\
                      </div>\
                      <a class="btn btn-success text-white mr-1 btnDone">\
                        <i class="fa fa-check"></i><span class="d-lg-none d-lg-none d-inline"> Done</span>\
                      </a>'];
      editReturn = [''];
    }else if (row.event_status == 2) {
      statusReturn = [''];
      editReturn = [''];
    }
    return [statusReturn+'<div class="btn-group">\
          <a class="btn btn-info text-white btnView">\
                '+viewIcon+'<span class="d-none d-md-inline"> View</span>\
              </a>\
          '+editReturn+'\
            <div class="btn-group">\
              <button id="btnGroup" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\
              '+groupIcon+'<span class="d-none d-md-inline"> Drop</span>\
              </button>\
            <div class="dropdown-menu">\
              <a class="dropdown-item btnCancel" href="">Cancel Event</a>\
              <a class="dropdown-item text-danger font-weight-bold btnRemove" href="">Remove</a>\
            </div>\
          </div>\
        </div>'
    ].join('');
  }else{
    return ['<a class="btn btn-info text-white btnView">\
              '+viewIcon+'<span class="d-none d-md-inline"> View</span>\
            </a>'].join('');
  }
}

function Status (value, row, index) {
  if (row.event_status == 0) {
    return [
      '<div class="text-center">\
        <span class="badge badge-secondary">Pending</span>\
      </div>'
  ].join('');

  }else if (row.event_status == 1) {
    return [
      '<div class="text-center">\
        <span class="badge badge-primary">Active</span>\
      </div>'
  ].join('');

  }else if (row.event_status == 2) {
    return [
      '<div class="text-center">\
        <span class="badge badge-success">Success</span>\
      </div>'
  ].join('');

  }else if (row.event_status == 3) {
    return [
      '<div class="text-center">\
        <span class="badge badge-danger">Cancelled</span>\
      </div>'
  ].join('');
  }
}

function Image (value, row, index) {
  return [
      '<div class="text-center">\
        <img src="../resources/images/uploads/'+row.event_image+'" class="rounded" style="height: 25px; width: auto;">\
      </div>'
  ].join('');
}

function fDate (value, row, index) {
  if (row.c_edate != null) {
    return [
        row.c_date+' - '+row.c_edate
    ].join('');
  } else {
    return [
        row.c_date+', '+new Date().getFullYear()
    ].join('');
  }
}

function Index (value, row, index) {
  return [
      index + 1
  ].join('');
}

function remark (value, row, index) {
  var res = row.remark.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    if(res == null)
      return [
          row.remark
      ].join('');
    else
      return [
          '<a href="'+row.remark+'" target="_blank" class="d-inline-block text-truncate" style="max-width: 200px;">'+row.remark+'</a>'
      ].join('');
}

function rowStyle (value, row, index) {
  if (index == 0) {
      return {
        classes: 'bg-warning',
        css: {
          color: 'white'
        }
      }
    }
    return '';
}

function toDecimal (value, row, index) {
  return [
      parseFloat(row.score).toFixed(1)
  ].join('');
}

var $table = $('#events_list');
var $judge_table = $('#judges_list');
var $edit_judge_table = $('#edit_judges_list');

window.operateEvents = {
    'click .btnPause': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for toggling inactive
      $.ajax({
      url : '../cms/toggle_inactive',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        event_id : row.event_id,
        event_name : row.event_name
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Pausing Event',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        $table.bootstrapTable('refresh');
        Swal.close();
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: row.event_name+' paused successfully'
        })
      },
      error : function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong!',
        });
        // Log the status
        console.error(textStatus);
        // Log the error response object
        console.error(jqXHR);
        // Log error thrown
        console.error(errorThrown);
      }
    });
    },
    'click .btnPlay': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for starting the event
      $.ajax({
      url : '../cms/toggle_active',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        event_id : row.event_id,
        event_name : row.event_name
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Activating Event',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        $table.bootstrapTable('refresh');
        Swal.close();
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: row.event_name+' started successfully'
        })
      },
      error : function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong!',
        });
        // Log the status
        console.error(textStatus);
        // Log the error response object
        console.error(jqXHR);
        // Log error thrown
        console.error(errorThrown);
      }
    });
    },
    'click .btnDone': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for closing the event
      $.ajax({
      url : '../cms/event_done',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        event_id : row.event_id,
        event_name : row.event_name
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Finishing Event',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        $table.bootstrapTable('refresh');
        Swal.close();
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: row.event_name+' finished successfully'
        })
      },
      error : function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong!',
        });
        // Log the status
        console.error(textStatus);
        // Log the error response object
        console.error(jqXHR);
        // Log error thrown
        console.error(errorThrown);
      }
    });
    },
    'click .btnView': function (e, value, row, index) {
      e.preventDefault();
      $('#viewEvent #content').hide();
      $('#viewEvent #ph').html('<div class="ph-item" style="border: 0px !important"><div class="ph-col-8"><div class="ph-row"><div class="ph-col-4"></div><div class="ph-col-8 empty"></div><div class="ph-col-8 big"></div><div class="ph-col-4 empty big"></div><div class="ph-col-2"></div><div class="ph-col-2 empty"></div><div class="ph-col-2"></div><div class="ph-col-6 empty"></div><div class="ph-col-2"></div><div class="ph-col-2 empty"></div><div class="ph-col-2"></div><div class="ph-col-6 empty"></div><div class="ph-col-2"></div><div class="ph-col-2 empty"></div><div class="ph-col-2"></div><div class="ph-col-6 empty"></div><div class="ph-col-4"></div><div class="ph-col-8 empty"></div></div></div><div class="ph-col-4"><div class="ph-picture"></div></div><div class="ph-col-12"><div class="ph-picture"></div></div></div>');
      // Show the modal box
      $('#viewEvent').modal('show');

      //Ajax for view modal
      $.ajax({
      url : '../cms/get_event',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        event_id : row.event_id
      },
      success : function(data, textStatus, jqXHR) {
        const eventData = data['event_details'][0];

        $('#viewEvent #ph').html('');
        $('#viewEvent #content').show();

        // Add an ID for the currently opened modal box
        $('#viewEvent').attr('data-user-id', row.event_id);
        console.log(data['winners']);
        if (data['event_details'][0].event_status == 2 && data['winners'] != '') {
          $('#viewEvent #Tblwinners').show();
          $('#viewEvent #Tblparticipants').hide();
          $('#get_win').bootstrapTable('load', data['winners']);
        } else {
          $('#viewEvent #Tblparticipants').show();
          $('#viewEvent #Tblwinners').hide();
          $('#get_participants').bootstrapTable('load', data['participants']);
        }
        
        //View data
        //Status badge
        if (eventData.event_status == 0) {
          $('#viewEvent #status').removeClass();
          $('#viewEvent #status').html('Pending');
          $('#viewEvent #status').addClass('badge badge-secondary');

        }else if (eventData.event_status == 1) {
          $('#viewEvent #status').removeClass();
          $('#viewEvent #status').html('Active');
          $('#viewEvent #status').addClass('badge badge-primary');

        }else if (eventData.event_status == 2) {
          $('#viewEvent #status').removeClass();
          $('#viewEvent #status').html('Done');
          $('#viewEvent #status').addClass('badge badge-success');

        }else if (eventData.event_status == 3) {
          $('#viewEvent #status').removeClass();
          $('#viewEvent #status').html('Cancelled');
          $('#viewEvent #status').addClass('badge badge-danger');
        }

        //Type badge
        if (eventData.event_type == 1) {
          $('#viewEvent #type').removeClass();
          $('#viewEvent #type').html('Free Judging');
          $('#type').addClass('badge badge-secondary mx-2');

        }else if (eventData.event_type == 2) {
          $('#viewEvent #type').removeClass();
          $('#viewEvent #type').html('Percentage Criteria');
          $('#viewEvent #type').addClass('badge badge-secondary mx-2');

        }else if (eventData.event_type == 3) {
          $('#viewEvent #type').removeClass();
          $('#viewEvent #type').html('Score Range');
          $('#viewEvent #type').addClass('badge badge-secondary mx-2');

        }else if (eventData.event_type == 4) {
          $('#viewEvent #type').removeClass();
          $('#viewEvent #type').html('Ranking Based');
          $('#viewEvent #type').addClass('badge badge-secondary mx-2');

        }

        //check if there's end date
        eventData.c_edate ? edate = ' - '+eventData.c_edate : edate = '';

        $('#viewEvent #title').html(eventData.event_name);
        $('#viewEvent #meta-data').html('<i class="fa fa-clock-o"></i> '+eventData.c_created+' | <i class="fa fa-user"></i> '+eventData.created_by);
        $('#viewEvent #thumbnail').attr("src", '../resources/images/uploads/'+eventData.event_image);
        $('#viewEvent #date').html(eventData.c_date + edate);
        $('#viewEvent #time').html(eventData.c_time);
        $('#viewEvent #venue').html(eventData.event_venue);
        $('#viewEvent #judges').html('<span id="j-images"></span>');
        $('#viewEvent #remark').html(eventData.event_remarks);
        $('#viewEvent #guide').html(eventData.event_guide);
        for (var i = 0; i < data['judges'].length; i++) {
          if (data['judges'][i].je_status == 2) {
            $('#viewEvent #j-images').append('<img src="../resources/images/uploads/'+data['judges'][i].user_image+'"\
            class="rounded-circle mr-2 border border-success" style="width: 40px; height: 40px; border-width:3px !important" data-toggle="tooltip" title="'+data['judges'][i].fname+' '+data['judges'][i].lname+'">');
          } else {
            $('#viewEvent #j-images').append('<img src="../resources/images/uploads/'+data['judges'][i].user_image+'"\
           class="rounded-circle mr-2 border border-danger" style="width: 40px; height: 40px; border-width:3px !important" data-toggle="tooltip" title="'+data['judges'][i].fname+' '+data['judges'][i].lname+'">');
          }
          
        }
        $('[data-toggle="tooltip"]').tooltip();
      },
      error : function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong!',
        });
        // Log the status
        console.error(textStatus);
        // Log the error response object
        console.error(jqXHR);
        // Log error thrown
        console.error(errorThrown);
      }
    });
    },
    'click .btnEdit': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for Edit modal
      $.ajax({
      url : '../cms/get_event',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        event_id : row.event_id
      },
      success : function(data, textStatus, jqXHR) {

        const eventData = data['event_details'][0];

        // Show the modal box
        $('#editEvent').modal('show');
        // Add an ID for the currently opened modal box
        $('#editEvent').attr('data-user-id', row.event_id);
        $edit_judge_table.bootstrapTable('uncheckAll');
        var checked_judges = []
        for (var i = 0; i < data['judges'].length; i++) {
          checked_judges.push(data['judges'][i].judge_id);
        }

        var dates = [];
        dates.push(eventData.event_startDate, eventData.event_endDate);

        $edit_judge_table.bootstrapTable('checkBy', {field: 'user_id', values: checked_judges});
        $('#event_date_edit').datepicker('setDates', dates);
        $('#editEvent #edit_event_name').val(eventData.event_name);
        $('#editEvent #edit_event_time').val(eventData.event_time);
        $('#editEvent #edit_event_type').val(eventData.event_type);
        $('#editEvent #edit_event_venue').val(eventData.event_venue);
        $('#editEvent #edit_event_remarks').val(eventData.event_remarks);
        $('#editEvent #edit_event_guide').summernote('code', eventData.event_guide);

        $('#edit_get_participants').bootstrapTable('load', data['participants']);


        if (eventData.event_type === '1') {
          $('#editEvent #selected-type').remove();
        }else if (eventData.event_type === '2') {
          totalP = 0;
          $('#editEvent #selected-type').remove();
          $('#editEvent #type-section').append('<div id="selected-type"><fieldset class="border p-2">\
                    <legend class="w-auto text-muted">Criteria List</legend>\
                    <small class="text-muted font-italic">*Editing critera is strictly prohibited</small>\
                    <div id="criteria-inputs"></div>\
                  </fieldset>\
                  <div class="row justify-content-end">\
                    <div class="col-3">\
                      <div class="input-group">\
                            <input type="text" class="form-control border-0" id="total" disabled>\
                            <div class="input-group-append">\
                                <span class="input-group-text border-0">%</span>\
                          </div>\
                        </div>\
                    </div>\
                  </div></div>');
          for (var i = 0; i < data['criteria'].length; i++) {
            $('#editEvent #criteria-inputs').append('<div id="type-row"><div class="row">\
                        <div class="col-8">\
                          <div class="form-group">\
                            <input type="text" class="form-control" name="criteria" id="criteria'+[i]+'" value="'+data['criteria'][i].criteria_name+'" disabled>\
                          </div>\
                        </div>\
                        <div class="col-4">\
                          <div class="input-group">\
                            <input type="number" class="form-control" name="percent" id="percentage'+[i]+'" value="'+data['criteria'][i].criteria_percent+'" disabled>\
                            <div class="input-group-append">\
                            <span class="input-group-text">%</span>\
                          </div>\
                          </div>\
                        </div>\
                      </div></div>');
            totalP += Number(data['criteria'][i].criteria_percent);
          }
          $('#editEvent #total').val(totalP);
        }else if (eventData.event_type === '3') {
          // $('#editEvent #selected-type').remove();
          // $('#editEvent #type-section').append(rangeSection);
        }
      },
      error : function(jqXHR, textStatus, errorThrown) {
        // Log the status
        console.error(textStatus);
        // Log the error response object
        console.error(jqXHR);
        // Log error thrown
        console.error(errorThrown);
      }
    });
    },
    'click .btnCancel': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for cancelling event
      $.ajax({
      url : '../cms/event_cancel',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        event_id : row.event_id,
        event_name : row.event_name
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Cancelling Event',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        $table.bootstrapTable('refresh');
        Swal.close();
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: row.event_name+' cancelled successfully'
        })
      },
      error : function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong!',
        });
        // Log the status
        console.error(textStatus);
        // Log the error response object
        console.error(jqXHR);
        // Log error thrown
        console.error(errorThrown);
      }
    });
    },
    'click .btnRemove': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for deleting event
      $.ajax({
      url : '../cms/event_delete',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        event_id : row.event_id,
        event_name : row.event_name
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Deleting Event',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        $table.bootstrapTable('refresh');
        Swal.close();
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: row.event_name+' deleted successfully'
        })
      },
      error : function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong!',
        });
        // Log the status
        console.error(textStatus);
        // Log the error response object
        console.error(jqXHR);
        // Log error thrown
        console.error(errorThrown);
      }
    });
    },
  }

$(document).ready(
  function () {
    $('#event-loading').remove();
    $('#addEvent #event_guide').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']]
      ]
    });

    $('#editEvent #edit_event_guide').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']]
      ]
    });
    // $('#editEvent #fname').editable('option', 'validate', function(v) {
    //     if(!v) return 'Required field!';
    // });

    $(document).on('click', '#viewEvent #capture', function(e){
      // Prevent default action of button
      e.preventDefault();
      html2canvas([document.getElementById('viewEvent')], {
onrendered: function (canvas) {
document.getElementById('canvas').appendChild(canvas);
var data = canvas.toDataURL('image/png');
}
});
    });


    $('#addEventParticipants').click(function(){

      $('#addParticipants #event_name_dropdown').empty();

        //Ajax for
        $.ajax({
        url : '../cms/get_all_active',
        dataType : 'json',
        type : 'post',
        data : {
          csrf_token_name : $.cookie('csrf_cookie_name')
        },
        success : function(data, textStatus, jqXHR) {
          if (data.length == 0) {
            $('#addParticipants #event_name_dropdown').prop('disabled', true);

          } else {
            $.each(data, function (i, item) {
            $('#addParticipants #event_name_dropdown').prop('disabled', false);
              $('#addParticipants #event_name_dropdown').append($('<option>', { 
                  value: item.event_id,
                  text : item.event_name 
                }));
            });
          }
          // $('#addParticipants #addRowParticipants').append('percentageSection');
        },
        error : function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong!',
          });
          // Log the status
          console.error(textStatus);
          // Log the error response object
          console.error(jqXHR);
          // Log error thrown
          console.error(errorThrown);
        }
      });
    });

    $('#addParticipants #event_name').change(function(){

    });

    $('#event_image').change(function(){
        //get the file name
        var filename = $(this).val().split('\\').pop();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(filename);
    })

    $('#addEvent #event_type').change(function(){
        var selectedCriteria = $(this).children("option:selected").val();
        if (selectedCriteria === '1') {
          $('#addEvent #selected-type').remove();
        }else if (selectedCriteria === '2') {
          $('#addEvent #selected-type').remove();
          $('#addEvent #type-section').append(percentageSection);
        }else if (selectedCriteria === '3') {
          $('#addEvent #selected-type').remove();
          $('#addEvent #type-section').append(rangeSection);
        }
    });

    $('#viewEvent #view_detailed').click(function(){
      $('#viewEvent').modal('hide');
      $('#viewEvent-detailed #content').hide();
      $('#viewEvent-detailed #ph').html('<div class="ph-item" style="border: 0px !important"><div class="ph-col-12"><div class="ph-row"><div class="ph-col-2 big"></div><div class="ph-col-10 empty big"></div></div></div><div class="ph-col-12"><div class="ph-row"><div class="ph-col-12"></div></div><div class="ph-picture"></div></div></div>');
      $('#tblview_detailed').bootstrapTable('destroy');
      // $('#tblview_detailed').bootstrapTable();
      date = new Date();
      $('#tblview_detailed').bootstrapTable({
        exportTypes: ['xlsx', 'pdf'],
        exportOptions: {
          fileName: 'DGathering '+(date.getMonth() + 1) + '-' + date.getDate() + '-' +  date.getFullYear()
       }
      });

      
      //Ajax for
        $.ajax({
        url : 'get_winners_detailed',
        dataType : 'json',
        type : 'post',
        data : {
          csrf_token_name : $.cookie('csrf_cookie_name'),
          event_id : $('#viewEvent').attr('data-user-id')
        },
        success : function(data, textStatus, jqXHR) {
          $('#viewEvent-detailed #ph').html('');
          $('#viewEvent-detailed #content').show();
          $('#viewEvent-detailed #event_name').html(data.event_name);
          if (data.event_t == 1 || data.event_t == 4) {
            var tr = $('<th class="text-center"><div class="th-inner">Participants</div></th>');
            $("#tblview_detailed thead tr").append(tr);
            
              for (var k = 0; k < data.judges_c; k++) {
                var tr = $('<th class="text-center"><div class="th-inner">'+data.details[0][k].judge_fname+'</div></th>');
                $("#tblview_detailed thead tr").append(tr);
              }

              initData(data);

          } else if (data.event_t == 2 || data.event_t == 3) {
            var tr = $('<th rowspan="2" class="text-center"><div class="th-inner">Participants</div></th>');
            $("#tblview_detailed thead tr").append(tr);
            
              var j = 0;
              var criteria_base = data.criteria_c;
              var criteria_total = data.criteria_c * data.judges_c;
              var criteria_tmp = data.criteria_c;
              for (var k = 0; k < data.judges_c; k++) {
                var tr = $('<th class="text-center" colspan="'+data.criteria_c+'" data-tableexport-colspan="'+data.criteria_c+1+'"><div class="th-inner">'+data.details[0][j].judge_fname+'</div></th>');
                $("#tblview_detailed thead tr").append(tr);
                console.log(j);
                if (j < criteria_total) {
                  for (var j = 0; j < criteria_tmp; j++ ) {
                  }

                  criteria_tmp = j + criteria_base;
                }

              }
              $("#tblview_detailed thead").append('<tr></tr>');

              if (data.event_t == 2) {
                for (var j = 0; j < data.details[0].length; j++ ) {
                  var tr = $('<th class="font-weight-light font-italic text-center"><small><div class="th-inner">'+data.details[0][j].criteria_name+'('+data.details[0][j].criteria_percent+'%)</div></small></th>');
                  $("#tblview_detailed thead tr").last().append(tr);
                  
                }
              } else {
                for (var j = 0; j < data.details[0].length; j++ ) {
                  var tr = $('<th class="font-weight-light font-italic text-center"><small><div class="th-inner">'+data.details[0][j].criteria_name+'</div></small></th>');
                  $("#tblview_detailed thead tr").last().append(tr);
                  
                }
              }

              initData(data);
          }
        },
        error : function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong!',
          });
          // Log the status
          console.error(textStatus);
          // Log the error response object
          console.error(jqXHR);
          // Log error thrown
          console.error(errorThrown);
        }
      });
    });

    function initData(data){
      $('#tblview_detailed .no-records-found').remove();
      $("#tblview_detailed tbody").append('<tr id="tr-id-1" class="tr-class-1"></tr>');
      
      var b = 0;
      for (var a = 0; a < data.details.length; a++) {
        var td = $('<td class="text-center">'+data.details[a][b].fname+'</td>');
        $("#tblview_detailed tbody tr").last().append(td);

        while (b < data.details[0].length) {
          var td = $('<td class="text-center">'+data.details[a][b].score+'</td>');
          $("#tblview_detailed tbody tr").last().append(td);
          b++;
        }
        var b = 0;
        $("#tblview_detailed tbody").append('<tr></tr>');
      }
      // return indi_score;
    }

    $('#edit_event_type').change(function(){
        var selectedCriteria = $(this).children("option:selected").val();
        if (selectedCriteria === '1') {
          $('#editEvent #selected-type').remove();
        }else if (selectedCriteria === '2') {
          $('#editEvent #selected-type').remove();
          $('#editEvent #type-section').append(percentageSection);
        }else if (selectedCriteria === '3') {
          $('#editEvent #selected-type').remove();
          $('#editEvent #type-section').append(rangeSection);
        }
    });


    //Add input field for criteria
    var i = 1;
    $(document).on('click', '#addEvent #addPercentField', function(e){
        e.preventDefault();
        
        var maxField = 10;
        if (i < maxField) {
          i++;
          $('#criteria-inputs').append(inputfield)
        }
      });


    //Remove input field for criteria
    $(document).on('click', '#addEvent #removePercentField', function(e){
        // Prevent default action of button
        e.preventDefault();

        $(this).closest('#type-row').remove(); //Remove field html
        i--;
    });

    // Total percentage for criteria
    $(document).on('keyup', '#addEvent #percentage', function(e){
      total = 0;
      $("input[id='percentage']").each(function(){
        total += Number($(this).val());
      });
      $('#addEvent #total').val(total);
      if (total <= 100) {
        $('#addEvent #total').removeClass('text-danger');
      }else{
        $('#addEvent #total').addClass('text-danger');
      }
    });

    //Add input field for range
    var j = 1;
    $(document).on('click', '#addEvent #addRangeField', function(e){
        e.preventDefault();
        
        var maxField = 10;
        if (j < maxField) {
          j++;
          $('#addEvent #range-inputs').append(inputRangefield)
        }
      });

    //Remove input field for range
    $(document).on('click', '#addEvent #removeRangeField', function(e){
        // Prevent default action of button
        e.preventDefault();

        $(this).closest('#type-row').remove(); //Remove field html
        j--;
    });

    //Add input field for criteria
    // var z = 2;
    $(document).on('click', '#addParticipants #addParticipantsField', function(e){
          e.preventDefault();
          var z = $('#addParticipants #participants-section').length;
          $('#addParticipants #addRowParticipants').append('<div class="row" id="participants-section">\
                          <div class="col-1">\
                            <button type="button" id="removeParticipantsField" class="btn btn-danger"><i class="fa fa-close"></i></button>\
                          </div>\
                          <div class="col-5">\
                            <div class="input-group">\
                              <div class="input-group-prepend">\
                                <label class="input-group-text"></label>\
                              </div>\
                              <input type="text" placeholder="Full Name" class="form-control need-validate" name="fname" id="" required>\
                              <input type="text" placeholder="Battle Name" class="form-control" name="bname" id="">\
                            </div>\
                          </div>\
                          <div class="col-3">\
                            <div class="form-group">\
                              <input type="text" placeholder="Hometown" class="form-control need-validate" name="hometown" id="" required>\
                            </div>\
                          </div>\
                          <div class="col-3">\
                            <div class="form-group">\
                              <input type="text" placeholder="Remark" class="form-control" name="remark" id="">\
                            </div>\
                          </div>\
                        </div>');
          updateLabels();
      });


    //Remove input field for criteria
    $(document).on('click', '#addParticipants #removeParticipantsField', function(e){
        // Prevent default action of button
        e.preventDefault();

        $(this).closest('#participants-section').remove(); //Remove field html
        updateLabels();
    });

    function updateLabels() {
      var z = $('#addParticipants #participants-section').length;
      for (var i = 0; i < z; i++) {
        $($($('#addParticipants #participants-section')[i]).find("label")[0]).text(i+1);
        $($($('#addParticipants #participants-section')[i]).find("input[name='fname']")[0]).attr("id", 'fname-'+i);
        $($($('#addParticipants #participants-section')[i]).find("input[name='bname']")[0]).attr("id", 'bname-'+i);
        $($($('#addParticipants #participants-section')[i]).find("input[name='hometown']")[0]).attr("id", 'hometown-'+i);
        $($($('#addParticipants #participants-section')[i]).find("input[name='remark']")[0]).attr("id", 'remark-'+i);
      }
    }

    //Add input field for criteria EDIT
    var i = 1;
    $(document).on('click', '#editEvent #addPercentField', function(e){
        e.preventDefault();
        
        var maxField = 10;
        if (i < maxField) {
          i++;
          $('#editEvent #criteria-inputs').append(inputfield)
        }
      });


    //Remove input field for criteria
    $(document).on('click', '#editEvent #removePercentField', function(e){
        // Prevent default action of button
        e.preventDefault();

        $(this).closest('#type-row').remove(); //Remove field html
        i--;
    });

    // Total percentage for criteria
    $(document).on('keyup', '#editEvent #percentage', function(e){
      total = 0;
      $("input[id='percentage']").each(function(){
        total += Number($(this).val());
      });
      $('#editEvent #total').val(total);
      if (total <= 100) {
        $('#editEvent #total').removeClass('text-danger');
      }else{
        $('#editEvent #total').addClass('text-danger');
      }
    });

    //Add input field for range
    var j = 1;
    $(document).on('click', '#editEvent #addRangeField', function(e){
        e.preventDefault();
        
        var maxField = 10;
        if (j < maxField) {
          j++;
          $('#editEvent #range-inputs').append(inputRangefield)
        }
      });

    //Remove input field for range
    $(document).on('click', '#editEvent #removeRangeField', function(e){
        // Prevent default action of button
        e.preventDefault();

        $(this).closest('#type-row').remove(); //Remove field html
        j--;
    });




    //Add Event
    $('#btnAddEvent').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();

        var dates = $('#event_date').datepicker('getFormattedDate').split(',');
        var date1 = Date.parse(dates[0]);
        if (!dates[1]) {
          dates[1] = '';
        }
        var date2 = Date.parse(dates[1]);
        if (date1 > date2) {
          var startDate = dates[1];
          var endDate = dates[0];
        } else {
          var startDate = dates[0];
          var endDate = dates[1];
        }

        var date = $('#event_date').datepicker('getFormattedDate');
        $('#validatemsg').remove();
        validated = true;
        
        if (date == '') {
          $('#validate-date').append('<span id="validatemsg">Please select a date</span>');
          validated = false;
        }

        if (!validateField("#addEvent .need-validate")) {
          validated = false;
        }

        if (!validateField("#addEvent select")) {
          validated = false;
        }

        if (!validated) {
          return false;
        }

        //Get multiple criteria names
        var criteria_names = [];
        $("input[name='criteria']").each(function() {
             criteria_names.push($(this).val());
        });

        //Get multiple criteria percents
        var criteria_percents = [];
        $("input[name='percent']").each(function() {
             criteria_percents.push($(this).val());
        });

        //Create a form data
        var event_data = new FormData();
        event_data.append('event_name', $('#addEvent #add_event_name').val());
        event_data.append('event_startDate', startDate);
        event_data.append('event_endDate', endDate);
        event_data.append('event_image', $('#addEvent #event_image')[0].files[0]);
        event_data.append('event_time', $('#addEvent #event_time').val());
        event_data.append('event_type', $('#addEvent #event_type').val());
        event_data.append('event_venue', $('#addEvent #event_venue').val());
        event_data.append('event_remarks', $('#addEvent #event_remarks').val());
        event_data.append('event_guide', $('#addEvent #event_guide').val());
        event_data.append('judge_ids', JSON.stringify($('#judges_list').bootstrapTable('getSelections')));
        event_data.append('criteria_names', JSON.stringify(criteria_names));
        event_data.append('criteria_percents', JSON.stringify(criteria_percents));
        event_data.append('max_range', $('#addEvent #max_range').val());


        $.ajax({
          data: event_data,
          dataType: 'json',
          type: 'post',
          url: 'add_event',
          processData: false,
          contentType: false,
          beforeSend: function(){
            Swal.fire({
              titleText: 'Adding Event',
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            })
           },
          success: function (data) {
            $('#addEvent').modal('hide');
            setTimeout(function () {
              location.reload();
            }, 1000);
          },
          error: function (jqXHR, textStatus, errorThrown) {
            // Log the status
            console.error(textStatus);
            // Log the error response object
            console.error(jqXHR);
            // Log error thrown
            console.error(errorThrown);
          }
        });

      });

    //Add Participants
    $('#btnAddParticipants').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();

        validated = true;

        if (!validateField("#addParticipants .need-validate")) {
          validated = false;
        }

        if (!validated) {
          return false;
        }

        //Get multiple participant first names
        var participant_fnames = [];
        $("#addParticipants input[id^='fname-']").each(function() {
             participant_fnames.push($(this).val());
        });

        //Get multiple participant last names
        var participant_bnames = [];
        $("#addParticipants input[id^='bname-']").each(function() {
             participant_bnames.push($(this).val());
        });

        //Get multiple participant last names
        var participant_hometowns = [];
        $("#addParticipants input[id^='hometown-']").each(function() {
             participant_hometowns.push($(this).val());
        });

        //Get multiple participant last names
        var participant_remarks = [];
        $("#addParticipants input[id^='remark-']").each(function() {
             participant_remarks.push($(this).val());
        });

        //Create a form data
        var participant_data = new FormData();
        participant_data.append('event_id', $('#addParticipants #event_name_dropdown').val());
        participant_data.append('event_name', $('#addParticipants #event_name_dropdown option:selected').text());
        participant_data.append('fnames', JSON.stringify(participant_fnames));
        participant_data.append('bnames', JSON.stringify(participant_bnames));
        participant_data.append('hometowns', JSON.stringify(participant_hometowns));
        participant_data.append('remarks', JSON.stringify(participant_remarks));

        $.ajax({
          data: participant_data,
          dataType: 'json',
          type: 'post',
          url: 'add_participant',
          processData: false,
          contentType: false,
          beforeSend: function(){
            Swal.fire({
              titleText: 'Adding Participants',
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            })
           },
          success: function (data) {
            $('#addParticipants').modal('hide');
            setTimeout(function () {
              location.reload();
            }, 1000);
          },
          error: function (jqXHR, textStatus, errorThrown) {
            // Log the status
            console.error(textStatus);
            // Log the error response object
            console.error(jqXHR);
            // Log error thrown
            console.error(errorThrown);
          }
        });

      });

    //Edit Event
    $('#btnEditEvent').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();

        var dates = $('#event_date_edit').datepicker('getFormattedDate').split(',');
        var date1 = Date.parse(dates[0]);
        if (!dates[1]) {
          dates[1] = '';
        }
        var date2 = Date.parse(dates[1]);
        if (date1 > date2) {
          var startDate = dates[1];
          var endDate = dates[0];
        } else {
          var startDate = dates[0];
          var endDate = dates[1];
        }

        var date = $('#event_date_edit').datepicker('getFormattedDate');
        $('#validatemsg').remove();
        validated = true;
        
        if (date == '') {
          $('#validate-date-edit').append('<span id="validatemsg">Please select a date</span>');
          validated = false;
        }

        if (!validateField("#editEvent .need-validate")) {
          validated = false;
        }

        // if (!validateField("#editEvent select")) {
        //   validated = false;
        // }

        if (!validated) {
          return false;
        }


        //Get multiple criteria names
        // var criteria_names = [];
        // $("input[name='criteria']").each(function() {
        //      criteria_names.push($(this).val());
        // });

        //Get multiple criteria percents
        // var criteria_percents = [];
        // $("input[name='percent']").each(function() {
        //      criteria_percents.push($(this).val());
        // });
        event_id = $('#editEvent').attr('data-user-id');
        //Create a form data
        var event_data = new FormData();
        event_data.append('event_id', event_id);
        event_data.append('event_name', $('#editEvent #edit_event_name').val());
        event_data.append('event_startDate', startDate);
        event_data.append('event_endDate', endDate);
        event_data.append('event_image', $('#editEvent #edit_event_image')[0].files[0]);
        event_data.append('event_time', $('#editEvent #edit_event_time').val());
        event_data.append('event_venue', $('#editEvent #edit_event_venue').val());
        event_data.append('event_remarks', $('#editEvent #edit_event_remarks').val());
        event_data.append('event_guide', $('#editEvent #edit_event_guide').summernote('code'));
        // event_data.append('event_type', $('#editEvent #event_type').val());
        event_data.append('judge_ids', JSON.stringify($('#edit_judges_list').bootstrapTable('getSelections')));
        // event_data.append('criteria_names', JSON.stringify(criteria_names));
        // event_data.append('criteria_percents', JSON.stringify(criteria_percents));
        // event_data.append('max_range', $('#editEvent #max_range').val());

        $.ajax({
          data: event_data,
          dataType: 'json',
          type: 'post',
          url: 'edit_event',
          processData: false,
          contentType: false,
          beforeSend: function(){
            Swal.fire({
              titleText: 'Editing Event',
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            })
           },
          success: function (data) {
            $('#editEvent').modal('hide');
            setTimeout(function () {
              location.reload();
            }, 1000);
          },
          error: function (jqXHR, textStatus, errorThrown) {
            // Log the status
            console.error(textStatus);
            // Log the error response object
            console.error(jqXHR);
            // Log error thrown
            console.error(errorThrown);
          }
        });

      });
  });