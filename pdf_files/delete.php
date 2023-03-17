<?php
if (isset($_GET['goal_id']) && is_numeric($_GET['goal_id'])) {
    $goal_id = $_GET['goal_id'];

    $stmt = $connect->prepare('SELECT * FROM goals WHERE id= ?');
    $stmt->execute([$goal_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM goals WHERE id=?');
        $stmt->execute([$goal_id]);
        if ($stmt) {  
          $_SESSION['success_message'] = " Deleted successfully ";
            header('Location:main?dir=goals&page=report'); 
        }
    }
}
