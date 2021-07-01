<form class="form-signin" action="./Login/signin" method="POST">
    <a href="./"><img class="mb-4" src="./assets/icon/logo.png" alt="" width="72" height="72"></a>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
    <div>
        <p>
            Don't you have an Account? <a href="./Register">Register</a>
        </p>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 18520365 - NT213 - HKII - 2021</p>
</form>