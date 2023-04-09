<?php
if (isset($_POST['add_option'])) {
    $name = $_POST['name'];
    $menu_num = $_POST['menu_num'];
    $menu_num2 = $_POST['menu_num2'];
    $meal_type = $_POST['meal_type'];
    $day = $_POST['day'];
    $option_type = $_POST['option_type'];
    $cat = $_POST['cat'];
    $formerror = [];
    if (empty($name) || empty($meal_type) || empty($day) || empty($option_type) || empty($cat)) {
        $formerror[] = '  من فضلك ادخل جميع المعلومات  ';
    }
    if (empty($formerror)) {
        if(isset($menu_num) && isset($menu_num2)){
            $stmt = $connect->prepare("INSERT INTO options (name, menu_num,meal_type,day,option_type,cat)
        VALUES (:zname,:zmenu_num,:zmeal_type,:zday,:zoption_type,:zcat)");
            $stmt->execute(array(
                "zname" => $name,
                "zmenu_num" => $menu_num,
                "zmeal_type" => $meal_type,
                "zday" => $day,
                "zoption_type" => $option_type,
                "zcat" => $cat,
            ));
            $stmt = $connect->prepare("INSERT INTO options (name, menu_num,meal_type,day,option_type,cat)
        VALUES (:zname,:zmenu_num,:zmeal_type,:zday,:zoption_type,:zcat)");
            $stmt->execute(array(
                "zname" => $name,
                "zmenu_num" => $menu_num2,
                "zmeal_type" => $meal_type,
                "zday" => $day,
                "zoption_type" => $option_type,
                "zcat" => $cat,
            ));
        }
        elseif(isset($menu_num)){
            $stmt = $connect->prepare("INSERT INTO options (name, menu_num,meal_type,day,option_type,cat)
        VALUES (:zname,:zmenu_num,:zmeal_type,:zday,:zoption_type,:zcat)");
            $stmt->execute(array(
                "zname" => $name,
                "zmenu_num" => $menu_num,
                "zmeal_type" => $meal_type,
                "zday" => $day,
                "zoption_type" => $option_type,
                "zcat" => $cat
            ));
        }elseif (isset(($menu_num2))){
            $stmt = $connect->prepare("INSERT INTO options (name, menu_num,meal_type,day,option_type,cat)
        VALUES (:zname,:zmenu_num,:zmeal_type,:zday,:zoption_type,:zcat)");
            $stmt->execute(array(
                "zname" => $name,
                "zmenu_num" => $menu_num2,
                "zmeal_type" => $meal_type,
                "zday" => $day,
                "zoption_type" => $option_type,
                "zcat" => $cat,
            ));
        }

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