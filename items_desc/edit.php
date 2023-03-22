<?php
if (isset($_POST['edit_cat'])) {
    $item_id = $_POST['item_id'];
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
        $formerror[] = 'من فضلك ادخل اسم القسم';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE items_desc SET item_name=?, item_desc=? WHERE id = ? ");
        $stmt->execute(array($name, $desc,$item_id));
        if(!empty($logo_temp)){
            $stmt = $connect->prepare("UPDATE items_desc SET item_image = ? WHERE id = ?");
            $stmt->execute(array($logo_uploaded,$item_id));
        }
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
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