<?php

class DashboardController extends BaseController
{
    public function show()
    {
        //echo htmlspecialchars(nl2br($_REQUEST['txt']));
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $this->callView("master3", [
                "page" => "dashboard"
            ]);
        } else {
            header("Location: /account/login");
        }
    }

    public function upload()
    {
        system('whoami');
        if (isset($_FILES['fileToUpload']) && $_FILES["fileToUpload"]["name"] != "") {
            $target_dir = "/var/www/html/assets/public_img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                header("location: /error");
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $postModel = $this->callModel("PostModel");
                    $postModel->storeImage($_FILES["fileToUpload"]["name"]);
                    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            header("location: /error");
        }
        header("location: /dashboard");
    }
}
