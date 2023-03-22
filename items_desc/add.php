<?php
if (isset($_POST['add_cat'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    if (!empty($_FILES['logo']['name'])) {
        $logo_name = $_FILES['logo']['name'];
        $logo_temp = $_FILES['logo']['tmp_name'];
        $logo_type = $_FILES['logo']['type'];
        $logo_size = $_FILES['logo']['size'];
        $logo_uploaded = time() . '_' . $logo_name;
        move_uploaded_file(
            $logo_temp,
            'uploads/items_desc/' . $logo_uploaded
        );
    } else {
        $logo_uploaded = '';
    }
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO items_desc (item_name, item_desc,item_image)
        VALUES (:zname,:zdesc,:zimage)");
        $stmt->execute(array(
            "zname" => $name,
            "zdesc" => $desc,
            "zimage" => $logo_uploaded,
        ));
        if ($stmt) {
            $_SESSION['success_message'] = " Added successfully ";
            header('Location:main?dir=items_desc&page=report');
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