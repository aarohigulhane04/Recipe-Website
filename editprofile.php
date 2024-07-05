<?php
session_start();

include("dbconnect.php");

$id = $_SESSION["uid"];

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FEF8E6; /* Light beige background */
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }

        #form {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #03383F; /* Dark teal */
            color: #FEF8E6; /* Light beige text */
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border-color: #03383F; /* Dark teal border for form inputs */
        }

        .btn-dark {
            background-color: #F9972F; /* Orange button background */
            border-color: #F9972F; /* Orange button border */
            color: #FEF8E6; /* Light beige text */
        }

        .btn-dark:hover {
            background-color: #FFBC3B; /* Lighter orange on hover */
            border-color: #FFBC3B; /* Lighter orange border on hover */
            color: #03383F; /* Dark teal text on hover */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row" id="form">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" onsubmit="return confirmUpdate()">
                            Username:
                            <input type="text" value="<?php echo $data['username']; ?>" name="username" placeholder="Username" class="form-control mb-2" />
                            Mobile Number:
                            <input name="mobile" value="<?php echo $data['mobile'] ?>" type="tel" placeholder="Mobile" class="form-control mb-2" />
                            Email ID:
                            <input name="email" value="<?php echo $data['email'] ?>" type="email" placeholder="Email" class="form-control mb-2" />
                            <a href="changepwd.php" class="btn btn-dark btn-block mb-2">Change Password</a>
                            <button type="submit" class="btn btn-dark btn-block" name="update_button">Update</button>
                            <a href="home.php" class="btn btn-dark btn-block mt-3">Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update?");
        }
    </script>
</body>

</html>
