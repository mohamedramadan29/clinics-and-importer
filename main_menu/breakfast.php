<form action="" method="post" enctype="multipart/form-data">
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
                            <select name="saturday_option1[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option1_qt">
                    </td>
                    <td>
                        <?php
                        $getoption = getoptions('saturday', 'breakfast', 'option2');
                        $alldata =  $getoption;
                        ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="saturday_option2[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option2_qt">
                    </td>
                    <td>
                        <?php
                        $getoption = getoptions('saturday', 'breakfast', 'option3');
                        $alldata =  $getoption;
                        ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="saturday_option3[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option3_qt">
                    </td>
                    <td>
                        <textarea name="saturday_special" placeholder="Enter Special Order" class="form-control"></textarea>
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
                            <select name="sunday_option1[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option1_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('sunday', 'breakfast', 'option2');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="sunday_option2[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option2_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('sunday', 'breakfast', 'option3');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="sunday_option3[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option3_qt">
                    </td>
                    <td>
                        <textarea name="sunday_special" placeholder="Enter Special Order" class="form-control"></textarea>
                    </td>
                </tr>

                <tr>
                    <td> monday </td>
                    <td> <?php
                            $getoption = getoptions('monday', 'breakfast', 'option1');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option1[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option1_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('monday', 'breakfast', 'option2');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option2[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option2_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('monday', 'breakfast', 'option3');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option3[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option3_qt">
                    </td>
                    <td>
                        <textarea name="monday_special" placeholder="Enter Special Order" class="form-control"></textarea>
                    </td>
                </tr>

                <tr>
                    <td> tuesday </td>
                    <td> <?php
                            $getoption = getoptions('tuesday', 'breakfast', 'option1');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option1[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option1_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('tuesday', 'breakfast', 'option2');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option2[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option2_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('tuesday', 'breakfast', 'option3');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option3[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option3_qt">
                    </td>
                    <td>
                        <textarea name="tuesday_special" placeholder="Enter Special Order" class="form-control"></textarea>
                    </td>
                </tr>

                <tr>
                    <td> wednesday </td>
                    <td> <?php
                            $getoption = getoptions('wednesday', 'breakfast', 'option1');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option1[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option1_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('wednesday', 'breakfast', 'option2');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option2[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option2_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('wednesday', 'breakfast', 'option3');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option3[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option3_qt">
                    </td>
                    <td>
                        <textarea name="wednesday_special" placeholder="Enter Special Order" class="form-control"></textarea>
                    </td>
                </tr>
                <tr>
                    <td> thursday </td>
                    <td> <?php
                            $getoption = getoptions('thursday', 'breakfast', 'option1');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option1[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option1_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('thursday', 'breakfast', 'option2');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option2[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option2_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('thursday', 'breakfast', 'option3');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option3[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                ?>
                                    <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option3_qt">
                    </td>
                    <td>
                        <textarea name="thursday_special" placeholder="Enter Special Order" class="form-control"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary" name="save1"> save Menu </button>
</form>

<!-------------------------- START TEST -------------------------->
<?php
$days = array("saturday", "sunday", "monday", "tuesday", "wednesday", "thursday");
if (isset($_POST['save1'])) {
    foreach ($days as $day) {
        $special = $_POST[$day . '_special'];
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
        $option1_qt = $_POST[$day . '_option1_qt'];
        $option2_qt = $_POST[$day . '_option2_qt'];
        $option3_qt = $_POST[$day . '_option3_qt'];

        $stmt = $connect->prepare("INSERT INTO breakfast_order (menu_num,meal_type,day,option1,option1_qt,
        option2,option2_qt,option3,option3_qt,special,emp_id,pres_id) value(?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([
            1, 'breakfast', $day, $option1, $option1_qt, $option2, $option2_qt,
            $option3, $option3_qt, $special, 1, 2
        ]);
    }
}

//header("location:main.php?dir=main_menu&page=report");
?>