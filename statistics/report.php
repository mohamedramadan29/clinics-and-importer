    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Month Statistics </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Month Statistics </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- DOM/Jquery table start -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="info">
                                <?php
                                $stmt = $connect->prepare("SELECT * FROM meal_value WHERE id = 1");
                                $stmt->execute();
                                $price = $stmt->fetch();

                                ?>
                                <form action="" method="post">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="bg bg-primary"> Breakfast Value </th>
                                                <th class="bg bg-warning"> Lunch Value </th>
                                                <th class="bg bg-info"> Dinner Value </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <input type="number" name="break_value" class="form-control" value="<?php echo $price['break_value']; ?>"> </td>
                                                <td> <input type="number" name="lunch_value" class="form-control" value="<?php echo $price['lunch_value']; ?>"> </td>
                                                <td> <input type="number" name="dinner_value" class="form-control" value="<?php echo $price['dinner_value']; ?>"> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" name="meal_price" class="btn btn-primary btn-sm"> Save & Update <i class="fa fa-save"></i> </button>
                                </form>
                                <?php
                                if (isset($_POST['meal_price'])) {
                                    $break_value = $_POST['break_value'];
                                    $lunch_value = $_POST['lunch_value'];
                                    $dinner_value = $_POST['dinner_value'];
                                    $stmt = $connect->prepare("UPDATE meal_value SET break_value=?, lunch_value=?, dinner_value=?");
                                    $stmt->execute(array($break_value, $lunch_value, $dinner_value));
                                    if ($stmt) {
                                        header('Location:main?dir=statistics&page=report');
                                    }
                                }

                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info">
                                <form class="" name="" method="post" action="">
                                    <div class="card-body">
                                        <div class="select_year_monthe d-flex justify-content-around align-items-center">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Select Year </label>
                                                <select required name="year" class="form-control select2" style="min-width: 120px;">
                                                    <?php
                                                    // Set the start year and end year for the dropdown
                                                    $startYear = date('Y') - 10;
                                                    $endYear = date('Y') + 10;
                                                    // Loop through each year and add it as an option in the dropdown
                                                    for ($i = $startYear; $i <= $endYear; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Select Month</label>
                                                <select required name="month" class="select2 form-control" style="min-width: 120px;">
                                                    <?php
                                                    for ($i = 1; $i <= 12; $i++) {
                                                        $month = date('F', mktime(0, 0, 0, $i, 1));
                                                        echo '<option value="' . $i . '">' . $month . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button style="min-width: 120px; margin-top:25px;" type="submit" name="select_year_month" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12">
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['select_year_month'])) {
                        $year = $_POST['year'];
                        $month = $_POST['month'];
                    ?>
                        <div class="card-body">
                            <div class="table-responsive dt-responsive">
                                <table id="example1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Day </th>
                                            <th> Sum Breakfast Num </th>
                                            <th> Sum Morning Session </th>
                                            <th> Sum Lunch Num </th>
                                            <th> Sum Noo Sessions </th>
                                            <th> Sum Dinner Num </th>
                                            <th> Sum Dinner Sessions</th>
                                            <th> Sum Meal </th>
                                            <th> Sum Sessions</th>
                                            <th> Total </th>
                                            <th> Gap </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM sessions WHERE session_month=? ");
                                        $stmt->execute(array($month));
                                        $alloption = $stmt->fetchAll();
                                        $i = 0;
                                        foreach ($alloption as $option) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $option['day_date']; ?> </td>
                                                <td> </td>
                                                <td> <?php echo $option['break_session']; ?> </td>
                                                <td> </td>
                                                <td> <?php echo $option['lunch_session']; ?> </td>
                                                <td> </td>
                                                <td> <?php echo $option['dinner_session']; ?> </td>
                                                <td> </td>
                                                <td> <?php
                                                        $stmt = $connect->prepare("SELECT SUM(break_session + lunch_session + dinner_session) AS sum FROM sessions WHERE id= ?");
                                                        $stmt->execute(array($option['id']));
                                                        $data = $stmt->fetch();
                                                        echo $data['sum'];
                                                        ?> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                </table>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.container-fluid -->
    </section>