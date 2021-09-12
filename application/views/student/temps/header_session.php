<style type="text/css">
    .head-icons{
        font-size: 19px;
    }
</style>

<header class="mdl-layout__header mdl-color--white" style="border-bottom: solid 1px;">
    <div class="mdl-layout__header-row">
        <!-- Navigation -->
        <span class="mdl-layout-title">
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link mdl-color-text--black mdl-layout--large-screen-only"
                   href="<?php echo base_url('organization/loggedin_student_homepage') ?>">
                    <div class="fa fa-home head-icons"></div>
                    &nbsp;
                    Home
                </a>
                <a class="mdl-navigation__link mdl-color-text--black mdl-layout--large-screen-only "
                   href="<?php echo base_url('organization/loggedin_student_applications') ?>">
                   <div class="fa fa-file-text-o head-icons"></div>
                    &nbsp;
                    Applications
                </a>
                <a class="mdl-navigation__link mdl-color-text--black mdl-layout--large-screen-only"
                   href="<?php echo base_url('organization/loggedin_student_messages') ?>">
                    <div class="fa fa-envelope-o head-icons"></div>
                    &nbsp;
                    <span class="mdl-badge" data-badge="2">
                    Messages
                </span>
                </a>
            </nav>
        </span>

        <div class="mdl-layout-spacer"></div>

        <span class="mdl-layout--large-screen-only">
            <form class="navbar-form" role="search">
                <div class="input-group add-on">
                    <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </span>

        <div class="mdl-layout-spacer"></div>
        <span class="mdl-layout-title">
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link mdl-color-text--black" href="javascript:;" id="demo-menu-lower-left">
                    <div class="material-icons">account_circle</div>
                    &nbsp;
                    Denis Gachoki
                    <span class="caret"></span>
                </a>
                <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect"
                    for="demo-menu-lower-left">
                    <li class="mdl-menu__item mdl-color-text--black">
                        <a class="mdl-color-text--black" href="<?php echo base_url('organization/student_update_profile')?>">
                            Update Profile Info
                        </a>
                    </li>
                    <li class="mdl-menu__item mdl-color-text--black">
                        <a class="mdl-color-text--black" href="<?php echo base_url('organization/student_change_password')?>">
                           Change Password
                        </a>
                    </li>
                    <li class="mdl-menu__item mdl-color-text--black">
                        <a class="mdl-color-text--black" href="<?php echo base_url('organization/student_login')?>">
                            Logout
                        </a>
                    </li>

                    <li class="mdl-menu__item mdl-color-text--black">
                        <a class="mdl-color-text--black change_look_feel" href="javascript:;">
                            change Look
                        </a>
                    </li>
                </ul>
            </nav>
        </span>
    </div>
</header>