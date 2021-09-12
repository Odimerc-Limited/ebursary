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
                                            <div class="col-md-12">
                                                <?php if($this->session->flashdata('user')){?>
                                                    <?php
                                                    $message = $this->session->flashdata('user');
                                                    ?>
                                                    <div class="<?php echo $message['class']?>">
                                                        <?php echo $message['message']?>
                                                    </div>
                                                <?php }?>
                                            </div>
                                            <div class="col-sm-10">
                                                <h5>
                                                    Manage Users
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
                                                <br>
                                                <table id="example"
                                                       class="table table-striped table-bordered table-hover dt-responsive nowrap"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <i class="fa fa-bookmark"></i>
                                                            &nbsp;
                                                             Name
                                                        </th>
                                                        <th>
                                                            <i class="fa fa-phone"></i>
                                                            &nbsp;
                                                            Telephone
                                                        </th>
                                                        <th>
                                                            <i class="fa fa-envelope"></i>
                                                            &nbsp;
                                                            Email Address
                                                        </th>
                                                        <th>
                                                            <i class="fa fa-users"></i>
                                                            &nbsp;
                                                            User Type
                                                        </th>
                                                        <th>
                                                            <i class="fa fa-star"></i>
                                                            &nbsp;
                                                            Status
                                                        </th>
                                                        <th>
                                                            <i class="fa fa-cog"></i>
                                                            &nbsp;
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($users as $user) { ?>
                                                        <tr>
                                                            <td>
                                                                <a href="<?php echo base_url('organization/org_opportunity') ?>">
                                                                  <?php echo $user->fname." ".$user->lname ;?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php echo $user->telephone ;?>
                                                            </td>
                                                            <td>
                                                                <?php echo $user->email ;?>
                                                            </td>
                                                            <td>
                                                                <?php echo $user->user_type ;?>
                                                            </td>
                                                            <td>
                                                                <?php if($user->status == 'active'){?>
                                                                    <span class="label label-sm label-success">
                                                                        <?php echo $user->status ;?>
                                                                    </span>
                                                                <?php }?>
                                                                <?php if($user->status == 'suspended'){?>
                                                                    <span class="label label-sm label-warning">
                                                                        <?php echo $user->status ;?>
                                                                    </span>
                                                                <?php }?>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" style="vertical-align: top">
                                                                    <a href="#" class="dropdown-toggle markas btn btn-primary btn-sm" data-toggle="dropdown">
                                                                        Take Action
                                                                        &nbsp;
                                                                        <span class="caret"></span>
                                                                    </a>

                                                                    <ul class="dropdown-menu" role="menu">
                                                                        <li>
                                                                            <a href="<?php echo base_url('organization/edit_users/'.$user->user_id)?>" class="markas-duplicate" data-masterkey-id="2" data-type="Duplicate">
                                                                                <i class="glyphicon glyphicon-pencil"></i>
                                                                                &nbsp;Edit
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="<?php echo base_url('organization/delete_user_details/'.$user->user_id)?>" class="markas-bogus" data-masterkey-id="2" data-type="Bogus">
                                                                                <i class="fa fa-trash-o"></i>
                                                                                &nbsp;Delete
                                                                            </a>
                                                                        </li>
                                                                        <?php if($user->status == 'active'){?>
                                                                            <li>
                                                                                <a href="<?php echo base_url('organization/suspend_user/'.$user->user_id)?>" class="markas-bogus" data-masterkey-id="2" data-type="Bogus">
                                                                                    <i class="glyphicon glyphicon-erase"></i>
                                                                                    &nbsp;Suspend
                                                                                </a>
                                                                            </li>
                                                                        <?php }?>
                                                                        <?php if($user->status == 'suspended'){?>
                                                                            <li>
                                                                                <a href="<?php echo base_url('organization/activate_user/'.$user->user_id)?>" class="markas-bogus" data-masterkey-id="2" data-type="Bogus">
                                                                                    <i class="glyphicon glyphicon-check"></i>
                                                                                    &nbsp;Activate
                                                                                </a>
                                                                            </li>
                                                                        <?php }?>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
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