<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="<?= base_url('assets'); ?>/img/logo rse.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RSE Penggajian</span>
    </div>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img style=" 
            width: 35px !important;
            height: 35px !important;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('user'); ?>" class="d-block"><?= $user['name']; ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- QUERY MENU -->
                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT user_menu.id, menu
                              FROM user_menu JOIN user_access_menu
                              ON user_menu.id = user_access_menu.menu_id
                              WHERE user_access_menu.role_id = $role_id
                              ORDER BY user_menu.sort ASC               
                    ";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

                <?php foreach ($menu as $m) : ?>
                    <li class="nav-header"><?= $m['menu']; ?></li>

                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                                     FROM user_sub_menu 
                                     WHERE user_sub_menu.menu_id = $menuId
                                     AND user_sub_menu.is_active = 1
                                    ";

                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>

                        <li class="nav-item">

                            <a href="<?= base_url($sm['url']); ?>" <?php if ($title == $sm['title']) : ?> class="nav-link active" <?php else : ?> class="nav-link" <?php endif; ?>>
                                <i class="nav-icon <?= $sm['icon']; ?>"></i>
                                <p>
                                    <?= $sm['title']; ?>
                                </p>
                            </a>
                        </li>

                    <?php endforeach; ?>
                <?php endforeach; ?>
                <hr>

                <li class="nav-item">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link tombol-logout">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>