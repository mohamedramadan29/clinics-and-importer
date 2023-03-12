<?php
if (isset($_POST['edit_cat'])) {
    $pre_id = $_POST['pre_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone']; 
    $status = $_POST['status'];
    if (!empty($_FILES['logo']['name'])) {
        $logo_name = $_FILES['logo']['name'];
        $logo_temp = $_FILES['logo']['tmp_name'];
        $logo_type = $_FILES['logo']['type'];
        $logo_size = $_FILES['logo']['size'];
        $logo_uploaded = time() . '_' . $logo_name;
        move_uploaded_file(
            $logo_temp,
            'uploads/pres_logo/' . $logo_uploaded
        );
    } else {
        $logo_uploaded = '';
    }
    $formerror = [];
    if (empty($name) || empty($email) || empty($password) || empty($phone)) {
        $formerror[] = '  من فضلك ادخل جميع المعلومات  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE presentions SET name=?,email=?,password=?,phone=?,status=? WHERE id = ? ");
        $stmt->execute(array($name, $email,$password,$phone,$status,$pre_id));
        if(!empty($logo_temp)){
            $stmt = $connect->prepare("UPDATE presentions SET logo = ? WHERE id = ?");
            $stmt->execute(array($logo_uploaded,$pre_id));
        }
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
            header('Location:main?dir=setting&page=report_pre');
            
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