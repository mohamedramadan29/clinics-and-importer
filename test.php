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
                            <select name="bsaoption1[]" id="" class="select2 form-control">
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
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="bsaoption1_qt">
                    </td>
                    <td>
                        <?php
                        $getoption = getoptions('saturday', 'breakfast', 'option2');
                        $alldata =  $getoption;
                        ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="bsaoption2[]" id="" class="select2 form-control">
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
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="bsaoption2_qt">
                    </td>
                    <td>
                        <?php
                        $getoption = getoptions('saturday', 'breakfast', 'option3');
                        $alldata =  $getoption;
                        ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="bsaoption3[]" id="" class="select2 form-control">
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
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="bsaoption3_qt">
                    </td>
                    <td>
                        <textarea name="bsa_special" placeholder="Enter Special Order" class="form-control"></textarea>
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
                            <select name="bsunoption1[]" id="" class="select2 form-control">
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
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="bsunoption1_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('sunday', 'breakfast', 'option2');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="bsunoption2[]" id="" class="select2 form-control">
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
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="bsunoption2_qt">
                    </td>
                    <td> <?php
                            $getoption = getoptions('sunday', 'breakfast', 'option3');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="bsunoption3[]" id="" class="select2 form-control">
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
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="bsunoption3_qt">
                    </td>
                    <td>
                        <textarea name="bsun_special" placeholder="Enter Special Order" class="form-control"></textarea>
                    </td>
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
                            <select name="monbroption1[]" id="" class="select2 form-control">
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
                    </td>
                    <td> <?php
                            $getoption = getoptions('monday', 'breakfast', 'option2');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="monbroption1[]" id="" class="select2 form-control">
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
                    </td>
                    <td> <?php
                            $getoption = getoptions('monday', 'breakfast', 'option3');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="monbroption3[]" id="" class="select2 form-control">
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
                            <select name="tusbroption1[]" id="" class="select2 form-control">
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
                    </td>
                    <td> <?php
                            $getoption = getoptions('tuesday', 'breakfast', 'option2');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="tusbroption2[]" id="" class="select2 form-control">
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
                    </td>
                    <td> <?php
                            $getoption = getoptions('tuesday', 'breakfast', 'option3');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="tusbroption3[]" id="" class="select2 form-control">
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
                            <select name="wedbroption1[]" id="" class="select2 form-control">
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
                    </td>
                    <td> <?php
                            $getoption = getoptions('wednesday', 'breakfast', 'option2');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="wedbroption2[]" id="" class="select2 form-control">
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
                    </td>
                    <td> <?php
                            $getoption = getoptions('wednesday', 'breakfast', 'option3');
                            $alldata =  $getoption;
                            ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="wedbroption3[]" id="" class="select2 form-control">
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
                            <select name="thubroption1[]" id="" class="select2 form-control">
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
                    </td>
                    <td>
                        <?php
                        $getoption = getoptions('thursday', 'breakfast', 'option2');
                        $alldata =  $getoption;
                        ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="thubroption2[]" id="" class="select2 form-control">
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
                    </td>
                    <td>
                        <?php
                        $getoption = getoptions('thursday', 'breakfast', 'option3');
                        $alldata =  $getoption;
                        ?>
                        <?php
                        foreach ($alldata as $data) {
                        ?>
                            <select name="thubroption3[]" id="" class="select2 form-control">
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
                    </td>
                    <td> option 4 </td>
                </tr>
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary" name="save1"> save Menu </button>
</form>

<!-------------------------- START TEST -------------------------->
<?php
if (isset($_POST['save1'])) {
    /* saturday */
    $bsa_special = $_POST['bsa_special'];
    $bsaoption1 = implode(',', $_POST['bsaoption1']);
    $bsaoption2 = implode(',', $_POST['bsaoption2']);
    $bsaoption3 = implode(',', $_POST['bsaoption3']);
    $bsaoption1_qt = $_POST['bsaoption1_qt'];
    $bsaoption2_qt = $_POST['bsaoption2_qt'];
    $bsaoption3_qt = $_POST['bsaoption3_qt'];
    /* sunday */
    $bsun_special = $_POST['bsun_special'];
    $bsunoption1 = implode(',', $_POST['bsunoption1']);
    if (isset($_POST['bsunoption2'])) {
        $bsunoption2 = implode(',', $_POST['bsunoption2']);
    } else {
        $bsunoption2 = 0;
    }

    $bsunoption3 = implode(',', $_POST['bsunoption3']);
    $bsunoption1_qt = $_POST['bsunoption1_qt'];
    $bsunoption2_qt = $_POST['bsunoption2_qt'];
    $bsunoption3_qt = $_POST['bsunoption3_qt'];
    // satarday
    $stmt = $connect->prepare("INSERT INTO breakfast_order (menu_num,meal_type,day,option1,option1_qt,
    option2,option2_qt,option3,option3_qt,special,emp_id,pres_id) value(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute([
        1, 'breakfast', 'saturday', $bsaoption1, $bsaoption1_qt, $bsaoption2, $bsaoption2_qt,
        $bsaoption3, $bsaoption3_qt, $bsa_special, 1, 2
    ]);
    // sunday
    $stmt = $connect->prepare("INSERT INTO breakfast_order (menu_num,meal_type,day,option1,option1_qt,
    option2,option2_qt,option3,option3_qt,special,emp_id,pres_id) value(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute([
        1, 'breakfast', 'sunday', $bsunoption1, $bsunoption1_qt, $bsunoption2, $bsunoption2_qt,
        $bsunoption3, $bsunoption3_qt, $bsun_special, 1, 2
    ]);
    header("location:main.php?dir=main_menu&page=report");
}
?>