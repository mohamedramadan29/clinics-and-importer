        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> calculator </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">calculator</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- DOM/Jquery table start -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-head">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Age (Years)</label>
                                            <input required type="number" name="age" class="form-control" id="age" value="<?php if (isset($_REQUEST['age'])) echo $_REQUEST['age']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Height (Cm)</label>
                                            <input required type="number" name="height" class="form-control" id="height" value="<?php if (isset($_REQUEST['height'])) echo $_REQUEST['height']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Weight (Kg)</label>
                                            <input required type="number" name="weight" class="form-control" id="weight" value="<?php if (isset($_REQUEST['weight'])) echo $_REQUEST['weight']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block" style="display: block;"> Gender </label>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary2" value="1" name="gender">
                                                <label for="radioPrimary2">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary3" value="2" name="gender">
                                                <label for="radioPrimary3">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Urine OutPut (Ml) </label>
                                            <input type="number" name="output" class="form-control" id="output" value="<?php if (isset($_REQUEST['output'])) echo $_REQUEST['output']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block"> Previosly Weight (Kg) [ If There Is Weight Loss ]</label>
                                            <input type="number" name="prev_weight" class="form-control" id="prev_weight" value="<?php if (isset($_REQUEST['prev_weight'])) echo $_REQUEST['prev_weight']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="flex d-block text-center m-lg-auto ">
                                        <button type="submit" class="btn btn-primary" name="result"> Results </button>
                                        <button type="reset" class="btn btn-warning"> Clear </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <?php
                    if (isset($_POST['result'])) {
                        $age = $_POST['age'];
                        $height = $_POST['height'];
                        $weight = $_POST['weight'];
                        if (isset($_POST['gender'])) {
                            $gender = $_POST['gender'];
                        } else {
                            $gender = '';
                        }

                        $output = $_POST['output'];
                        $prev_weight = $_POST['prev_weight'];
                        // بداية المعادلة الاولي 
                        // تحويل الطول الي متر 
                        $new_height = $height / 100;
                        $equation1 = $weight / pow($new_height, 2);  // (BMI)
                        $equation2 = $weight * 1.2;


                        // Start equation 4
                        if ($equation1 < 18.5) {
                            $class = 'Uner Weight';
                        } elseif ($equation1 >= 18.5 && $equation1 <= 24.9) {
                            $class = 'Healthy Weight';
                        } elseif ($equation1 >= 25 && $equation1 <= 29.9) {
                            $class = 'Over Weight';
                        } elseif ($equation1 >= 30 && $equation1 <= 34.9) {
                            $class = 'Obese l';
                        } elseif ($equation1 >= 35 && $equation1 <= 35.9) {
                            $class = 'Obese ll';
                        } elseif ($equation1 >= 40) {
                            $class = 'Serve Obese';
                        }
                        // equatio 4 (IBW)
                        if ($gender == 1) {
                            $equation4 =  pow($new_height, 2) * 23;
                        } elseif ($gender = 2) {
                            $equation4 =  pow($new_height, 2) * 22.5;
                        }
                        // equation 5 adj.bw
                        if ($equation1 > 30) {
                            $equation5 = ($weight - $equation4) * 0.25  + $equation4;
                        } else {
                            $equation5 = '';
                        }
                        // Equation 3
                        if ($age < 65) {
                            if ($equation1 >= 25 && $equation1 <= 29.9) {
                                $equation3 = $equation4 * 35;
                            } elseif ($equation1 > 30) {
                                $equation3 = $equation5 * 35;
                            } else {
                                $equation3 = $weight * 35;
                            }
                        } elseif ($age >= 65) {
                            if ($equation1 >= 25 && $equation1 <= 29.9) {
                                $equation3 = $equation4 * 35;
                            } elseif ($equation1 > 30) {
                                $equation3 = $equation5 * 35;
                            } else {
                                $equation3 = $weight * 32;
                            }
                        }

                        if (!empty($prev_weight)) {
                            $equation6 = (($weight - $prev_weight) / $weight) * 100;
                        } else {
                            $equation6 = '';
                        }
                        if (!empty($output)) {
                            $equation7 = 1000 + $output;
                        } else {
                            $equation7 = 1000;
                        }
                    ?>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block">BMI (Kg/M2)</label>
                                            <input type="number" name="bmi" class="form-control" id="bmi" value="<?php echo number_format($equation1,2); ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Proten Needs (g/day)</label>
                                            <input type="number" name="proten_need" class="form-control" id="proten_need" value="<?php echo number_format($equation2,2) ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block">colories Need (colors/ day)</label>
                                            <input type="number" name="colors" class="form-control" id="colors" value="<?php echo $equation3; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Calssification</label>
                                            <input type="text" name="class" class="form-control" id="classification" value="<?php echo $class; ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block"> IBW (KG)</label>
                                            <input type="number" name="ibw" class="form-control" id="ibw" value="<?php echo number_format($equation4,2) ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block"> Adg.BW (KG)</label>
                                            <input type="number" name="adg" class="form-control" id="adg" value="<?php echo $equation5; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block"> Weight Loss (%)</label>
                                            <input type="number" name="loss" class="form-control" id="loss" value="<?php echo $equation6; ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Company-2" class="block"> Daily Fluids Limit (L/day)</label>
                                            <input type="number" name="daily_fluid" class="form-control" id="daily_fluid" value="<?php echo $equation7; ?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="copy_inputs" name="copy_inputs" style="text-align: center; margin: auto; display: block;" class="btn btn-primary"> Copy <i class="fa fa-copy"></i> </button>
                            </form>

                        </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $("#copy_inputs").click(function() {
                var bmi = document.getElementById('bmi').value;
                var proten_need = document.getElementById('proten_need').value;
                var colors = document.getElementById('colors').value;
                var classification = document.getElementById('classification').value;
                var ibw = document.getElementById('ibw').value;
                var adg = document.getElementById('adg').value;
                var loss = document.getElementById('loss').value;
                var daily_fluid = document.getElementById('daily_fluid').value;
                var textToCopy = "BMI : " + bmi + "(Kg/M2)" + "\n" + "Proten Needs : " + proten_need + "(g/day)" + "\n" +
                    "colories Need : " + colors + " (colors/ day)" + "\n" + "Calssification : " + classification + "\n" +
                    "IBW : " + ibw + " (KG)" + "\n" + "Adg.BW : " + adg + "(KG)" + "\n" + "Weight Loss : " + loss + "(%)" + "\n" +
                    "Daily Fluids Limit : " + daily_fluid + "(L/day)";;
                // نسخ النص إلى الحافظة
                navigator.clipboard.writeText(textToCopy).then(function() {
                    alert(' Copy completed successfully ! ');
                }, function() {
                    console.log('فشل في نسخ النص!');
                });
            });
        </script>