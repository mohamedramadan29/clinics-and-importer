<?php
if (isset($_POST['edit_admin'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE admin SET user_name=?, password=? , email =? WHERE id = ? ");
        $stmt->execute(array($name, $password,$email,$id));
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
            header('Location:main?dir=profile&page=report');
        }
    } else {
        foreach ($formerror as $error) {
        ?>
            <li class="alert alert-danger"> <?php echo $error; ?> </li>
<?php
        }
    }
}


if (isset($_POST['edit_emp'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE emplyees SET emp_name=?, emp_email=? , emp_password =? , emp_phone=? WHERE id = ? ");
        $stmt->execute(array($name, $email,$password,$phone,$id));
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
            header('Location:main?dir=profile&page=report');
        }
    } else {
        foreach ($formerror as $error) {
        ?>
            <li class="alert alert-danger"> <?php echo $error; ?> </li>
<?php
        }
    }
}


if (isset($_POST['edit_supp'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $formerror = [];
    if (empty($name)) {
        $formerror[] = 'من فضلك ادخل اسم ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE  presentions SET name=?, email=? , phone=? , password =?  WHERE id = ? ");
        $stmt->execute(array($name, $email,$phone,$password,$id));
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
            header('Location:main?dir=profile&page=report');
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