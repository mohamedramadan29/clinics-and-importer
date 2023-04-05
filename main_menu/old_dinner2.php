<?php
$stmt = $connect->prepare("SELECT * FROM breakfast_order WHERE emp_id = ? AND menu_num=2 ORDER BY id DESC LIMIT 6");
$stmt->execute(array($_SESSION['emp_id']));
$allbreak = $stmt->fetchAll();
$count = $stmt->rowCount();
if ($count > 0) {
?>

    <div class="card-header bg bg-success">
        <p class="card-title"> Dinner </p>
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
                <?php
                foreach ($allbreak as $break) {
                    if ($break['day'] == 'saturday') {
                ?>
                        <td>
                            <?php
                            $getoption = getoptions('saturday', 'dinner', 'option1');
                            $alldata =  $getoption;
                            $option7 = $break['option7'];
                            $options7 = explode(",", $option7);
                            if (count($getoption) > 0) {

                                foreach ($alldata as $data) {
                            ?>
                                    <select name="saturday_option7[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options7) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option7_qt" value="<?php echo $break['option7_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            $getoption = getoptions('saturday', 'dinner', 'option2');
                            $alldata =  $getoption;
                            $option8 = $break['option8'];
                            $options8 = explode(",", $option8);
                            if (count($getoption) > 0) {

                                foreach ($alldata as $data) {
                            ?>
                                    <select name="saturday_option8[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options8) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                    echo "</br>";
                                }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option8_qt" value="<?php echo $break['option8_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            $getoption = getoptions('saturday', 'dinner', 'option3');
                            $alldata =  $getoption;
                            $option9 = $break['option9'];
                            $options9 = explode(",", $option9);
                            if (count($getoption) > 0) {

                                foreach ($alldata as $data) {
                            ?>
                                    <select name="saturday_option9[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options9) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                    echo "</br>";
                                }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option9_qt" value="<?php echo $break['option9_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td>
                            <textarea name="saturday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $break['special3']; ?></textarea>
                        </td>
                <?php }
                } ?>
            </tr>
            <tr>
                <td> Sunday </td>
                <?php
                foreach ($allbreak as $break) {
                    if ($break['day'] == 'sunday') {
                ?>
                        <td> <?php
                                $getoption = getoptions('sunday', 'dinner', 'option1');
                                $alldata =  $getoption;
                                $option7 = $break['option7'];
                                $options7 = explode(",", $option7);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="sunday_option7[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options7) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option7_qt" value="<?php echo $break['option7_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('sunday', 'dinner', 'option2');
                                $alldata =  $getoption;
                                $option8 = $break['option8'];
                                $options8 = explode(",", $option8);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="sunday_option8[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options8) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option8_qt" value="<?php echo $break['option8_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('sunday', 'dinner', 'option3');
                                $alldata =  $getoption;
                                $option9 = $break['option9'];
                                $options9 = explode(",", $option9);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="sunday_option9[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options9) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option9_qt" value="<?php echo $break['option9_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td>
                            <textarea name="sunday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $break['special3']; ?></textarea>
                        </td>
                <?php }
                }  ?>
            </tr>

            <tr>
                <td> monday </td>
                <?php
                foreach ($allbreak as $break) {
                    if ($break['day'] == 'monday') {
                ?>
                        <td> <?php

                                $getoption = getoptions('monday', 'dinner', 'option1');
                                $alldata =  $getoption;
                                $option7 = $break['option7'];
                                $options7 = explode(",", $option7);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="monday_option7[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options7) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option7_qt" value="<?php echo $break['option7_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('monday', 'dinner', 'option2');
                                $alldata =  $getoption;
                                $option8 = $break['option8'];
                                $options8 = explode(",", $option8);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="monday_option8[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options8) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option8_qt" value="<?php echo $break['option8_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('monday', 'dinner', 'option3');
                                $alldata =  $getoption;
                                $option9 = $break['option9'];
                                $options9 = explode(",", $option9);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="monday_option9[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options9) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option9_qt" value="<?php echo $break['option9_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td>
                            <textarea name="monday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $break['special3']; ?></textarea>
                        </td>
                <?php }
                } ?>
            </tr>

            <tr>
                <td> tuesday </td>
                <?php
                foreach ($allbreak as $break) {
                    if ($break['day'] == 'tuesday') {
                ?>
                        <td> <?php
                                $getoption = getoptions('tuesday', 'dinner', 'option1');
                                $alldata =  $getoption;
                                $option7 = $break['option7'];
                                $options7 = explode(",", $option7);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="tuesday_option7[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options7) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option7_qt" value="<?php echo $break['option7_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('tuesday', 'dinner', 'option2');
                                $alldata =  $getoption;
                                $option8 = $break['option8'];
                                $options8 = explode(",", $option8);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="tuesday_option8[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options8) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option8_qt" value="<?php echo $break['option8_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('tuesday', 'dinner', 'option3');
                                $alldata =  $getoption;
                                $option9 = $break['option9'];
                                $options9 = explode(",", $option9);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="tuesday_option9[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options9) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option9_qt" value="<?php echo $break['option9_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td>
                            <textarea name="tuesday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $break['special3']; ?></textarea>
                        </td>
                <?php }
                }  ?>
            </tr>

            <tr>
                <td> wednesday </td>
                <?php
                foreach ($allbreak as $break) {
                    if ($break['day'] == 'wednesday') {
                ?>
                        <td> <?php
                                $getoption = getoptions('wednesday', 'dinner', 'option1');
                                $alldata =  $getoption;
                                $option7 = $break['option7'];
                                $options7 = explode(",", $option7);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="wednesday_option7[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options7) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option7_qt" value="<?php echo $break['option7_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('wednesday', 'dinner', 'option2');
                                $alldata =  $getoption;
                                $option8 = $break['option8'];
                                $options8 = explode(",", $option8);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="wednesday_option8[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options8) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option8_qt" value="<?php echo $break['option8_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('wednesday', 'dinner', 'option3');
                                $alldata =  $getoption;
                                $option9 = $break['option9'];
                                $options9 = explode(",", $option9);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="wednesday_option9[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options9) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option9_qt" value="<?php echo $break['option9_qt']; ?>">
                            <?php  } ?>
                        </td>
                        <td>
                            <textarea name="wednesday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $break['special3']; ?></textarea>
                        </td>
                <?php }
                } ?>
            </tr>
            <tr>
                <td> thursday </td>
                <?php
                foreach ($allbreak as $break) {
                    if ($break['day'] == 'thursday') {
                ?>
                        <td> <?php
                                $getoption = getoptions('thursday', 'dinner', 'option1');
                                $alldata =  $getoption;
                                $option7 = $break['option7'];
                                $options7 = explode(",", $option7);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="thursday_option7[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options7) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option7_qt" value="<?php echo $break['option7_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('thursday', 'dinner', 'option2');
                                $alldata =  $getoption;
                                $option8 = $break['option8'];
                                $options8 = explode(",", $option8);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="thursday_option8[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options8) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option8_qt" value="<?php echo $break['option8_qt']; ?>">
                            <?php  } ?>
                        </td>
                        <td> <?php
                                $getoption = getoptions('thursday', 'dinner', 'option3');
                                $alldata =  $getoption;
                                $option9 = $break['option9'];
                                $options9 = explode(",", $option9);
                                if (count($getoption) > 0) {

                                    foreach ($alldata as $data) {
                                ?>
                                    <select name="thursday_option9[]" id="" class="select2 form-control">
                                        <option value=""> -- Select --</option>
                                        <?php
                                        $getitems =  getitems($data['cat']);
                                        $allitems = $getitems;
                                        foreach ($allitems as $item) {
                                            $selected = in_array($item['id'], $options9) ? 'selected' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                        echo "</br>";
                                    }
                                ?>
                                <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option9_qt" value="<?php echo $break['option9_qt']; ?>">
                            <?php } ?>
                        </td>
                        <td>
                            <textarea name="thursday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $break['special3']; ?></textarea>
                        </td>
                <?php }
                } ?>
            </tr>
        </tbody>
    </table>
<?php  } ?>