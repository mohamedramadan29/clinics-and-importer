<?php
$stmt = $connect->prepare("SELECT * FROM breakfast_order WHERE emp_id = ? AND menu_num=2 ORDER BY id DESC LIMIT 6");
$stmt->execute(array($_SESSION['emp_id']));
$allbreak = $stmt->fetchAll();
$count = $stmt->rowCount();
if ($count > 0) {


?>
    <div class="table1 table-responsive">
        <div class="card-header bg bg-secondary">
            <p class="card-title"> Breakfast</p>
        </div>
        <?php
        ?>
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
                                $getoption = getoptions('saturday', 'breakfast', 'option1');
                                $option1 = $break['option1'];
                                $options1 = explode(",", $option1);
                                $alldata =  $getoption;
                                if (count($getoption) > 0) {
                                    foreach ($alldata as $data) {
                                ?>
                                        <select name="saturday_option1[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options1) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option1_qt" value="<?php echo $break['option1_qt']; ?>">
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $getoption = getoptions('saturday', 'breakfast', 'option2');
                                $alldata =  $getoption;
                                $option2 = $break['option2'];
                                $options2 = explode(",", $option2);
                                if (count($getoption) > 0) {
                                    foreach ($alldata as $data) {
                                ?>
                                        <select name="saturday_option2[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options2) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option2_qt" value="<?php echo $break['option2_qt']; ?>">
                                <?php
                                } ?>
                            </td>
                            <td>
                                <?php
                                $getoption = getoptions('saturday', 'breakfast', 'option3');
                                $alldata =  $getoption;
                                $option3 = $break['option3'];
                                $options3 = explode(",", $option3);
                                if (count($getoption) > 0) {
                                    foreach ($alldata as $data) {
                                ?>
                                        <select name="saturday_option3[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options3) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option3_qt" value="<?php echo $break['option3_qt']; ?>">
                                <?php } ?>
                            </td>
                            <td>
                                <textarea name="saturday_special" placeholder="Enter Special Order" class="form-control"><?php echo $break['special']; ?></textarea>
                            </td>
                    <?php
                        }
                    }


                    ?>


                </tr>
                <tr>
                    <td> Sunday </td>
                    <?php
                    foreach ($allbreak as $break) {
                        if ($break['day'] == 'sunday') {
                    ?>

                            <td> <?php
                                    $getoption = getoptions('sunday', 'breakfast', 'option1');
                                    $alldata =  $getoption;
                                    $option1 = $break['option1'];
                                    $options1 = explode(",", $option1);
                                    if (count($getoption) > 0) {
                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="sunday_option1[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options1) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option1_qt" value="<?php echo $break['option1_qt']; ?>">
                                <?php
                                    }
                                ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('sunday', 'breakfast', 'option2');
                                    $alldata =  $getoption;
                                    $option2 = $break['option2'];
                                    $options2 = explode(",", $option2);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="sunday_option2[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options2) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option2_qt" value="<?php echo $break['option2_qt']; ?>">
                                <?php }
                                ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('sunday', 'breakfast', 'option3');
                                    $alldata =  $getoption;
                                    $option3 = $break['option3'];
                                    $options3 = explode(",", $option3);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="sunday_option3[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options3) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option3_qt" value="<?php echo $break['option3_qt']; ?>">
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea name="sunday_special" placeholder="Enter Special Order" class="form-control"><?php echo $break['special']; ?></textarea>
                            </td>
                    <?php
                        }
                    } ?>
                </tr>

                <tr>
                    <td> monday </td>
                    <?php
                    foreach ($allbreak as $break) {
                        if ($break['day'] == 'monday') {
                    ?>
                            <td> <?php
                                    $getoption = getoptions('monday', 'breakfast', 'option1');
                                    $alldata =  $getoption;
                                    $option1 = $break['option1'];
                                    $options1 = explode(",", $option1);
                                    if (count($getoption) > 0) {
                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="monday_option1[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options1) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option1_qt" value="<?php echo $break['option1_qt']; ?>">
                                <?php
                                    }
                                ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('monday', 'breakfast', 'option2');
                                    $alldata =  $getoption;
                                    $option2 = $break['option2'];
                                    $options2 = explode(",", $option2);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="monday_option2[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options2) ? 'selected' : '';
                                            ?>
                                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php

                                        }
                                    ?>
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option2_qt" value="<?php echo $break['option2_qt']; ?>">
                                <?php }
                                ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('monday', 'breakfast', 'option3');
                                    $alldata =  $getoption;
                                    $option3 = $break['option3'];
                                    $options3 = explode(",", $option3);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="monday_option3[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options3) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option3_qt" value="<?php echo $break['option3_qt']; ?>">
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <textarea name="monday_special" placeholder="Enter Special Order" class="form-control"><?php echo $break['special']; ?></textarea>
                            </td>
                    <?php
                        }
                    } ?>
                </tr>

                <tr>
                    <td> tuesday </td>
                    <?php
                    foreach ($allbreak as $break) {
                        if ($break['day'] == 'tuesday') {
                    ?>
                            <td> <?php
                                    $getoption = getoptions('tuesday', 'breakfast', 'option1');
                                    $alldata =  $getoption;
                                    $option1 = $break['option1'];
                                    $options1 = explode(",", $option1);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="tuesday_option1[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                            ?>
                                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                        }
                                    ?>
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option1_qt" value="<?php echo $break['option1_qt']; ?>">
                                <?php
                                    }
                                ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('tuesday', 'breakfast', 'option2');
                                    $alldata =  $getoption;
                                    $option2 = $break['option2'];
                                    $options2 = explode(",", $option2);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="tuesday_option2[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options2) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option2_qt" value="<?php echo $break['option2_qt']; ?>">
                                <?php }
                                ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('tuesday', 'breakfast', 'option3');
                                    $alldata =  $getoption;
                                    $option3 = $break['option3'];
                                    $options3 = explode(",", $option3);
                                    if (count($getoption) > 0) {
                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="tuesday_option3[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options3) ? 'selected' : '';
                                            ?>
                                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                        }
                                    ?>
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option3_qt" value="<?php echo $break['option3_qt']; ?>">
                                <?php } ?>
                            </td>
                            <td>
                                <textarea name="tuesday_special" placeholder="Enter Special Order" class="form-control"><?php echo $break['special']; ?></textarea>
                            </td>
                    <?php }
                    } ?>
                </tr>
                <tr>
                    <td> wednesday </td>
                    <?php
                    foreach ($allbreak as $break) {
                        if ($break['day'] == 'wednesday') {
                    ?>
                            <td> <?php
                                    $getoption = getoptions('wednesday', 'breakfast', 'option1');
                                    $alldata =  $getoption;
                                    $option1 = $break['option1'];
                                    $options1 = explode(",", $option1);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="wednesday_option1[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options1) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option1_qt" value="<?php echo $break['option1_qt']; ?>">
                                <?php } ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('wednesday', 'breakfast', 'option2');
                                    $alldata =  $getoption;
                                    $option2 = $break['option2'];
                                    $options2 = explode(",", $option2);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="wednesday_option2[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options2) ? 'selected' : '';
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
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option2_qt" value="<?php echo $break['option2_qt']; ?>">
                                <?php } ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('wednesday', 'breakfast', 'option3');
                                    $alldata =  $getoption;
                                    $option3 = $break['option3'];
                                    $options3 = explode(",", $option3);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="wednesday_option3[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options3) ? 'selected' : '';
                                            ?>
                                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php

                                        }
                                    ?>
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option3_qt" value="<?php echo $break['option3_qt']; ?>">
                                <?php } ?>
                            </td>
                            <td>
                                <textarea name="wednesday_special" placeholder="Enter Special Order" class="form-control"><?php echo $break['special']; ?></textarea>
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
                                    $getoption = getoptions('thursday', 'breakfast', 'option1');
                                    $alldata =  $getoption;
                                    $option1 = $break['option1'];
                                    $options1 = explode(",", $option1);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="thursday_option1[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                            ?>
                                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                        }
                                    ?>
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option1_qt" value="<?php echo $break['option1_qt']; ?>">
                                <?php } ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('thursday', 'breakfast', 'option2');
                                    $alldata =  $getoption;
                                    $option2 = $break['option2'];
                                    $options2 = explode(",", $option2);
                                    if (count($getoption) > 0) {
                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="thursday_option2[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options2) ? 'selected' : '';
                                            ?>
                                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                        }
                                    ?>
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option2_qt" value="<?php echo $break['option2_qt']; ?>">
                                <?php } ?>
                            </td>
                            <td> <?php
                                    $getoption = getoptions('thursday', 'breakfast', 'option3');
                                    $alldata =  $getoption;
                                    $option3 = $break['option3'];
                                    $options3 = explode(",", $option3);
                                    if (count($getoption) > 0) {

                                        foreach ($alldata as $data) {
                                    ?>
                                        <select name="thursday_option3[]" id="" class="select2 form-control">
                                            <option value=""> -- Select --</option>
                                            <?php
                                            $getitems =  getitems($data['cat']);
                                            $allitems = $getitems;
                                            foreach ($allitems as $item) {
                                                $selected = in_array($item['id'], $options3) ? 'selected' : '';
                                            ?>
                                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                        }
                                    ?>
                                    <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option3_qt" value="<?php echo $break['option3_qt']; ?>">
                                <?php } ?>
                            </td>
                            <td>
                                <textarea name="thursday_special" placeholder="Enter Special Order" class="form-control"><?php echo $break['special']; ?></textarea>
                            </td>
                    <?php }
                    } ?>
                </tr>
            </tbody>
        </table>
        <!-------------------------------------------------------------->

        <!-------------------------------------------------------------------------->

        <!-------------------------------------------------------------->

    </div>

<?php

}
?>