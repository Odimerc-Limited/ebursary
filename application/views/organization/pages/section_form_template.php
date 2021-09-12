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
        height: 50px;
        background: linear-gradient(#A9A9A9, #808080);
        position: relative;
        user-select: none;
        border: 1px solid white;
        margin: 0 0 0.75rem 0;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        color: white;
        line-height: 60px;
        font-size: 0.5rem;
        z-index: 5;
    }

    .slide-active {
        width: 100%;
        height: 50px;
        background:  rgb(83,109,254)!important;
        position: relative;
        user-select: none;
        border: 1px solid white;
        margin: 0 0 0.75rem 0;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        color: white;
        line-height: 60px;
        font-size: 0.5rem;
        z-index: 5;
    }

    .slide:before {
        position: absolute;
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
            <div class="col-lg-12 col-md-12 col-sm 12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4> Opportunity Form Template </h4>
                        <hr>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class='cloned-slides' id='cloned-slides '></div>
                                    <div class='all-slides' id="organization_slides">
                                        <?php foreach ($sections as $section) {?>
                                            <a href="<?php echo base_url('organization/section_form_template/'.$section->section_id)?>">
                                                <div class='<?php echo ($this->uri->segment(3) == $section->section_id ? "slide-active" : "slide")?>'>
                                                   <h6 style="margin-bottom: 10px;">
                                                       <i class="material-icons pull-left">more_vert</i>
                                                       <?php echo $section->name ;?>
                                                   </h6>
                                                </div>
                                            </a>
                                        <?php }?>
                                    </div>
                                    <hr>
                                    <a href="<?php echo base_url('organization/create_section_temp/'.$org_id)?>" class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
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
                                    <div>
                                        <div class="col-md-12">

                                            <!--Section panel to capture its name-->

                                            <form method="post" id="section-name-form" action="<?php echo base_url('organization/update_section_name')?>">
                                                <div class="form-group">
                                                    <label class="section-name-label">
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

                                            <div class="section_questions">
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
                                                                            <div class="col-xs-11" id="section-question-name<?php echo $section_question->id ;?>">
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
                                                                    <form id="edit-section-question-form<?php echo $section_question->id?>" method="post">
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
                                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_section_question<?php echo $section_question->id ;?>()">
                                                                                        Delete question
                                                                                    </button>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <br>
                                                                            <p class="text-success" id="change_success<?php echo $section_question->id ;?>" style="display: none;">
                                                                                Changes save successfully
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
                                                                                $responses = $this->db->get_where('form_questions_template_fields', array('section_id' => $section_question->section_id, 'question_id'=> $section_question->question_id))->result();
                                                                                ?>
                                                                                <ul class="list-unstyled response_values<?php echo $section_question->id?>">
                                                                                    <?php foreach ($responses as $response) {?>
                                                                                        <li>
                                                                                            <div class="col-xs-6">
                                                                                                <?php echo $response->field ;?>
                                                                                            </div>
                                                                                            <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_radio_field_value" onclick="delete_radio_response<?php echo $response->id?>()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_radio_response<?php echo $response->id?>() {
                                                                                                    $.ajax({
                                                                                                        url : "<?php echo base_url('organization/delete_radio_field/'.$response->id.'/'.$response->org_id.'/'.$response->section_id.'/'.$response->question_id.'/'.$section_question->id)?>",
                                                                                                        success: function (result) {
                                                                                                            $(".response_values<?php echo $section_question->id?>").html(result);
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
                                                                        <form method="post" id="add_more_multi_choice_responses<?php echo $section_question->id ;?>">
                                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                                            <input type="hidden" name="section_id" value="<?php echo $section_question->section_id ;?>">
                                                                            <input type="hidden" name="question_id" value="<?php echo $section_question->question_id ;?>">
                                                                            <input type="hidden" name="s_q_id" value="<?php echo $section_question->id ;?>">
                                                                            <div class="col-md-12">
                                                                                <div class="input-group control-group after-add-fields<?php echo $section_question->id?>">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="input-group-btn">
                                                                                                <button class="btn btn-primary btn-xs add-radio-field<?php echo $section_question->id?>" type="button">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                    &nbsp;
                                                                                                    Add more responses
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="new_question_responses<?php echo $section_question->id?>" style="display: none;">
                                                                                    <div class="copy-radio-fields<?php echo $section_question->id?> hide ">
                                                                                        <div class="control-group radio-filed-display input-group" style="margin-top:10px;">
                                                                                            <input type="text" name="new_radio_fields[]" class="form-control" placeholder="Enter Response">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <br>
                                                                                <button class="btn btn-success btn-sm btn-response<?php echo $section_question->id?>"
                                                                                        type="submit" style="display: none;">
                                                                                    Submit
                                                                                </button>
                                                                            </div>
                                                                        </form>

                                                                        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>

                                                                        <script type="text/javascript">

                                                                            $(document).ready(function() {

                                                                                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                                                                                $(".add-radio-field<?php echo $section_question->id?>").click(function(){
                                                                                    var html = $(".copy-radio-fields<?php echo $section_question->id?>").html();
                                                                                    $(".after-add-fields<?php echo $section_question->id?>").after(html);
                                                                                    $("#new_question_responses<?php echo $section_question->id?>").show();
                                                                                    $(".btn-response<?php echo $section_question->id?>").show();
                                                                                });
                                                                            });

                                                                        </script>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $("#add_more_multi_choice_responses<?php echo $section_question->id ;?>").submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url : "<?php echo base_url('organization/add_more_multi_choice_response')?>",
                                                                                        data : $("#add_more_multi_choice_responses<?php echo $section_question->id ;?>").serializeArray(),
                                                                                        success: function (result) {
                                                                                            $(".response_values<?php echo $section_question->id?>").html(result);
                                                                                            $("#add_more_multi_choice_responses<?php echo $section_question->id ;?>")[0].reset();
                                                                                            $("#new_question_responses<?php echo $section_question->id?>").hide();
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
                                                                                $answers = $this->db->get_where('form_questions_template_fields', array('section_id' => $section_question->section_id, 'question_id'=> $section_question->question_id))->result();
                                                                                ?>
                                                                                <ul class="list-unstyled checkbox_answers<?php echo $section_question->id?>">
                                                                                    <?php foreach ($answers as $answer) {?>
                                                                                        <li>
                                                                                            <div class="col-xs-6">
                                                                                                <?php echo $answer->field ;?>
                                                                                            </div>
                                                                                            <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_radio_field_value" onclick="delete_checkbox_answer<?php echo $answer->id?>()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_checkbox_answer<?php echo $answer->id?>() {
                                                                                                    $.ajax({
                                                                                                        url : "<?php echo base_url('organization/delete_checkbox_field/'.$answer->id.'/'.$answer->org_id.'/'.$answer->section_id.'/'.$answer->question_id.'/'.$section_question->id)?>",
                                                                                                        success: function (result) {
                                                                                                            $(".checkbox_answers<?php echo $section_question->id?>").html(result);
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
                                                                        <form method="post" id="add_more_multiple_answers<?php echo $section_question->id ;?>">
                                                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                                                            <input type="hidden" name="section_id" value="<?php echo $section_question->section_id ;?>">
                                                                            <input type="hidden" name="question_id" value="<?php echo $section_question->question_id ;?>">
                                                                            <input type="hidden" name="s_q_id" value="<?php echo $section_question->id ;?>">
                                                                            <div class="col-md-12">
                                                                                <div class="input-group control-group after-add-answers<?php echo $section_question->id?>">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="input-group-btn">
                                                                                                <button class="btn btn-primary btn-xs add-checkbox<?php echo $section_question->id?>" type="button">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                    &nbsp;
                                                                                                    Add more answers
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="new_question_answers<?php echo $section_question->id?>" style="display: none;">
                                                                                    <div class="copy-checkboxes<?php echo $section_question->id?> hide ">
                                                                                        <div class="control-group radio-filed-display input-group" style="margin-top:10px;">
                                                                                            <input type="text" name="checkbox_answers[]" class="form-control" placeholder="Enter Response">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <br>
                                                                                <button class="btn btn-success btn-sm btn-answer<?php echo $section_question->id?>"
                                                                                        type="submit" style="display: none;">
                                                                                    Submit
                                                                                </button>
                                                                            </div>
                                                                        </form>

                                                                        <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>

                                                                        <script type="text/javascript">
                                                                            $(document).ready(function() {

                                                                                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                                                                                $(".add-checkbox<?php echo $section_question->id?>").click(function(){
                                                                                    var html = $(".copy-checkboxes<?php echo $section_question->id?>").html();
                                                                                    $(".after-add-answers<?php echo $section_question->id?>").after(html);
                                                                                    $("#new_question_answers<?php echo $section_question->id?>").show();
                                                                                    $(".btn-answer<?php echo $section_question->id?>").show();
                                                                                });
                                                                            });

                                                                        </script>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $("#add_more_multiple_answers<?php echo $section_question->id ;?>").submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url : "<?php echo base_url('organization/add_more_multiple_answers')?>",
                                                                                        data : $("#add_more_multiple_answers<?php echo $section_question->id ;?>").serializeArray(),
                                                                                        success: function (result) {
                                                                                            $(".checkbox_answers<?php echo $section_question->id?>").html(result);
                                                                                            $("#add_more_multiple_answers<?php echo $section_question->id ;?>")[0].reset();
                                                                                            $("#new_question_answers<?php echo $section_question->id?>").hide();
                                                                                        }
                                                                                    });
                                                                                });
                                                                            });
                                                                        </script>
                                                                    <?php }?>

                                                                    <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $("#edit-section-question-form<?php echo $section_question->id?>").submit(function (e) {
                                                                                e.preventDefault();
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: "<?php echo base_url('organization/edit_section_question')?>",
                                                                                    data : $("#edit-section-question-form<?php echo $section_question->id?>").serializeArray(),
                                                                                    success: function (results) {
                                                                                        $("#section-question-name<?php echo $section_question->id ;?>").html(results);
                                                                                        $("#change_success<?php echo $section_question->id ;?>").show();
                                                                                        $("#change_success<?php echo $section_question->id ;?>").fadeOut(6000);

                                                                                    }
                                                                                });
                                                                            });
                                                                        });
                                                                    </script>
                                                                    <script type="text/javascript">
                                                                        function delete_section_question<?php echo $section_question->id ;?>() {
                                                                            $.ajax({
                                                                                type: "POST",
                                                                                url: "<?php echo base_url('organization/delete_section_question/'.$section_question->question_id.'/'.$section_question->section_id.'/'.$section_question->org_id)?>",
                                                                                success: function (results) {
                                                                                    $(".section_questions").html(results);
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

                                        <div class="question-categories">
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
                                            <a href="javascript:;"
                                               class="open_ended_question mdl-color-text--grey-700">
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
                                               class="lengthy_answer mdl-color-text--grey-700">
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
                                               class="file_upload mdl-color-text--grey-700">
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
                                            <a href="javascript:;" class="multi_choice mdl-color-text--grey-700">
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
                                               class="multiple_answers mdl-color-text--grey-700">
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
                                               class="numeric_answer mdl-color-text--grey-700">
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
                                               class="date_answer mdl-color-text--grey-700">
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

                                        <div class="questions-box" style="display: none;">
                                            <div style="display: none;" id="open_ended_box">
                                                <form method="post" id="add_open_ended_quiz" action="<?php echo base_url('organization/add_open_ended_quiz')?>">
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
                                                        <button class="btn btn-danger btn-sm cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="lengthy_answer_box">
                                                <form method="post" id="add_lengthy_answer_quiz" action="<?php echo base_url('organization/add_lengthy_quiz')?>">
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
                                                        <button class="btn btn-danger btn-sm cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>


                                            <div style="display: none;" id="file_upload_box">
                                                <form method="post" id="add_file_upload" action="<?php echo base_url('organization/add_file_upload')?>">
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
                                                        <button class="btn btn-danger btn-sm cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="multi_choice_box">
                                                <form method="post" id="add_multi_choice" action="<?php echo base_url('organization/add_multi_choice')?>">
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
                                                        <button class="btn btn-danger btn-sm cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="multiple_answers_box">
                                                <form method="post" id="add_multiple_answers" action="<?php echo base_url('organization/add_multiple_answers')?>">
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
                                                        <button class="btn btn-danger btn-sm cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="numeric_answer_box">
                                                <form method="post" id="add_numeric_answer" action="<?php echo base_url('organization/add_numeric_answer')?>">
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
                                                        <button class="btn btn-danger btn-sm cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display: none;" id="date_answer_box">
                                                <form method="post" id="add_date_answer" action="<?php echo base_url('organization/add_date_answer')?>">
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
                                                        <button class="btn btn-danger btn-sm cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                        <!--Corresponding questions types responses -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect nextBtn pull-right"
                                type="button">
                            Next
                            &nbsp;
                            <i class="material-icons">forward</i>
                        </button>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>

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
            url: "<?php echo base_url('organization/get_organization_sections/'.$this->uri->segment(3))?>",
            success: function(data){
                $("#organization_slides").html(data)
            },
            complete: function() {
                setTimeout(worker, 1000);
            }
        });
    })();
</script>



