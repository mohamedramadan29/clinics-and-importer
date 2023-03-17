<div class="card-header bg bg-info">
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
                            ?>
                                <option value="<?php echo $item['id']; ?> "> <?php echo $item['item_name']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    <?php
                    }
                    ?>
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option4_qt">
                <?php } ?>
            </td>
            <td>
                <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option5_qt">
                <?php } ?>
            </td>
            <td>
                <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="saturday_option6_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="saturday_special2" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>
        <tr>
            <td> Sunday </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option4_qt">
                <?php } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option5_qt">
                <?php } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="sunday_option6_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="sunday_special2" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>

        <tr>
            <td> monday </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option4_qt">
                <?php } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option5_qt">
                <?php } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="monday_option6_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="monday_special2" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>

        <tr>
            <td> tuesday </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option4_qt">
                <?php } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option5_qt">
                <?php } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="tuesday_option6_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="tuesday_special2" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>

        <tr>
            <td> wednesday </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option4_qt">
                <?php } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option5_qt">
                <?php } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="wednesday_option6_qt">
                <?php  } ?>
            </td>
            <td>
                <textarea name="wednesday_special2" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>
        <tr>
            <td> thursday </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option4_qt">
                <?php } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option5_qt">
                <?php  } ?>
            </td>
            <td> <?php
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
                    <input placeholder="Enter Quantity" type="number" class="form-control" name="thursday_option6_qt">
                <?php } ?>
            </td>
            <td>
                <textarea name="thursday_special2" placeholder="Enter Special Order" class="form-control"></textarea>
            </td>
        </tr>
    </tbody>
</table>