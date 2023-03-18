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
                <div class="card">

                    <div class="card-body">
                        <div class="row">

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Company-2" class="block">Date From</label>
                                    <input type="text" id="" name="date_from" class="datepicker form-control" placeholder="Select Start Date">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Company-2" class="block">Date To</label>
                                    <input type="text" id="" name="date_to" class="datepicker form-control" placeholder="Select End Date">
                                </div>
                            </div>
                            <div class="col-4">
                                <?php
                                $stmt = $connect->prepare("SELECT * FROM emplyees
            INNER JOIN presentions ON presentions.id = emplyees.pres_id
            WHERE emplyees.id=?");
                                $stmt->execute(array($_SESSION['emp_id']));
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
                <div class="flex text-center">
                    <button type="submit" class="btn btn-primary" name="save1"> save Order <i class="fa fa-save"></i> </button>
                    <button type="submit" class="btn btn-warning" name="save1"> Save a draft <i class="fa fa-save"></i> </button>
                </div>
                <br>
                <br>
            </form>
        </div>
    </div>
</section>