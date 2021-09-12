<?php foreach ($users as $user) :?>
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

    <form action="<?php echo base_url('organization/create_user') ?>" method="post">
        <div id="userModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                            Enter user Details
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $org_id ;?>" name="id">
                            <input type="text" class="form-control" name="fname" required placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lname" required placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" required placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="telephone" required placeholder="Telephone Number e.g +254xxxx">
                        </div>
                        <div class="form-group">
                            <select id="user-level" name="level" class="form-control" required style="width: 100%;">
                                <option></option>
                                <option value="Admin">Admin</option>
                                <option value="General user">General User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="user-status" name="status" class="form-control" required style="width: 100%;">
                                <option></option>
                                <option value="active">Active</option>
                                <option value="suspended">Suspended</option>
                            </select>
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
                                        <li role="presentation" class="brand-nav active">
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
                                        <div role="tabpanel" class="tab-pane active" id="tab4">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <h5>
                                                        Edit <?php echo $user->fname." ".$user->lname ;?> Details
                                                    </h5>
                                                </div>
                                                <div class="col-sm-2">
                                                    <br>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#userModal">
                                                        Add New User
                                                    </button>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                    <?php if($this->session->flashdata('user')){?>
                                                        <?php
                                                        $message = $this->session->flashdata('user');
                                                        ?>
                                                        <div class="<?php echo $message['class']?>">
                                                            <?php echo $message['message']?>
                                                        </div>
                                                    <?php }?>
                                                    <br>
                                                    <form method="post" action="<?php echo base_url('organization/edit_user_details')?>">
                                                        <div class="form-group">
                                                            <input type="hidden" name="user_id" value="<?php echo $user->user_id ;?>">
                                                            <input type="text" class="form-control" name="fname" value="<?php echo $user->fname ;?>" required placeholder="First Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="lname" value="<?php echo $user->lname ;?>" required placeholder="Last Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" name="email" value="<?php echo $user->email ;?>" required placeholder="Email Address">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" name="telephone" value="<?php echo $user->telephone ;?>" required placeholder="Telephone Number e.g +254xxxx">
                                                        </div>
                                                        <div class="form-group">
                                                            <select id="user-level" name="level" class="form-control" required style="width: 100%;">
                                                                <option value="<?php echo $user->user_type ;?>">
                                                                    <?php echo $user->user_type ;?>
                                                                </option>
                                                                <option value="Admin">Admin</option>
                                                                <option value="General user">General User</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select id="user-status" name="status" class="form-control" required style="width: 100%;">
                                                                <option value="<?php echo $user->status ;?>">
                                                                    <?php echo $user->status ;?>
                                                                </option>
                                                                <option value="active">Active</option>
                                                                <option value="suspended">Suspended</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit"
                                                                    class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect">
                                                                Submit
                                                            </button>
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
            </div>
        </div>
    </main>
<?php endforeach;?>
