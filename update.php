<?php
// database connection
$db_con = mysqli_connect("localhost", "root", "", "php_crud_operation");
if (!$db_con) {
    die("database not connected");
}


if($_POST['submit']) {

    if(!isset($_POST['name']) || empty($_POST['name'])) {
        die("Name filed is required");
    }

    $id = $_POST['id'];
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $city = $_POST['city'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $s_1 = isset($_POST['s_1']) ? $_POST['s_1'] : null;
    $s_2 = isset($_POST['s_2']) ? $_POST['s_2'] : null;
    $s_3 = isset($_POST['s_3']) ? $_POST['s_3'] : null;

    $sql = "UPDATE students SET name ='$name', city='$city', age='$age', gender='$gender' WHERE id=$id";

    if(mysqli_query($db_con, $sql)) {

        $sql2 = "UPDATE subjects SET s_1='$subject_1', s_2='$subject_2', s_3='$subject_3' WHERE student_id=$id";

        if(mysqli_query($db_con, $sql2)) { 
            header("Location: show_data.php");
        }

    }

}


?>