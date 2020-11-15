$("#signup").click(function() {
	$("#first").fadeOut("fast", function() {
		$("#second").fadeIn("fast");
	});
});

$("#signin").click(function() {
	$("#second").fadeOut("fast", function() {
		$("#first").fadeIn("fast");
	});
});
 
$(function() {
 $("form[name='login']").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
			}
		},
		
		messages: {
			email: {
				required: "Please enter a valid email address",
			},
			password: {
				required: "Please enter a password"
			}
		},
		
		submitHandler: function(form) {
			form.submit();
		}
	});
});

$(function() {
  $("form[name='registration']").validate({
    rules: {
      firstname: "required",
      lastname: "required",
      email: {
        required: true,
        email: true
      },
			username: {
        required: true,
        minlength: 5
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    
    messages: {
      firstname: "Please enter your first name",
      lastname: "Please enter your last name",
			username: {
        required: "Please provide a username",
        minlength: "Your username must be at least 5 characters long"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },
  
    submitHandler: function(form) {
      form.submit();
    }
  });
});
