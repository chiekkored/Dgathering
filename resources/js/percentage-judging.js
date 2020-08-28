//Percentage type of judging

function Index (value, row, index) {
  return [
      index + 1
  ].join('');
}

function checklink(remark){
  var res = remark.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
  if(res == null)
      return [
          remark
      ]
    else
      return [
          '<a href="'+remark+'" target="_blank">'+remark+'</a>'
      ]
}

var scoreModal = '<div class="modal fade" id="judge_scoring" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="judge_scoringTitle" aria-hidden="true">\
              <div class="modal-dialog modal-dialog-centered" role="document">\
                <div class="modal-content">\
                  <div class="modal-header">\
                    <h2 class="modal-title" id="judge_scoringTitle"></h2>\
                  </div>\
                  <div class="modal-body">\
                    <div class="container">\
                      <div class="accordion" id="participants-body">\
                      </div>\
                    </div>\
                  </div>\
                  <div class="modal-footer">\
                    <button type="submit" class="btn btn-primary" id="save">Post Scores</button>\
                  </div>\
                </div>\
              </div>\
            </div>'

var criteriaID = [];
var criteriaName = [];
var participantsName = [];
var participantsID = [];
var participantsLength = 0;
var criteriaLength = 0;
var judge_scoresData = [];
$(document).ready(
  function () {
    
    event_id = $('.card').attr('data-event-id');

    $.ajax({
      url : '../events/get_event',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        event_id : event_id
      },
      success : function(data, textStatus, jqXHR) {

        $('#get_participants').bootstrapTable('load', data['participants']);

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

    $('#btnStart').click(function(){

        event_id = $('.card').attr('data-event-id');

        $.ajax({
        url : '../judging/get_event_data',
        dataType : 'json',
        type : 'post',
        data : {
          csrf_token_name : $.cookie('csrf_cookie_name'),
          event_id : event_id
        },
        success : function(data, textStatus, jqXHR) {
          for (var i = 0; i < data['participants'].length; i++) {
            participantsName.push(data['participants'][i].fname);
            participantsID.push(data['participants'][i].event_participants_id);
          }
          for (var i = 0; i < data['criteria'].length; i++) {
            criteriaID.push(data['criteria'][i].event_criteria_id);
            criteriaName.push(data['criteria'][i].criteria_name);
          }

          participantsLength = data['participants'].length;
          criteriaLength = data['criteria'].length;
          $('#scoreModal').append(scoreModal);
          // $('#judge_scoring').modal({
          //   back: false
          // });
          // $('#judge_scoring').attr('data-part-id', data['participants'][0].event_participants_id);
          // $('#judge_scoringTitle').text(data['participants'][0].f_name);

          var j = 0;
          var criteria_base = criteriaLength;
          var criteria_total = criteriaLength * participantsLength;
          var criteria_tmp = criteriaLength;
          for (var i = 0; i < participantsLength; i++) {
            $('#judge_scoring #participants-body').append('<div class="card">\
                                                                  <div class="card-header">\
                                                                    <h2 class="mb-0">\
                                                                      <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapse-'+i+'">\
                                                                        '+participantsName[i]+' "'+data['participants'][i].bname+'"\
                                                                      </button>\
                                                                    </h2>\
                                                                  </div>\
                                                                  <div id="collapse-'+i+'" class="collapse" data-parent="#participants-body">\
                                                                    <div class="card-body" id="criteria-body-'+i+'">\
                                                                    <p><small>Remark: '+checklink(data['participants'][i].remark)+'</small></p>\
                                                                    </div>\
                                                                  </div>\
                                                                </div>');
              
            if (j < criteria_total) {
                while (j < criteria_tmp) {
                  var c = 0;
                  $('#judge_scoring #criteria-body-'+i+'').append('<div class="row">\
                                                              <div class="col-12">\
                                                                <div class="form-group">\
                                                                  <label>'+criteriaName[c]+' <small>('+data['criteria'][c].criteria_percent+'%)</small></label>\
                                                                  <input type="number" id="criteria-'+j+'" class="form-control" required>\
                                                                </div>\
                                                              </div>\
                                                            </div>');
                  j++;
                  c++;
                }

                criteria_tmp = j + criteria_base;
            }

          }

          $('#judge_scoring').modal('show');

          // Swal.mixin({
          //   input: 'number',
          //   confirmButtonText: 'Next',
          //   inputValidator: (value) => {
          //     return !value && 'The score should not be empty'
          //   },
          //   allowOutsideClick: false,
          //   backdrop: 'rgba(0,0,0,0.9)',
          //   progressSteps: progressStepsCount
          // }).queue(participantsName).then((result) => {
          //   if (result.value) {
          //     const score = JSON.stringify(result.value)

          //     // toGrade(JSON.stringify(participantsID), event_id, score)
          //     Swal.fire({
          //       titleText: 'Calculating Scores',
          //       onBeforeOpen: () => {
          //         Swal.showLoading()
          //       }
          //     })
          //   }
          // })
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

    $(document).on('click', '#save', function(e){
        e.preventDefault();

        //Get multiple participant first names
        $("#judge_scoring input[id^='criteria-']").each(function() {
             judge_scoresData.push($(this).val());
        });

        $('#judge_scoring').remove();

        console.log(criteriaID);
        //Create a form data
        var judgeScore_data = new FormData();
        judgeScore_data.append('event_participants_id', JSON.stringify(participantsID));
        judgeScore_data.append('event_id', event_id);
        judgeScore_data.append('event_criteria_id', JSON.stringify(criteriaID));
        judgeScore_data.append('criteriaLength', criteriaLength);
        judgeScore_data.append('score', JSON.stringify(judge_scoresData));

        // Post judge's scores -- AJAX Request
        $.ajax({
          url : '../judging/post_scores_2',
          dataType : 'json',
          type : 'post',
          data : judgeScore_data,
          processData: false,
          contentType: false,
          beforeSend: function(){
            Swal.fire({
              titleText: 'Calculating Scores',
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            })
           },
          success : function(data, textStatus, jqXHR) {
            let timerInterval
            Swal.fire({
              title: 'Scores Posted',
              html: 'This window will close in <b></b> seconds.',
              timer: 3000,
              timerProgressBar: true,
              onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                  const content = Swal.getContent()
                  if (content) {
                    const b = content.querySelector('b')
                    .textContent = Math.ceil(swal.getTimerLeft() / 1000)
                    if (b) {
                      b.textContent = Swal.getTimerLeft()
                    }
                  }
                }, 100)
              },
              onClose: () => {
                clearInterval(timerInterval)
                // window.close()
              }
            })
          },
          error : function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Please contact administrator',
            });
            // Log the status
            console.error(textStatus);
            // Log the error response object
            console.error(jqXHR);
            // Log error thrown
            console.error(errorThrown);
          }
        });

        
        // $('#judge_scoring').modal('hide');
        
        // $('#judge_scoring').on('hidden.bs.modal', function (e) {
        //   $('#judge_scoring').remove();
        // })
      });


  });
    