<main class="mdl-layout__content" style="flex: 1 0 auto;">
    <div class="page-content body-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-18">
                    <div class="panel panel-default mdl-shadow--2dp mdl-color-text--white" style="background-color: #337ab7">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <br>
                                    <div class="number">33</div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <i class="fa fa-snowflake-o visual" style="font-size: 35px;">
                                    </i>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="details">
                                        Applications
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-18">
                    <div class="panel panel-default mdl-shadow--2dp mdl-color-text--white" style="background-color: #337ab7">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <br>
                                    <div class="number">5</div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <i class="fa fa-shield visual" style="font-size: 35px;">
                                    </i>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="details">
                                        Beneficiaries
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-18">
                    <div class="panel panel-default mdl-shadow--2dp mdl-color-text--white" style="background-color: #337ab7">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <br>
                                    <div class="number">3</div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <i class="fa fa-briefcase visual" style="font-size: 35px;">
                                    </i>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="details">
                                        Opportunities
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-18">
                    <div class="panel panel-default mdl-shadow--2dp mdl-color-text--white" style="background-color: #337ab7">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <br>
                                    <div class="number material-icons" style="font-size: 35px;">
                                        add
                                        <!-- <i class="material-icons" style="font-size: 35px;">
                                             add
                                         </i>-->
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <i class="fa fa-newspaper-o visual" style="font-size: 35px;">
                                    </i>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="details">
                                        Add Opportunity
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default mdl-shadow--3dp">
                        <div class="panel-body">
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
                                </tr>
                                </thead>
                                <tbody>
                                <?php for ($i = 1; $i < 60; $i++ ) {?>
                                    <tr>
                                        <td>
                                            <a style="color: #337ab7" href="<?php echo base_url('organization/org_opportunity')?>">
                                                Focweb Scholarships
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">
                                                10
                                            </span>
                                        </td>
                                        <td>
                                            <?php echo date_format(date_create(date('Y-m-d')),'jS, M Y')?>
                                        </td>
                                        <td>
                                            <?php echo date_format(date_create(date('Y-m-d')),'jS, M Y')?>
                                        </td>
                                        <td>
                                        <span class="label label-success">
                                            Online
                                        </span>
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
</main>