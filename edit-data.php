<?php
//database Connection

$db_con=mysqli_connect("localhost","root","","php_crud_operation");
if($db_con){
    die("database is connected");
}

$id = $_GET['id'];

$sql = "SELECT * FROM `students` INNER JOIN `subjects` ON students.id = subjects.student_id WHERE students.student_id=$id";
$result = mysqli_query($db_con , $sql);

if(mysqli_num_rows($result) > 0){
$result = mysqli_fetch_assoc($result);

echo "<pre>"; print_r($result); echo "</pre>";
} else {
die("no record found");
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>


<title>Registration-form</title>
<link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
<script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<div class="container w-50 shadow mx-auto mt-3 p-3">

<h2 class="text-center text-white bg-primary p-2 mb-3">Registration Form</h2>

<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

    <label class="form-label">Name</label>

    <input type="text" value="<?=($result['name'])?>" class="form-control shadow-none border border-primary mb-3" name="name" placeholder="First Name" />

    <label class="form-label">Age</label>

    <input type="number" value="<?= ($result['age'])?>" class="form-control shadow-none border border-primary mb-3" name="age" placeholder="Age" />


    <label class="form-label">City</label>
    <select name="city" value="<?=($result['city'])?>" class="form-control shadow-none border border-primary mb-3">
        <option disabled selected>Choose City</option>
        <option value="lodhran" <?php echo ($result['city']=='lodhran') ? 'selected' :'' ?>>Lodhran</option>
        <option value="bahawalpur"  <?php echo ($result['city']== 'bahawalpur') ? 'selected' : '' ?>>Bahawalpur</option>
        <option value="multan" <?php echo ($result['city']== 'multan')? 'selected' : '' ?>  >Multan</option>
    </select>


    <label class="form-label d-block" value=" <?= ($result['gender'])?>" >Gender :</label>
    <div class="mb-3">
        Male: <input type="radio" class="form-check-input me-3" name="gender" value="Male"  <?php echo ($result['gender']=='Male') ? 'selected' : '' ?> />
        Female: <input type="radio" class="form-check-input" name="gender" value="Female"  <?php echo ($result['gender']=='Female')?'selected': '' ?> />
    </div>

    <div class="mb-3">
        <label class="form-label">Subjects </label>
        <div class="d-flex gap-5">
            <div> <input type="checkbox" class="form-check-input shadow-none" name="s_1" value="Math" <?php echo ($result['s_1']== 'Math')? 'selected' : '' ?>  /> Mathematics</div>
            <div> <input type="checkbox" class="form-check-input shadow-none" name="s_2" value="Science" <?php echo ($result['s_2']== 'Science')? 'selected' : '' ?> /> Science</div>
            <div> <input type="checkbox" class="form-check-input shadow-none" name="s_3" value="Bio" <?php echo ($result['s_3']== 'Bio')? 'selected' : '' ?> /> Biology </div>

        </div>
    </div>

    <div class="w-50 mx-auto">
        <input type="submit" class="btn btn-primary w-100" name="submit" value="Submit" />
    </div>
</form>
</div>
</body>
</html>