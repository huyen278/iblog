<?php

class DashboardController extends BaseController
{
    function __construct()
    {
        if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
            header("Location: /account/login");
            return;
        }
    }

    public function show()
    {
        //echo htmlspecialchars(nl2br($_REQUEST['txt']));
        $postModel = $this->callModel("PostModel");
        $img = $postModel->listImage($_SESSION['id']);
        $post = $postModel->listPost($_SESSION['id']);
        $this->callView("master3", [
            "page" => "dashboard",
            "data" => [
                "listImg" => $img,
                "listPost" => $post
            ]
        ]);
    }

    public function create()
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

        if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['cat'])) {
            $title = htmlspecialchars($_POST['title']);
            $brief = htmlspecialchars($_POST['brief']);
            $date = date("Y-m-d H:i:s");

            //Create slug
            require_once "./core/middleware.php";
            $m = new Middleware();
            $slug = $m->creatSlug($_POST['title']);
            $postModel = $this->callModel("PostModel");
            $rs = $postModel->countSlug($slug);
            if ($rs) {
                $slug = $m->newSlug($slug, $rs);
            }

            //Find id category
            $id_cat = $postModel->findIdCat($_POST['cat']);

            //Filter content
            $content = $m->filterConent($_POST['content']);
            $content = $m->filterPhpCode($content);
            $content = nl2br($content);

            $postModel->createPost($_SESSION['id'], $id_cat, $brief, $slug, $brief, 0, $_POST['thumb'], $content, $date);
            header('location: /dashboard');
            return;
        } else {
            header('location: /error');
            return;
        }
    }

    public function edit()
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

        if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['cat']) && isset($_POST['slug']) && ($_POST['slug']) != "") {
            $title = htmlspecialchars($_POST['title']);
            $brief = htmlspecialchars($_POST['brief']);
            $date = date("Y-m-d H:i:s");

            require_once "./core/middleware.php";
            $m = new Middleware();
            $postModel = $this->callModel("PostModel");

            //Find id category
            $id_cat = $postModel->findIdCat($_POST['cat']);

            //Filter content
            $content = $m->filterConent($_POST['content']);
            $content = $m->filterPhpCode($content);
            $content = nl2br($content);
            $slug = $_POST['slug'];
            $postModel->updatePost($_SESSION['id'], $id_cat, $title, $slug, $brief, $_POST['thumb'], $content, $date);
            header('location: /post/show/' . $slug);
            return;
        } else {
            header('location: /error');
            return;
        }
    }

    public function upload()
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

        if (isset($_FILES['fileToUpload']) && $_FILES["fileToUpload"]["name"] != "") {
            $uploadOk = 1;
            //Create best name image
            $target_dir = "/var/www/html/assets/public_img/";
            require_once "./core/middleware.php";
            $m = new Middleware();
            $tmp_name = $m->createNameImg(basename($_FILES["fileToUpload"]["name"]));
            $target_file = $target_dir . $tmp_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $imageFileName = pathinfo($target_file, PATHINFO_FILENAME);
            $imageFileName = str_ireplace('.', '-', $imageFileName);
            // Check if file already exists
            if (file_exists($target_file)) {
                $tmp_count = 1;
                while (file_exists($target_dir . $imageFileName . '-' . $tmp_count . '.' . $imageFileType)) {
                    $tmp_count++;
                }
                $target_file = $target_dir . $imageFileName . '-' . $tmp_count . '.' . $imageFileType;
                $imageFileName = $imageFileName . '-' . $tmp_count . '.' . $imageFileType;
            }

            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                }
            }


            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                //echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (
                $imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
                && $imageFileType != "gif"
            ) {
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                header("location: /error");
                return;
            } else { // if everything is ok, try to upload file
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $postModel = $this->callModel("PostModel");
                    $date = date("Y-m-d H:i:s");
                    $postModel->storeImage($_SESSION['id'], $imageFileName, $date);
                    //echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                    header("location: /error");
                    return;
                }
            }
        } else {
            header("location: /error");
            return;
        }
        header("location: /dashboard");
    }

    public function profile()
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
                    $date = date("Y-m-d H:i:s");
                    $username = htmlspecialchars($_POST['username']);
                    $userModel = $this->callModel("UserModel");
                    $userModel->updateUser($_SESSION['id'], $username, password_hash($_POST['password'], PASSWORD_BCRYPT), $date);
                    header("Location: /dashboard");
                    return;
                }
            }
        }
        header("Location: /error");
    }
}
