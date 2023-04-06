        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Files </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Files</li>
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
                            <?php if (isset($_SESSION['super_id'])) {
                            } else {
                            ?>
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add-Modal"> Add New file <i class="fa fa-plus"></i> </button>
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
                                <div class="table-responsive">
                                    <table id="my_table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> File Name </th>
                                                <th> Desc </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM files");
                                            $stmt->execute();
                                            $allfiles = $stmt->fetchAll();
                                            $i = 0;
                                            foreach ($allfiles as $file) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo  $file['name']; ?> </td>
                                                    <td> <?php echo  $file['file_desc']; ?> </td>
                                                    <td>

                                                        <a href="uploads/files/<?php echo $file['file']; ?>" target="_blank" class="btn btn-warning btn-sm"> View <i class='fa fa-eye'></i> </a>
                                                        <!--<a href="main.php?dir=pdf_file&page=download&file=<?php echo urlencode($file['file']); ?>" class="btn btn-success btn-sm">Download <i class="fa fa-download"></i></a>-->
                                                        <?php
                                                        if (isset($_SESSION['admin_id'])) {
                                                        ?>
                                                            <a href="main.php?dir=goals&page=delete&goal_id=<?php echo $goal['id']; ?>" class="confirm btn btn-danger btn-sm"> Delete <i class='fa fa-trash'></i> </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
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
                                        <h4 class="modal-title"> Add File </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="main.php?dir=pdf_files&page=add" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Company-2" class="block">name </label>
                                                <input required id="Company-2" name="name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="Company-2" class="block">Desc</label>
                                                <textarea name="desc" id="" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload file</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input required type="file" class="custom-file-input" name="file" id="exampleInputFile">
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