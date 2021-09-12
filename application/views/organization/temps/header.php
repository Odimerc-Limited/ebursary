<?php
$logo = $this->db->get_where('org_logo', array('org_id'=> $org_id))->row('logo');
$org = $this->db->get_where('organizations', array('org_id'=> $org_id))->row('name');
?>

<header class="mdl-layout__header mdl-color--white">
    <div class="mdl-layout__header-row mdl-color--white" style="height: 77px;">
        <!-- Navigation -->
        <span style="height: 100px; width: 100px; margin-top: 30px; margin-left: 30px;" class="mdl-layout--large-screen-only">

           <a href="<?php echo base_url('organization')?>">
                    <img src="<?php echo base_url().$logo?>" class="img-responsive" />
           </a>
        </span>

        <div class="mdl-layout-spacer hidden-xs"></div>
        <span class="mdl-layout-title ">
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link mdl-color-text--black" href="#" id="demo-menu-lower-left" style="margin-top: 20px;">
                    <div class="fa fa-commenting-o mdl-badge mdl-badge--overlap" data-badge="<?php echo count($new_messages) ;?>" style="font-size: 22px;">
                    </div>
                </a>

                <a class="mdl-navigation__link mdl-color-text--black" href="#" id="demo-menu-lower-left" style="margin-top: 20px;">
                    <div class="fa fa-bell-o mdl-badge mdl-badge--overlap" data-badge="1" style="font-size: 22px;">
                    </div>
                </a>
                <a class="mdl-navigation__link mdl-color-text--black" href="#" id="demo-menu-lower-left">
                    <button id="demo-menu-lower-right" class="btn btn-sm mdl-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-js-button mdl-js-ripple-effect"
                            style="">
                        <?php echo $org ;?>
                        &nbsp;
                        <span class="caret"></span>
                    </button>


                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
                          <li class="mdl-menu__item">
                              <a href="<?php echo base_url('organization/change_pass') ;?>">
                                  Change Password
                              </a>
                          </li>
                          <li class="mdl-menu__item">
                             <a href="<?php echo base_url('auth/logout') ;?>">
                                  Logout
                             </a>
                          </li>
                    </ul>
                </a>
            </nav>
        </span>

    </div>

    <div class="mdl-layout__header-row mdl-color--blue-grey-700 mdl-layout--large-screen-only">
        <!-- Navigation -->
        <span class="mdl-layout-title">
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link mdl-color-text--white"
                   href="<?php echo base_url('organization') ?>">
                    <div class="material-icons">home</div>
                    &nbsp;
                    Home
                </a>
                <a class="mdl-navigation__link mdl-color-text--white mdl-layout--large-screen-only"
                   href="<?php echo base_url('organization/org_opportunities') ?>">
                    <div class="material-icons">grade</div>
                    &nbsp;
                    Opportunities
                </a>
                 <a class="mdl-navigation__link mdl-color-text--white mdl-layout--large-screen-only"
                    href="<?php echo base_url('organization/reports') ?>">
                    <div class="material-icons">history</div>
                    &nbsp;
                    Reports
                </a>
                 <a class="mdl-navigation__link mdl-color-text--white mdl-layout--large-screen-only"
                    href="<?php echo base_url('organization/account_info') ?>">
                    <div class="material-icons">settings</div>
                    &nbsp;
                    Settings
                </a>
            </nav>
        </span>
    </div>
</header>