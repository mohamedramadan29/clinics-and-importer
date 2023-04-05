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
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option1'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'breakfast', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select <?php
                                    if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="saturday_option1[]" id="" class="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option1_qt" value="<?php echo $daydata['option1_qt']; ?>">
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option2'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'breakfast', 'option2');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="saturday_option2[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option2_qt" value="<?php echo $daydata['option2_qt']; ?>">
                    <?php
                    } ?>
                </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'saturday');
                    $option1 = $daydata['option3'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('saturday', 'breakfast', 'option3');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="saturday_option3[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option3_qt" value="<?php echo $daydata['option3_qt'] ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="saturday_special" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> Sunday </td>
                <td>
                    <?php
                    // test
                    $daydata = getdaydata($date_from, $date_to, 'sunday');
                    $option1 = $daydata['option1'];
                    $status = $daydata['status'];
                    $options1 = explode(",", $option1);
                    //end test
                    $getoption = getoptions('sunday', 'breakfast', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {
                        foreach ($alldata as $data) {
                    ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="sunday_option1[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option1_qt" value="<?php echo $daydata['option1_qt']; ?>">
                    <?php
                    }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'sunday');
                        $option1 = $daydata['option2'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('sunday', 'breakfast', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> <?php
                                                                        } ?> name="sunday_option2[]" id="" class="select2 form-control">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option2_qt" value="<?php echo $daydata['option2_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'sunday');
                        $option1 = $daydata['option3'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('sunday', 'breakfast', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="sunday_option3[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option3_qt" value="<?php echo $daydata['option3_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="sunday_special" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> monday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option1'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'breakfast', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="monday_option1[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="monday_option1_qt" value="<?php echo $daydata['option1_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option2'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'breakfast', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="monday_option2[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="monday_option2_qt" value="<?php echo $daydata['option2_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'monday');
                        $option1 = $daydata['option3'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('monday', 'breakfast', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="monday_option3[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="monday_option3_qt" value="<?php echo $daydata['option3_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <textarea name="monday_special" placeholder="Enter Special Order" class="form-control"> <?php echo $daydata['special']; ?> </textarea>
                </td>
            </tr>

            <tr>
                <td> tuesday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option1'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'breakfast', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="tuesday_option1[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option1_qt" value="<?php echo $daydata['option1_qt']; ?>">
                    <?php
                        }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option2'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'breakfast', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {
                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="tuesday_option2[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option2_qt" value="<?php echo $daydata['option2_qt']; ?>">
                    <?php }
                    ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'tuesday');
                        $option1 = $daydata['option3'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('tuesday', 'breakfast', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="tuesday_option3[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option3_qt" value="<?php echo $daydata['option3_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="tuesday_special" placeholder="Enter Special Order" class="form-control"> <?php echo $daydata['special']; ?> </textarea>
                </td>
            </tr>

            <tr>
                <td> wednesday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option1'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'breakfast', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="wednesday_option1[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option1_qt" value="<?php echo $daydata['option1_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option2'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'breakfast', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="wednesday_option2[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option2_qt" value="<?php echo $daydata['option2_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'wednesday');
                        $option1 = $daydata['option3'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('wednesday', 'breakfast', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="wednesday_option3[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option3_qt" value="<?php echo $daydata['option3_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="wednesday_special" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td> thursday </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option1'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'breakfast', 'option1');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="thursday_option1[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option1_qt" value="<?php echo $daydata['option1_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option2'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'breakfast', 'option2');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {
                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="thursday_option2[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option2_qt" value="<?php echo $daydata['option2_qt']; ?>">
                    <?php } ?>
                </td>
                <td> <?php
                        // test
                        $daydata = getdaydata($date_from, $date_to, 'thursday');
                        $option1 = $daydata['option3'];
                        $status = $daydata['status'];
                        $options1 = explode(",", $option1);
                        //end test
                        $getoption = getoptions('thursday', 'breakfast', 'option3');
                        $alldata =  $getoption;
                        if (count($getoption) > 0) {

                            foreach ($alldata as $data) {
                        ?>
                            <select <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) {
                                    ?> class="form-control read_only" <?php
                                                                    } else { ?> class="form-control select2" <?php
                                                                                                        } ?> name="thursday_option3[]" id="">
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
                        <input <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option3_qt" value="<?php echo $daydata['option3_qt']; ?>">
                    <?php } ?>
                </td>
                <td>
                    <textarea <?php if (!isset($_SESSION['admin_id']) &&  $status == 1 || $status == 2) echo "readonly"; ?> name="thursday_special" placeholder="Enter Special Order" class="form-control"><?php echo $daydata['special']; ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>


</div>