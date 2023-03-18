<?php
if (isset($_POST['add_cat'])) {
    $desc = $_POST['desc'];
    $name = $_POST['name'];
    if (!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_uploaded = time() . '_' . $file_name;
        move_uploaded_file(
            $file_temp,
            'uploads/files/' . $file_uploaded
        );
    } else {
        $logo_uploaded = '';
    }
    $formerror = [];
    if (empty($name)) {
        $formerror[] = ' ادخل الاسم   ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO  files (name, file_desc,file)
        VALUES (:zname,:zdesc,:zfile)");
        $stmt->execute(array(
            "zname" => $name,
            "zdesc" => $desc,
            "zfile" => $file_uploaded,
        ));
        if ($stmt) {
            $_SESSION['success_message'] = " Added successfully ";
            header('Location:main?dir=pdf_files&page=report');
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