<!DOCTYPE html>

<head>
    <title>iBlog</title>
    <meta charset="UTF-8">
    <meta name="author" content="rimc2t">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/fontawsome.min.css">
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="shortcut icon" href="./asset/icon/logo.png" />
</head>

<body>
    <!--HEADER-->
    <?php
    require_once "./views/blocks/header.php";
    ?>
    <!--CONTENT-->
    <?php
    if (isset($data["page"])) {
        require_once "./views/pages/" . $data["page"] . ".php";
    }
    ?>

    <!--FOOTER-->
    <?php
    require_once "./views/blocks/footer.php";
    ?>

    <script src="./asset/js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./asset/js/jquery.min.js"></script>
    <script src="./asset/js/jquery.slim.min.js"></script>
    <script src="./asset/js/popper.min.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>

</body>