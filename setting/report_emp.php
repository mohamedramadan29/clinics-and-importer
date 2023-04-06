        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Emplyees </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee</li>
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
                            <div class="card-header">
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add-Modal"> Add New Employee <i class="fa fa-plus"></i> </button>
                            </div>
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
                                                <th>clinic_name</th>
                                                <th>clinic_code</th>
                                                <th>Presentation</th>
                                                <th> Orders </th>
                                                <th>Statistics</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM emplyees");
                                            $stmt->execute();
                                            $allemp = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allemp as $emp) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo  $emp['emp_name']; ?> </td>
                                                    <td> <?php echo  $emp['emp_email']; ?> </td>
                                                    <td> <?php echo  $emp['emp_phone']; ?> </td>
                                                    <td> <?php echo  $emp['clinic_name']; ?> </td>
                                                    <td> <?php echo  $emp['clinic_code']; ?> </td>

                                                    <td> <?php
                                                            $stmt = $connect->prepare("SELECT * FROM presentions WHERE id=?");
                                                            $stmt->execute(array($emp['pres_id']));
                                                            $presdata = $stmt->fetch();
                                                            echo  $presdata['name']; ?> </td>
                                                    <td> <a href="main.php?dir=main_menu&page=emp_orders&emp_id=<?php echo $emp['id']; ?>" class="btn btn-success btn-sm"> View Orders </a> </td>
                                                    <td> <a href="main.php?dir=statistics&page=report&emp_id=<?php echo $emp['id']; ?>" class="btn btn-primary btn-sm"> Statistics </a> </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm waves-effect" data-toggle="modal" data-target="#edit-Modal_<?php echo $emp['id']; ?>"> Edit <i class='fa fa-pen'></i> </button>
                                                        <a href="main.php?dir=setting&page=delete_emp&emp_id=<?php echo $emp['id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class='fa fa-trash'></i> </a>
                                                    </td>
                                                </tr>
                                                <!-- EDIT NEW CATEGORY MODAL   -->
                                                <div class="modal fade" id="edit-Modal_<?php echo $emp['id']; ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> edit Category </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="main.php?dir=setting&page=edit_emp" method="post" enctype="multipart/form-data" autocomplete="off">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Name</label>
                                                                        <input type="hidden" name="emp_id" value="<?php echo $emp['id']; ?>">
                                                                        <input required id="Company-2" name="emp_name" type="text" class="form-control required" value="<?php echo $emp['emp_name']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Email</label>
                                                                        <input required id="Company-2" name="emp_email" type="email" class="form-control required" value="<?php echo $emp['emp_email']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Phone</label>
                                                                        <input required id="Company-2" name="emp_phone" type="text" class="form-control required" value="<?php echo $emp['emp_phone']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">clinic name</label>
                                                                        <input required id="Company-2" name="clinic_name" type="text" class="form-control required" value="<?php echo $emp['clinic_name']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">clinic code</label>
                                                                        <input required id="Company-2" name="clinic_code" type="text" class="form-control required" value="<?php echo $emp['clinic_code']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Presentation</label>
                                                                        <select name="pres_id" id="" class="form-control select2">
                                                                            <option value=""> -- Select Presentation -- </option>
                                                                            <?php
                                                                            $stmt = $connect->prepare("SELECT * FROM presentions");
                                                                            $stmt->execute();
                                                                            $alldata = $stmt->fetchAll();
                                                                            foreach ($alldata as $data) {
                                                                            ?>
                                                                                <option <?php if ($data['id'] == $emp['pres_id']) echo 'selected' ?> value="<?php echo $data['id']; ?>"> <?php echo $data['name']; ?> </option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Password</label>
                                                                        <input required id="Company-2" name="emp_password" type="password" class="form-control required" value="<?php echo $emp['emp_password']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Status</label>
                                                                        <select name="status" id="" class="form-control select2">
                                                                            <option value=""> -- Select Status -- </option>
                                                                            <option <?php if ($emp['status'] == 1) echo 'selected'; ?> value="1"> Active </option>
                                                                            <option <?php if ($emp['status'] == 0) echo 'selected'; ?> value="0"> Not Active </option>
                                                                        </select>
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
                                        <h4 class="modal-title"> Add Employee </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="main.php?dir=setting&page=add_emp" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Name</label>
                                                <input required id="Company-2" name="emp_name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Email</label>
                                                <input required id="Company-2" name="emp_email" type="email" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Phone</label>
                                                <input required id="Company-2" name="emp_phone" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">clinic name</label>
                                                <input required id="Company-2" name="clinic_name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">clinic code</label>
                                                <input required id="Company-2" name="clinic_code" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Presentation</label>
                                                <select name="pres_id" id="" class="form-control select2">
                                                    <option value=""> -- Select Presentation -- </option>
                                                    <?php
                                                    $stmt = $connect->prepare("SELECT * FROM presentions ");
                                                    $stmt->execute();
                                                    $alldata = $stmt->fetchAll();
                                                    foreach ($alldata as $data) {
                                                    ?>
                                                        <option value="<?php echo $data['id']; ?>"> <?php echo $data['name']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Password</label>
                                                <input required id="Company-2" name="emp_password" type="password" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Status</label>
                                                <select name="status" id="" class="form-control select2">
                                                    <option value=""> -- Select Status -- </option>
                                                    <option value="1"> Active </option>
                                                    <option value="0"> Not Active </option>
                                                </select>
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