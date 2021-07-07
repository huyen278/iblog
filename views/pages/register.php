<form class="form-signin" method="POST">
    <a href="/"><img class="mb-4" src="/assets/icon/logo.png" alt="" width="72" height="72"></a>
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <label for="username" class="sr-only">Username</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <label for="repassword" class="sr-only">Re-Password</label>
    <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Re-Password" required>
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <a class="btn btn-lg btn-light btn-block" href="/account/login">Back to Login</a>
    <p class="mt-5 mb-3 text-muted">&copy; 18520365 - NT213 - HKII - 2021</p>
</form>