<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo PROFILE; ?>" class="brand-link">
    <img src="<?php echo IMG; ?>eP_perfil.png" alt="E-logic" style="width:35px;height:35px;" class="brand-image img-thumbnail elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">E-logic</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo IMG; ?>user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $user->get_username(); ?></a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a href="<?php echo PROFILE; ?>" class="nav-link
          <?php
          if ($current_manager == '') {
            echo 'active';
          }
          ?>
             ">
            <i class="fa fa-th nav-icon"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php
        if ($level == 1) {
        ?>
        <li class="nav-item has-treeview menu-open">
          <a href="<?php echo SIGN_IN; ?>" class="nav-link
          <?php
          if ($current_manager == 'sign_in') {
            echo 'active';
          }
          ?>
             ">
            <i class="fa fa-users nav-icon"></i>
            <p>User register</p>
          </a>
        </li>
        <?php
        }

        if($level <= 4){
          ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link" id="new_project">
              <i class="fa fa-plus nav-icon"></i>
              <p>New Project</p>
            </a>
          </li>
          <?php
        }
        ?>
        <li class="nav-item has-treeview menu-open">
          <a href="<?php echo CALENDAR_NEW_PROJECTS; ?>" class="nav-link
          <?php
          if ($current_manager == 'calendar_projects' || $current_manager == 'calendar_my_projects' || $current_manager == 'calendar_new_projects') {
              echo 'active';
          }
          ?>
             ">
            <i class="fa fa-calendar nav-icon"></i>
            <p>Calendar</p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="<?php echo SEARCH; ?>" class="nav-link
          <?php
          if ($current_manager == 'search') {
              echo 'active';
          }
          ?>
             ">
            <i class="fa fa-search nav-icon"></i>
            <p>Search</p>
          </a>
        </li>
        <li class="nav-item has-treeview
        <?php
        if($current_manager == 'submitted_projects' || $current_manager == 'award_projects' || $current_manager == 'follow_up_projects'){
          echo 'menu-open';
        }
        ?>
        ">
          <a href="#" class="nav-link
            <?php
            if($current_manager == 'submitted_projects' || $current_manager == 'award_projects' || $current_manager == 'follow_up_projects'){
              echo 'active';
            }
            ?>
            ">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Projects
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo SUBMITTED_PROJECTS; ?>" class="nav-link
                <?php
                if($current_manager == 'submitted_projects'){
                  echo 'active';
                }
                ?>
                ">
                <p>Submitted</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo FOLLOW_UP_PROJECTS; ?>" class="nav-link
                <?php
                if($current_manager == 'follow_up_projects'){
                  echo 'active';
                }
                ?>
                ">
                <p>Follow up</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo AWARD_PROJECTS; ?>" class="nav-link
                <?php
                if($current_manager == 'award_projects'){
                  echo 'active';
                }
                ?>
                ">
                <p>Award</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo FULFILLMENT; ?>" class="nav-link
                <?php
                if($current_manager == 'fulfillment'){
                  echo 'active';
                }
                ?>
                ">
                <p>Fulfillment</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="<?php echo REPORTS; ?>" class="nav-link
          <?php
          if ($current_manager == 'reports') {
            echo 'active';
          }
          ?>
             ">
            <i class="fa fa-chart-pie nav-icon"></i>
            <p>Reports</p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="<?php echo CONTACT_LIST; ?>" class="nav-link
          <?php
          if ($current_manager == 'contact_list') {
            echo 'active';
          }
          ?>
             ">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Contact list</p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="<?php echo PARTNER_LIST; ?>" class="nav-link
          <?php
          if ($current_manager == 'partner_list') {
            echo 'active';
          }
          ?>
             ">
            <i class="fas fa-list-ol nav-icon"></i>
            <p>Partner list</p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="<?php echo EMPLOYEE_DOCS_PAGE; ?>" class="nav-link
          <?php
          if ($current_manager == 'employee_docs_page') {
            echo 'active';
          }
          ?>
             ">
            <i class="fas fa-file nav-icon"></i>
            <p>Employee docs</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
