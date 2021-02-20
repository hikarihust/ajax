<?php
$userId         = Session::get('user')['info']['id'];
$controller     = $this->arrParam['controller'];
$action         = $this->arrParam['action'];

$linkDashboard      = URL::createLink('backend', 'index', 'index');


//dashboard
$arrDashboard       = ['parent' => ['name' => 'Quản lí Phim', 'icon'   => 'tachometer-alt', 'link' => $linkDashboard]];
$dashboard          = Html::createSidebar($controller, $action, $arrDashboard);

?>

<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo $this->_dirImg ?>/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ZendVN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $this->_dirImg ?>/default-user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin ZendVN</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php echo $dashboard; ?>
                <?php echo $group . $user . $category . $slider . $book . $cart . $account . $back ; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>