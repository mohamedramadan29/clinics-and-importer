<?php
if (isset($_POST['edit_cat'])) {
    $desc = $_POST['login_desc'];
    if (!empty($_FILES['login_image']['name'])) {
        $logo_name = $_FILES['login_image']['name'];
        $logo_temp = $_FILES['login_image']['tmp_name'];
        $logo_type = $_FILES['login_image']['type'];
        $logo_size = $_FILES['login_image']['size'];
        $logo_uploaded = time() . '_' . $logo_name;
        move_uploaded_file(
            $logo_temp,
            'uploads/' . $logo_uploaded
        );
    } else {
        $logo_uploaded = '';
    } 
    $formerror = [];
    if (empty($desc)) {
        $formerror[] = 'من فضلك ادخل اسم القسم';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE login_page SET login_desc=?");
        $stmt->execute(array($desc));
        if(!empty($logo_temp)){
            $stmt = $connect->prepare("UPDATE login_page SET login_image=?");
            $stmt->execute(array($logo_uploaded));
        }
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
           header('Location:main?dir=login_page&page=report');
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