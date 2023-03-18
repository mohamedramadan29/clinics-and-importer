<div class="table1 table-responsive">
    <div class="card-header bg bg-success">
        <p class="card-title"> Lunch </p>
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
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option4'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'lunch', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select name="saturday_option4[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option5'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'lunch', 'option2');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select name="saturday_option5[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php
                    } ?>
                </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option6'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'lunch', 'option3');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select name="saturday_option6[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option6_qt" value="<?php echo $daydata['option6_qt'] ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea name="saturday_special" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special2']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> Sunday </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'sunday');
                    $option1 = $daydata['option4'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('sunday', 'lunch', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select name="sunday_option4[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;

                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            echo "</br>";
                        }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php
                    }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'sunday');
                        $option1 = $daydata['option5'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('sunday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="sunday_option5[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                                echo "</br>";
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'sunday');
                        $option1 = $daydata['option6'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('sunday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="sunday_option6[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                                echo "</br>";
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <textarea name="sunday_special" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special2']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> monday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option4'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'lunch', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option4[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                                echo "</br>";
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option5'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option5[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php

                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option6'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option6[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                                echo "</br>";
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <textarea name="monday_special" placeholder="Enter Special Order" class="form-control"> <?php echo $daydata['special2']; ?> </textarea>
                </td>
            </tr>

            <tr>
                <td> tuesday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option4'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'lunch', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option4[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option5'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option5[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                                echo "</br>";
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option6'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option6[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea name="tuesday_special" placeholder="Enter Special Order" class="form-control"> <?php echo $daydata['special2']; ?> </textarea>
                </td>
            </tr>

            <tr>
                <td> wednesday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option4'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'lunch', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option4[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                                echo "</br>";
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option5'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option5[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                                echo "</br>";
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option6'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option6[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php

                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea name="wednesday_special" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special2']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> thursday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option4'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'lunch', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option4[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option5'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {
                            foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option5[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option6'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option6[]" id="" class="select2 form-control">
                                <option value=""> -- Select --</option>
                                <?php
                                $getitems =  getitems($data['cat']);
                                $allitems = $getitems;
                                foreach ($allitems as $item) {
                                    $selected = in_array($item['id'], $options1) ? 'selected' : '';
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"> <?php echo $item['item_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php

                            }
                        ?>
                        <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea name="thursday_special" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special2']; ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>


</div>