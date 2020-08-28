$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

editIcon = '<svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
  <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>\
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>\
</svg>'

groupIcon = '<svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>\
</svg>'

function Image (value, row, index) {
  return [
      '<div class="text-center">\
        <img src="../resources/images/uploads/'+row.user_image+'" class="rounded-circle" style="height: 30px; width: 30px;">\
      </div>'
  ].join('');
}

//0 = active, 1 = deactivated, 2 = removed
function TableActions (value, row, index) {
  if (index == 0) {
    return '';
  } else {
    if (row.status == 0) {
      var statusReturn = ['<a class="btn btn-dark text-white btnDeactivate mr-1">\
          <i class="fa fa-lock"></i><span class="d-none d-md-inline"> Deactivate</span>\
        </a>'];
    }else{
      var statusReturn = ['<a class="btn btn-secondary text-white btnActivate mr-1">\
          <i class="fa fa-unlock"></i><span class="d-none d-md-inline"> Activate</span>\
        </a>'];
    }
    return [statusReturn+
        '<div class="btn-group" role="group">\
          <a class="btn btn-warning text-white btnEdit">\
            '+editIcon+'<span class="d-none d-md-inline"> Edit</span>\
          </a>\
          <a class="btn btn-danger text-white btnRemove">\
            '+groupIcon+'<span class="d-none d-md-inline"> Remove</span>\
          </a>\
        </div>'
    ].join('');
  }
}

window.operateEvents = {
    'click .btnDeactivate': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for toggling inactive
      $.ajax({
      url : '../cms/toggle_deactivate',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        user_id : row.user_id,
        username : row.username
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Deactivating Account',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        $('#users_list').bootstrapTable('refresh');
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
          title: row.username+' deactivated successfully'
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
    'click .btnActivate': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for starting the event
      $.ajax({
      url : '../cms/toggle_activate',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        user_id : row.user_id,
        username : row.username
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Activating Account',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        $('#users_list').bootstrapTable('refresh');
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
          title: row.username+' activated successfully'
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
    'click .btnEdit': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for Edit modal
      $.ajax({
      url : '../cms/get_user',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        user_id : row.user_id
      },
      success : function(data, textStatus, jqXHR) {

        // Show the modal box
        $('#editUser').modal('show');
        // Add an ID for the currently opened modal box
        $('#editUser').attr('data-user-id', row.user_id);

        const userData = data[0];

        $('#editUser #txtEditFname').val(userData.fname);
        $('#editUser #txtEditLname').val(userData.lname);
        $('#editUser #txtEditUsername').val(userData.username);
        $('#editUser #txtEditRole').val(userData.role);
        // $('#editUser #Edituser_image').val(userData.user_image);

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
    'click .btnRemove': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for deleting event
      $.ajax({
      url : '../cms/user_delete',
      dataType : 'json',
      type : 'post',
      data : {
        csrf_token_name : $.cookie('csrf_cookie_name'),
        user_id : row.user_id,
        username : row.username
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Deleting User',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        $('#users_list').bootstrapTable('refresh');
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
          title: row.username+' deleted successfully'
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
  function() {
    $('#pwValidate').hide();
    $('#user_image').change(function(){
        //get the file name
        var filename = $(this).val().split('\\').pop();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(filename);
    });

    $('#checkNewPass').click(
      function() {
        // Check if the ceckbox has been checked
        if($(this).is(':checked')) {
          // Enable the password input field
          $('#txtEditPassword').prop('disabled', false);
          $('#txtConfirmPassword').prop('disabled', false);
        } else {
          // Disable the password input field
          $('#txtEditPassword').prop('disabled', true);
          $('#txtConfirmPassword').prop('disabled', true);
        }
      }
    );
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

    $('#btnRegister').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();
        validated = true;

        if (!validateField("#addUser input")) {
          validated = false;
        }

        if (!validateField("#addUser select")) {
          validated = false;
        }

        if (!validated) {
          return false;
        }
        //Create a form data
        var users_data = new FormData();
        users_data.append('fname', $('#txtFname').val());
        users_data.append('lname', $('#txtLname').val());
        users_data.append('username', $('#txtUsername').val());
        users_data.append('password', $('#txtPassword').val());
        users_data.append('user_image', $('#user_image')[0].files[0]);
        users_data.append('role', $('#txtRole option:selected').val());


        $.ajax({
          data: users_data,
          dataType: 'json',
          type: 'post',
          url: '../cms/register',
          processData: false,
          contentType: false,
          beforeSend: function(){
            Swal.fire({
              titleText: 'Adding User',
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            })
           },
          success: function (data) {
            $('#addUser').modal('hide');
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

    $('#btnEdit').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();
        validated = true;

        if (!validateField("#editUser .form-control")) {
          validated = false;
        }

        if (!validateField("#editUser select")) {
          validated = false;
        }

        if (!validated || !pwValidated) {
          return false;
        }


        user_id = $('#editUser').attr('data-user-id');

        //Create a form data
        var users_data = new FormData();
        users_data.append('user_id', user_id);
        users_data.append('fname', $('#txtEditFname').val());
        users_data.append('lname', $('#txtEditLname').val());
        users_data.append('username', $('#txtEditUsername').val());
        users_data.append('password', $('#txtEditPassword').val());
        users_data.append('user_image', $('#Edituser_image')[0].files[0]);
        users_data.append('role', $('#txtEditRole option:selected').val());


        $.ajax({
          data: users_data,
          dataType: 'json',
          type: 'post',
          url: '../cms/edit_user',
          processData: false,
          contentType: false,
          success: function (data) {
            console.log(data);
            $('#editUser').modal('hide');
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
