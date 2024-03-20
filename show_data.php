<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show Data</title>
    <!-- bootstrp links -->
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
    <script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    <div class="container mt-3">
        <div class="mb-3 text-end">
            <a href="insert.php" class="btn btn-primary">+ Add Student</a>
        </div>
        <h2 class="text-center text-white bg-primary p-2 mb-3">Students Data</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">City</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Subjects</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>


                <?php
                // database connection
                $db_conn = mysqli_connect("localhost", "root", "", "php_crud_operation");
                if (!$db_conn) {
                    die("database not connected");
                }

                $sql = "SELECT * FROM `students` INNER JOIN `subjects` ON students.id = subjects.student_id ";
                $result = mysqli_query($db_conn , $sql);

              if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){

                $id = $row['id'];
                $name = $row['name'];
                $age = $row['age'];
                $city = $row['city'];
                $gender = $row['gender'];

                $s_1= $row['subject_1'];
                $s_2= $row['subject_2'];
                $s_3= $row['subject-3'];

              ?>

                <tr>
                   <th ><?php echo $id;  ?></th>
                    <td><?php echo $name;  ?></td>
                    <td><?php echo $age;  ?></td>
                    <td><?php echo $city;  ?></td>
                    <td><?php echo $gender;  ?></td>
                    <td> <?php echo $s_1." ". $s_2 ." " . $s_3 ?></td>
                    <td><a href="" class="btn btn-warning btn-sm">Edit</a>
                          |  
                    <a href="" class="btn btn-danger btn-sm">Delete</a></a> </td>
                </tr>

         <?php
                }
              }
            ?>

             

           
            </tbody>
        </table>
    </div>

</body>

</html>