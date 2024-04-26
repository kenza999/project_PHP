<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail de Missions Freelance</title>
  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>

    * {
    box-sizing: border-box;
    padding: 0;
    margin: auto;
    }

        body {
            font-family: 'cabin';

            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            padding-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar nav {
            padding-top: 20px;
        }

        .sidebar p {
            color: #495057;
            padding: 10px 16px;
            margin-bottom: 0;
            font-size: 18px;
        }

        .sidebar a {
            background-color: hsl(230, 100%, 97%);
            color: #495057;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 900;
            border: 1px solid rgb(105, 149, 231);
            border-radius: 15px 15px 15px 15px;
            margin: 3px 3px;
        }

        .sidebar a:hover {
            background-color: #f8f9fa;
            color:  hsl(230, 75%, 56%);
        }
        .container{
            width: 600px;
             */
            margin: auto;
            margin-top: 50px;
        }

        hr {
            border: 0;
            clear: both;
            display: block;
            width: 50%;
            background-color: #6c757d;
            height: 1px;
            margin: 20px auto;
        }
        .iconMS{
            width: 30px;
            height: 30px;
            padding: 5px;
        }
        .titre{
            text-align: center;
            font-size: bold;
        }
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        display: none;
    }

    header {
        text-align: left;
        padding: 10px;
    }
}

@media (max-width: 576px) {
    .sidebar a {
        padding: 10px 15px;
        font-size: 14px;
    }

    .titre {
        font-size: 16px;
    }
}
@media (max-width: 1180px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        display: none;
    }

    header {
        text-align: left;
        padding: 10px;
    }
}
    </style>

    <?php include __DIR__ . "/nav.html.php"; ?>
    <?php include __DIR__ . "/../views/message.html.php";?>