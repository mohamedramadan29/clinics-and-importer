<?php
if (isset($_POST['edit_cat'])) {
    $cat_id = $_POST['cat_id'];
    $name = $_POST['cat_name'];
    $desc = $_POST['cat_desc'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم القسم';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE clients_cat SET cat_name=?, cat_desc=? WHERE id = ? ");
        $stmt->execute(array($name, $desc,$cat_id));
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
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