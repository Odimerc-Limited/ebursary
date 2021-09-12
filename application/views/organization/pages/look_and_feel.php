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
                                    <li role="presentation" class="brand-nav">
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
                                    <li role="presentation" class="brand-nav active">
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
                                    <div role="tabpanel" class="tab-pane active">
                                        <?php if($this->session->flashdata('user')){?>
                                            <?php
                                            $message = $this->session->flashdata('user');
                                            ?>
                                            <div class="<?php echo $message['class']?>">
                                                <?php echo $message['message']?>
                                            </div>
                                        <?php }?>
                                        <h5>
                                            Look & Feel
                                        </h5>
                                        <hr>
                                        <form method="post" action="<?php echo base_url('organization/edit_look_feel')?>" enctype="multipart/form-data">
                                            <input type="hidden" name="org_id" value="<?php echo $org_id ;?>">
                                            <div class="form-group">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <label class="control-label">
                                                        Logo
                                                    </label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <input type="file" name="logo" class="btn btn-default" style="width: 100%;" required>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="form-group">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <label class="control-label">
                                                        Color Scheme
                                                    </label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <label class="control-label">
                                                        Head Banner <br> ( <i>appears on the student portal</i> )
                                                    </label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <input type="file" name="banner" class="btn btn-default" style="width: 100%;">
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </form>
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
