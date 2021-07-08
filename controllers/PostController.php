<?php

class PostController extends BaseController
{
    public function show($slug = null)
    {
        if ($slug == null) {
            header("Location: /error");
            return;
        } else {
            $PostModel = $this->callModel("PostModel");
            $data = $PostModel->viewPost($slug);
            $id_post = $PostModel->findIdPost($slug);
            $comment = $PostModel->listComment($id_post);
            if ($data != []) {
                $this->callView("master1", [
                    "page" => "view",
                    "data" => [
                        "data" => $data,
                        "slug" => $slug,
                        "comment" => $comment
                    ]
                ]);
            } else {
                $this->callView("master1", [
                    "page" => "error"
                ]);
            }
        }
    }
    public function edit($slug = null)
    {
        if ($slug == null || !isset($_SESSION['id']) || $_SESSION['id'] == '') {
            header("Location: /error");
            return;
        } else {
            $PostModel = $this->callModel("PostModel");
            $data = $PostModel->isOwner($_SESSION['id'], $slug);
            if ($data != []) {
                $this->callView("master1", [
                    "page" => "edit",
                    "data" => [
                        "data" => $data,
                        "slug" => $slug,

                    ]
                ]);
            } else {
                $this->callView("master1", [
                    "page" => "error"
                ]);
            }
        }
    }
    public function comment()
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

        if (isset($_POST['slug']) && $_POST['slug'] != "" && isset($_POST['comment']) && $_POST['comment'] != "") {
            $comment = htmlspecialchars($_POST['comment']);
            $slug  = $_POST['slug'];
            $PostModel = $this->callModel("PostModel");
            $id_post = $PostModel->findIdPost($slug);
            $PostModel->createComment($id_post, $comment);
            header('location: /post/show/' . $slug);
            return;
        } else {
            header("Location: /error");
            return;
        }
    }
}
