            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Profile </li>
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
                                    <?php if (isset($_SESSION['admin_id'])) {
                                        $stmt = $connect->prepare("SELECT * FROM admin WHERE id = ?");
                                        $stmt->execute(array($_SESSION['admin_id']));
                                        $data = $stmt->fetch();
                                    ?>
                                        <form action="main.php?dir=profile&page=edit" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Name </label>
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['admin_id']; ?>">
                                                <input required id="Company-2" name="name" type="text" class="form-control required" value="<?php echo $data['user_name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Email </label>
                                                <input required id="Company-2" name="email" type="text" class="form-control required" value="<?php echo $data['email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Password </label>
                                                <input required id="Company-2" name="password" type="password" class="form-control required" value="<?php echo $data['password']; ?>">
                                            </div>
                                            <button type="submit" name="edit_admin" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </form>
                                    <?php
                                    } elseif (isset($_SESSION['emp_id'])) {
                                        $stmt = $connect->prepare("SELECT * FROM emplyees WHERE id = ?");
                                        $stmt->execute(array($_SESSION['emp_id']));
                                        $data = $stmt->fetch();
                                    ?>
                                        <form action="main.php?dir=profile&page=edit" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Name </label>
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['emp_id']; ?>">
                                                <input required id="Company-2" name="name" type="text" class="form-control required" value="<?php echo $data['emp_name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Email </label>
                                                <input required id="Company-2" name="email" type="text" class="form-control required" value="<?php echo $data['emp_email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Phone </label>
                                                <input required id="Company-2" name="phone" type="text" class="form-control required" value="<?php echo $data['emp_phone']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Clinic Name </label>
                                                <input readonly id="Company-2" name="clinic_name" type="text" class="form-control required" value="<?php echo $data['clinic_name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Clinic Code  </label>
                                                <input readonly id="Company-2" name="clinic_code" type="text" class="form-control required" value="<?php echo $data['clinic_code']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Password </label>
                                                <input required id="Company-2" name="password" type="password" class="form-control required" value="<?php echo $data['emp_password']; ?>">
                                            </div>
                                            <button type="submit" name="edit_emp" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </form>
                                    <?php
                                    }elseif (isset($_SESSION['supp_id'])){
                                        $stmt = $connect->prepare("SELECT * FROM presentions WHERE id =? ");
                                        $stmt->execute(array($_SESSION['supp_id']));
                                        $data = $stmt->fetch();?>
                                                <form action="main.php?dir=profile&page=edit" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Name </label>
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['supp_id']; ?>">
                                                <input required id="Company-2" name="name" type="text" class="form-control required" value="<?php echo $data['name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Email </label>
                                                <input required id="Company-2" name="email" type="text" class="form-control required" value="<?php echo $data['email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Phone </label>
                                                <input required id="Company-2" name="phone" type="text" class="form-control required" value="<?php echo $data['phone']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block"> Password </label>
                                                <input required id="Company-2" name="password" type="password" class="form-control required" value="<?php echo $data['password']; ?>">
                                            </div>
                                            <button type="submit" name="edit_supp" class="btn btn-primary waves-effect waves-light ">Save</button>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>