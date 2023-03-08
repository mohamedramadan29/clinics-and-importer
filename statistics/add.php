<?php
if (isset($_POST['add_option'])) {
    $name = $_POST['name'];
    $menu_num = $_POST['menu_num'];
    $meal_type = $_POST['meal_type'];
    $day = $_POST['day'];
    $option_type = $_POST['option_type'];
    $cat = $_POST['cat'];
    $special_desc = $_POST['special_desc'];
    $formerror = [];
    if (empty($name) || empty($menu_num) || empty($meal_type) || empty($day) || empty($option_type) || empty($cat)) {
        $formerror[] = '  من فضلك ادخل جميع المعلومات  ';
    }
    if (empty($formerror)) {
        $stmt = $connect->prepare("INSERT INTO options (name, menu_num,meal_type,day,option_type,cat,special_desc)
        VALUES (:zname,:zmenu_num,:zmeal_type,:zday,:zoption_type,:zcat,:special_desc)");
        $stmt->execute(array(
            "zname" => $name,
            "zmenu_num" => $menu_num,
            "zmeal_type" => $meal_type,
            "zday" => $day,
            "zoption_type" => $option_type,
            "zcat" => $cat,
            "special_desc" => $special_desc,
        ));
        if ($stmt) {
            $_SESSION['success_message'] = " Added successfully ";
            header('Location:main?dir=menus&page=report');
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