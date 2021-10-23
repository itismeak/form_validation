$(document).ready(function() {

    $("input[name='email']").on("keyup", function() {
        var email_validate = $("input[name='email']").val();
        // alert(email_validate);
        //email check use ajax
        $.ajax({
            type: "POST",
            data: { email: email_validate },
            url: "ajax_validate.php",
            success: function(data) {
                if (data == 0) {
                    $('.email_error').text('Not Exist');
                    return false;
                } else {
                    $('.email_error').text('Exist').css('color', 'red');
                }
            },
            error: function(jqXhr, textStatus, errorMessage) {
                alert(errorMessage);
            }
        });
    });

    //password field fade in
    $(document).on("click", "input[type='password']", function() {
        $("#re_enter_psw").fadeIn();
    });

    //password require
    $(document).on("keyup", "input[name='new_psw']", function() {
        var psw = $("input[name='psw']").val();
        var new_psw = $("input[name='new_psw']").val();
        if (psw != new_psw) {
            $('.new_psw_error').text('Not match').css('color', 'blue');
            return false;
        } else {
            $('.new_psw_error').text(' match').css('color', 'green');
        }
    });

    //form submit
    $("form").submit(function() {
        var flag = 1;
        var fname = $("input[name='fname']").val();
        if (fname == '') {
            $('.fname_error').text('First Name is Requires').css('color', 'red');
            flag = 0;
        } else {
            $('.fname_error').text('✓').css('color', 'green');
        }

        var lname = $("input[name='lname']").val();
        if (lname == '') {
            $('.lname_error').text('Last Name is Requires').css('color', 'red');
            flag = 0;
        } else {
            $('.lname_error').text('✓').css('color', 'green');
        }

        var dob = $("input[name='dob']").val();
        if (dob == '') {
            $('.dob_error').text('Date Of Birth Require').css('color', 'red');
            flag = 0;
        } else {
            $('.dob_error').text('✓').css('color', 'green');
        }

        //radio button require
        var gender = $(".gender input[type='radio']").is(':checked');
        if (gender == false) {
            $('.gender_error').text('Gender Require').css('color', 'red');
            flag = 0;
        } else {
            $('.gender_error').text('✓').css('color', 'green');
        }

        //email require 
        var email = $("input[name='email']").val();
        if (email == '') {
            $('.email_error').text('Email Require');
            $('.email_error').css('color', 'red');
            flag = 0;
        } else {
            $('.email_error').text('✓').css('color', 'green');

        }

        // PSW REQUIRE
        var psw = $("input[name='psw']").val();
        var new_psw = $("input[name='new_psw']").val();

        if (psw == '') {
            $('.psw_error').text('*Please Enter Password').css('color', 'red');
            flag = 0;
        } else {
            $('.psw_error').text('✓').css('color', 'green');
            if (new_psw == '') {
                $('.new_psw_error').text('*Re-Enter Password').css('color', 'red');
                flag = 0;
            } else {
                $('.new_psw_error').text('✓').css('color', 'green');
                if (psw != new_psw) {
                    $('.new_psw_error').text('Not match').css('color', 'red');
                    flag = 0;
                } else {
                    $('.new_psw_error').text('✓').css('color', 'green');
                }
            }
        }

        var phone = $("input[name='phone']").val();
        if (phone == '') {
            $('.phone_error').text('Please Enter Phone No').css('color', 'red');
            flag = 0;
        } else {
            $('.phone_error').text('✓').css('color', 'green');
        }

        //drop down for country

        var country = $("select#country option:selected").val();
        if (country === '') {
            $(".country_error").text('Select Your Country').css('color', 'red');
            flag = 0;
        } else {
            $(".country_error").text('✓').css('color', 'green');
        }

        var city = $("input[name='city']").val();
        if (city == '') {
            $('.city_error').text('Select Your City').css('color', 'red');
            flag = 0;
        } else {
            $(".city_error").text('✓').css('color', 'green');
        }

        var adress = $("textarea[name='adress']").val();
        if (adress == '') {
            $('.adress_error').text('Select Your City').css('color', 'red');
            flag = 0;
        } else {
            $(".adress_error").text('✓').css('color', 'green');
        }

        var pincode = $("input[name='pincode']").val();
        if (pincode == '') {
            $('.pincode_error').text('Select Your Pincode').css('color', 'red');
            flag = 0;
        } else {
            $('.pincode_error').text('✓').css('color', 'green');
        }

        //checkbox require
        var habbies = $(".habbies :checkbox").is(':checked');
        if (habbies == false) {
            $('.habbies_error').text('Select Your Habbies').css('color', 'red');
            flag = 0;
        } else {
            $('.habbies_error').text('✓').css('color', 'green');
        }

        //file require
        var tc = $("input[name='file']").val();

        if (tc === '') {
            $(".tc_error").text('Please Inset Document').css('color', 'red');
            flag = 0;
        } else {
            $(".tc_error").text('✓').css('color', 'green');
        }

        var course = $(".course option:selected").val();

        if (course == '') {
            $(".course_error").text('Please Select Course').css('color', 'red');
            flag = 0;
        } else {
            $(".course_error").text('✓').css('color', 'green');
        }



        if (flag == 0) {
            return false;
        }
    });
});