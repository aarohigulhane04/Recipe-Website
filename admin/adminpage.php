<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        /* Centering content on the page */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #FEF8E6; /* Light beige background */
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        h1 {
            color: #03383F; /* Dark teal text */
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn-custom {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: 2px solid #03383F; /* Dark teal border */
            background-color: #F9972F; /* Orange button background */
            color: #FEF8E6; /* Light beige text */
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-custom:hover {
            background-color: #FFBC3B; /* Lighter orange on hover */
            color: #03383F; /* Dark teal text on hover */
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1>HELLO ADMIN</h1>
    <div class="button-container">
        <a href="addrecipe.php" class="btn-custom">Add Recipes</a>
        <a href="manageusers.php" class="btn-custom">Manage Users</a>
    </div>
</body>

</html>
