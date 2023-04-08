    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Options </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Options </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- DOM/Jquery table start -->
                    <div class="card">
                        <?php if (isset($_SESSION['super_id'])) {
                        } else { ?>
                            <div class="card-header">
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add-Modal"> Add Option <i class="fa fa-plus"></i> </button>
                            </div>
                        <?php
                        } ?>
                        <?php
                        if (isset($_SESSION['success_message'])) {
                            $message = $_SESSION['success_message'];
                            unset($_SESSION['success_message']);
                        ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i><?php echo $message; ?></th5>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="card-body">
                            <div class="table-responsive dt-responsive">
                                <table id="my_table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Option Name </th>
                                            <th>Menu Num </th>
                                            <th>Meal Type</th>
                                            <th> Day </th>
                                            <th> Option Num </th>
                                            <th> Category </th>
                                            <th> Special desc </th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM options ");
                                        $stmt->execute();
                                        $alloption = $stmt->fetchAll();
                                        $i = 0;
                                        foreach ($alloption as $option) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo  $option['name']; ?> </td>
                                                <td> <?php echo  $option['menu_num']; ?> </td>
                                                <td> <?php echo  $option['meal_type']; ?> </td>
                                                <td> <?php echo  $option['day']; ?> </td>
                                                <td> <?php echo  $option['option_type']; ?> </td>
                                                <td> <?php

                                                        $stmt = $connect->prepare("SELECT * FROM category WHERE id=?");
                                                        $stmt->execute(array($option['cat']));
                                                        $data = $stmt->fetch();

                                                        echo  $data['cat_name']; ?> </td>
                                                <td> <?php echo  $option['special_desc']; ?> </td>
                                                <td>
                                                    <?php if (isset($_SESSION['super_id'])) {
                                                    } else { ?>
                                                        <button type="button" class="btn btn-success btn-sm waves-effect" data-toggle="modal" data-target="#edit-Modal_<?php echo $option['id']; ?>"> Edit <i class="fa fa-pen"></i> </button>
                                                        <a href="main.php?dir=menus&page=delete&option_id=<?php echo $option['id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class="fa fa-trash"></i> </a>
                                                    <?php
                                                    } ?>
                                                </td>
                                            </tr>
                                            <!-- EDIT NEW CATEGORY MODAL   -->
                                            <div class="modal fade" id="edit-Modal_<?php echo $option['id']; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"> edit Category </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="main.php?dir=menus&page=edit" method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="option_id" value="<?php echo $option['id']; ?>">
                                                                    <label for="Company-2" class="block">Name</label>
                                                                    <input required id="Company-2" name="name" type="text" class="form-control" value="<?php echo $option['name']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Company-2" class="block">Menu Number</label>
                                                                    <select required name="menu_num" class="form-control select2" id="">
                                                                        <option value=""> -- Select Menu Num -- </option>
                                                                        <option <?php if ($option['menu_num'] == 1) echo "selected"; ?> value="1"> Menu 1 </option>
                                                                        <option <?php if ($option['menu_num'] == 2) echo "selected"; ?> value="2"> Menu 2 </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Company-2" class="block">Meal Type</label>
                                                                    <select required name="meal_type" class="form-control select2" id="">
                                                                        <option value=""> -- Select Meal Type -- </option>
                                                                        <option <?php if ($option['meal_type'] == 'breakfast') echo "selected"; ?> value="breakfast"> Breakfast </option>
                                                                        <option <?php if ($option['meal_type'] == 'lunch') echo "selected"; ?> value="lunch"> Lunch </option>
                                                                        <option <?php if ($option['meal_type'] == 'dinner') echo "selected"; ?> value="dinner"> Dinner </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Company-2" class="block"> Select Day </label>
                                                                    <select required name="day" class="form-control select2" id="">
                                                                        <option value=""> -- Select day -- </option>
                                                                        <option <?php if ($option['day'] == 'saturday') echo "selected"; ?> value="saturday"> Saturday - السبت </option>
                                                                        <option <?php if ($option['day'] == 'sunday') echo "selected"; ?> value="sunday"> Sunday - الاحد </option>
                                                                        <option <?php if ($option['day'] == 'monday') echo "selected"; ?> value="monday"> Monday - الاثنين </option>
                                                                        <option <?php if ($option['day'] == 'tuesday') echo "selected"; ?> value="tuesday"> Tuesday - الثلاثاء </option>
                                                                        <option <?php if ($option['day'] == 'wednesday') echo "selected"; ?> value="wednesday"> Wednesday - الاربعاء </option>
                                                                        <option <?php if ($option['day'] == 'thursday') echo "selected"; ?> value="thursday"> Thursday - الخميس </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Company-2" class="block"> Option Num </label>
                                                                    <select required name="option_type" class="form-control select2" id="">
                                                                        <option value=""> -- Select Option Num -- </option>
                                                                        <option <?php if ($option['option_type'] == 'option1') echo "selected"; ?> value="option1"> Option 1 </option>
                                                                        <option <?php if ($option['option_type'] == 'option2') echo "selected"; ?> value="option2"> Option 2 </option>
                                                                        <option <?php if ($option['option_type'] == 'option3') echo "selected"; ?> value="option3"> Option 3 </option>
                                                                        <option <?php if ($option['option_type'] == 'option4') echo "selected"; ?> value="option4"> Special </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Company-2" class="block"> Category </label>
                                                                    <select required name="cat" class="form-control select2" id="">
                                                                        <option value=""> -- Select Category -- </option>
                                                                        <?php
                                                                        $stmt = $connect->prepare("SELECT * FROM category");
                                                                        $stmt->execute();
                                                                        $allcat = $stmt->fetchAll();
                                                                        foreach ($allcat as $cat) {
                                                                        ?>
                                                                            <option <?php if ($cat['id'] == $option['cat']) echo 'selected' ?> value="<?php echo $cat['id'] ?>"> <?php echo $cat['cat_name']; ?> </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <!-- 
                                                                <div class="form-group">
                                                                    <label for="Company-2" class="block">Special Description</label>
                                                                    <textarea name="special_desc" id="" class="form-control"><?php echo $option['special_desc']; ?></textarea>
                                                                </div>
                                                                    -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                <button type="submit" name="edit_option" class="btn btn-primary waves-effect waves-light ">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ADD NEW CATEGORY MODAL   -->
                    <div class="modal fade" id="add-Modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"> Add Option Menu </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="main.php?dir=menus&page=add" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Name</label>
                                            <input required id="Company-2" name="name" type="text" class="form-control required">
                                        </div>
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Menu Number</label>
                                            <select multiple required name="menu_num" class="form-control select2" id="">
                                                <option value=""> -- Select Menu Num -- </option>
                                                <option value="1"> Menu 1 </option>
                                                <option value="2"> Menu 2 </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Meal Type</label>
                                            <select multiple required name="meal_type" class="form-control select2" id="">
                                                <option value=""> -- Select Meal Type -- </option>
                                                <option value="breakfast"> Breakfast </option>
                                                <option value="lunch"> Lunch </option>
                                                <option value="dinner"> Dinner </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Company-2" class="block"> Select Day </label>
                                            <select required name="day" class="form-control select2" id="day">
                                                <option value=""> -- Select day -- </option>
                                                <option value="saturday"> Saturday - السبت </option>
                                                <option value="sunday"> Sunday - الاحد </option>
                                                <option value="monday"> Monday - الاثنين </option>
                                                <option value="tuesday"> Tuesday - الثلاثاء </option>
                                                <option value="wednesday"> Wednesday - الاربعاء </option>
                                                <option value="thursday"> Thursday - الخميس </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Company-2" class="block"> Option Num </label>
                                            <select required name="option_type" class="form-control select2" id="option_type">
                                                <option value=""> -- Select Option Num -- </option>
                                                <option value="option1"> Option 1 </option>
                                                <option value="option2"> Option 2 </option>
                                                <option value="option3"> Option 3 </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Company-2" class="block"> Category </label>
                                            <select required name="cat" class="form-control select2" id="cat">
                                                <option value=""> -- Select Category -- </option>
                                                <?php
                                                $stmt = $connect->prepare("SELECT * FROM category");
                                                $stmt->execute();
                                                $allcat = $stmt->fetchAll();
                                                foreach ($allcat as $cat) {
                                                ?>
                                                    <option value="<?php echo $cat['id'] ?>"> <?php echo $cat['cat_name']; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- 
                                        <div class="form-group">
                                            <label for="Company-2" class="block">Special Description</label>
                                            <textarea name="special_desc" id="" class="form-control"></textarea>
                                        </div> 
                                            -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                        <button type="submit" name="add_option" class="btn btn-primary waves-effect waves-light ">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>