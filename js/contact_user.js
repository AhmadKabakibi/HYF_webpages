$(function() {

    $("#applyForm input,#applyForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error questions or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var name = $("input#name").val();
            var address = $("input#address").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            if($("input[type='radio'].radioBtnoption1").is(':checked'))
                var laptop = $("input[type='radio'].radioBtnClass:checked").val();
            if($("input[type='radio'].radioBtnoption2").is(':checked'))
                var location = $("input[type='radio'].radioBtnClass:checked").val();
            var education = $("textarea#education").val();
            var firstName = name; // For Success/Failure 
            // Check for white space in name for Success/Fail 
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "././mail/contact_user.php",
                type: "POST",
                data: {
                    name: name,
                    address:address,
                    email: email,
                    phone: phone,
                    laptop: laptop,
                    location:location,
                    education:education
                },
                cache: false,
                success: function() {
                    // Enable button & show success question
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
					    .append("<strong>your registration request has been sent. </strong><br><strong>please check your email inbox to confirm your registration</strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#applyForm').trigger("reset");
                },
                error: function() {
                    // Fail question
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#applyForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
