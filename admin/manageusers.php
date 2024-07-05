<?php
session_start();
include("../dbconnect.php");


// $id = $_SESSION["uid"];


$qry = "SELECT * FROM user";

$result = mysqli_query($connect, $qry);


if (!$result) {
    die("Query failed: " . mysqli_error($connect));
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" />
    <title>Manage User</title>
    <style>
        body {
            background-color: #FEF8E6; /* Light beige background */
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .container {
            margin-top: 20px;
        }

        .btn-logout {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #F9972F; /* Orange button background */
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: 2px solid #03383F; /* Dark teal border */
            color: #FEF8E6; /* Light beige text */
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-back {
            position: fixed;
            bottom: 20px;
            right: 150px; /* Adjusted position to place it beside the Logout button */
            background-color: #708E8E; /* Teal button background */
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: 2px solid #03383F; /* Dark teal border */
            color: #FEF8E6; /* Light beige text */
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-back:hover, .btn-logout:hover {
            background-color: #9FB3B3; /* Lighter teal on hover */
            color: #03383F; /* Darker text on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Manage User</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Username</th>
                    <th>Mobile</th>
                    <th>Email ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($data['username']); ?></td>
                    <td><?php echo htmlspecialchars($data['mobile']); ?></td>
                    <td><?php echo htmlspecialchars($data['email']); ?></td>
                    <td>
                        <a href="editprof.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="deleteprofile.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="bi bi-trash-fill"></i> Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>

    <a href="adminpage.php" class="btn btn-back">Back</a>
    <a href="../logout.php" class="btn btn-logout">Logout</a>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
