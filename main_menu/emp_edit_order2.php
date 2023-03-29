<?php
$emp_id = $_GET['emp_id'];
if (isset($_GET['from'])) {
    $date_from = $_GET['from'];
}
if (isset($_GET['to'])) {
    $date_to = $_GET['to'];
}
?>
<!-- START FUNCTION  -->
<?php
// functions to get date and day name for each record

function getdaydata($date_from, $date_to, $day)
{
    include "connect.php";
    $stmt = $connect->prepare("SELECT * FROM breakfast_order WHERE order_date_from=? AND order_date_to=? AND day= ?");
    $stmt->execute(array($date_from, $date_to, $day));
    $option_data = $stmt->fetch();
    return $option_data;
}
function getoptions($day, $meal_type, $option_type)
{
    include 'connect.php';
    $stmt = $connect->prepare("SELECT * FROM options WHERE day = ? AND meal_type = ? AND option_type= ? AND menu_num = 2");
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
                <h1> Edit Order </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> Edit Order </li>
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
            <h2 class="bg bg-info" style="font-size: 30px; font-weight:bold; padding:5px"> Menu 2 </h2>
            <form action="main.php?dir=main_menu&page=edit_order&emp_id=<?php echo $emp_id; ?>" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Company-2" class="block">Date From</label>
                                    <input type="text" disabled id="" name="date_from" class="datepicker form-control" value="<?php echo $date_from ?>">
                                    <input type="hidden" id="" name="date_from" class="datepicker form-control" value="<?php echo $date_from ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Company-2" class="block">Date To</label>
                                    <input type="text" id="" disabled name="date_to" class="datepicker form-control" value="<?php echo $date_to ?>">
                                    <input type="hidden" id="" name="date_to" class="datepicker form-control" value="<?php echo $date_to ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <?php
                                $emp_id = $_GET['emp_id'];
                                $stmt = $connect->prepare("SELECT * FROM emplyees
            INNER JOIN presentions ON presentions.id = emplyees.pres_id
            WHERE emplyees.id=?");
                                $stmt->execute(array($emp_id));
                                $emp_data = $stmt->fetch();
                                ?>
                                <div class="form-group">
                                    <label for="Company-2" class="block"> Supplier Name </label>
                                    <input readonly type="text" id="" name="supp_name" class="form-control" value="<?php echo $emp_data['name']; ?>">
                                    <input type="hidden" id="" name="supp_id" class="form-control" value="<?php echo $emp_data['pres_id']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row main_menu">
                    <div class="col-lg-12">
                        <div class="card card-row ">
                            <?php include "emp_breakfast.php"; ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-row ">
                            <?php include "emp_lunch.php"; ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-row ">
                            <?php include "emp_dinner.php"; ?>
                        </div>
                    </div>
                </div>
                <div class="flex text-center">
                    <button type="submit" class="btn btn-primary" name="save1"> Edit Order <i class="fa fa-save"></i> </button>
                </div>
                <br>
                <br>
            </form>
        </div>
    </div>
</section>
