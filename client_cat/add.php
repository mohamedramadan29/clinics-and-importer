<?php
if (isset($_POST['add_cat'])) {
    $name = $_POST['cat_name'];
    $desc = $_POST['cat_desc'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم القسم';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO clients_cat (cat_name, cat_desc)
        VALUES (:zname,:zdesc)");
        $stmt->execute(array(
            "zname" => $name,
            "zdesc" => $desc,
        ));
        if ($stmt) {
            $_SESSION['success_message'] = " Added successfully ";
            header('Location:main?dir=client_cat&page=report');
            
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