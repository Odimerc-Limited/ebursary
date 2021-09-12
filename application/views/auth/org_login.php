<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ebursary :: Organization Sign In</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap-theme.min.css') ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/material/icons.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/material/css/new_material.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/responsive.bootstrap.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/select2-bootstrap.css') ?>"  type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/external/custom.css') ?>" type="text/css">
</head>
<body style="background-color: #eceef1;">
<div class="container">
    <br>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-2 " id="login-logo">
            <img src="<?php echo base_url('assets/logo.png')?>" class="img-responsive">
            <br>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default mdl-shadow--2dp">
                            <div class="panel-body">
                                <p style="font-size: 20px;" class="text-center">
                                    Sign In
                                </p>
                                <?php if($this->session->flashdata('user')){?>
                                    <?php
                                    $message = $this->session->flashdata('user');
                                    ?>
                                    <div class="<?php echo $message['class']?>">
                                        <?php echo $message['message']?>
                                    </div>
                                <?php }?>
                                <form method="post" action="<?php echo base_url('auth/login_org')?>">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="signup-field-color" name="email" required placeholder="Enter Organization Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="signup-field-color" name="password"  required placeholder="Enter Password" autocomplete="false">
                                    </div>
                                    <div class="form-group">
                                        <button class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect" style="width: 100%;">
                                            <i class="fa fa-lock"></i>
                                            &nbsp;
                                            Sign In
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <a href="<?php echo base_url('auth/')?>">
                                                Register
                                            </a> &nbsp;| &nbsp;
                                            <a href="<?php echo base_url('auth/forgot_password')?>">
                                                Forgot Password
                                            </a>
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
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <p style="color: #7a8ca5;">
                    copyright &nbsp;&copy;&nbsp;E-Bursary. <?php echo date('Y') ;?>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/material/js/material.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.responsive.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/responsive.bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/select/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/external/custom.js') ?>" type="text/javascript"></script>
</html>