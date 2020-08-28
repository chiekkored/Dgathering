$(document).ready(
  function() {
    // Get the CSRF token from the cookie jar
    // var obj = {
    //   csrf_token_name : $.cookie('csrf_cookie_name')
    // };
    // Initialize hiding of the users table
    $('.alert').hide();

    // -- Event Handlers START
    // Attach an event upon login
    // $('#btnRegister').click(
    //   function(e) {
    //     // Prevent default action of button
    //     e.preventDefault();
        
    //     // Get username input
    //     var username = $('#txtUsername').val();
    //     // Get password input
    //     var password = $('#txtPassword').val();
    //     // Get role input
    //     var role = $('#txtRole').val();

    //     // var img = $('#user_image')[0].files[0];

        
    //     // Check if the username and password fields are filled up
    //     if(username.length > 0 && password.length > 0) {
    //       // Invoke AJAX request for attempting to login
    //       $.ajax({
    //         processData: false,
    //         contentType: false,
    //         data : {
    //           username : username,
    //           password : password,
    //           role : role,
    //           // csrf_token_name : obj.csrf_token_name
    //         },
    //         dataType : 'json',
    //         type: 'post',
    //         url : 'users/register',
    //         success : function(data) {
    //           console.log(data);
    //           // setTimeout(function(){location.reload();},1000);
    //         },
    //         error : function(jqXHR, textStatus, errorThrown) {
    //           // Log the status
    //           console.error(textStatus);
    //           // Log the error response object
    //           console.error(jqXHR);
    //           // Log error thrown
    //           console.error(errorThrown);
    //         }
    //       });
    //     } else {
    //       $('.alert').show();
    //       $('.alert').text('Username and password should not be empty!');
    //       $('.alert').addClass('alert-danger');
    //     }
    //   }
    // );

    $('#btnRegister').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();

        //Create a form data
        var users_data = new FormData();
        users_data.append('fname', $('#txtFname').val());
        users_data.append('lname', $('#txtLname').val());
        users_data.append('username', $('#txtUsername').val());
        users_data.append('password', $('#txtPassword').val());
        users_data.append('user_image', $('#user_image')[0].files[0]);
        users_data.append('role', $('#txtRole').val());


        $.ajax({
          data: users_data,
          dataType: 'json',
          type: 'post',
          url: 'chikoredo/register',
          processData: false,
          contentType: false,
          success: function (data) {
            console.log(data);
            // $('#addEvent').modal('hide');
            // setTimeout(function () {
            //   location.reload();
            // }, 1000);
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
    // -- Event Handlers END
  }
);
