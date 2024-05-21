<?php

$servername="localhost";
$username="root";
$password="";
$database="employees";

// create connection
$connection=new mysqli($servername, $username, $password, $database);

$Emp_Name="";
$Salary="";
$Department="";
$Age="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $Emp_Name=$_POST["Emp_Name"];
    $Salary=$_POST["Salary"];
    $Department=$_POST["Department"];
    $Age=$_POST["Age"];

    do{
        if(empty($Emp_Name)||empty($Salary)||empty($Department)||empty($Age)) {
            $errorMessage="All the fields are required";
            break;
        }

        // add ne employee to DB
        $sql = "INSERT INTO employee(Emp_Name,Salary,Department,Age)" .
               "VALUES ('$Emp_Name','$Salary','$Department','$Age')";
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query: " . $connection->error;
            break;
        }

        $Emp_Name="";
        $Salary="";
        $Department="";
        $Age="";

        $successMessage="New employee added";

        header("location: /myshop/index.php");
        exit;

    }while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Employee</h2>

        <?php
        if(!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <buttton type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></botton>
            </div>
            ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Emp_Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Emp_Name" value="<?php echo $Emp_Name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Salary</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Salary" value="<?php echo $Salary; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Department</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Department" value="<?php echo $Department; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Age" value="<?php echo $Age; ?>">
                </div>
            </div>

            <?php
             if(!empty($successMessage)){
                echo"
                <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <buttton type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></botton>
                 </div>
                 </div>
                 </div>
                ";
             }
             ?>

                 <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/myshop/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    
</body>
</html>