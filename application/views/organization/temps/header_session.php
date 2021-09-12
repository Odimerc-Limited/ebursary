<header class="mdl-layout__header mdl-color--white">
    <div class="mdl-layout__header-row">
        <!-- Navigation -->
        <span class="mdl-layout-title">
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link mdl-color-text--black mdl-layout--large-screen-only"
                   href="<?php echo base_url('organization/loggedin_student_homepage') ?>">
                    <div class="material-icons">home</div>
                    &nbsp;
                    Home
                </a>
                <a class="mdl-navigation__link mdl-color-text--black mdl-layout--large-screen-only "
                   href="<?php echo base_url('organization/loggedin_student_applications') ?>">
                    <div class="material-icons">stars</div>
                    &nbsp;
                    Applications
                </a>
                <a class="mdl-navigation__link mdl-color-text--black"
                   href="<?php echo base_url('organization/loggedin_student_messages') ?>">
                    <div class="material-icons">inbox</div>
                    &nbsp;
                    <span class="mdl-badge" data-badge="2">
                    Messages
                </span>
                </a>
            </nav>
        </span>

        <div class="mdl-layout-spacer hidden-xs"></div>
        <span class="mdl-layout-title">
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link mdl-color-text--black" href="javascript:;" id="demo-menu-lower-left">
                    <div class="material-icons">account_circle</div>
                    &nbsp;
                    Denis
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
                </ul>
            </nav>
        </span>
    </div>
</header>