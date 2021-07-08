<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <!--LOGO-->
    <a class="navbar-brand" href="/">
        <img src="/assets/icon/logo.png" width="30" height="30" alt="">
        iBlog
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">Hiiiiiii, <?php echo $_SESSION['name']; ?></a>
            </li>
        </ul>
        <ul class="my-2 my-md-0 mr-md-3">
            <a class="nav-link" href="/account/logout">Sign out</a>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search is not ready">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>