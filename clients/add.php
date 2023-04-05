<?php
if (isset($_POST['add_cat'])) {
    $patient_name = $_POST['patient_name'];
    $smart_goals = $_POST['smart_goals'];
    $artifation_measure = $_POST['artifation_measure'];
    $willingness = $_POST['willingness'];
    $days_required = $_POST['days_required'];
    $goal_progress = $_POST['goal_progress'];
    $emp_id = $_SESSION['emp_id'];
    $start_date = date("Y-m-d");
    $end_date = date("Y-m-d", strtotime($today_date . " +".$days_required." days"));
    $formerror = [];
    if (
        empty($patient_name) || empty($smart_goals) || empty($artifation_measure) ||
        empty($willingness) || empty($days_required) || empty($goal_progress)
    ) {
        $formerror[] = 'من فضلك ادخل  جميع البيانات  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO clients (patient_name,smart_goals ,artifation_measure ,
        willingness , days_required , goal_progress,emp_id,start_date,goal_end_date)
        VALUES (:zpatient_name,:zsmart_goals,:zart_measure,:zwillinges,:zday_required,:zgoal_progress,:zemp_id,:zstart_date,:zend_date)");
        $stmt->execute(array(
            "zpatient_name"  => $patient_name,
            "zsmart_goals"   => $smart_goals,
            "zart_measure"   => $artifation_measure,
            "zwillinges"     => $willingness,
            "zday_required"  => $days_required,
            "zgoal_progress" => $goal_progress,
            "zemp_id" => $emp_id,
            "zstart_date" => $start_date,
            "zend_date" => $end_date,

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