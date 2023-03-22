<?php
if (isset($_POST['add_cat'])) {
    $id = $_POST['id'];
    $patient_name = $_POST['patient_name'];
    $smart_goals = $_POST['smart_goals'];
    $artifation_measure = $_POST['artifation_measure'];
    $willingness = $_POST['willingness'];
    $days_required = $_POST['days_required'];
    $goal_progress = $_POST['goal_progress'];
    $formerror = [];
    if (
        empty($patient_name) || empty($smart_goals) || empty($artifation_measure) ||
        empty($willingness) || empty($days_required) || empty($goal_progress)
    ) {
        $formerror[] = 'من فضلك ادخل  جميع البيانات  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE clients SET  patient_name=?,smart_goals=? ,artifation_measure=? ,
        willingness=? , days_required=? , goal_progress=? WHERE id = ?");
        $stmt->execute(array(
            $patient_name,  $smart_goals,  $artifation_measure, $willingness,  $days_required,
            $goal_progress, $id
        ));
        if ($stmt) {
            $_SESSION['success_message'] = " Edit successfully ";
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