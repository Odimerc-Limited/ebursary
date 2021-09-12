<header class="mdl-layout__header mdl-color--white">
    <div class="mdl-layout__header-row">
        <!-- Navigation -->
        <span class="mdl-layout-title">
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link mdl-color-text--black mdl-layout--large-screen-only"
                   href="<?php echo base_url('organization/student_homepage') ?>">
                    <div class="material-icons">home</div>
                    &nbsp;
                    Home
                </a>
                <a class="mdl-navigation__link mdl-color-text--black mdl-layout--large-screen-only"
                   href="<?php echo base_url('organization/student_about') ?>">
                    <div class="material-icons">history</div>
                    &nbsp;
                    About
                </a>
            </nav>
        </span>

        <div class="mdl-layout-spacer hidden-xs"></div>
        <span class="mdl-layout-title">
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link mdl-color-text--black" href="<?php echo base_url('organization/student_login')?>" id="demo-menu-lower-left">
                    <div class="material-icons">lock</div>
                    &nbsp;
                    Login
                </a>

                <a class="mdl-navigation__link mdl-color-text--black" href="<?php echo base_url('organization/student_reg')?>" id="demo-menu-lower-left">
                    <div class="material-icons">assignment_ind</div>
                    &nbsp;
                   Sign Up
                </a>
            </nav>
        </span>

    </div>
</header>