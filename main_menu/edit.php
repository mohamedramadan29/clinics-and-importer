<?php
if (isset($_POST['edit_option'])) {
    echo "Goooooood";
    $option_id = $_POST['option_id'];
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
        $stmt = $connect->prepare("UPDATE options SET name=?, menu_num=?,meal_type=?,day=?,option_type=?,cat=?,special_desc=? WHERE id = ? ");
        $stmt->execute(array($name, $menu_num, $meal_type, $day, $option_type, $cat, $special_desc,  $option_id));
        if ($stmt) {
            $_SESSION['success_message'] = " Edit successfully ";
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