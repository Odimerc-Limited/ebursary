$(document).ready(function() {

   $('#example').DataTable();

    //country select placeholder
    $("#countries").select2({
        placeholder: "Add your country",
        allowClear: true
    });

    //country codes select placeholder
    $("#country-codes").select2({
        allowClear: true
    });

    //user level
    $("#user-level").select2({
        allowClear: true
    });

    //user status
    $("#user-status").select2({
        allowClear: true
    });

});

//toggle email and sms template view
function toggle_email_sms_view() {
    var base_url = "http://localhost/bursary/";
    var checkedValue = $('.toggle-temps:checked').val();
    if(checkedValue === 'slide')
    {
        $.ajax({
            type: "POST",
            url: base_url + "organization/toggle_sms_email_setting/on",
            success: function (data) {text
                $(".temp_settings").show();
            }
        });
    }
    else {

        $.ajax({
            type: "POST",
            url: base_url + "organization/toggle_sms_email_setting/off",
            success: function (data) {
                $(".temp_settings").hide();
            }
        });
    }
}

//get organization email-sms-template status dynamically
(function worker() {
    var base_url = "http://localhost/bursary/";
    $.ajax({

        url: base_url + "organization/get_toggle_sms_email_setting/",
        type: "GET",
        success: function(data) {

            if(data === 'block')
            {
                $(".temp_settings").css({"display" : "block"});
                $(".toggle-temps").prop("checked","checked");
            }

            if(data === 'none')
            {
                $(".temp_settings").css({"display" : "none"});
                $(".toggle-temps").prop("checked","");
            }

            if(data === 'out')
            {
                $(".temp_settings").css({"display" : "none"});
                $(".toggle-temps").prop("checked","");
            }
        },
        complete: function() {
            setTimeout(worker, 0);
        }
    });
})();

$(document).ready(function () {

    $("#section-name-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#section-name-form").serializeArray(),
            success: function (result) {
                $(".section-name-label").html(result);
            }
        });
    });
});


$(document).ready(function () {

    $("#opportunity-section-name-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#opportunity-section-name-form").serializeArray(),
            success: function (result) {
                $(".opportunity-section-name-label").html(result);
            }
        });
    });

});


// Creating organization's form template
$(document).ready(function () {

    //cancel button toggle

    $(".cancel-btn").click(function () {
        $("#open_ended_box").hide();
        $("#lengthy_answer_box").hide();
        $("#file_upload_box").hide();
        $("#multi_choice_box").hide();
        $("#multiple_answers_box").hide();
        $("#numeric_answer_box").hide();
        $("#date_answer_box").hide();
        $(".questions-box").hide();
        $(".question-categories").show();
    });

    //show form template questions boxes

    // open ended question box

    $(".open_ended_question").click(function () {
        $("#open_ended_box").show();
        $(".questions-box").show();
        $(".question-categories").hide();

    });

    //add open ended question to database

    $("#add_open_ended_quiz").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_open_ended_quiz").serializeArray(),
            success: function (result) {
                $(".section_questions").html(result);
                $(".questions-box").hide();
                $(".question-categories").show();
                $("#add_open_ended_quiz")[0].reset();
            }
        });
    });

    // lengthy question box

    $(".lengthy_answer").click(function () {
        $("#lengthy_answer_box").show();
        $(".questions-box").show();
        $(".question-categories").hide();
    });

    //add lengthy question to database

    $("#add_lengthy_answer_quiz").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_lengthy_answer_quiz").serializeArray(),
            success: function (result) {
                $(".section_questions").html(result);
                $(".questions-box").hide();
                $(".question-categories").show();
                $("#add_lengthy_answer_quiz")[0].reset();
            }
        });
    });

    // file upload question box

    $(".file_upload").click(function () {
        $("#file_upload_box").show();
        $(".questions-box").show();
        $(".question-categories").hide();

    });

    //add file upload question to database

    $("#add_file_upload").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_file_upload").serializeArray(),
            success: function (result) {
                $(".section_questions").html(result);
                $(".questions-box").hide();
                $(".question-categories").show();
                $("#add_file_upload")[0].reset();
            }
        });
    });

    // multi choice question box

    $(".multi_choice").click(function () {
        $("#multi_choice_box").show();
        $(".questions-box").show();
        $(".question-categories").hide();

    });

    //add multi choice question to database

    $("#add_multi_choice").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_multi_choice").serializeArray(),
            success: function (result) {
                $(".section_questions").html(result);
                $(".questions-box").hide();
                $(".question-categories").show();
                $("#add_multi_choice")[0].reset();
            }
        });
    });

    // multiple answers box

    $(".multiple_answers").click(function () {
        $("#multiple_answers_box").show();
        $(".questions-box").show();
        $(".question-categories").hide();

    });

    //add multiple answers question to database

    $("#add_multiple_answers").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_multiple_answers").serializeArray(),
            success: function (result) {
                $(".section_questions").html(result);
                $(".questions-box").hide();
                $(".question-categories").show();
                $("#add_multiple_answers")[0].reset();
            }
        });
    });

    // numeric question box

    $(".numeric_answer").click(function () {
        $("#numeric_answer_box").show();
        $(".questions-box").show();
        $(".question-categories").hide();

    });

    //add numeric question to database

    $("#add_numeric_answer").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_numeric_answer").serializeArray(),
            success: function (result) {
                $(".section_questions").html(result);
                $(".questions-box").hide();
                $(".question-categories").show();
                $("#add_numeric_answer")[0].reset();
            }
        });
    });

    // date question box

    $(".date_answer").click(function () {
        $("#date_answer_box").show();
        $(".questions-box").show();
        $(".question-categories").hide();

    });

    //add date question to database

    $("#add_date_answer").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_date_answer").serializeArray(),
            success: function (result) {
                $(".section_questions").html(result);
                $(".questions-box").hide();
                $(".question-categories").show();
                $("#add_date_answer")[0].reset();
            }
        });
    });
});



// Creating organization's opportunity form questions

$(document).ready(function () {

    //cancel button toggle

    $(".opportunity-cancel-btn").click(function () {
        $("#opportunity_open_ended_box").hide();
        $("#opportunity_lengthy_answer_box").hide();
        $("#opportunity_file_upload_box").hide();
        $("#opportunity_multi_choice_box").hide();
        $("#opportunity_multiple_answers_box").hide();
        $("#opportunity_numeric_answer_box").hide();
        $("#opportunity_date_answer_box").hide();
        $(".opportunity-questions-box").hide();
        $(".opportunity-question-categories").show();
    });

    //show form template questions boxes

    // open ended question box

    $(".opportunity_open_ended_question").click(function () {
        $("#opportunity_open_ended_box").show();
        $(".opportunity-questions-box").show();
        $(".opportunity-question-categories").hide();

    });

    //add open ended question to database

    $("#add_opportunity_open_ended_quiz").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_opportunity_open_ended_quiz").serializeArray(),
            success: function (result) {
                $(".opportunity_section_questions").html(result);
                $(".opportunity-questions-box").hide();
                $(".opportunity-question-categories").show();
                $("#add_opportunity_open_ended_quiz")[0].reset();
            }
        });
    });

    // lengthy question box

    $(".opportunity_lengthy_answer").click(function () {
        $("#opportunity_lengthy_answer_box").show();
        $(".opportunity-questions-box").show();
        $(".opportunity-question-categories").hide();
    });

    //add lengthy question to database

    $("#add_opportunity_lengthy_answer_quiz").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_opportunity_lengthy_answer_quiz").serializeArray(),
            success: function (result) {
                $(".opportunity_section_questions").html(result);
                $(".opportunity-questions-box").hide();
                $(".opportunity-question-categories").show();
                $("#add_opportunity_lengthy_answer_quiz")[0].reset();
            }
        });
    });

    // file upload question box

    $(".opportunity_file_upload").click(function () {
        $("#opportunity_file_upload_box").show();
        $(".opportunity-questions-box").show();
        $(".opportunity-question-categories").hide();
    });

    //add file upload question to database

    $("#add_opportunity_file_upload").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_opportunity_file_upload").serializeArray(),
            success: function (result) {
                $(".opportunity_section_questions").html(result);
                $(".opportunity-questions-box").hide();
                $(".opportunity-question-categories").show();
                $("#add_opportunity_file_upload")[0].reset();
            }
        });
    });

    // multi choice question box

    $(".opportunity_multi_choice").click(function () {
        $("#opportunity_multi_choice_box").show();
        $(".opportunity-questions-box").show();
        $(".opportunity-question-categories").hide();

    });

    //add multi choice question to database

    $("#add_opportunity_multi_choice").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_opportunity_multi_choice").serializeArray(),
            success: function (result) {
                $(".opportunity_section_questions").html(result);
                $(".opportunity-questions-box").hide();
                $(".opportunity-question-categories").show();
                $("#add_opportunity_multi_choice")[0].reset();
            }
        });
    });

    // multiple answers box

    $(".opportunity_multiple_answers").click(function () {
        $("#opportunity_multiple_answers_box").show();
        $(".opportunity-questions-box").show();
        $(".opportunity-question-categories").hide();

    });

    //add multiple answers question to database

    $("#add_opportunity_multiple_answers").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_opportunity_multiple_answers").serializeArray(),
            success: function (result) {
                $(".opportunity_section_questions").html(result);
                $(".opportunity-questions-box").hide();
                $(".opportunity-question-categories").show();
                $("#add_opportunity_multiple_answers")[0].reset();
            }
        });
    });

    // numeric question box

    $(".opportunity_numeric_answer").click(function () {
        $("#opportunity_numeric_answer_box").show();
        $(".opportunity-questions-box").show();
        $(".opportunity-question-categories").hide();

    });

    //add numeric question to database

    $("#add_opportunity_numeric_answer").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_opportunity_numeric_answer").serializeArray(),
            success: function (result) {
                $(".opportunity_section_questions").html(result);
                $(".opportunity-questions-box").hide();
                $(".opportunity-question-categories").show();
                $("#add_opportunity_numeric_answer")[0].reset();
            }
        });
    });

    // date question box

    $(".opportunity_date_answer").click(function () {
        $("#opportunity_date_answer_box").show();
        $(".opportunity-questions-box").show();
        $(".opportunity-question-categories").hide();

    });

    //add date question to database

    $("#add_opportunity_date_answer").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url :$(this).attr('action'),
            data : $("#add_opportunity_date_answer").serializeArray(),
            success: function (result) {
                $(".opportunity_section_questions").html(result);
                $(".opportunity-questions-box").hide();
                $(".opportunity-question-categories").show();
                $("#add_opportunity_date_answer")[0].reset();
            }
        });
    });
});


//change opportunity status depending on date

(function worker() {
    var base_url = "http://localhost/bursary/";
    $.ajax({

        url: base_url + "organization/toggle_opportunity_status",
        success: function(data){
        },
        complete: function() {
            setTimeout(worker, 1000);
        }

    });
})();

//copy org section templates to sections table




//copy org template questions to questions table

(function worker() {
    var base_url = "http://localhost/bursary/";
    $.ajax({
        url: base_url + "organization/copy_question_templates",
        success: function(data){
        },
        complete: function() {
            setTimeout(worker, 1000);
        }
    });
})();

$(document).ready(function () {
    $("#general_settings_form").submit(function (e) {
        e.preventDefault(e);
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $("#general_settings_form").serializeArray(),
            success: function (results) {
                $(".org_section_slides").html(results);
            }
        });
    });
});
