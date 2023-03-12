<!-- START FUNCTION  -->
<?php
function getoptions($day, $meal_type, $option_type)
{
    include 'connect.php';
    $stmt = $connect->prepare("SELECT * FROM options WHERE day = ? AND meal_type = ? AND option_type= ? AND menu_num = 1");
    $stmt->execute(array($day, $meal_type, $option_type));
    $alldata = $stmt->fetchAll();
    return $alldata;
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
            <br>
            <div class="flex justify-content-between justify-content-center text-center"> 
                <a href="main.php?dir=main_menu&page=report" class="btn btn-info"> Menu 1 </a>
                <a href="main.php?dir=main_menu&page=report2" class="btn btn-success"> Menu 2 </a>
            </div>
            <br>
            <h2 class="bg bg-info" style="font-size: 30px; font-weight:bold; padding:5px"> Menu 1 </h2>
            <div class="row main_menu">
                <div class="col-lg-4">
                    <div class="card card-row ">
                        <div class="table1 table-responsive">
                            <div class="card-header bg bg-secondary">
                                <p class="card-title"> Breakfast</p>
                            </div>
                            <table class="table table-bordered table-responsive card-body">
                                <thead>
                                    <tr>
                                        <th> Options // Day </th>
                                        <th> Option 1 </th>
                                        <th> Option 2 </th>
                                        <th> Option 3 </th>
                                        <th> Special orders </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Saturday </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('saturday', 'breakfast', 'option1');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('saturday', 'breakfast', 'option2');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('saturday', 'breakfast', 'option3');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Sunday </td>
                                        <td> <?php
                                                $getoption = getoptions('sunday', 'breakfast', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('sunday', 'breakfast', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('sunday', 'breakfast', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Monday </td>
                                        <td> <?php
                                                $getoption = getoptions('monday', 'breakfast', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('monday', 'breakfast', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('monday', 'breakfast', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Tuesday </td>
                                        <td> <?php
                                                $getoption = getoptions('tuesday', 'breakfast', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('tuesday', 'breakfast', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('tuesday', 'breakfast', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Wednesday </td>
                                        <td> <?php
                                                $getoption = getoptions('wednesday', 'breakfast', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('wednesday', 'breakfast', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('wednesday', 'breakfast', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Thursday </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('thursday', 'breakfast', 'option1');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('thursday', 'breakfast', 'option2');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('thursday', 'breakfast', 'option3');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-row ">
                        <div class="table1 table-responsive">
                            <div class="card-header bg bg-primary">
                                <p class="card-title"> lunch </p>
                            </div>
                            <table class="table table-bordered table-responsive card-body">
                                <thead>
                                    <tr>
                                        <th> Options // Day </th>
                                        <th> Option 1 </th>
                                        <th> Option 2 </th>
                                        <th> Option 3 </th>
                                        <th> Special orders </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Saturday </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('saturday', 'lunch', 'option1');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('saturday', 'lunch', 'option2');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('saturday', 'lunch', 'option3');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Sunday </td>
                                        <td> <?php
                                                $getoption = getoptions('sunday', 'lunch', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('sunday', 'lunch', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('sunday', 'lunch', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Monday </td>
                                        <td> <?php
                                                $getoption = getoptions('monday', 'lunch', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('monday', 'lunch', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('monday', 'lunch', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Tuesday </td>
                                        <td> <?php
                                                $getoption = getoptions('tuesday', 'lunch', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('tuesday', 'lunch', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('tuesday', 'lunch', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Wednesday </td>
                                        <td> <?php
                                                $getoption = getoptions('wednesday', 'lunch', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('wednesday', 'lunch', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('wednesday', 'lunch', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Thursday </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('thursday', 'lunch', 'option1');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('thursday', 'lunch', 'option2');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('thursday', 'lunch', 'option3');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-row ">
                        <div class="table1 table-responsive">
                            <div class="card-header bg bg-success">
                                <p class="card-title"> dinner </p>
                            </div>
                            <table class="table table-bordered table-responsive card-body">
                                <thead>
                                    <tr>
                                        <th> Options // Day </th>
                                        <th> Option 1 </th>
                                        <th> Option 2 </th>
                                        <th> Option 3 </th>
                                        <th> Special orders </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Saturday </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('saturday', 'dinner', 'option1');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('saturday', 'dinner', 'option2');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('saturday', 'dinner', 'option3');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Sunday </td>
                                        <td> <?php
                                                $getoption = getoptions('sunday', 'dinner', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('sunday', 'dinner', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('sunday', 'dinner', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Monday </td>
                                        <td> <?php
                                                $getoption = getoptions('monday', 'dinner', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('monday', 'dinner', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('monday', 'dinner', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Tuesday </td>
                                        <td> <?php
                                                $getoption = getoptions('tuesday', 'dinner', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('tuesday', 'dinner', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('tuesday', 'dinner', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Wednesday </td>
                                        <td> <?php
                                                $getoption = getoptions('wednesday', 'dinner', 'option1');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('wednesday', 'dinner', 'option2');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> <?php
                                                $getoption = getoptions('wednesday', 'dinner', 'option3');
                                                $alldata =  $getoption;
                                                ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM items WHERE cat_id=?");
                                                    $stmt->execute(array($data['cat']));
                                                    $allitems = $stmt->fetchAll();
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            <?php
                                                echo "</br>";
                                            }

                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                    <tr>
                                        <td> Thursday </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('thursday', 'dinner', 'option1');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('thursday', 'dinner', 'option2');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $getoption = getoptions('thursday', 'dinner', 'option3');
                                            $alldata =  $getoption;
                                            ?>
                                            <?php
                                            foreach ($alldata as $data) {
                                            ?>
                                                <select name="" id="" class="select2 form-control">
                                                    <option value=""> -- Select --</option>
                                                    <?php
                                                    $getitems =  getitems($data['cat']);
                                                    $allitems = $getitems;
                                                    foreach ($allitems as $item) {
                                                    ?>
                                                        <option value=""> <?php echo $item['item_name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                                echo "</br>";
                                            }
                                            ?>
                                        </td>
                                        <td> option 4 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary btn-block"> Save Menu <i class="fa fa-save"></i>  </button>
            
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<br>
            <br>
            <br>