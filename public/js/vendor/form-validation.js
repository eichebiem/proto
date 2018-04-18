$(document).ready(function(){

    $('#alert_message').delay(10000).fadeOut();

    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function(element) {
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        },
        unhighlight: function(element) {
            $(element)
                .closest('.form-group')
                .removeClass('has-error');
        },
        errorPlacement: function (error, element) {
            if (element.prop('type') === 'checkbox') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    $('#form-validate').validate({

        rules: {
            username: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 5
            },
            name: {
                required: true,
                minlength: 5
            }
        },

        messages: {
            username: {
                required: "Username is required"
            },
            password: {
                required: "Password is required"
            },
            name: {
                required: "Room Name is required"
            }
        },

        submitHandler: function(){
            
        }

    });


    // Input mask
//     $('#contact_number').mask('0000-000-0000');
//     $('#company_tel').mask('(000) 000-0000');
//     $('#client_tel').mask('(000) 000-0000');


// make check boxes behave like radio button
//     $(".course").change(function() {
//         $(".course").prop('checked', false);
//         $(this).prop('checked', true);
//     });


//     $(".ewan").change(function() {
//         $(".ewan").prop('checked', false);
//         $(this).prop('checked', true);
//     });


//     $(".days").change(function() {
//         $(".days").prop('checked', false);
//         $(this).prop('checked', true);
//     });


//     $('.ewan').change(function () {
//         //check if checkbox is checked
//         if ($('#inter').is(':checked')) {

//             $('.days').removeAttr('disabled'); //enable input

//         } else {
//             $('.days').removeAttr('checked');
//             $('.days').attr('disabled', true); //disable input
//         }
//     });


//     $(".research_class").change(function() {
//         $(".research_class").prop('checked', false);
//         $(this).prop('checked', true);
//     });


});


