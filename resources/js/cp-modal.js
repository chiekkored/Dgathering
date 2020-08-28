$(document).ready(
  function() {
    htmlModal = '\
        <div id="editPass" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">\
        <div class="modal-dialog" role="document">\
          <div class="modal-content">\
            <div class="modal-header">\
              <span class="modal-title text-muted">Edit Password</span>\
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
                <span aria-hidden="true">&times;</span>\
              </button>\
            </div>\
            <div class="modal-body">\
              <div class="container">\
                <form enctype="multipart/form-data" novalidate>\
                  <div class="row">\
                    <div class="col-12">\
                      <div class="form-group">\
                        <label class="text-muted" for="txtPassword">New Password</label>\
                        <input type="password" class="form-control" id="txtEditPassword">\
                      </div>\
                    </div>\
                    <div class="col-12">\
                      <div class="form-group">\
                        <label class="text-muted" for="txtPassword">Confirm Password</label>\
                        <input type="password" class="form-control" id="txtConfirmPassword">\
                        <small id="pwValidate" class="form-text text-danger">Password does not match</small>\
                      </div>\
                    </div>\
                  </div>\
                </form>\
              </div>\
            <div class="modal-footer">\
              <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>\
              <button id="btnEdit" type="submit" class="btn btn-success">Edit</button>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>';
    $('#changePassword').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();
        
        $("#changePassword-content").html(htmlModal);
        $('#editPass').modal('show');

        $('#pwValidate').hide();
        pwValidated = true;
        $('#txtConfirmPassword').keyup(function(){
          if ($(this).val() != $('#txtEditPassword').val()) {
            $('#pwValidate').show();
            pwValidated = false;
          }else{
            $('#pwValidate').hide();
            pwValidated = true;
          }
        })
      });

    
    $(document).on('click', '#btnEdit', function(e){
        // Prevent default action of button
        e.preventDefault();
        validated = true;

        if (!validateField("#editPass .form-control")) {
          validated = false;
        }

        if (!validateField("#editPass select")) {
          validated = false;
        }

        if (!validated || !pwValidated) {
          return false;
        }


        user_id = $('#changePassword').attr('data-user-id');

        //Create a form data
        var users_data = new FormData();
        users_data.append('user_id', user_id);
        users_data.append('password', $('#txtEditPassword').val());


        $.ajax({
          data: users_data,
          dataType: 'json',
          type: 'post',
          url: 'auth/change_pass',
          processData: false,
          contentType: false,
          success: function (data) {
            console.log(data);
            $('#editPass').modal('hide');
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