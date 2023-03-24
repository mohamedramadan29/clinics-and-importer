<?php
if (isset($_POST['edit_cat'])) {
    $item_id = $_POST['item_id'];
    $break = $_POST['break_session'];
    $lunch = $_POST['lunch_session'];
    $dinner = $_POST['dinner_session'];
    $formerror = [];

    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE sessions SET break_session=?, lunch_session=? , dinner_session =? WHERE id = ? ");
        $stmt->execute(array($break, $lunch, $dinner, $item_id));
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
            header('Location:main?dir=sessions&page=report');
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