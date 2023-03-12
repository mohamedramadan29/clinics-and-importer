<?php
if (isset($_POST['edit_cat'])) {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $emp_email = $_POST['emp_email'];
    $emp_password = $_POST['emp_password'];
    $emp_phone = $_POST['emp_phone'];
    $clinic_name = $_POST['clinic_name'];
    $clinic_code = $_POST['clinic_code'];
    $pres_id = $_POST['pres_id'];
    $status = $_POST['status'];
    $formerror = [];
    if (empty($emp_name) || empty($emp_email) || empty($emp_password) || empty($emp_phone) || empty($clinic_name) || empty($clinic_code) || empty($pres_id)) {
        $formerror[] = '  من فضلك ادخل جميع المعلومات  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("UPDATE emplyees SET emp_name=?,emp_email=?,emp_password=?,emp_phone=?,clinic_name=?,
        clinic_code=?,pres_id=?,status=? WHERE id = ? ");
        $stmt->execute(array($emp_name, $emp_email,$emp_password,$emp_phone,$clinic_name,$clinic_code,$pres_id,$status,$emp_id));
        if ($stmt) {
            $_SESSION['success_message'] = "Edit_successfully";
            header('Location:main?dir=setting&page=report_emp');
            
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