<?php

class AccountController extends BaseController
{
    public function show()
    {
        http_response_code(404);
        $this->callView("master1", [
            "page" => "error"
        ]);
    }

    public function login()
    {
        $this->token = $this->mdw->generateCsrf();

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            header("Location: /dashboard");
        }

        if (isset($_POST['token'])) {
            if (!hash_equals($_POST['token'], $_SESSION['token'])) {
                header("Location: /error");
            }
        }

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $userModel = $this->callModel("UserModel");
            $rs = $userModel->findUserPassword($_POST['username'], md5($_POST['password']));
            if ($rs) {
                header("Location: /dashboard");
            }
        }

        $this->callView("master2", [
            "page" => "login"
        ]);
    }

    public function register()
    {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword'])) {
            if ($_POST['username'] != "" && $_POST['password'] != "" && $_POST['repassword'] != "") {
                if ($_POST['password'] === $_POST['repassword']) {
                    $userModel = $this->callModel("UserModel");
                    $rs = $userModel->findUser($_POST['username']);
                    if (!$rs) {
                        $userModel->createUser($_POST['username'], md5($_POST['password']));
                        header("Location: /account/login");
                    }
                }
            }
        }
        $this->callView("master2", [
            "page" => "register"
        ]);
    }

    public function logout()
    {
        session_destroy();
        header("Location: /account/login");
    }
}
