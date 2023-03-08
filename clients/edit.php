<?php
if (isset($_POST['edit_cat'])) {
    $client_id = $_POST['client_id'];
    $client_name = $_POST['client_name'];
    $client_email = $_POST['client_email'];
    $client_phone = $_POST['client_phone'];
    $client_address = $_POST['client_address'];
    $formerror = [];
    if (empty($client_name)) {
        $formerror[] = 'من  فضلك ادخل الاسم ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE clients SET client_name=?, client_email=?,client_phone=?,client_address=? WHERE id = ? ");
        $stmt->execute(array($client_name, $client_email,$client_phone,$client_address,$client_id));
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
            header('Location:main?dir=clients&page=report');
            
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