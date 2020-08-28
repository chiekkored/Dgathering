

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

function toGrade(participantsID, event_id, score){

    //Create a form data
    var judgeScore_data = new FormData();
    judgeScore_data.append('event_participants_id', participantsID);
    judgeScore_data.append('event_id', event_id);
    judgeScore_data.append('score', score);

  // Post judge's scores -- AJAX Request
    $.ajax({
      url : '../judging/post_scores_1',
      dataType : 'json',
      type : 'post',
      data : judgeScore_data,
      processData: false,
      contentType: false,
      success : function(data, textStatus, jqXHR) {
        setTimeout(function () {
          window.close();
        }, 1000);
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


var progressStepsCount = [];
var participantsName = [];
var participantsID = [];
var judge_scoresData = [];
$(document).ready(
  function () {
    // $(window).bind('beforeunload', function(e) { 
    //     return ''
    //     e.preventDefault();
    // });
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
        url : '../judging/get_participants',
        dataType : 'json',
        type : 'post',
        data : {
          csrf_token_name : $.cookie('csrf_cookie_name'),
          event_id : event_id
        },
        success : function(data, textStatus, jqXHR) {
          for (var j = 0; j < data.length; j++) {
            progressStepsCount.push((j+1).toString());
            participantsName.push(data[j].fname);
            participantsID.push(data[j].event_participants_id);
          }

          $('#scoreModal').append(scoreModal);
          for (var i = 0; i < data.length; i++) {
            $('#judge_scoring #participants-body').append('<div class="card">\
                                                                  <div class="card-header">\
                                                                    <h2 class="mb-0">\
                                                                      <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapse-'+i+'">\
                                                                        '+participantsName[i]+' "'+data[i].bname+'"\
                                                                      </button>\
                                                                    </h2>\
                                                                  </div>\
                                                                  <div id="collapse-'+i+'" class="collapse" data-parent="#participants-body">\
                                                                    <div class="card-body" id="criteria-body-'+i+'">\
                                                                    <p><small>Remark: '+checklink(data[i].remark)+'</small></p>\
                                                                    <div class="row">\
                                                                        <div class="col-12">\
                                                                          <div class="form-group">\
                                                                            <label>Score</label>\
                                                                            <input type="number" id="score-'+j+'" class="form-control" min="0" required>\
                                                                          </div>\
                                                                        </div>\
                                                                      </div>\
                                                                    </div>\
                                                                  </div>\
                                                                </div>');
          }

          $('#judge_scoring').modal('show');

          // Swal.mixin({
          //   input: 'number',
          //   confirmButtonText: 'Next',
          //   inputValidator: (value) => {
          //     return !value && 'The score should not be empty'
          //   },
          //   allowOutsideClick: false,
          //   inputPlaceholder: 'Score',
          //   backdrop: 'rgba(0,0,0,0.9)',
          //   progressSteps: progressStepsCount
          // }).queue(participantsName).then((result) => {
          //   if (result.value) {
          //     const score = JSON.stringify(result.value)

          //     toGrade(JSON.stringify(participantsID), event_id, score)
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
        $("#judge_scoring input[id^='score-']").each(function() {
             judge_scoresData.push($(this).val());
        });

        $('#judge_scoring').remove();


        //Create a form data
        var judgeScore_data = new FormData();
        judgeScore_data.append('event_participants_id', JSON.stringify(participantsID));
        judgeScore_data.append('event_id', event_id);
        judgeScore_data.append('score', JSON.stringify(judge_scoresData));

        // Post judge's scores -- AJAX Request
        $.ajax({
          url : '../judging/post_scores_1',
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
                window.close()
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
    