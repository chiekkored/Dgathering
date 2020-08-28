function TableActions (value, row, index) {
  if (row.status == 0) {
    return [
          '<a class="btn btn-success text-white btnGo">\
                <i class="fa fa-pencil"></i><span class="hidden-sm hidden-xs"> Go to judging</span>\
              </a>'
      ].join('');
    }else if(row.status == 2){
      return [
          '<a class="btn btn-info text-white btnView">\
                <i class="fa fa-eye"></i><span class="hidden-sm hidden-xs"> View</span>\
              </a>'
      ].join('');
  }
}

var $table = $('#events_list')

window.operateEvents = {
    'click .btnGo': function (e, value, row, index) {
      window.open("events/" + row.slug)
    }
  }

$(window).focus(function() {
   $table.bootstrapTable('refresh')
   $table.bootstrapTable('hideLoading')
});

$(document).ready(
  function () {
    $('#event-loading').remove();
  });
    