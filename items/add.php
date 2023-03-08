<?php
if (isset($_POST['add_cat'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $cat_id = $_POST['cat_id'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم الصنف';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO items (item_name, item_desc,cat_id)
        VALUES (:zname,:zdesc,:zcat_id)");
        $stmt->execute(array(
            "zname" => $name,
            "zdesc" => $desc,
            "zcat_id" => $cat_id,
        ));
        if ($stmt) {
            $_SESSION['success_message'] = " Added successfully ";
            header('Location:main?dir=items&page=report');
        }
    } else {
        foreach ($formerror as $error) {
        ?>
            <li class="alert alert-danger"> <?php echo $error; ?> </li>
<?php
        }
    }
}


?>