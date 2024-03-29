<div class="table1 table-responsive">
    <div class="card-header bg bg-warning">
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
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option7'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'dinner', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select name="saturday_option7[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option7_qt" value="<?php echo $daydata['option7_qt']; ?>">
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option8'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'dinner', 'option2');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select name="saturday_option8[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option8_qt" value="<?php echo $daydata['option8_qt']; ?>">
                    <?php
                    } ?>
                </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option9'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'dinner', 'option3');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select name="saturday_option9[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option9_qt" value="<?php echo $daydata['option3_qt'] ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="saturday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special3']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> Sunday </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'sunday');
                    $option1 = $daydata['option7'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('sunday', 'dinner', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select name="sunday_option7[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option7_qt" value="<?php echo $daydata['option7_qt']; ?>">
                    <?php
                    }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'sunday');
                        $option1 = $daydata['option8'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('sunday', 'dinner', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="sunday_option8[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option8_qt" value="<?php echo $daydata['option8_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'sunday');
                        $option1 = $daydata['option9'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('sunday', 'dinner', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="sunday_option9[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option9_qt" value="<?php echo $daydata['option9_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="sunday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special3']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> monday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option7'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'dinner', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option7[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="monday_option7_qt" value="<?php echo $daydata['option7_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option8'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'dinner', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option8[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="monday_option8_qt" value="<?php echo $daydata['option8_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option9'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'dinner', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="monday_option9[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="monday_option9_qt" value="<?php echo $daydata['option9_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="monday_special3" placeholder="Enter Special Order" class="form-control"> <?php echo $daydata['special3']; ?> </textarea>
                </td>
            </tr>

            <tr>
                <td> tuesday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option7'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'dinner', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option7[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option7_qt" value="<?php echo $daydata['option7_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option8'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'dinner', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option8[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option8_qt" value="<?php echo $daydata['option8_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option9'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'dinner', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="tuesday_option9[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option9_qt" value="<?php echo $daydata['option9_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="tuesday_special3" placeholder="Enter Special Order" class="form-control"> <?php echo $daydata['special3']; ?> </textarea>
                </td>
            </tr>

            <tr>
                <td> wednesday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option7'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'dinner', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option7[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option7_qt" value="<?php echo $daydata['option7_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option8'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'dinner', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option8[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option8_qt" value="<?php echo $daydata['option8_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option9'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'dinner', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="wednesday_option9[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option9_qt" value="<?php echo $daydata['option9_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="wednesday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special3']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> thursday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option7'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'dinner', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option7[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option7_qt" value="<?php echo $daydata['option7_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option8'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'dinner', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {
                            foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option8[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option8_qt" value="<?php echo $daydata['option8_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option9'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'dinner', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select name="thursday_option9[]" id="" <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option9_qt" value="<?php echo $daydata['option9_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="thursday_special3" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special3']; ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>


</div>