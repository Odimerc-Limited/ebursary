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
                        <a href="#step-1" type="button" class="btn btn-primary">General Settings</a>
                        <p></p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default">Form Builder</a>
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
                                        <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
                                                type="button" onclick="new_section()">
                                            <i class="material-icons">add</i>
                                            &nbsp;
                                            Add A New Section
                                        </button>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        Recommendation Form Here..
                                        <div style="display: none;" id="create_section">
                                            <form action="<?php echo base_url() ?>" method="post">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>
                                                            Section Title
                                                        </label>
                                                        <input type="text" class="form-control" name="section"
                                                               required placeholder="Enter Section Title">
                                                    </div>
                                                    <div class="form-group">
                                                       <span class="label label-danger">
                                                           Delete Section
                                                       </span>
                                                    </div>
                                                    <hr>
                                                    <h5>Questions in this Section</h5>
                                                    <br>
                                                    <div class="panel panel-default" id="q_id" style="display: none">
                                                        <a role="button" data-toggle="collapse" href="#collapseOne"
                                                           aria-expanded="true" aria-controls="collapseOne"
                                                           class="trigger collapsed mdl-color-text--grey-700">
                                                            <div class="panel-heading" role="tab" id="headingOne">
                                                                <h4 class="panel-title" id="p_title">

                                                                </h4>
                                                            </div>
                                                        </a>
                                                        <div id="collapseOne" class="panel-collapse collapse"
                                                             role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="panel-body" id="p_body"
                                                                 style="border-top: solid 1px;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>

                                                <br>
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

                                                <a href="javascript:;"
                                                   class="multiple_questions mdl-color-text--grey-700">
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

                                                <a href="javascript:;"
                                                   class="multiple_questions mdl-color-text--grey-700">
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

                                                <a href="javascript:;"
                                                   class="multiple_questions mdl-color-text--grey-700">
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

                                                <a href="javascript:;" class="single_question mdl-color-text--grey-700">
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

                                                <a href="javascript:;"
                                                   class="multiple_questions mdl-color-text--grey-700">
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

                                                <a href="javascript:;"
                                                   class="multiple_questions mdl-color-text--grey-700">
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
                                                <a href="javascript:;"
                                                   class="multiple_questions mdl-color-text--grey-700">
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


                                                <div style="display: none;" id="single_answer">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h5>
                                                            A new Question with single Answer
                                                        </h5>
                                                        <br>
                                                    </div>

                                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Question For Student
                                                            </label>
                                                            <input type="text" id="quiz" class="form-control"
                                                                   placeholder="Enter a question here..">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <div class="form-group">
                                                            <label>
                                                                Response Type
                                                            </label>
                                                            <select class="form-control" id="response">
                                                                <option value="Text">Text</option>
                                                                <option value="Number">Number</option>
                                                                <option value="Text Area">Text Area</option>
                                                                <option value="Conditional">Conditional</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <button class="label label-default label-md create-btn"
                                                                type="button">
                                                            Create question
                                                        </button>
                                                        <button class="label label-default label-md cancel-btn"
                                                                type="button">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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


