<?php

if (isset($_POST['change_pwd'])) {


    include("dbconnect.php");
    session_start();

    $id = $_SESSION['uid'];

    $pwd1 = $_POST["password1"];
    $pwd2 = $_POST["password2"];
    $pwd3 = $_POST["password3"];


    $qry = "select * from user where id = '$id'";
    $result = mysqli_query($connect, $qry);

    $data = mysqli_fetch_assoc($result);


    if ($data["password"] == $pwd1) {
        if ($pwd2 == $pwd3) {
            $qry2 = "UPDATE `user` SET `password`='$pwd2' WHERE id = '$id'";
            $result2 = mysqli_query($connect, $qry2);
            if ($result2) {
                ?> <script>alert("Password changed");</script> <?php
            } else {
                ?> <script>alert("something went wrong");</script> <?php
                    }
        } else {
            ?> <script>alert("Password do not match");</script> <?php
                }
    } else {
        ?> <script>alert("Invalid current password");</script> <?php
        }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <style>
        body {
            background-color: #FEF8E6; /* Light beige background */
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            text-align: center;
            padding: 1.5rem;
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
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Password</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <input name="password1" type="password" placeholder="Current Password" class="form-control mb-2" required />
                            <input name="password2" type="password" placeholder="New Password" class="form-control mb-2" required />
                            <input name="password3" type="password" placeholder="Confirm Password" class="form-control mb-2" required />
                            <button type="submit" class="btn btn-dark btn-block my-3" name="change_pwd">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
