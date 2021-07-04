<?php

class PostModel extends BaseModel
{
    public function viewPost($slug)
    {
        $stmt = $this->conMysql->prepare("SELECT * 
        FROM tbl_posts
        INNER JOIN tbl_users ON tbl_posts.id_author = tbl_users.id
        INNER JOIN tbl_categories ON tbl_posts.id_category = tbl_categories.id
        WHERE tbl_posts.slug = ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return $arr[] = [
                "author" => $row['username'],
                "cateslug" => $row['slug'],
                "category" => $row['name'],
                "title" => $row['title'],
                "brief" => $row['brief'],
                "img" => $row['img'],
                "content" => $row['content']
            ];
            $stmt->close();
        }
        $stmt->close();
        return $arr[] = [];
    }

    public function listCategories()
    {
        $stmt = $this->conMysql->prepare("SELECT * FROM tbl_categories");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $arr[] = [
                'name' => $row['name'],
                'slug' => $row['slug']
            ];
        }
        $stmt->close();
        return $arr;
    }

    public function listRecents()
    {
        $stmt = $this->conMysql->prepare("SELECT * FROM tbl_posts ORDER BY id DESC LIMIT 0, 4");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $arr[] = [
                'title' => $row['title'],
                'slug' => $row['slug'],
                'brief' => $row['brief'],
                'img' => $row['img']
            ];
        }
        $stmt->close();
        return $arr;
    }

    public function listMostviews()
    {
        $stmt = $this->conMysql->prepare("SELECT * FROM tbl_posts ORDER BY views ASC LIMIT 0, 4");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $arr[] = [
                'title' => $row['title'],
                'slug' => $row['slug'],
                'brief' => $row['brief'],
                'img' => $row['img']
            ];
        }
        $stmt->close();
        return $arr;
    }

    public function listPostCate($slug)
    {
        $stmt = $this->conMysql->prepare("SELECT tbl_posts.title, tbl_posts.slug, tbl_posts.brief, tbl_posts.img 
        FROM tbl_posts 
        INNER JOIN tbl_categories ON tbl_posts.id_category = tbl_categories.id
        WHERE tbl_categories.slug = ?
        ORDER BY tbl_posts.id DESC");

        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $arr[] = [
                'title' => $row['title'],
                'slug' => $row['slug'],
                'brief' => $row['brief'],
                'img' => $row['img']
            ];
        }
        $stmt->close();
        return $arr;
    }

    public function storeImage($path)
    {
        $stmt = $this->conMysql->prepare("INSERT INTO tbl_img (`name`)
        VALUES (?)");
        $stmt->bind_param("s", $path);
        $stmt->execute();
        $stmt->close();
    }
}
