<main class="mdl-layout__content" style="flex: 1 0 auto;">
    <div class="page-content body-content">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default mdl-shadow--3dp">
                        <div class="panel-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="pull-right mdl-layout--large-screen-only">
                                    <a href="<?php echo base_url('organization/add_opportunity')?>" class="mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
                                       style="">
                                        Create Opportunity
                                    </a>
                                </div>

                                <div class="mdl-layout--small-screen-only">
                                    <a href="<?php echo base_url('organization/add_opportunity')?>" class="text-center mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
                                       style="">
                                        Create Opportunity
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <hr>
                                <table id="example" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>
                                            <i class="fa fa-bookmark"></i>
                                            &nbsp;
                                            Opportunity Name
                                        </th>
                                        <th>
                                            <i class="fa fa-user"></i>
                                            &nbsp;
                                            Applicants
                                        </th>
                                        <th>
                                            <i class="fa fa-calendar"></i>
                                            &nbsp;
                                            Application Start Date
                                        </th>
                                        <th>
                                            <i class="fa fa-calendar"></i>
                                            &nbsp;
                                            Application End Date
                                        </th>
                                        <th>
                                            <i class="fa fa-star"></i>
                                            &nbsp;
                                            Status
                                        </th>
                                        <th>
                                            <i class="fa fa-cogs"></i>
                                            &nbsp;
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($opportunities as $opportunity) {?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url('organization/opportunity')?>">
                                                   <?php echo $opportunity->title ;?>
                                                </a>
                                            </td>
                                            <td>
                                            <span class="badge badge-success">
                                                <?php
                                                    $applications = $this->Organization_model->get_opportunity_applications($opportunity->opp_id, $opportunity->org_id);
                                                    echo $applications;
                                                ?>
                                            </span>
                                            </td>
                                            <td>
                                                <?php echo date_format(date_create($opportunity->date_online),'jS, M Y')?>
                                            </td>
                                            <td>
                                                <?php echo date_format(date_create($opportunity->date_offline),'jS, M Y')?>
                                            </td>
                                            <td>
                                                <?php if($opportunity->status == 'online') {?>
                                                    <span class="label label-success">
                                                        Online
                                                    </span>
                                                <?php } else {?>
                                                    <span class="label label-warning">
                                                   Offline
                                                    </span>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm " style="">
                                                    Actions
                                                    &nbsp;
                                                    <span class="caret"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>