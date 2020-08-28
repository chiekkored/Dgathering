


$(document).ready(
  function() {
  // Get all logs
    $.ajax({
      url : '../cms/get_logs',
      dataType : 'json',
      type : 'get',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name')
      },
      success : function(data, textStatus, jqXHR) {
        if(data.length > 0) {
          // Populate the events table
          populateLogsTable(data);
        } else {
          $('#tblLogs tbody')
            .append('<td colspan="2" class="text-danger text-center">No records found.</td>');
        }
        var dates = [];
        for (var i = data.length - 1; i >= 0; i--) {
          var date = new Date(data[i]['event_date']);
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
});




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
        '<span class="text-muted text-center">' + data.date + '</span> ' +
      '</small></td>' +
      '<td class="text-info"><small>' +
        data.message +
      '</small></td>' +
    '</tr>';
}