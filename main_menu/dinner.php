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
            <td>
                <?php
                $getoption = getoptions('saturday', 'dinner', 'option1');
                $alldata =  $getoption;
                if (count($getoption) > 0) {

                    foreach ($alldata as $data) {
                ?>
                        <select name="saturday_option7[]" id="" class="select2 form-control">
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
                    }
                    ?>
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option7_qt">
                <?php } ?>
            </td>
            <td>
                <?php
                $getoption = getoptions('saturday', 'dinner', 'option2');
                $alldata =  $getoption;
                if (count($getoption) > 0) {

                    foreach ($alldata as $data) {
                ?>
                        <select name="saturday_option8[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option8_qt">
                <?php } ?>
            </td>
            <td>
                <?php
                $getoption = getoptions('saturday', 'dinner', 'option3');
                $alldata =  $getoption;
                if (count($getoption) > 0) {

                    foreach ($alldata as $data) {
                ?>
                        <select name="saturday_option9[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option9_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="saturday_special3" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>
        <tr>
            <td> Sunday </td>
            <td> <?php
                    $getoption = getoptions('sunday', 'dinner', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="sunday_option7[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option7_qt">
                <?php } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('sunday', 'dinner', 'option2');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="sunday_option8[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option8_qt">
                <?php } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('sunday', 'dinner', 'option3');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="sunday_option9[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option9_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="sunday_special3" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>

        <tr>
            <td> monday </td>
            <td> <?php
                    $getoption = getoptions('monday', 'dinner', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="monday_option7[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option7_qt">
                <?php } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('monday', 'dinner', 'option2');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="monday_option8[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option8_qt">
                <?php } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('monday', 'dinner', 'option3');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="monday_option9[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option9_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="monday_special3" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>

        <tr>
            <td> tuesday </td>
            <td> <?php
                    $getoption = getoptions('tuesday', 'dinner', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="tuesday_option7[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option7_qt">
                <?php } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('tuesday', 'dinner', 'option2');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="tuesday_option8[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option8_qt">
                <?php } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('tuesday', 'dinner', 'option3');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="tuesday_option9[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option9_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="tuesday_special3" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>

        <tr>
            <td> wednesday </td>
            <td> <?php
                    $getoption = getoptions('wednesday', 'dinner', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="wednesday_option7[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option7_qt">
                <?php } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('wednesday', 'dinner', 'option2');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="wednesday_option8[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option8_qt">
                <?php } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('wednesday', 'dinner', 'option3');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="wednesday_option9[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option9_qt">
                <?php  } ?>
            </td>
            <td>
                <textarea name="wednesday_special3" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>
        <tr>
            <td> thursday </td>
            <td> <?php
                    $getoption = getoptions('thursday', 'dinner', 'option1');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="thursday_option7[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option7_qt">
                <?php } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('thursday', 'dinner', 'option2');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="thursday_option8[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option8_qt">
                <?php  } ?>
            </td>
            <td> <?php
                    $getoption = getoptions('thursday', 'dinner', 'option3');
                    $alldata =  $getoption;
                    if (count($getoption) > 0) {

                        foreach ($alldata as $data) {
                    ?>
                        <select name="thursday_option9[]" id="" class="select2 form-control">
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option9_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="thursday_special3" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>
    </tbody>
</table>