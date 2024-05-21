<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <center><h1>List of Employees</h1></center>
        <a class="btn btn-primary" href="/myshop/create.php" role="button">Add New Employee</a><br>

        <table class="table" border="5">
            <thead>
                <tr>
                <th>id</th>
                <th>Emp_Name</th>
                <th>Salary</th>
                <th>Department</th>
                <th>Age</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="employees";

                $connection=new mysqli($servername,$username,$password,$database);

                if($connection->connect_error){
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql="SELECT * FROM employee";
                $result=$connection->query($sql);

                if(!$result){
                    die("Invalid query: " . $connection->connect_error);
                }

                while($row=$result->fetch_assoc()){
                    echo"
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[Emp_Name]</td>
                    <td>$row[Salary]</td>
                    <td>$row[Department]</td>
                    <td>$row[Age]</td>
                    <td>
                        <a class='btn btn-primary btn-sm'  href='/myshop/edit.php?id=$row[id]'>Update</a>
                        <a class='btn btn-danger btn-sm'  href='/myshop/delete.php?id=$row[id]'>Delete</a>
                    </td>
                    </tr>
                    ";
                }
                ?>
                
                
            </tbody>
        </table>
</body>
</html>