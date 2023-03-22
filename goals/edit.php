<?php
if (isset($_POST['edit_cat'])) {
    $goal_id = $_POST['goal_id'];
    $date = $_POST['date'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];
    $formerror = [];
    if (empty($desc)) {
        $formerror[] = 'من فضلك ادخل الهدف';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE goals SET goal_desc=?, date=?, status=? WHERE id = ? ");
        $stmt->execute(array($desc, $date, $status, $goal_id));
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
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