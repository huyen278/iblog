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
        //CSRF token
        if (!isset($_SESSION['token'])) {
            $this->token = $this->mdw->generateCsrf();
        }

        if (isset($_POST['token'])) {
            if (!hash_equals($_POST['token'], $_SESSION['token'])) {
                unset($_SESSION["token"]);
                header("Location: /error");
                return;
            }
        }

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            header("Location: /dashboard");
        }

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $userModel = $this->callModel("UserModel");
            $rs = $userModel->findUserPassword($_POST['username'], $_POST['password']);
            if ($rs) {
                header("Location: /dashboard");
                return;
            }
        }

        $this->callView("master2", [
            "page" => "login"
        ]);
    }

    public function register()
    {
        //CSRF token
        if (!isset($_SESSION['token'])) {
            $this->token = $this->mdw->generateCsrf();
        }

        if (isset($_POST['token'])) {
            if (!hash_equals($_POST['token'], $_SESSION['token'])) {
                unset($_SESSION["token"]);
                header("Location: /error");
                return;
            }
        }

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword'])) {
            if ($_POST['username'] != "" && $_POST['password'] != "" && $_POST['repassword'] != "") {
                if ($_POST['password'] === $_POST['repassword']) {
                    $username = htmlspecialchars($_POST['username']);
                    $userModel = $this->callModel("UserModel");
                    $rs = $userModel->findUser($username);
                    if (!$rs) {
                        $userModel->createUser($username, password_hash($_POST['password'], PASSWORD_BCRYPT));
                        header("Location: /account/login");
                        return;
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
        unset($_SESSION['loggedin']);
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['role']);
        header("Location: /account/login");
    }
}
