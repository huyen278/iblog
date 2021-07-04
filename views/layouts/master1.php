<!DOCTYPE html>

<head>
    <title>iBlog</title>
    <meta charset="UTF-8">
    <meta name="author" content="rimc2t">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/icon/logo.png" />
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

    <script src="/assets/js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.slim.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

</body>