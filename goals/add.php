<?php
if (isset($_POST['add_cat'])) {
    $desc = $_POST['desc'];
    $date = $_POST['date'];

    $formerror = [];
    if (empty($desc)) {
        $formerror[] = ' ادخل الهدف  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO goals (goal_desc, date,client_id)
        VALUES (:zdesc,:zdate,:zclient_id)");
        $stmt->execute(array(
            "zdesc" => $desc,
            "zdate" => $date,
            "zclient_id" => $_SESSION['emp_id'],
        ));
        if ($stmt) {
            $_SESSION['success_message'] = " Added successfully ";
            header('Location:main?dir=goals&page=report');
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