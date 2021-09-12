<link href="<?php echo base_url('assets/formBuilder/css/demo.css') ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/formBuilder/jquery.rateyo.min.css') ?>" rel="stylesheet" type="text/css">

<style type="text/css">
    .stepwizard-step p {
        margin-top: 10px;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;

    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }

    .all-slides {
        counter-reset: slides;
        height: 100%;
        overflow: auto;
    }

    .slide {
        width: 100%;
        height: 70px;
        background: linear-gradient(#A9A9A9, #808080);
        position: relative;
        user-select: none;
        border: 1px solid white;
        margin: 0 0 0.75rem 0;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        text-align: center;
        color: white;
        line-height: 60px;
        font-size: 0.5rem;
        z-index: 5;
    }

    .slide-active {
        width: 100%;
        height: 70px;
        background:  rgb(83,109,254)!important;
        position: relative;
        user-select: none;
        border: 1px solid white;
        margin: 0 0 0.75rem 0;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        text-align: center;
        color: white;
        line-height: 60px;
        font-size: 0.5rem;
        z-index: 5;
    }

    .slide:before {
        position: absolute;
        bottom: 0;
        right: 100%;
        counter-increment: slides;
        content: counter(slides);
        padding-right: 0.35rem;
        color: #999;
        line-height: normal;
        font-size: 1rem;
    }

    .ui-sortable-helper {
        transition: none !important;
        animation: pulse 0.4s alternate infinite;
    }

    .sortable-placeholder {
        height: 60px;
        width: 5px;
        border-left: 2px solid #4999DA;
        margin: 0 0 0.75rem 0;
        position: relative;
        z-index: 6;
    }

    @keyframes pulse {
        100% {
            transform: scale(1.1);
        }
    }

    .cloned-slides .slide {
        position: absolute;
        z-index: 1;
    }

    .cloned-slides .slide:before {
        content: attr(data-pos);
    }
</style>

<main class="mdl-layout__content" style="flex: 1 0 auto;">
    <div class="page-content body-content">
        <div class="container">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-default">General Settings</a>
                        <p></p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-primary">Form Builder</a>
                        <p></p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-default">Notifications</a>
                        <p></p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-4" type="button" class="btn btn-default">Review Designer</a>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-1">
                <div class="col-lg-12 col-md-12 col-sm 12 col-xs-12">
                    <form method="post" id="general_settings_form" action="<?php echo base_url('organization/add_opportunity_general_setting')?>">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3> General Settings</h3>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label">Title Of Opportunity</label>
                                    <input maxlength="20" type="text" required class="form-control" name="title"
                                           placeholder="Enter Opportunity Title"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Type Of Opportunity</label>
                                    <select class="form-control" name="type" required>
                                        <option value="">--- Select Opportunity Type ----</option>
                                        <option value="Bursary">Bursary</option>
                                        <option value="Scholarship">Scholarship</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Amount Proposed</label>
                                    <input maxlength="7" type="number" required class="form-control" name="amount"
                                           placeholder="Enter Amount Proposed"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" rows="6" name="description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Target Gender</label>
                                    <select class="form-control" name="gender" required>
                                        <option value="">--- SelectTarget Gender ----</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Level of Education</label>
                                    <select class="form-control" name="education" required>
                                        <option value="">--- Select Level of Education ----</option>
                                        <option value="Primary">Primary</option>
                                        <option value="High School">High School</option>
                                        <option value="Undergraduate">Undergraduate</option>
                                        <option value="Postgraduate">Postgraduate</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Date Posted Online</label>
                                    <input maxlength="20" type="date" name="date_online" required class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Date to go offline</label>
                                    <input maxlength="20" type="date" name="date_offline" required class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label checkbox-inline">
                                        <b>
                                            <input type="checkbox" name="advertise" value="1" required>
                                            Advertise this opportunity on ebursary platform
                                        </b>
                                    </label>
                                </div>
                                <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect nextBtn pull-right"
                                        type="submit">
                                    Next
                                    &nbsp;
                                    <i class="material-icons">forward</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-lg-12 col-md-12 col-sm 12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3> Form Builder </h3>
                            <hr>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <div class='cloned-slides' id='cloned-slides'></div>
                                        <div class='all-slides org_section_slides' id="opportunity_slides">
                                            <?php foreach ($sections as $section) {?>
                                                <a href="<?php echo base_url('organization/form_section/'.$section->section_id)?>">
                                                    <div class='<?php echo ($this->uri->segment(3) == $section->section_id ? "slide-active" : "slide")?>'>
                                                        <h6 style="margin-bottom: 10px;">
                                                            <?php echo $section->name ;?>
                                                        </h6>
                                                    </div>
                                                </a>
                                            <?php }?>
                                        </div>
                                        <hr>
                                        <a href="<?php echo base_url('organization/create_form_section/'.$org_id.'/'.$opp_id)?>" class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
                                           type="button" onclick="new_section()">
                                            <i class="material-icons">add</i>
                                            &nbsp;
                                            Add A New Section
                                        </a>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="col-md-12">

                                            <!--Section panel to capture its name-->

                                            <form method="post" id="opportunity-section-name-form" action="<?php echo base_url('organization/update_opportunity_section_name')?>">
                                                <div class="form-group">
                                                    <label class="opportunity-section-name-label">
                                                        <?php echo $current_section ;?>
                                                    </label>
                                                    <input type="text" class="form-control" id="section-name-input" name="name"
                                                           required placeholder="Enter Section Name" value="<?php echo ($section_changed == 1 ? $current_section : "") ;?>">
                                                    <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                    <input type="hidden" name="section_id" value="<?php echo $section_id ;?>">
                                                </div>
                                                <div class="form-group">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                Change Name
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Delete Section
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>

                                            <!--Section panel to capture its name-->
                                            <hr>

                                            <!--Questions related to this section... comes from database questions fields here -->

                                            <h5>Questions in this Section</h5>
                                            <br>

                                            <div class="opportunity_section_questions">
                                                <?php if(count($section_questions) == 0) {?>
                                                <?php } else {?>
                                                    <?php foreach ($section_questions as $section_question) {?>
                                                        <div class="panel panel-default">
                                                            <a role="button" data-toggle="collapse" href="#collapseOne<?php echo $section_question->id ;?>"
                                                               aria-expanded="true" aria-controls="collapseOne"
                                                               class="trigger collapsed mdl-color-text--grey-700">
                                                                <div class="panel-heading" role="tab" id="headingOne<?php echo $section_question->id ;?>">
                                                                    <h4 class="panel-title" id="p_title">
                                                                        <div class="row">
                                                                            <div class="col-xs-11" id="opportunity-section-question-name<?php echo $section_question->id ;?>">
                                                                                <?php echo $section_question->name ;?>
                                                                            </div>
                                                                            <div class="col-xs-1">
                                                                                <i class="fa fa-chevron-down">
                                                                                </i>
                                                                            </div>
                                                                        </div>
                                                                    </h4>
                                                                </div>
                                                            </a>
                                                            <div id="collapseOne<?php echo $section_question->id ;?>" class="panel-collapse collapse"
                                                                 role="tabpanel" aria-labelledby="headingOne<?php echo $section_question->id ;?>">
                                                                <div class="panel-body" style="border-top: solid 1px;">
                                                                    <form id="edit-opportunity-section-question-form<?php echo $section_question->id?>" method="post">
                                                                        <?php if($section_question->response == 'textarea') {?>
                                                                            <div class="col-sm-7">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="<?php echo $section_question->name?>">
                                                                                    <input type="hidden" name="org_id" value="<?php echo $section_question->org_id ;?>">
                                                                                    <input type="hidden" name="section_id" value="<?php echo $section_question->section_id ;?>">
                                                                                    <input type="hidden" name="q_id" value="<?php echo $section_question->question_id ;?>">
                                                                                    <input type="hidden" name="opp_id" value="<?php echo $section_question->opp_id ;?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Maximum word count
                                                                                    </label>
                                                                                    <input type="number" class="form-control" name="word_count" value="<?php echo $section_question->word_count; ?>" placeholder="enter number">
                                                                                </div>
                                                                            </div>
                                                                        <?php }elseif($section_question->response == 'radio') {?>
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="<?php echo $section_question->name?>">
                                                                                    <input type="hidden" name="org_id" value="<?php echo $section_question->org_id ;?>">
                                                                                    <input type="hidden" name="section_id" value="<?php echo $section_question->section_id ;?>">
                                                                                    <input type="hidden" name="q_id" value="<?php echo $section_question->question_id ;?>">
                                                                                    <input type="hidden" name="opp_id" value="<?php echo $section_question->opp_id ;?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label class = "mdl-checkbox mdl-js-checkbox radio-inline" for = "checkbox<?php echo $section_question->id ;?>" style="margin-top: 30px;">
                                                                                        <input type = "checkbox" id = "checkbox<?php echo $section_question->id ;?>"
                                                                                               class = "mdl-checkbox__input" name="option" value="1" <?php echo ($section_question->required == 1 ? "checked" : "")?>>
                                                                                        <span class = "mdl-checkbox__label">Make mandatory</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        <?php }elseif($section_question->response == 'checkbox') {?>
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="<?php echo $section_question->name?>">
                                                                                    <input type="hidden" name="org_id" value="<?php echo $section_question->org_id ;?>">
                                                                                    <input type="hidden" name="section_id" value="<?php echo $section_question->section_id ;?>">
                                                                                    <input type="hidden" name="q_id" value="<?php echo $section_question->question_id ;?>">
                                                                                    <input type="hidden" name="opp_id" value="<?php echo $section_question->opp_id ;?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label class = "mdl-checkbox mdl-js-checkbox radio-inline" for = "checkbox<?php echo $section_question->id ;?>" style="margin-top: 30px;">
                                                                                        <input type = "checkbox" id = "checkbox<?php echo $section_question->id ;?>"
                                                                                               class = "mdl-checkbox__input" name="option" value="1" <?php echo ($section_question->required == 1 ? "checked" : "")?>>
                                                                                        <span class = "mdl-checkbox__label">Make mandatory</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        <?php }else {?>
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="<?php echo $section_question->name?>">
                                                                                    <input type="hidden" name="org_id" value="<?php echo $section_question->org_id ;?>">
                                                                                    <input type="hidden" name="section_id" value="<?php echo $section_question->section_id ;?>">
                                                                                    <input type="hidden" name="q_id" value="<?php echo $section_question->question_id ;?>">
                                                                                    <input type="hidden" name="opp_id" value="<?php echo $section_question->opp_id ;?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label class = "mdl-checkbox mdl-js-checkbox radio-inline" for = "checkbox<?php echo $section_question->id ;?>" style="margin-top: 30px;">
                                                                                        <input type = "checkbox" id = "checkbox<?php echo $section_question->id ;?>"
                                                                                               class = "mdl-checkbox__input" name="option" value="1" <?php echo ($section_question->required == 1 ? "checked" : "")?>>
                                                                                        <span class = "mdl-checkbox__label">Make mandatory</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>

                                                                        <div class="col-md-12">
                                                                            <ul class="list-inline">
                                                                                <li>
                                                                                    <button type="submit" class="btn btn-success btn-sm">
                                                                                        Edit Question
                                                                                    </button>
                                                                                </li>
                                                                                <li>
                                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_opportunity_section_question<?php echo $section_question->id ;?>()">
                                                                                        Delete question
                                                                                    </button>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <br>
                                                                            <p class="text-success" id="change_opportunity_success<?php echo $section_question->id ;?>" style="display: none;">
                                                                                Changes saved successfully
                                                                            </p>
                                                                        </div>
                                                                    </form>

                                                                    <?php if($section_question->response == 'radio') {?>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Responses
                                                                                </label>
                                                                                <?php
                                                                                $responses = $this->db->get_where('form_questions_fields', array('section_id' => $section_question->section_id, 'question_id'=> $section_question->question_id, 'opp_id' => $section_question->opp_id))->result();
                                                                                ?>
                                                                                <ul class="list-unstyled opportunity_response_values<?php echo $section_question->id?>">
                                                                                    <?php foreach ($responses as $response) {?>
                                                                                        <li>
                                                                                            <div class="col-xs-6">
                                                                                                <?php echo $response->field ;?>
                                                                                            </div>
                                                                                            <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_opportunity_radio_field_value" onclick="delete_opportunity_radio_response<?php echo $response->id?>()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_opportunity_radio_response<?php echo $response->id?>() {
                                                                                                    $.ajax({
                                                                                                        url : "<?php echo base_url('organization/delete_opportunity_radio_field/'.$response->id.'/'.$response->org_id.'/'.$response->section_id.'/'.$response->question_id.'/'.$section_question->id.'/'.$response->opp_id)?>",
                                                                                                        success: function (result) {
                                                                                                            $(".opportunity_response_values<?php echo $section_question->id?>").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                        </li>
                                                                                    <?php }?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        <form method="post" id="add_opportunity_more_multi_choice_responses<?php echo $section_question->id ;?>">
                                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                                            <input type="hidden" name="section_id" value="<?php echo $section_question->section_id ;?>">
                                                                            <input type="hidden" name="question_id" value="<?php echo $section_question->question_id ;?>">
                                                                            <input type="hidden" name="s_q_id" value="<?php echo $section_question->id ;?>">
                                                                            <input type="hidden" name="opp_id" value="<?php echo $section_question->opp_id ;?>">
                                                                            <div class="col-md-12">
                                                                                <div class="input-group control-group after-add-opportunity-fields<?php echo $section_question->id?>">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="input-group-btn">
                                                                                                <button class="btn btn-primary btn-xs add-opportunity-radio-field<?php echo $section_question->id?>" type="button">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                    &nbsp;
                                                                                                    Add more responses
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="new_opportunity_question_responses<?php echo $section_question->id?>" style="display: none;">
                                                                                    <div class="copy-opportunity-radio-fields<?php echo $section_question->id?> hide ">
                                                                                        <div class="control-group opportunity-radio-filed-display input-group" style="margin-top:10px;">
                                                                                            <input type="text" name="new_radio_fields[]" class="form-control" placeholder="Enter Response">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <br>
                                                                                <button class="btn btn-success btn-sm opportunity-btn-response<?php echo $section_question->id?>"
                                                                                        type="submit" style="display: none;">
                                                                                    Submit
                                                                                </button>
                                                                            </div>
                                                                        </form>

                                                                        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>

                                                                        <script type="text/javascript">

                                                                            $(document).ready(function() {

                                                                                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                                                                                $(".add-opportunity-radio-field<?php echo $section_question->id?>").click(function(){
                                                                                    var html = $(".copy-opportunity-radio-fields<?php echo $section_question->id?>").html();
                                                                                    $(".after-add-opportunity-fields<?php echo $section_question->id?>").after(html);
                                                                                    $("#new_opportunity_question_responses<?php echo $section_question->id?>").show();
                                                                                    $(".opportunity-btn-response<?php echo $section_question->id?>").show();
                                                                                });
                                                                            });

                                                                        </script>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $("#add_opportunity_more_multi_choice_responses<?php echo $section_question->id ;?>").submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url : "<?php echo base_url('organization/add_opportunity_more_multi_choice_response')?>",
                                                                                        data : $("#add_opportunity_more_multi_choice_responses<?php echo $section_question->id ;?>").serializeArray(),
                                                                                        success: function (result) {
                                                                                            $(".opportunity_response_values<?php echo $section_question->id?>").html(result);
                                                                                            $("#add_opportunity_more_multi_choice_responses<?php echo $section_question->id ;?>")[0].reset();
                                                                                            $("#new_opportunity_question_responses<?php echo $section_question->id?>").hide();
                                                                                        }
                                                                                    });
                                                                                });
                                                                            });
                                                                        </script>
                                                                    <?php }?>


                                                                    <?php if($section_question->response == 'checkbox') {?>

                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Answers
                                                                                </label>
                                                                                <?php
                                                                                $answers = $this->db->get_where('form_questions_fields', array('section_id' => $section_question->section_id, 'question_id'=> $section_question->question_id, 'opp_id' => $section_question->opp_id))->result();
                                                                                ?>
                                                                                <ul class="list-unstyled opportunity_checkbox_answers<?php echo $section_question->id?>">
                                                                                    <?php foreach ($answers as $answer) {?>
                                                                                        <li>
                                                                                            <div class="col-xs-6">
                                                                                                <?php echo $answer->field ;?>
                                                                                            </div>
                                                                                            <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_opportunity_checkbox_field_value" onclick="delete_opportunity_checkbox_answer<?php echo $answer->id?>()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_opportunity_checkbox_answer<?php echo $answer->id?>() {
                                                                                                    $.ajax({
                                                                                                        url : "<?php echo base_url('organization/delete_opportunity_checkbox_field/'.$answer->id.'/'.$answer->org_id.'/'.$answer->section_id.'/'.$answer->question_id.'/'.$section_question->id.'/'.$answer->opp_id)?>",
                                                                                                        success: function (result) {
                                                                                                            $(".opportunity_checkbox_answers<?php echo $section_question->id?>").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                        </li>
                                                                                    <?php }?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        <form method="post" id="add_opportunity_more_multiple_answers<?php echo $section_question->id ;?>">
                                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                                            <input type="hidden" name="section_id" value="<?php echo $section_question->section_id ;?>">
                                                                            <input type="hidden" name="question_id" value="<?php echo $section_question->question_id ;?>">
                                                                            <input type="hidden" name="s_q_id" value="<?php echo $section_question->id ;?>">
                                                                            <input type="hidden" name="opp_id" value="<?php echo $section_question->opp_id ;?>">
                                                                            <div class="col-md-12">
                                                                                <div class="input-group control-group after-add-opportunity-answers<?php echo $section_question->id?>">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="input-group-btn">
                                                                                                <button class="btn btn-primary btn-xs add-opportunity-checkbox<?php echo $section_question->id?>" type="button">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                    &nbsp;
                                                                                                    Add more answers
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="new_opportunity_question_answers<?php echo $section_question->id?>" style="display: none;">
                                                                                    <div class="copy-opportunity-checkboxes<?php echo $section_question->id?> hide ">
                                                                                        <div class="control-group opportunity-checkbox-filed-display input-group" style="margin-top:10px;">
                                                                                            <input type="text" name="checkbox_answers[]" class="form-control" placeholder="Enter Response">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <br>
                                                                                <button class="btn btn-success btn-sm opportunity-btn-answer<?php echo $section_question->id?>"
                                                                                        type="submit" style="display: none;">
                                                                                    Submit
                                                                                </button>
                                                                            </div>
                                                                        </form>

                                                                        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>

                                                                        <script type="text/javascript">
                                                                            $(document).ready(function() {

                                                                                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                                                                                $(".add-opportunity-checkbox<?php echo $section_question->id?>").click(function(){
                                                                                    var html = $(".copy-opportunity-checkboxes<?php echo $section_question->id?>").html();
                                                                                    $(".after-add-opportunity-answers<?php echo $section_question->id?>").after(html);
                                                                                    $("#new_opportunity_question_answers<?php echo $section_question->id?>").show();
                                                                                    $(".opportunity-btn-answer<?php echo $section_question->id?>").show();
                                                                                });
                                                                            });

                                                                        </script>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $("#add_opportunity_more_multiple_answers<?php echo $section_question->id ;?>").submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url : "<?php echo base_url('organization/add_opportunity_more_multiple_answers')?>",
                                                                                        data : $("#add_opportunity_more_multiple_answers<?php echo $section_question->id ;?>").serializeArray(),
                                                                                        success: function (result) {
                                                                                            $(".opportunity_checkbox_answers<?php echo $section_question->id?>").html(result);
                                                                                            $("#add_opportunity_more_multiple_answers<?php echo $section_question->id ;?>")[0].reset();
                                                                                            $("#new_opportunity_question_answers<?php echo $section_question->id?>").hide();
                                                                                        }
                                                                                    });
                                                                                });
                                                                            });
                                                                        </script>
                                                                    <?php }?>

                                                                    <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $("#edit-opportunity-section-question-form<?php echo $section_question->id?>").submit(function (e) {
                                                                                e.preventDefault();
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: "<?php echo base_url('organization/edit_opportunity_section_question')?>",
                                                                                    data : $("#edit-opportunity-section-question-form<?php echo $section_question->id?>").serializeArray(),
                                                                                    success: function (results) {
                                                                                        $("#opportunity-section-question-name<?php echo $section_question->id ;?>").html(results);
                                                                                        $("#change_opportunity_success<?php echo $section_question->id ;?>").show();
                                                                                        $("#change_opportunity_success<?php echo $section_question->id ;?>").fadeOut(6000);
                                                                                    }
                                                                                });
                                                                            });
                                                                        });
                                                                    </script>
                                                                    <script type="text/javascript">
                                                                        function delete_opportunity_section_question<?php echo $section_question->id ;?>() {
                                                                            $.ajax({
                                                                                type: "POST",
                                                                                url: "<?php echo base_url('organization/delete_opportunity_section_question/'.$section_question->question_id.'/'.$section_question->section_id.'/'.$section_question->org_id.'/'.$section_question->opp_id)?>",
                                                                                success: function (results) {
                                                                                    $(".opportunity_section_questions").html(results);
                                                                                }
                                                                            });
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                <?php }?>
                                            </div>
                                            <hr>

                                            <!--Questions related to this section... comes from database questions fields here -->
                                        </div>
                                        <br>
                                        <!--Selecting questions types to create from here -->

                                        <div class="opportunity-question-categories">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <h5>
                                                    Create Question
                                                </h5>
                                                <p>
                                                    Please choose from the following options to include a question
                                                    in this section.
                                                </p>
                                                <br>
                                            </div>


                                            <!--First Question category -->
                                            <a href="javascript:;" class="opportunity_open_ended_question mdl-color-text--grey-700">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <h5 class="text-center">
                                                                Create a new Question<br>
                                                                <b>with an open ended answer</b>
                                                            </h5>
                                                            <br>
                                                            <p class="text-center" style="font-style: italic;">
                                                                e.g What is your name ?
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--First Question category -->

                                            <!--Second Question category -->
                                            <a href="javascript:;"
                                               class="opportunity_lengthy_answer mdl-color-text--grey-700">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <h5 class="text-center">
                                                                Create a new Question<br>
                                                                <b>with a lengthy answer</b>
                                                            </h5>
                                                            <br>
                                                            <p class="text-center" style="font-style: italic;">
                                                                e.g Tell us why you deserve this scholarship
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--Second Question category -->

                                            <!--Third Question category -->
                                            <a href="javascript:;"
                                               class="opportunity_file_upload mdl-color-text--grey-700">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="panel panel-default" style="height:  30vh;">
                                                        <div class="panel-body">
                                                            <h5 class="text-center">
                                                                Create a new Question<br>
                                                                <b>requesting a file upload</b>
                                                            </h5>
                                                            <br>
                                                            <p class="text-center" style="font-style: italic;">
                                                                e.g Upload your exam results
                                                            </p>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--Third Question category -->

                                            <!--Forth Question category -->
                                            <a href="javascript:;" class="opportunity_multi_choice mdl-color-text--grey-700">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <h5 class="text-center">
                                                                Create a multi choice question<br>
                                                                <b>with only one answer</b>
                                                            </h5>
                                                            <p class="text-center" style="font-style: italic;">
                                                                e.g What is your level of education?<br>
                                                                -Undergraduate<br>
                                                                -Highschool
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--Forth Question category -->

                                            <!--Fifth Question category -->
                                            <a href="javascript:;"
                                               class="opportunity_multiple_answers mdl-color-text--grey-700">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="panel panel-default" style="height: ;">
                                                        <div class="panel-body">
                                                            <h5 class="text-center">
                                                                Create a new Question<br>
                                                                <b>with multiple answers</b>
                                                            </h5>
                                                            <br>
                                                            <p class="text-center" style="font-style: italic;">
                                                                e.g Which of the following subjects are you good in?<br>
                                                                English<br>
                                                                Kiswahili<br>
                                                                Chemistry
                                                            </p>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--Fifth Question category -->

                                            <!--Sixth Question category -->
                                            <a href="javascript:;"
                                               class="opportunity_numeric_answer mdl-color-text--grey-700">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="panel panel-default" style="height: ;">
                                                        <div class="panel-body">
                                                            <h5 class="text-center">
                                                                Create a new Question<br>
                                                                <b>with numeric answer</b>
                                                            </h5>
                                                            <br>
                                                            <p class="text-center" style="font-style: italic;">
                                                                e.g How many siblings do you have?
                                                            </p>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--Sixth Question category -->

                                            <!--Seventh Question category -->
                                            <a href="javascript:;"
                                               class="opportunity_date_answer mdl-color-text--grey-700">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="panel panel-default" style="height: ;">
                                                        <div class="panel-body">
                                                            <h5 class="text-center">
                                                                Create a new Question<br>
                                                                <b>with a date answer</b>
                                                            </h5>
                                                            <br>
                                                            <p class="text-center" style="font-style: italic;">
                                                                e.g When is your birth date?
                                                            </p>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!--Seventh Question category -->
                                        </div>

                                        <!--Selecting questions types to create from here -->

                                        <!--Corresponding questions types responses -->

                                        <div class="opportunity-questions-box" style="display: none;">
                                            <div style="display: none;" id="opportunity_open_ended_box">
                                                <form method="post" id="add_opportunity_open_ended_quiz" action="<?php echo base_url('organization/add_opportunity_open_ended_quiz')?>">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h5>
                                                            A new Question with an open ended answer
                                                        </h5>
                                                        <br>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Question For Student
                                                            </label>
                                                            <input type="text" id="quiz" name="name" class="form-control"
                                                                   placeholder="Enter a question here..">
                                                            <input type="hidden" name="section_id" value="<?php echo $section_id ;?>">
                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <button class="btn btn-success btn-sm"
                                                                type="submit">
                                                            Create question
                                                        </button>
                                                        <button class="btn btn-danger btn-sm opportunity-cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="opportunity_lengthy_answer_box">
                                                <form method="post" id="add_opportunity_lengthy_answer_quiz" action="<?php echo base_url('organization/add_opportunity_lengthy_quiz')?>">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h5>
                                                            A new Question with a lengthy answer
                                                        </h5>
                                                        <br>
                                                    </div>

                                                    <div class="col-sm-7 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Question For Student
                                                            </label>
                                                            <input type="text" id="quiz" name="name" class="form-control"
                                                                   placeholder="Enter a question here..">
                                                            <input type="hidden" name="section_id" value="<?php echo $section_id ;?>">
                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-5 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Maximum word count
                                                            </label>
                                                            <input type="number" class="form-control" name="word_count" placeholder="Enter number">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <button class="btn btn-success btn-sm"
                                                                type="submit">
                                                            Create question
                                                        </button>
                                                        <button class="btn btn-danger btn-sm opportunity-cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>


                                            <div style="display: none;" id="opportunity_file_upload_box">
                                                <form method="post" id="add_opportunity_file_upload" action="<?php echo base_url('organization/add_opportunity_file_upload')?>">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h5>
                                                            A new Question requesting file upload
                                                        </h5>
                                                        <br>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Question For Student
                                                            </label>
                                                            <input type="text" id="quiz" name="name" class="form-control"
                                                                   placeholder="Enter a question here..">
                                                            <input type="hidden" name="section_id" value="<?php echo $section_id ;?>">
                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <button class="btn btn-success btn-sm"
                                                                type="submit">
                                                            Create question
                                                        </button>
                                                        <button class="btn btn-danger btn-sm opportunity-cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="opportunity_multi_choice_box">
                                                <form method="post" id="add_opportunity_multi_choice" action="<?php echo base_url('organization/add_opportunity_multi_choice')?>">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h5>
                                                            A multiple choice Question with only one answer
                                                        </h5>
                                                        <br>
                                                    </div>

                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Question For Student
                                                            </label>
                                                            <input type="text" id="quiz" name="name" class="form-control"
                                                                   placeholder="Enter a question here..">
                                                            <input type="hidden" name="section_id" value="<?php echo $section_id ;?>">
                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="input-group control-group after-add-more">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-primary btn-xs add-more" type="button">
                                                                            <i class="glyphicon glyphicon-plus"></i>
                                                                            &nbsp;
                                                                            Add responses
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="copy-fields hide ">
                                                            <div class="control-group input-group" style="margin-top:10px;">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <input type="text" name="fields[]" class="form-control" placeholder="Enter Answers">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <a href="javascript:;" class="remove">
                                                                            <i class="fa fa-trash" style="font-size: 25px;"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <br>
                                                        <button class="btn btn-success btn-sm"
                                                                type="submit">
                                                            Create question
                                                        </button>
                                                        <button class="btn btn-danger btn-sm opportunity-cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="opportunity_multiple_answers_box">
                                                <form method="post" id="add_opportunity_multiple_answers" action="<?php echo base_url('organization/add_opportunity_multiple_answers')?>">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h5>
                                                            A multi choice Question with multiple answers
                                                        </h5>
                                                        <br>
                                                    </div>

                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Question For Student
                                                            </label>
                                                            <input type="text" id="quiz" name="name" class="form-control"
                                                                   placeholder="Enter a question here..">
                                                            <input type="hidden" name="section_id" value="<?php echo $section_id ;?>">
                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="input-group control-group after-add-more-multiple-answers">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-primary btn-xs add-more-multiple-answers" type="button">
                                                                            <i class="glyphicon glyphicon-plus"></i>
                                                                            &nbsp;
                                                                            Add Answers
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="copy-fields-multiple-answers hide ">
                                                            <div class="control-group-multiple-answers input-group" style="margin-top:10px;">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <input type="text" name="answers[]" class="form-control" placeholder="Enter Answers">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <a href="javascript:;" class="remove-multiple-answers">
                                                                            <i class="fa fa-trash" style="font-size: 25px;"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <br>
                                                        <button class="btn btn-success btn-sm"
                                                                type="submit">
                                                            Create question
                                                        </button>
                                                        <button class="btn btn-danger btn-sm opportunity-cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="opportunity_numeric_answer_box">
                                                <form method="post" id="add_opportunity_numeric_answer" action="<?php echo base_url('organization/add_opportunity_numeric_answer')?>">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h5>
                                                            A new Question with numeric answer
                                                        </h5>
                                                        <br>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Question For Student
                                                            </label>
                                                            <input type="text" id="quiz" name="name" class="form-control"
                                                                   placeholder="Enter a question here..">
                                                            <input type="hidden" name="section_id" value="<?php echo $section_id ;?>">
                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <button class="btn btn-success btn-sm"
                                                                type="submit">
                                                            Create question
                                                        </button>
                                                        <button class="btn btn-danger btn-sm opportunity-cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="opportunity_date_answer_box">
                                                <form method="post" id="add_opportunity_date_answer" action="<?php echo base_url('organization/add_opportunity_date_answer')?>">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h5>
                                                            A new Question with a date answer
                                                        </h5>
                                                        <br>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Question For Student
                                                            </label>
                                                            <input type="text" id="quiz" name="name" class="form-control"
                                                                   placeholder="Enter a question here..">
                                                            <input type="hidden" name="section_id" value="<?php echo $section_id ;?>">
                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <button class="btn btn-success btn-sm"
                                                                type="submit">
                                                            Create question
                                                        </button>
                                                        <button class="btn btn-danger btn-sm opportunity-cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect nextBtn pull-right"
                                    type="button">
                                Next
                                &nbsp;
                                <i class="material-icons">forward</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-lg-12 col-md-12 col-sm 12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Notification</h3>
                            <hr>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <p style="font-size: 17px;">
                                            All Applications for this opportunity will be automatically assigned to
                                            the team members selected here.
                                        </p>
                                        <br>
                                        <div class="form-group">
                                            <label id="checkall"
                                                   class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                                                   for="checkbox-0">
                                                <input type="checkbox" id="checkbox-0" class="mdl-checkbox__input">
                                                <span class="mdl-checkbox__label">Select All</span>
                                            </label>
                                            <br>
                                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect check"
                                                   for="checkbox-1">
                                                <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input">
                                                <span class="mdl-checkbox__label">Ronnie Odima</span>
                                            </label>
                                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect check"
                                                   for="checkbox-2">
                                                <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                                                <span class="mdl-checkbox__label">James Mwangi</span>
                                            </label>
                                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect check"
                                                   for="checkbox-3">
                                                <input type="checkbox" id="checkbox-3" class="mdl-checkbox__input">
                                                <span class="mdl-checkbox__label">Kimani Ichungwa</span>
                                            </label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <p style="font-size: 17px;">
                                                Receive an email alert for each submission?
                                            </p>
                                            <br>
                                            <label class="mdl-radio mdl-js-radio" for="option1">
                                                <input type="radio" id="option1" name="gender"
                                                       class="mdl-radio__button" checked>
                                                <span class="mdl-radio__label">Yes</span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect"
                                                   for="option2">
                                                <input type="radio" id="option2" name="gender"
                                                       class="mdl-radio__button">
                                                <span class="mdl-radio__label">No</span>
                                            </label>
                                        </div>
                                        <br>
                                        <p style="font-size: 17px;">
                                            selecting Yes will email an alert for every application received for
                                            this opportunity.
                                            The email will be sent to all of the team members specified above,
                                            or to your organization's primary email address if there are no assigned
                                            team members.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect nextBtn pull-right"
                                        type="button">
                                    Next
                                    &nbsp;
                                    <i class="material-icons">forward</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row setup-content" id="step-4">
                <div class="col-lg-12 col-md-12 col-sm 12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h3>Review Designer</h3>
                                <hr>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <h6>
                                    Enable Review Form
                                </h6>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h6>
                                    <ul class="list-inline">
                                        <li>
                                            NO &nbsp;
                                        </li>
                                        <li>
                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                   for="switch-1">
                                                <input type="checkbox" id="switch-1"
                                                       class="mdl-switch__input">
                                                <span class="mdl-switch__label"></span>
                                            </label>
                                        </li>
                                        <li>
                                            &nbsp; Yes
                                        </li>
                                    </ul>
                                </h6>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="content">
                                            <div id="stage1" class="build-wrap"></div>
                                            <form class="render-wrap"></form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect pull-right"
                                        type="submit">
                                    Finish
                                    &nbsp;
                                    <i class="material-icons">check</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div
        </div>
    </div>
</main>

<script type="text/javascript"
        src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='number'],textarea, select, input[type='date'], input[type='checkbox'], input[type='radio']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeClass('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>

<script type="text/javascript">

    $(document).ready(function() {

        //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
        $(".add-more").click(function(){
            var html = $(".copy-fields").html();
            $(".after-add-more").after(html);
        });

        //here it will remove the current value of the remove button which has been pressed
        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });

    });

</script>

<script type="text/javascript">

    $(document).ready(function() {

        //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
        $(".add-more-multiple-answers").click(function(){
            var html = $(".copy-fields-multiple-answers").html();
            $(".after-add-more-multiple-answers").after(html);
        });

        //here it will remove the current value of the remove button which has been pressed
        $("body").on("click",".remove-multiple-answers",function(){
            $(this).parents(".control-group-multiple-answers").remove();
        });

    });

</script>

<script type="text/javascript">
    (function worker() {
        $.ajax({
            url: "<?php echo base_url('organization/get_edited_opportunity_sections/'.$this->uri->segment(3))?>",
            success: function(data){
                $("#opportunity_slides").html(data)
            },
            complete: function() {
                setTimeout(worker, 1000);
            }
        });
    })();
</script>



