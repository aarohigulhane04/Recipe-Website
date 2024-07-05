<?php
include("../dbconnect.php");

$id = $_GET["id"];

$qry = "select * from user where id = '$id'";
$result = mysqli_query($connect, $qry);
$data = mysqli_fetch_assoc($result);

if (isset($_POST["update_button"])) {
    $un = $_POST["username"];
    $eid = $_POST["email"];
    $mob = $_POST["mobile"];

    $qry = "UPDATE `user` SET `username`='$un',`mobile`='$mob',`email`='$eid' WHERE id = '$id'";

    $result = mysqli_query($connect, $qry);

    if ($result) {
?><script>alert("Updated Successfully")</script><?php
    } else {
        ?><script>alert("Something went wrong")</script><?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    <style>
        body {
            background-color: #f7f7f7;
        }

        #form-container {
            height: 85vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-header {
            background-color: #03383F;
        }

        .card-body {
            padding: 2rem;
            background-color: #FEF8E6;
        }

        .form-control {
            border-radius: 0;
            border: 1px solid #03383F;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #FFBC3B;
        }

        .btn-dark {
            background-color: #03383F;
            border: none;
        }

        .btn-dark:hover {
            background-color: #708E8E;
        }

        .btn-submit {
            background-color: #F9972F;
            border: none;
        }

        .btn-submit:hover {
            background-color: #FFBC3B;
        }
    </style>
</head>

<body>
    <div class="container" id="form-container">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-white">Edit Profile</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" value="<?php echo $data['username']; ?>" name="username" id="username" class="form-control mb-2" />
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number:</label>
                            <input type="tel" value="<?php echo $data['mobile'] ?>" name="mobile" id="mobile" class="form-control mb-2" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email id:</label>
                            <input type="email" value="<?php echo $data['email'] ?>" name="email" id="email" class="form-control mb-2" />
                        </div>
                        <button type="submit" class="btn btn-submit my-3" name="update_button">Update</button>
                        <a href="manageusers.php" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
