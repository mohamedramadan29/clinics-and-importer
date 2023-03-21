<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="input_name_1">
        <input type="text" name="input_name_2">
        <button name="copy" type="submit"> Copy </button>
    </form>
    <?php
    if (isset($_POST['copy'])) {
        // احصل على قيم inputs
        $input_value_1 = $_POST['input_name_1'];
        $input_value_2 = $_POST['input_name_2'];

        // تحويل القيم المستلمة إلى سلسلة نصية
        $data = array('value_1' => $input_value_1, 'value_2' => $input_value_2);
        $serialized_data = serialize($data);

        // تخزين السلسلة المحولة في الذاكرة أو في ملف
        // يمكن تغيير اسم الملف حسب احتياجاتك
        $file_name = 'my_data.txt';
        file_put_contents($file_name, $serialized_data);

        // عرض السلسلة المحولة والتي يمكن للمستخدم لصقها في أي مكان
        echo "Your data: $serialized_data";
    }

    ?>
</body>

</html>