        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Suppliers </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Suppliers</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- DOM/Jquery table start -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <?php
                            if (!isset($_SESSION['super_id'])) {
                            ?>
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add-Modal"> Add New pre <i class="fa fa-plus"></i> </button>
                                </div>
                            <?php
                            }

                            ?>

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
                                <div class="table-responsive">
                                    <table id="my_table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>phone</th>
                                                <!-- <th>status</th> -->
                                                <th> Orders </th>
                                                <th> Logo </th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM presentions");
                                            $stmt->execute();
                                            $allemp = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allemp as $emp) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo  $emp['name']; ?> </td>
                                                    <td> <?php echo  $emp['email']; ?> </td>
                                                    <td> <?php echo  $emp['phone']; ?> </td>
                                                    <td> <a href="main.php?dir=supp_dash&page=report&supp_id=<?php echo $emp['id']; ?>" class="btn btn-success btn-sm"> View Orders </a> </td>
                                                    <!--
                                                    <td> <?php
                                                            if ($emp['status'] == 0) {
                                                            ?>
                                                            <span class="bg bg-danger rounded"> Not Active </span>
                                                        <?php
                                                            } else { ?>
                                                            <span class="bg bg-success rounded"> Active </span>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                        -->
                                                    <td>
                                                        <?php
                                                        if (empty($emp['logo'])) {
                                                            echo "Not Found";
                                                        } else {
                                                        ?>
                                                            <img style="width: 100px; height:100px" src="uploads/pres_logo/<?php echo  $emp['logo']; ?>" alt="">
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php

                                                        if (!isset($_SESSION['super_id'])) {
                                                        ?>
                                                            <button type="button" class="btn btn-success btn-sm waves-effect" data-toggle="modal" data-target="#edit-Modal_<?php echo $emp['id']; ?>"> Edit <i class='fa fa-pen'></i> </button>
                                                            <a href="main.php?dir=setting&page=delete_pre&pre_id=<?php echo $emp['id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class='fa fa-trash'></i> </a>
                                                        <?php
                                                        } ?>

                                                    </td>
                                                </tr>
                                                <!-- EDIT NEW CATEGORY MODAL   -->
                                                <div class="modal fade" id="edit-Modal_<?php echo $emp['id']; ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> edit Pre </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="main.php?dir=setting&page=edit_pre" method="post" enctype="multipart/form-data" autocomplete="off">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input required id="Company-2" name="pre_id" type="hidden" value="<?php echo $emp['id']; ?>" class="form-control required">
                                                                        <label for="Company-2" class="block">Name</label>
                                                                        <input required id="Company-2" name="name" type="text" class="form-control required" value="<?php echo $emp['name'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Email</label>
                                                                        <input required id="Company-2" name="email" type="email" class="form-control required" value="<?php echo $emp['email'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Phone</label>
                                                                        <input required id="Company-2" name="phone" type="text" class="form-control required" value="<?php echo $emp['phone'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Password</label>
                                                                        <input required id="Company-2" name="password" type="password" class="form-control required" value="<?php echo $emp['password'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Status</label>
                                                                        <select name="status" id="" class="form-control select2">
                                                                            <option value=""> -- Select Status -- </option>
                                                                            <option <?php if ($emp['status'] == 1) echo 'selected'; ?> value="1"> Active </option>
                                                                            <option <?php if ($emp['status'] == 0) echo 'selected'; ?> value="0"> Not Active </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputFile">Logo</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" name="logo" id="exampleInputFile">
                                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="edit_cat" class="btn btn-primary waves-effect waves-light ">Save</button>
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
                                        <h4 class="modal-title"> Add Pree </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="main.php?dir=setting&page=add_pre" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Name</label>
                                                <input required id="Company-2" name="name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Email</label>
                                                <input required id="Company-2" name="email" type="email" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Phone</label>
                                                <input required id="Company-2" name="phone" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Password</label>
                                                <input required id="Company-2" name="password" type="password" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Status</label>
                                                <select name="status" id="" class="form-control select2">
                                                    <option value=""> -- Select Status -- </option>
                                                    <option value="1"> Active </option>
                                                    <option value="0"> Not Active </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Logo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="logo" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" name="add_cat" class="btn btn-primary waves-effect waves-light ">Save</button>
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