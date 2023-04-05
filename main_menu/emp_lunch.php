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
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'lunch', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                            } ?> name="saturday_option4[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option5'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'lunch', 'option2');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                            } ?> name="saturday_option5[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php
                    } ?>
                </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option6'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'lunch', 'option3');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                            } ?> name="saturday_option6[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option6_qt" value="<?php echo $daydata['option6_qt'] ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="saturday_special2" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special2']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> Sunday </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'sunday');
                    $option1 = $daydata['option4'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('sunday', 'lunch', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select name="sunday_option4[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php
                    }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'sunday');
                        $option1 = $daydata['option5'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('sunday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="sunday_option5[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'sunday');
                        $option1 = $daydata['option6'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('sunday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="sunday_option6[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="sunday_special2" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special2']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> monday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option4'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'lunch', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option4[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="monday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option5'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option5[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="monday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option6'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option6[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="monday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="monday_special2" placeholder="Enter Special Order" class="form-control"> <?php echo $daydata['special2']; ?> </textarea>
                </td>
            </tr>

            <tr>
                <td> tuesday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option4'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'lunch', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option4[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option5'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option5[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option6'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option6[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="tuesday_special2" placeholder="Enter Special Order" class="form-control"> <?php echo $daydata['special2']; ?> </textarea>
                </td>
            </tr>

            <tr>
                <td> wednesday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option4'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'lunch', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option4[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                        ?> class="form-control read_only" <?php
                                                                                                        } else { ?> class="form-control select2" <?php
                                                                                                                } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option5'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option5[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                        ?> class="form-control read_only" <?php
                                                                                                        } else { ?> class="form-control select2" <?php
                                                                                                                } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option6'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option6[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                        ?> class="form-control read_only" <?php
                                                                                                        } else { ?> class="form-control select2" <?php
                                                                                                                } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="wednesday_special2" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special2']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> thursday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option4'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'lunch', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option4[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option4_qt" value="<?php echo $daydata['option4_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option5'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'lunch', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {
                            foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option5[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option5_qt" value="<?php echo $daydata['option5_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option6'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'lunch', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option6[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                                                    ?> class="form-control read_only" <?php
                                                                                                    } else { ?> class="form-control select2" <?php
                                                                                                            } ?>>
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option6_qt" value="<?php echo $daydata['option6_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="thursday_special2" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special2']; ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>


</div>