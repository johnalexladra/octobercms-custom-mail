// Code
<?php

function onHandleForm() {
    //$this['lastValue'] = post('first_name');
    $friends_email = array(
        post('frnd0_email'), post('frnd1_email'), post('frnd2_email'), post('frnd3_email')
    );

    $friends_name = array(
        post('frnd0_name'), post('frnd1_name'), post('frnd2_name'), post('frnd3_name')
    );

    $to_1 = implode(',', array_filter($friends_email));

    /* send to friend's email */
    //$to_1 = post('frnd1_email');
    $from = post('email');
    $subject_1 = "Referral";
    $message_1 = "Hi " . post('frnd')
    $message_1 .= post('first_name') . post('last_name') . " wanted you to know about Paws & Co Wellness Clinic, a new type of veterinary clinic that offers high quality and affordable wellness care for your pet. We are so honored that " . post('first_name') . " thinks so highly of us to refer you our way. We can’t wait to meet you and provide great wellness care for your pet(s) at family friendly prices. Here is a link to our website for more information on Paws & Co, including our phone number and even a link to request an appointment online <a href='" . $_SERVER['HTTP_HOST'] ."'> " . $_SERVER['HTTP_HOST'] . " </a>. Or you can simply call us directly at 920-471-0643. ";

    $headers_1 = 'From: ' . $from . "\r\n";
    $headers_1 .= "MIME-Version: 1.0" . "\r\n";
    $headers_1 .= "Content-type:text/plain;charset=utf-8" . "\r\n";

    mail($to_1, $subject_1, $message_1, $headers_1);

    /* send to client's email */
    /*$to_2 = "ar.pawsandco@gmail.com";*/
    $to_2 = "john.cr54rep@gmail.com";
    $from = post('email');
    $subject_2 = "Referral";

    $message_2 =  "Refer a friend: " . "\r\n";
    $message_2 .=  "Your first name : " . post('first_name') . "\r\n";
    $message_2 .=  "Your last name : " . post('last_name') . "\r\n";
    $message_2 .=  "Your email : " . post('email') . "\r\n"; 
    $message_2 .=  "Friend&#39;s name : " . post('frnd1_name') . "\r\n";
    $message_2 .=  "Friend&#39;s email &#40;have them be able to put up to 3 friends emails in&#41;" ."\r\n";

    $headers_2 = 'From: ' . $from . "\r\n";
    $headers_2 .= "MIME-Version: 1.0" . "\r\n";
    $headers_2 .= "Content-type:text/plain;charset=utf-8" . "\r\n";

    mail($to_2, $subject_2, $message_2, $headers_2);

}

/*
function onStart() {

    return var_dump($_SERVER);
}*/

?>

// Markup {# form_open({ request: 'onHandleForm' }) #}
<!--    Please enter a string: <input type="text" name="friend_email"/>
<input type="submit" value="Submit me!"/> -->
{# form_close() #}
<!-- <p>Last submitted value: {# lastValue }}</p>#} -->

{{ form_open({ request: 'onHandleForm' }) }}
<div class="form ">
    <div class="leadForm_Lnw1eFDfD7HrJ0W-nECLRvjx">
        <div class="leadForm">
            <form action="" method="POST">
                <div class="form__group form-input-first_name hasLabel">
                    <div class="label_container">
                        <label for="first_name-1502314001026">First Name</label>
                    </div>
                    <div class="input_container">
                        <input id="first_name-1502314001026" name="first_name" data-ref-name="first_name" class="form__control" placeholder="Enter your First Name" type="text">
                    </div>
                </div>
                <div class="form__group form-input-last_name hasLabel">
                    <div class="label_container">
                        <label for="last_name-1502314001028">Last Name</label>
                    </div>
                    <div class="input_container">
                        <input id="last_name-1502314001028" name="last_name" data-ref-name="last_name" class="form__control" placeholder="Enter your Last Name" type="text">
                    </div>
                </div>
                <div class="form__group form-input-email hasLabel">
                    <div class="label_container">
                        <label for="email-1502314001028">Email</label>
                    </div>
                    <div class="input_container">
                        <input id="email-1502314001028" name="email" data-ref-name="email" class="form__control" placeholder="Enter email" type="email">
                    </div>
                </div>
                <div id="field">
                    <div id="field0" name="field0">
                        <div class="form__group form-input-frnd-name hasLabel">
                            <div class="label_container">
                                <label for="name-frnd-0">Friend's Name</label>
                            </div>
                            <div class="input_container">
                                <input id="name-frnd-0" name="frnd0_name" data-ref-name="frnd0_name" class="form__control" placeholder="Enter your friend's name (required)" type="text">
                            </div>
                        </div>
                        <div class="form__group form-input-frnd-email hasLabel">
                            <div class="label_container">
                                <label for="email-frnd-0">Friend's Email</label>
                            </div>
                            <div class="input_container">
                                <input id="email-frnd-0" name="frnd0_email" data-ref-name="frnd0_email" class="form__control" placeholder="Enter friend's primary email address" type="email">
                            </div>
                        </div>
                    </div>
                </div>
                <span class="form-wrap__submit"><input id="add-more" class="btn submit" name="add-more" value="Add Referral" ></span>

                <span class="form-wrap__submit"><input class="btn submit" name="submit" value="Submit" type="submit"></span>
                <div aria-hidden="true">
                    <input name="__lf__ref_contact_field" aria-label="__lf__ref_contact_field" tabindex="-1" type="hidden">
                </div>
            </form>
        </div>
    </div>
</div>
{{ form_close() }} // Custom JS
<script>
    var max_fields = 3; //maximum input boxes allowed
    var wrapper = $("#field"); //Fields wrapper
    var add_button = $("#add-more"); //Add button ID

    var count = 0; //initlal text box count
    $(add_button).click(function(e) { //on add input button click
        e.preventDefault();
        if (count < max_fields) { //max input box allowed
            count++; //text box increment

            $(wrapper).append('<div id="field' + count + '" name="field' + count + '"><div class="form__group form-input-name hasLabel"><div class="label_container"><label for="name-frnd' + count + '-name">Friend&#39;s Name</label></div><div class="input_container"><input id="frnd' + count + '-name" name="frnd' + count + '_name" data-ref-name="name" class="form__control" placeholder="Enter your friend&#39;s name (required)" type="text"></div></div><div class="form__group form-input-frnd-email' + count + ' hasLabel"><div class="label_container"><label for="email-frnd-' + count + '-email">Friend&#39;s Email</label></div><div class="input_container"><input id="email-frnd-' + count + '-email" name="frnd' + count + '_email" data-ref-name="frnd' + count + '_email" class="form__control" placeholder="Enter friend&#39;s primary email address" type="email"></div></div><button id="remove' + (count) + '" class="btn btn-danger remove-me">Remove</button></div>');
        }
    });

    $(wrapper).on("click", ".remove-me", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        count--;
    });
</script>