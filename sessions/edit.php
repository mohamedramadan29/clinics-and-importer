<?php
if (isset($_POST['edit_cat'])) {
    $item_id = $_POST['item_id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $cat_id = $_POST['cat_id'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم القسم';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE items SET item_name=?, item_desc=? , cat_id =? WHERE id = ? ");
        $stmt->execute(array($name, $desc,$cat_id,$item_id));
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
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