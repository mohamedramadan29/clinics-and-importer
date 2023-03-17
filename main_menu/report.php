<!-- START FUNCTION  -->
<?php
function getoptions($day, $meal_type, $option_type)
{
    include 'connect.php';
    $stmt = $connect->prepare("SELECT * FROM options WHERE day = ? AND meal_type = ? AND option_type= ? AND menu_num = 1");
    $stmt->execute(array($day, $meal_type, $option_type));
    $alldata = $stmt->fetchAll();
    $count = $stmt->rowCount();
    return $alldata;
    echo $count;
}
function getitems($cat_id)
{
    include 'connect.php';
    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
    $stmt->execute(array($cat_id));
    $allitems = $stmt->fetchAll();
    return $allitems;
}
?>

<!-- END FUNCTION -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Menus </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> Menus </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- DOM/Jquery table start -->
<section class="content menu_page">
    <div class="container-fluid">
        <div class="">
            <?php
            if (isset($_SESSION['success_message'])) {
                $message = $_SESSION['success_message'];
                unset($_SESSION['success_message']);
            ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i><?php echo $message; ?></th5>
                </div>

            <?php
            }
            ?>
            <br>
            <div class="flex justify-content-between justify-content-center text-center">
                <a href="main.php?dir=main_menu&page=report" class="btn btn-info"> Menu 1 </a>
                <a href="main.php?dir=main_menu&page=report2" class="btn btn-success"> Menu 2 </a>
            </div>
            <br>
            <h2 class="bg bg-info" style="font-size: 30px; font-weight:bold; padding:5px"> Menu 1 </h2>
            <form action="main.php?dir=main_menu&page=add" method="post" enctype="multipart/form-data">
                <div class="row main_menu">
                    <div class="col-lg-12">
                        <div class="card card-row ">
                            <?php include "breakfast.php"; ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-row ">
                            <?php include "lunch.php"; ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-row ">
                            <?php include "dinner.php"; ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="save1"> save Order <i class="fa fa-save"></i> </button>
            </form>
        </div>
    </div>
</section>

<?php
$days = array("saturday", "sunday", "monday", "tuesday", "wednesday", "thursday");
if (isset($_POST['save1'])) {
    foreach ($days as $day) {
        $special = $_POST[$day . '_special'];
        $special2 = $_POST[$day . '_special2'];
        $special3 = $_POST[$day . '_special3'];
        if (isset($_POST[$day . '_option1'])) {
            $option1 = implode(',', $_POST[$day . '_option1']);
        } else {
            $option1 = '';
        }
        if ($_POST[$day . '_option2']) {
            $option2 = implode(',', $_POST[$day . '_option2']);
        } else {
            $option2 = '';
        }
        if ($_POST[$day . '_option3']) {
            $option3 = implode(',', $_POST[$day . '_option3']);
        } else {
            $option3 = '';
        }
        if ($_POST[$day . '_option4']) {
            $option4 = implode(',', $_POST[$day . '_option4']);
        } else {
            $option4 = '';
        }
        if ($_POST[$day . '_option5']) {
            $option5 = implode(',', $_POST[$day . '_option5']);
        } else {
            $option5 = '';
        }
        if ($_POST[$day . '_option6']) {
            $option6 = implode(',', $_POST[$day . '_option6']);
        } else {
            $option6 = '';
        }
        if ($_POST[$day . '_option7']) {
            $option7 = implode(',', $_POST[$day . '_option7']);
        } else {
            $option7 = '';
        }
        if ($_POST[$day . '_option8']) {
            $option8 = implode(',', $_POST[$day . '_option8']);
        } else {
            $option8 = '';
        }
        if ($_POST[$day . '_option9']) {
            $option9 = implode(',', $_POST[$day . '_option9']);
        } else {
            $option9 = '';
        }
        $option1_qt = $_POST[$day . '_option1_qt'];
        $option2_qt = $_POST[$day . '_option2_qt'];
        $option3_qt = $_POST[$day . '_option3_qt'];
        $option4_qt = $_POST[$day . '_option4_qt'];
        $option5_qt = $_POST[$day . '_option5_qt'];
        $option6_qt = $_POST[$day . '_option6_qt'];
        $option7_qt = $_POST[$day . '_option7_qt'];
        $option8_qt = $_POST[$day . '_option8_qt'];
        $option9_qt = $_POST[$day . '_option9_qt'];
        $stmt = $connect->prepare("INSERT INTO breakfast_order (menu_num,meal_type,day,option1,option1_qt,
        option2,option2_qt,option3,option3_qt,special,option4,option4_qt,option5,option5_qt,option6,option6_qt,special2
        ,option7,option7_qt,option8,option8_qt,option9,option9_qt,special3,order_date_from,order_date_to,emp_id,pres_id)
         value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([
            1, 'breakfast', $day, $option1, $option1_qt, $option2, $option2_qt,
            $option3, $option3_qt, $special, $option4, $option4_qt, $option5, $option5_qt, $option6, $option6_qt, $special2, $option7, $option7_qt,
            $option8, $option8_qt, $option9, $option9_qt, $special3, 20 / 2 / 2023, 26 / 2 / 2023, 1, 1
        ]);
    }
    //header("location:main.php?dir=main_menu&page=report");
}


?>