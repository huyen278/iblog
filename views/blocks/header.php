<?php
$cat = $this->callController('CategoryController');
$cates = $cat->getCategories();
?>
<!--navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <!--LOGO-->
    <a class="navbar-brand" href="/">
        <img src="/assets/icon/logo.png" width="30" height="30" alt="">
        iBlog
    </a>
    <!--NAV-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php
            if (strpos(strtolower($_SERVER['REQUEST_URI']), 'home') == true) {
                echo '<li class="nav-item active">';
            } else echo '<li class="nav-item">';
            echo '<a class="nav-link" href="/home">Home</a>';
            echo '</li>';
            if ($cates != null) {
                foreach ($cates as $key => $value) {
                    if (strpos(strtolower($_SERVER['REQUEST_URI']), $value['slug']) == true) {
                        echo '<li class="nav-item active">';
                    } else echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="/category/show/' . $value['slug'] . '">' . htmlspecialchars($value['name']) . '</a>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
        <ul class="my-2 my-md-0 mr-md-3">
            <a class="nav-link" href="/dashboard">Write a blog</a>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search is not ready">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>