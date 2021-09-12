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
            <form role="form">
                <div class="col-lg-12 col-md-12 col-sm 12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4> Opportunity Form Template </h4>
                            <hr>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class='cloned-slides' id='cloned-slides'></div>
                                        <div class='all-slides'>
                                            <?php foreach ($sections as $section) {?>
                                                <a href="<?php echo base_url('organization/section_form_template/'.$section->section_id)?>">
                                                    <div class='<?php echo ($this->uri->segment(3) == $section->section_id ? "slide-active" : "slide")?>'>
                                                        <h6>
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
                                        <div style="display: none;" id="create_section">
                                            <form action="<?php echo base_url() ?>" method="post">
                                                <div class="col-md-12">

                                                    <!--Section panel to capture its name-->

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

                                                    <!--Section panel to capture its name-->
                                                    <hr>

                                                    <!--Questions related to this section... comes from database questions fields here -->

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

                                                    <!--Questions related to this section... comes from database questions fields here -->

                                                </div>

                                                <br>
                                                <!--Selecting questions types to create from here -->
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
                                                <!--First Question category -->

                                                <!--Second Question category -->
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
                                                <!--Second Question category -->

                                                <!--Third Question category -->
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
                                                <!--Third Question category -->

                                                <!--Forth Question category -->
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
                                                <!--Forth Question category -->

                                                <!--Fifth Question category -->
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
                                                <!--Fifth Question category -->

                                                <!--Sixth Question category -->
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
                                                <!--Sixth Question category -->

                                                <!--Seventh Question category -->
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
                                                <!--Seventh Question category -->

                                                <!--Selecting questions types to create from here -->

                                            </form>


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
            </form>
        </div>
    </div>
</main>



