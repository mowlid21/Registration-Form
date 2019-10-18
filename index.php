<?php
if (isset($_POST['email']))
{
    require "connect.php";
   $name = $_POST["name"];
   $email = $_POST["email"];
   $gender = $_POST["gender"];
   $course = $_POST["course"];
   $phone = $_POST["phone"];

    $target_dir = "photos/";
    $random = rand(1000000,5000000);
    $target_file = $target_dir . $random. basename($_FILES["photo"]["name"]);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file))
    {
//        die("it has uploaded");
        //save in DB
        $stm = $pdo->prepare("INSERT INTO `students`(`id`, `name`, `email`, `phone`, `photo`, `course`, `gender`, `reg_date`) VALUES (?,?,?,?,?,?,?,?)");
        $reg_date = date("Y-m-d");
        $stm->execute([null,$name,$email,$phone,$target_file,$course,$gender,$reg_date]);

    }
        else
        {
            die("it failed");
        }


}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>register</title>
</head>
<body>
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-sm-5">

                <div class="card">

                    <div class="card-body">

                        <form action="index.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control border" required name="name" placeholder="Full Name">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control border" required name="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control border" required name="phone" placeholder="Phone Number">
                            </div>

                            <div class="form-group">
                                <label>Your Photo</label>
                                <input type="file"accept="image/*" class="form-control-file border" required name="photo" placeholder="Your Photo">
                            </div>

                            <label>select course</label>
                            <select name="course"  class="form-control">
                                <option value="python">Python</option>
                                <option value="android">Android</option>
                                <option value="php">PHP</option>
                                <option value="Kotlin">Kotlin</option>
                                <option value="Data science">Data science</option>
                            </select>



                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Male" name="gender">Male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Female" name="gender">Female
                            </label>
                        </div>

                            <button class="btn btn-success">Register</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>
