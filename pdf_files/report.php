        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Goals </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Goals</li>
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
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add-Modal"> Add New Goal <i class="fa fa-plus"></i> </button>
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
                                                <th> description</th>
                                                <th> date </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM goals");
                                            $stmt->execute();
                                            $allgoals = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allgoals as $goal) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo  $goal['goal_desc']; ?> </td>
                                                    <td> <?php echo  $goal['date']; ?> </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm waves-effect" data-toggle="modal" data-target="#edit-Modal_<?php echo $goal['id']; ?>"> Edit <i class='fa fa-pen'></i> </button>
                                                        <a href="main.php?dir=goals&page=delete&goal_id=<?php echo $goal['id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class='fa fa-trash'></i> </a>
                                                    </td>
                                                </tr>
                                                <!-- EDIT NEW CATEGORY MODAL   -->
                                                <div class="modal fade" id="edit-Modal_<?php echo $goal['id']; ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> edit Goal </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="main.php?dir=goals&page=edit" method="post" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="goal_id" value="<?php echo $goal['id']; ?>">
                                                                        <label for="Company-2" class="block">Goal </label>
                                                                        <textarea name="desc" id="" class="form-control"><?php echo $goal['goal_desc']; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Date</label>
                                                                        <input required id="Company-2" name="date" type="date" value="<?php echo $goal['date']; ?>" class="form-control required">
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
                                        <h4 class="modal-title"> Add Goal </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="main.php?dir=goals&page=add" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="Company-2" class="block">Goal </label>
                                                <textarea name="desc" id="" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Date</label>
                                                <input required id="Company-2" name="date" type="date" class="form-control required">
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