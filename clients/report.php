        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Clients </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Clients</li>
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
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add-Modal"> Add New client <i class="fa fa-plus"></i> </button>
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
                                                <th>address</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM clients");
                                            $stmt->execute();
                                            $allclient = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allclient as $client) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo  $client['client_name']; ?> </td>
                                                    <td> <?php echo  $client['client_email']; ?> </td>
                                                    <td> <?php echo  $client['client_phone']; ?> </td>
                                                    <td> <?php echo  $client['client_address']; ?> </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm waves-effect" data-toggle="modal" data-target="#edit-Modal_<?php echo $client['id']; ?>"> Edit <i class='fa fa-pen'></i> </button>
                                                        <a href="main.php?dir=clients&page=delete&cat_id=<?php echo $client['id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class='fa fa-trash'></i> </a>
                                                    </td>
                                                </tr>
                                                <!-- EDIT NEW CATEGORY MODAL   -->
                                                <div class="modal fade" id="edit-Modal_<?php echo $client['id']; ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> edit Category </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="post" action="main.php?dir=clients&page=edit">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type='hidden' name="client_id" value="<?php echo $client['id']; ?>">
                                                                        <label for="Company-2" class="block">Name</label>
                                                                        <input id="Company-2" required name="client_name" type="text" class="form-control required" value="<?php echo  $client['client_name'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Email</label>
                                                                        <input id="Company-2" required name="client_email" type="email" class="form-control required" value="<?php echo  $client['client_email'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Phone</label>
                                                                        <input id="Company-2" required name="client_phone" type="text" class="form-control required" value="<?php echo  $client['client_phone'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Address</label>
                                                                        <input id="Company-2" required name="client_address" type="text" class="form-control required" value="<?php echo  $client['client_address'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="edit_cat" class="btn btn-primary waves-effect waves-light "> Edit </button>
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
                                        <h4 class="modal-title"> Add Client </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="main.php?dir=clients&page=add" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Name</label>
                                                <input required id="Company-2" name="client_name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Email</label>
                                                <input required id="Company-2" name="client_email" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Phone</label>
                                                <input required id="Company-2" name="client_phone" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Address</label>
                                                <input required id="Company-2" name="client_address" type="text" class="form-control required">
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