<?php
require "connect.php";
if (isset($_GET["id"]))
{
    $id = $_GET["id"];
    $stm = $pdo->prepare("select * from students where id=?");
    $stm->execute([$id]);
    $student = $stm->fetch();
}

if (isset($_POST["id"]))
{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $target_dir = "photos/";
    $random = rand(1000000,5000000);
    $target_file = $target_dir . $random. basename($_FILES["photo"]["name"]);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file))
    {
//        die("it has uploaded");
        //save in DB
        $stm = $pdo->prepare("update students set name=?,photo=? where id=?");
        $reg_date = date("Y-m-d");
        $stm->execute([$name, $target_file, $id]);

    }
    header("location:show.php");

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
<?php require "navbar.php>"?>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-sm-5">

            <div class="card">

                <div class="card-body">
                    <div class="text-center">
                        <img class="rounded-circle mx-auto d-block" src="<?=$student->photo?>" width="150" height="150" alt="">
                    </div>

                    <form action="edit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input value="<?=$student->name?>" type="text" class="form-control border" required name="name" placeholder="Full Name">
                        </div>

                        <input type="hidden" name="id" value="<?=$student->id?>">

                        <div class="form-group">
                            <label>Your Photo</label>
                            <input type="file"accept="image/*" class="form-control-file border" required name="photo" placeholder="Your Photo">
                        </div>


                        <button class="btn btn-success">Update Student</button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>



