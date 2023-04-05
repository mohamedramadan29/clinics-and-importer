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
                            <div style="padding: 20px;">
                                <form action="" method="post">
                                    <label for=""> Select Item </label>
                                    <select required class="form-control select2" name="select_item">
                                        <option value=""> -- Select -- </option>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM items_desc");
                                        $stmt->execute();
                                        $allitem = $stmt->fetchAll();
                                        foreach ($allitem as $item) {
                                        ?>
                                            <option <?php if(isset($_REQUEST['select_item']) && $_REQUEST['select_item'] == $item['id']) echo "selected"; ?> value="<?php echo $item['id']; ?>"><?php echo $item['item_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="show_desc" class="btn btn-primary btn-sm"> Show Desc <i class="fa fa-eye"></i></button>
                                </form>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['show_desc'])) {
                                    $item_id = $_POST['select_item'];
                                    $stmt = $connect->prepare("SELECT * FROM items_desc WHERE id=?");
                                    $stmt->execute(array($item_id));
                                    $item = $stmt->fetch(); ?>
                                    <p style="line-height: 2;font-size: 17px;color: #3a3939;"> <?php echo $item['item_desc']; ?> </p>
                                <?php
                                }
                                ?>
                                <?php
                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>