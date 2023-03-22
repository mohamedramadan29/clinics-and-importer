<style>
    @media print {
        #print_Button {
            display: none;
        }
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Day Order Details </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Day Order Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<?php
if (isset($_GET["id"]) && is_numeric($_GET['id'])) {
    $day_id = $_GET['id'];
    $stmt = $connect->prepare("SELECT * FROM  breakfast_order WHERE id = ?");
    $stmt->execute(array($day_id));
    $day_details = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3" id="print">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM presentions WHERE id=?");
                                        $stmt->execute(array($day_details['pres_id']));
                                        $supp_data = $stmt->fetch();
                                        ?>
                                        <i class="fas fa-user"></i> <?php echo $supp_data['name']; ?>
                                        <small class="float-right">Day : <?php echo $day_details['day']; ?> </small>
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table1 table-responsive">
                                    <div class="card-header bg bg-secondary">
                                        <p class="card-title"> Breakfast Details</p>
                                    </div>
                                    <table class="table table-bordered table-responsive card-body">
                                        <thead>
                                            <tr>
                                                <th> option1 </th>
                                                <th> option2 </th>
                                                <th> option3 </th>
                                                <th> special </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option1'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                            echo $item['item_name'];
                                                            echo "</br>";
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option2'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                            echo $item['item_name'];
                                                            echo "</br>";
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option3'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                            echo $item['item_name'];
                                                            echo "</br>";
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td> <?php echo $day_details['special']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td> <?php echo $day_details['option1_qt']; ?> </td>
                                                <td> <?php echo $day_details['option2_qt']; ?> </td>
                                                <td> <?php echo $day_details['option3_qt']; ?></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table1 table-responsive">
                                    <div class="card-header bg bg-info">
                                        <p class="card-title"> Lunch Details</p>
                                    </div>
                                    <table class="table table-bordered table-responsive card-body">
                                        <thead>
                                            <tr>
                                                <th> option1 </th>
                                                <th> option2 </th>
                                                <th> option3 </th>
                                                <th> special </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option4'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                            echo $item['item_name'];
                                                            echo "</br>";
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option5'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                            echo $item['item_name'];
                                                            echo "</br>";
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option6'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                            echo $item['item_name'];
                                                            echo "</br>";
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td> <?php echo $day_details['special2']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td> <?php echo $day_details['option4_qt']; ?> </td>
                                                <td> <?php echo $day_details['option5_qt']; ?> </td>
                                                <td> <?php echo $day_details['option6_qt']; ?></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table1 table-responsive">
                                    <div class="card-header bg bg-success">
                                        <p class="card-title"> Dinner Details</p>
                                    </div>
                                    <table class="table table-bordered table-responsive card-body">
                                        <thead>
                                            <tr>
                                                <th> option1 </th>
                                                <th> option2 </th>
                                                <th> option3 </th>
                                                <th> special </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option7'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                            echo $item['item_name'];
                                                            echo "</br>";
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option8'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                            echo $item['item_name'];
                                                            echo "</br>";
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $option1 =  $day_details['option9'];
                                                    if ($option1 != "" && $option1 != null) {
                                                        $options = explode(',', $option1);
                                                        foreach ($options as $option) {
                                                            $stmt = $connect->prepare("SELECT * FROM items WHERE id=?");
                                                            $stmt->execute(array($option));
                                                            $item = $stmt->fetch();
                                                            echo $item['item_name'];
                                                            echo "</br>";
                                                        }
                                                    } else {
                                                        echo "No Options";
                                                    }

                                                    ?>
                                                </td>
                                                <td> <?php echo $day_details['special3']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td> <?php echo $day_details['option7_qt']; ?> </td>
                                                <td> <?php echo $day_details['option8_qt']; ?> </td>
                                                <td> <?php echo $day_details['option9_qt']; ?></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row no-print">
                                <div class="col-12">
                                    <button class="btn btn-primary" id="print_Button" onclick="printDiv()"> <i class="fa fa-print"></i>Print</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
<?php
    } else {
        header('Location:main?dir=supp_dash&page=report');
    }
} else {
    header('Location:main?dir=supp_dash&page=report');
}
?>


<script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>