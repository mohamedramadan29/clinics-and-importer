<?php
if (isset($_POST['add_cat'])) {
    $client_name = $_POST['client_name'];
    $client_email = $_POST['client_email'];
    $client_phone = $_POST['client_phone'];
    $client_address = $_POST['client_address'];
    $formerror = [];
    if (empty($client_name) || empty($client_email) || empty($client_phone) || empty($client_address)) {
        $formerror[] = 'من فضلك ادخل  جميع البيانات  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO clients (client_name,client_email ,client_phone , client_address)
        VALUES (:zname,:zemail,:zphone,:zaddress)");
        $stmt->execute(array(
            "zname" => $client_name,
            "zemail" => $client_email,
            "zphone" => $client_phone,
            "zaddress" => $client_address,
        ));
        if ($stmt) {
            $_SESSION['success_message'] = " Added successfully ";
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