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
                                    <li role="presentation" class="brand-nav active">
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
                                    <?php if($this->session->flashdata('user')){?>
                                        <?php
                                        $message = $this->session->flashdata('user');
                                        ?>
                                        <div class="<?php echo $message['class']?>">
                                            <?php echo $message['message']?>
                                        </div>
                                    <?php }?>
                                    <div role="tabpanel" class="tab-pane active" id="tab3">
                                        <h5>
                                            Update Password
                                        </h5>
                                        <hr>
                                        <form method="post" action="<?php echo base_url('organization/change_pass_action')?>">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $org_id ;?>">
                                                <br>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="control-label">
                                                        Existing Password
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="password" class="form-control" name="old_pass" required>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="control-label">
                                                        New Password
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="password" class="form-control" name="new_pass" required>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="control-label">
                                                        Confirm Password
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="password" class="form-control" name="new_pass2" required>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <hr>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <br>
                                                    <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect">
                                                        Change Password
                                                    </button>
                                                </div>
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