<?php
ob_start();
$pagetitle = 'Home';
session_start();
include 'init.php';
include 'include/navbar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    $page = '';
    if (isset($_GET['page']) && isset($_GET['dir'])) {
        $page = $_GET['page'];
        $dir = $_GET['dir'];
    } else {
        $page = 'manage';
    }
    // start Website Routes 
    // STRAT DASHBAORD
    if ($dir == 'dashboard' && $page == 'dashboard') {
        include 'dashboard.php';
    }
    // END DASHBAORD
    // START Category
    if ($dir == 'categories' && $page == 'add') {
        include "categories/add.php";
    } elseif ($dir == 'categories' && $page == 'edit') {
        include "categories/edit.php";
    } elseif ($dir == 'categories' && $page == 'delete') {
        include 'categories/delete.php';
    } elseif ($dir == 'categories' && $page == 'report') {
        include "categories/report.php";
    }

    // START Items
    if ($dir == 'items' && $page == 'add') {
        include "items/add.php";
    } elseif ($dir == 'items' && $page == 'edit') {
        include "items/edit.php";
    } elseif ($dir == 'items' && $page == 'delete') {
        include 'items/delete.php';
    } elseif ($dir == 'items' && $page == 'report') {
        include "items/report.php";
    }

    // START Menus Options
    if ($dir == 'menus' && $page == 'add') {
        include "menus/add.php";
    } elseif ($dir == 'menus' && $page == 'edit') {
        include "menus/edit.php";
    } elseif ($dir == 'menus' && $page == 'delete') {
        include 'menus/delete.php';
    } elseif ($dir == 'menus' && $page == 'report') {
        include "menus/report.php";
    }
    // START Main Menu 
    if ($dir == 'main_menu' && $page == 'add') {
        include "main_menu/add.php";
    } elseif ($dir == 'main_menu' && $page == 'edit') {
        include "main_menu/edit.php";
    } elseif ($dir == 'main_menu' && $page == 'delete') {
        include 'main_menu/delete.php';
    } elseif ($dir == 'main_menu' && $page == 'report') {
        include "main_menu/report.php";
    } elseif ($dir == 'main_menu' && $page == 'report2') {
        include "main_menu/report2.php";
    }
    // START sessions 
    if ($dir == 'sessions' && $page == 'add') {
        include "sessions/add.php";
    } elseif ($dir == 'sessions' && $page == 'edit') {
        include "sessions/edit.php";
    } elseif ($dir == 'sessions' && $page == 'delete') {
        include 'sessions/delete.php';
    } elseif ($dir == 'sessions' && $page == 'report') {
        include "sessions/report.php";
    }
    // START Moth Statistics 
    if ($dir == 'statistics' && $page == 'add') {
        include "statistics/add.php";
    } elseif ($dir == 'statistics' && $page == 'edit') {
        include "statistics/edit.php";
    } elseif ($dir == 'statistics' && $page == 'delete') {
        include 'statistics/delete.php';
    } elseif ($dir == 'statistics' && $page == 'report') {
        include "statistics/report.php";
    }
    // START CLIENTS 

    // START cLIENT CATEGORY
    if ($dir == 'client_cat' && $page == 'add') {
        include "client_cat/add.php";
    } elseif ($dir == 'client_cat' && $page == 'edit') {
        include "client_cat/edit.php";
    } elseif ($dir == 'client_cat' && $page == 'delete') {
        include 'client_cat/delete.php';
    } elseif ($dir == 'client_cat' && $page == 'report') {
        include "client_cat/report.php";
    }
    // START cLIENTS (patients)
    if ($dir == 'clients' && $page == 'add') {
        include "clients/add.php";
    } elseif ($dir == 'clients' && $page == 'edit') {
        include "clients/edit.php";
    } elseif ($dir == 'clients' && $page == 'delete') {
        include 'clients/delete.php';
    } elseif ($dir == 'clients' && $page == 'report') {
        include "clients/report.php";
    }

    // START SETTING
    // START EMPLOYEE
    if ($dir == 'setting' && $page == 'add_emp') {
        include "setting/add_emp.php";
    } elseif ($dir == 'setting' && $page == 'edit_emp') {
        include "setting/edit_emp.php";
    } elseif ($dir == 'setting' && $page == 'delete_emp') {
        include 'setting/delete_emp.php';
    } elseif ($dir == 'setting' && $page == 'report_emp') {
        include "setting/report_emp.php";
    }
    // START Presentation (???????????????? )
    if ($dir == 'setting' && $page == 'add_pre') {
        include "setting/add_pre.php";
    } elseif ($dir == 'setting' && $page == 'edit_pre') {
        include "setting/edit_pre.php";
    } elseif ($dir == 'setting' && $page == 'delete_pre') {
        include 'setting/delete_pre.php';
    } elseif ($dir == 'setting' && $page == 'report_pre') {
        include "setting/report_pre.php";
    }
    // START Login Page
    if ($dir == 'login_page' && $page == 'add') {
        include "login_page/add.php";
    } elseif ($dir == 'login_page' && $page == 'edit') {
        include "login_page/edit.php";
    } elseif ($dir == 'login_page' && $page == 'delete') {
        include 'login_page/delete.php';
    } elseif ($dir == 'login_page' && $page == 'report') {
        include "login_page/report.php";
    }
    ?>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php
include $tem . "footer.php";
?>