<?php
session_start();

include("dbconnect.php");

$id = $_SESSION["uid"];

$qry = "select * from user where id = '$id'";
$result = mysqli_query($connect, $qry);
$data = mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

            #form {
            height: 85vh;
            align-content: center;
        }
        
        .card-header {
            background-color: #03383F; /* Dark teal */
            color: #FEF8E6; /* Light beige text */
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        .table th,
        .table td {
            border-top: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .table th {
            color: #03383F; /* Dark teal heading */
            font-weight: bold;
            width: 40%;
        }

        .table td {
            color: #6C757D; /* Medium dark gray text */
            width: 60%;
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
                        <h3>Your Profile</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>Username:</th>
                                <td><?php echo $data['username'] ?></td>
                            </tr>
                            <tr>
                                <th>Mobile:</th>
                                <td><?php echo $data['mobile'] ?></td>
                            </tr>
                            <tr>
                                <th>Email ID:</th>
                                <td><?php echo $data['email'] ?></td>
                            </tr>
                        </table>
                        <a href="editprofile.php" class="btn btn-dark btn-block">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
