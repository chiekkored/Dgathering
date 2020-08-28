$(document).ready(
  function() {
    // Get the CSRF token from the cookie jar
    var obj = {
      csrf_token_name : $.cookie('csrf_cookie_name')
    };
    // Initialize hiding of the users table
    $('.alert').hide();
    console.log(obj);
    $('#btnLoginAsGuest').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();

        Swal.fire({
        title: 'Coming soon!',
        width: 600,
        padding: '3em',
        backdrop: `
          rgba(0,0,123,0.4)
          url("resources/images/nyan-cat.gif")
          left top
          no-repeat
        `
      })
    });

    // -- Event Handlers START
    // Attach an event upon login
    $('#btnLogin').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();
        
        // Get username input
        var username = $('#txtUsername').val();
        // Get password input
        var password = $('#txtPassword').val();

        // Check if the username and password fields are filled up
        if(username.length > 0 && password.length > 0) {
          // Invoke AJAX request for attempting to login
          $.ajax({
            data : {
              username : username,
              password : password,
              csrf_token_name : obj.csrf_token_name
            },
            dataType : 'json',
            type: 'post',
            url : 'auth/login',
            beforeSend: function(){
              $('#btnLogin').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading').addClass('disabled');
             },
            success : function(data) {
              if(data.success) {
                window.location.replace('home');
              } else {
                $('#btnLogin').html('Login').removeClass('disabled');
                $('.alert').show();
                $('.alert').text(data.error_message);
                $('.alert').addClass('alert-danger');
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
        } else {
          $('.alert').show();
          $('.alert').text('Username and password should not be empty!');
          $('.alert').addClass('alert-danger');
        }
      }
    );
    // -- Event Handlers END
  }
);
