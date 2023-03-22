        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Items Desc </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Items Desc</li>
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
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add-Modal"> Add New Item <i class="fa fa-plus"></i> </button>
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
                                                <th>description</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM items_desc");
                                            $stmt->execute();
                                            $allitems = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allitems as $item) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo  $item['item_name']; ?> </td>
                                                    <td> <?php echo  $item['item_desc']; ?> </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm waves-effect" data-toggle="modal" data-target="#edit-Modal_<?php echo $item['id']; ?>"> Edit <i class='fa fa-pen'></i> </button>
                                                        <button type="button" class="btn btn-info btn-sm waves-effect" data-toggle="modal" data-target="#view-Modal_<?php echo $item['id']; ?>"> View <i class='fa fa-eye'></i> </button>
                                                        <a href="main.php?dir=items_desc&page=delete&item_id=<?php echo $item['id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class='fa fa-trash'></i> </a>
                                                    </td>
                                                </tr>
                                                <!-- EDIT NEW CATEGORY MODAL   -->
                                                <div class="modal fade" id="edit-Modal_<?php echo $item['id']; ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> edit items </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="post" action="main.php?dir=items_desc&page=edit" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type='hidden' name="item_id" value="<?php echo $item['id']; ?>">
                                                                        <label for="Company-2" class="block">Name</label>
                                                                        <input id="Company-2" required name="name" type="text" class="form-control required" value="<?php echo  $item['item_name'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Description</label>
                                                                        <textarea name="desc" id="" class="form-control"><?php echo  $item['item_desc'] ?> </textarea>
                                                                    </div>
                                                                    <?php
                                                                    if (!empty($item['item_image'])) {
                                                                    ?>
                                                                        <img style="width: 100%; height:150px" src="uploads/items_desc/<?php echo $item['item_image']; ?>" alt="">
                                                                    <?php
                                                                    } else {
                                                                    }
                                                                    ?>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputFile"> Item Image </label>
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
                                                                    <button type="submit" name="edit_cat" class="btn btn-primary waves-effect waves-light "> Edit </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--View Items   -->
                                                <div class="modal fade" id="view-Modal_<?php echo $item['id']; ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> edit items </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="post" action="" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type='hidden' name="item_id" value="<?php echo $item['id']; ?>">
                                                                        <label for="Company-2" class="block">Name</label>
                                                                        <input id="Company-2" required name="name" type="text" class="form-control required" value="<?php echo  $item['item_name'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Company-2" class="block">Description</label>
                                                                        <textarea name="desc" id="" class="form-control"><?php echo  $item['item_desc'] ?> </textarea>
                                                                    </div>
                                                                    <?php
                                                                    if (!empty($item['item_image'])) {
                                                                    ?>
                                                                        <img style="width: 100%; height: 200px;" src="uploads/items_desc/<?php echo $item['item_image']; ?>" alt="">
                                                                    <?php
                                                                    } else {
                                                                    }
                                                                    ?>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
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
                                        <h4 class="modal-title"> Add Item </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="main.php?dir=items_desc&page=add" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Name</label>
                                                <input required id="Company-2" name="name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Description</label>
                                                <textarea name="desc" id="" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile"> Item Image </label>
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