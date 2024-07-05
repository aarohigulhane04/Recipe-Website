<?php
session_start();

include("../dbconnect.php");



if (isset($_POST["upload_button"])) {
    $filename = $_FILES["image"]["tmp_name"];
    $orgfilename = $_FILES["image"]["name"];

    $fileInfo = pathinfo($orgfilename);
    $ext = strtolower($fileInfo['extension']);

    $allowtypes = array('jpg', 'png');

    if (in_array($ext, $allowtypes)) {
        $target_path = "../images/$orgfilename";
        if (move_uploaded_file($filename, $target_path)) {
            $title = $_POST["title"];
            $author = $_POST["author_id"];
            $description = $_POST["description"];
            $ingrd = $_POST["ingredients"];
            $step = $_POST["steps"];
            $desc = mysqli_real_escape_string($connect, $description);

             $qry = "INSERT INTO `recipes` (`title`, `authorid`, `description`, `ingredients`, `steps`, `image`) VALUES ('$title', '$author', '$desc', '$ingrd', '$step', '$orgfilename')";

            $result = mysqli_query($connect, $qry);

            if ($result) {
                echo '<script>alert("Uploaded successfully");</script>';
            } else {
                echo '<script>alert("Database error");</script>';
            }
        } else {
            echo '<script>alert("Failed to upload file");</script>';
        }
    } else {
        echo '<script>alert("Invalid file extension");</script>';
    }
        }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe - Home Chef</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            background-color: #FEF8E6;
            color: #03383F;
        }

        .container {
            margin-top: 50px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-submit {
            background-color: #F9972F;
            color: #FEF8E6;
            border: none;
        }

        .btn-submit:hover {
            background-color: #FFBC3B;
            color: #03383F;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Recipe</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="author_id">Author ID:</label>
                <input type="text" class="form-control" id="author_id" name="author_id" placeholder="Enter author ID">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients:</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="5" placeholder="Enter ingredients"></textarea>
            </div>
            <div class="form-group">
                <label for="steps">Steps:</label>
                <textarea class="form-control" id="steps" name="steps" rows="5" placeholder="Enter steps"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image File:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-submit" name="upload_button"><i class="bi bi-plus-lg"></i> Add Recipe</button>
            <a href="../logout.php" class="btn btn-submit">Logout</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/js/bootstrap-select.min.js"></script>
</body>

</html>