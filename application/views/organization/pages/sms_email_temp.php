<style type="text/css">
    h1 {
        margin-left: 15px;
        margin-bottom: 20px;
    }

    @media (min-width: 768px) {

        .brand-pills > li > a {
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        li.brand-nav.active a:after {
            content: " ";
            display: block;
            width: 0;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            border-left: 9px solid #337ab7;
            position: absolute;
            top: 50%;
            margin-top: -20px;
            left: 100%;
            z-index: 2;
        }
    }
</style>

<form action="<?php echo base_url('organization/create_email_temp') ?>" method="post">
    <div id="emailAward" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        Email message to awarded applicant
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" value="awarded" name="group">
                        <input type="hidden" value="<?php echo $org_id ;?>" name="id">
                       <textarea class="form-control" name="content" rows="6"><?php echo $emailAwarded ;?></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit"
                            class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?php echo base_url('organization/create_email_temp') ?>" method="post">
    <div id="emailDecline" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        Email message to declined applicant
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" value="declined" name="group">
                        <input type="hidden" value="<?php echo $org_id ;?>" name="id">
                        <textarea class="form-control" name="content" rows="6"><?php echo $emailDeclined ;?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                            class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?php echo base_url('organization/create_sms_temp') ?>" method="post">
    <div id="smsAward" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        SMS message to awarded applicant
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" value="awarded" name="group">
                        <input type="hidden" value="<?php echo $org_id ;?>" name="id">
                        <textarea class="form-control" name="content" rows="6"><?php echo $smsAwarded ;?></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit"
                            class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?php echo base_url('organization/create_sms_temp') ?>" method="post">
    <div id="smsDecline" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        SMS message to declined applicant
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" value="declined" name="group">
                        <input type="hidden" value="<?php echo $org_id ;?>" name="id">
                        <textarea class="form-control" name="content" rows="6"><?php echo $smsDeclined ;?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                            class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<main class="mdl-layout__content" style="flex: auto 1 0">
    <div class="page-content body-content">
        <div class="container">
            <div class="row">
                <div role="tabpanel">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ul class="nav nav-pills brand-pills nav-stacked" role="tablist">
                                    <li role="presentation" class="brand-nav">
                                        <a href="<?php echo base_url('organization/account_info')?>">
                                            Account Info
                                        </a>
                                    </li>
                                    <li role="presentation" class="brand-nav active">
                                        <a href="<?php echo base_url('organization/sms_email_temps')?>" >
                                            SMS/EMAIL Template
                                        </a>
                                    </li>
                                    <li role="presentation" class="brand-nav">
                                        <a href="<?php echo base_url('organization/change_pass')?>">
                                            Change Password
                                        </a>
                                    </li>
                                    <li role="presentation" class="brand-nav">
                                        <a href="<?php echo base_url('organization/users') ;?>">
                                            Users
                                        </a>
                                    </li>
                                    <li role="presentation" class="brand-nav">
                                        <a href="<?php echo base_url('organization/look_and_feel')?>" aria-controls="tab5" >
                                            Look & Feel
                                        </a>
                                    </li>
                                    <li role="presentation" class="brand-nav"><a href="<?php echo base_url('organization/form_template')?>">
                                            Opportunity Form Template
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab2">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <?php if($this->session->flashdata('user')){?>
                                                    <?php
                                                    $message = $this->session->flashdata('user');
                                                    ?>
                                                    <div class="<?php echo $message['class']?>">
                                                        <?php echo $message['message']?>
                                                    </div>
                                                <?php }?>
                                                <h5>
                                                    Edit SMS/EMAIL Template
                                                </h5>
                                                <hr>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <h6>
                                                    Enable Automatic sending of responses
                                                </h6>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <h6>
                                                    <ul class="list-inline">
                                                        <li>
                                                            NO &nbsp;
                                                        </li>
                                                        <li>
                                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                                   for="switch-1">
                                                                <input type="checkbox" id="switch-1"
                                                                       class="mdl-switch__input toggle-temps" name="slide" value="slide" onchange="toggle_email_sms_view()" >
                                                                <span class="mdl-switch__label"></span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            &nbsp; Yes
                                                        </li>
                                                    </ul>
                                                </h6>
                                            </div>
                                            <hr>
                                        </div>

                                        <div class="temp_settings" style="display:  none;">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <h6>
                                                        Awarding Responses
                                                    </h6>
                                                    <hr>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <p>
                                                            Default SMS Message
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
                                                                type="button" style="margin-bottom: 10px;" data-toggle="modal" data-target="#smsAward">
                                                            Edit
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <p>
                                                            Default Email Message
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
                                                                type="button" data-toggle="modal" data-target="#emailAward">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <h6>
                                                        Decline Responses
                                                    </h6>
                                                    <hr>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <p>
                                                            Default SMS Message
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
                                                                type="button" style="margin-bottom: 10px;" data-toggle="modal" data-target="#smsDecline">
                                                            Edit
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <p>
                                                            Default Email Message
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
                                                                type="button" data-toggle="modal" data-target="#emailDecline">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>