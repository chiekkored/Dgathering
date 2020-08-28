$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

var today = new Date();

$('#eventdates').datepicker({
  daysOfWeekDisabled: "0,1,2,3,4,5,6",
  todayHighlight: true
});

$(document).ready(
  function() {
    
    // Get all judges count -- AJAX Request
    $.ajax({
      url : 'cms/get_judges',
      dataType : 'json',
      type : 'get',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name')
      },
      success : function(data, textStatus, jqXHR) {
        $('#judgesCount').append(data.length)
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

    // Get all events  -- AJAX Request
    $.ajax({
      url : 'cms/get_all',
      dataType : 'json',
      type : 'get',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name')
      },
      success : function(data, textStatus, jqXHR) {
        $('#eventsTotal').append(data.length)
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


    // Get all logs -- AJAX Request
    $.ajax({
      url : 'cms/get_limit_logs',
      dataType : 'json',
      type : 'get',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name')
      },
      success : function(data, textStatus, jqXHR) {
        if(data.length > 0) {
          // Populate the logs table
          populateLogsTable(data);
        } else {
          $('#tblLogs tbody')
            .append('<td colspan="2" class="text-danger text-center">No records found.</td>');
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

    // Get all events for month -- AJAX Request
    $.ajax({
      url : 'cms/get_limit_events',
      dataType : 'json',
      type : 'get',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name')
      },
      success : function(data, textStatus, jqXHR) {
        if(data.length > 0) {
          // Populate the events table
          populateEventsTable(data);
        } else {
          $('#tblEvents tbody')
            .append('<td colspan="2" class="text-danger text-center">No records found.</td>');
        }
        var dates = [];
        for (var i = data.length - 1; i >= 0; i--) {
          var date = new Date(data[i]['event_startDate']);
          event_dates = (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear();
          dates.push(event_dates);
        }
        
        $('#eventdates').datepicker('setDates', dates);
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

    // Get future events for calendar -- AJAX Request
    $.ajax({
      url : 'cms/get_all_active',
      dataType : 'json',
      type : 'get',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name')
      },
      success : function(data, textStatus, jqXHR) {
        $('#eventsCount').append(data.length);
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

  }
);

/**
* Populates the logs table in the dashboard.
*
* @param data array containing the logs
*/
function populateLogsTable(data) {
  // Iterate through the list of logs
  for(var i = 0; i < data.length; i++) {
    $('#tblLogs tbody').append(createRowLogs(data[i]));
  }
}

/**
* Creates the HTML table row containing the information of the user.
*
* @param data log information
*/
function createRowLogs(data) {
  return '' +
    '<tr>' +
      '<td class="text-center"><small>' +
        '<span class="text-muted text-center">' + jQuery.timeago(data.date) + '</span> ' +
      '</small></td>' +
      '<td class="text-info"><small>' +
        data.message +
      '</small></td>' +
    '</tr>';
}

/**
* Populates the logs table in the dashboard.
*
* @param data array containing the logs
*/
function populateEventsTable(data) {
  // Iterate through the list of logs
  for(var i = 0; i < data.length; i++) {
    $('#tblEvents tbody').append(createRowEvents(data[i]));
  }
}

/**
* Creates the HTML table row containing the information of the user.
*
* @param data log information
*/
function createRowEvents(data) {
  return '' +
    '<tr>' +
      '<td><small>' +
        '<b>' + data.c_date + '</b> ' +
      '</td>' +
      '<td>' +
        data.event_name +
      '</small></td>' +
    '</tr>';
}
