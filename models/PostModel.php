<?php

class PostModel extends BaseModel
{
    public function createComment($id_post, $comment)
    {
        $stmt = $this->conMysql->prepare("INSERT INTO tbl_comments (id_post, comment) 
        VALUES (?, ?)");
        $stmt->bind_param('ss', $id_post, $comment);
        $stmt->execute();
        $stmt->close();
    }

    public function createPost($id_author, $id_cat, $title, $slug, $brief, $views, $img, $content, $date)
    {
        $stmt = $this->conMysql->prepare("INSERT INTO `db_iblog`.`tbl_posts` (`id_author`, `id_category`, `title`, `slug`, `brief`, `views`, `img`, `content`, `create_at`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $id_author, $id_cat, $title, $slug, $brief, $views, $img, $content, $date);
        $stmt->execute();
        $stmt->close();
    }

    public function updatePost($id, $id_cat, $title, $slug, $brief, $img, $content, $date)
    {
        if ($id != 1) {
            $stmt = $this->conMysql->prepare("UPDATE tbl_posts
            SET id_category = ?, `title` = ?, `brief` = ?, img = ?, `content` = ?, update_at = ?
            WHERE id_author = ? and slug = ?");
            $stmt->bind_param("ssssssss", $id_cat, $title, $brief, $img, $content, $date, $id, $slug);
        } else {
            $stmt = $this->conMysql->prepare("UPDATE tbl_posts
            SET id_category = ?, `title` = ?, `brief` = ?, img = ?, `content` = ?, update_at = ?
            WHERE slug = ?");
            $stmt->bind_param("sssssss", $id_cat, $title, $brief, $img, $content, $date, $slug);
        }
        $stmt->execute();
        $stmt->close();
    }

    public function isOwner($id_author, $slug)
    {
        if ($id_author != 1) {
            $stmt = $this->conMysql->prepare("SELECT * 
            from tbl_posts
            where id_author = ?
            and slug = ?
            and delete_at is null");
            $stmt->bind_param('ss', $id_author, $slug);
        } else {
            $stmt = $this->conMysql->prepare("SELECT * 
            from tbl_posts
            where  slug = ?
            and delete_at is null");
            $stmt->bind_param('s', $slug);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            return [
                'title' => $row['title'],
                'id_cat' => $row['id_category'],
                'brief' => $row['brief'],
                'img' => $row['img'],
                'content' => $row['content']
            ];
        }
        $stmt->close();
        return $arr[] = [];
    }

    public function viewPost($slug)
    {
        $stmt = $this->conMysql->prepare("SELECT * 
        FROM tbl_posts
        INNER JOIN tbl_users ON tbl_posts.id_author = tbl_users.id
        INNER JOIN tbl_categories ON tbl_posts.id_category = tbl_categories.id
        WHERE tbl_posts.slug = ? AND delete_at is null");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            return [
                "author" => $row['username'],
                "cateslug" => $row['slug'],
                "category" => $row['name'],
                "title" => $row['title'],
                "brief" => $row['brief'],
                "img" => $row['img'],
                "content" => $row['content']
            ];
        }
        $stmt->close();
        return $arr[] = [];
    }

    public function listPost($id)
    {
        if ($id != 1) {
            $stmt = $this->conMysql->prepare("SELECT `slug`, `title` 
            FROM tbl_posts 
            where id_author = ? 
            and delete_at is null");
            $stmt->bind_param('i', $id);
        } else {
            $stmt = $this->conMysql->prepare("SELECT `slug`, `title` FROM tbl_posts where delete_at is null");
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = [
                    'slug' => $row['slug'],
                    'title' => $row['title']
                ];
            }
            $stmt->close();
            return $arr;
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
        $stmt = $this->conMysql->prepare("SELECT * FROM tbl_posts where delete_at is null ORDER BY id DESC LIMIT 0, 4");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows) {
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
        $stmt->close();
        return $arr[] = [];
    }

    public function listMostviews()
    {
        $stmt = $this->conMysql->prepare("SELECT * FROM tbl_posts where delete_at is null ORDER BY views ASC LIMIT 0, 4");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows) {
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
        $stmt->close();
        return $arr[] = [];
    }

    public function listPostCate($slug)
    {
        $stmt = $this->conMysql->prepare("SELECT tbl_posts.title, tbl_posts.slug, tbl_posts.brief, tbl_posts.img 
        FROM tbl_posts 
        INNER JOIN tbl_categories ON tbl_posts.id_category = tbl_categories.id
        WHERE tbl_categories.slug = ? and delete_at is null
        ORDER BY tbl_posts.id DESC");

        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows) {
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
        $stmt->close();
        return $arr[] = [];
    }

    public function listComment($id_post)
    {
        $stmt = $this->conMysql->prepare("SELECT comment
        from tbl_comments 
        where id_post = ?
        order by id DESC");
        $stmt->bind_param('s', $id_post);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = [
                    'comment' => $row['comment']
                ];
            }
            $stmt->close();
            return $arr;
        }
        $stmt->close();
        return $arr[] = [];
    }

    public function listImage($id)
    {
        if ($id != 1) {
            $stmt = $this->conMysql->prepare("SELECT `name` FROM tbl_img where id_owner = ? and delete_at is null");
            $stmt->bind_param('i', $id);
        } else {
            $stmt = $this->conMysql->prepare("SELECT `name` FROM tbl_img where delete_at is null");
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = [
                    'name' => $row['name']
                ];
            }
            $stmt->close();
            return $arr;
        }
        $stmt->close();
        return $arr[] = [];
    }

    public function storeImage($id, $name, $date)
    {
        $stmt = $this->conMysql->prepare("INSERT INTO tbl_img (`id_owner`, `name`, `create_at`)
        VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $id, $name, $date);
        $stmt->execute();
        $stmt->close();
    }

    public function findIdCat($name)
    {
        $stmt = $this->conMysql->prepare("SELECT `id` FROM tbl_categories where `name` = ?");
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            return $row['id'];
        }
        $stmt->close();
        return '0';
    }

    public function findIdPost($slug)
    {
        $stmt = $this->conMysql->prepare("SELECT `id` FROM tbl_posts where `slug` = ?");
        $stmt->bind_param('s', $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            return $row['id'];
        }
        $stmt->close();
        return '0';
    }

    public function findSlug($slug)
    {
        $stmt = $this->conMysql->prepare("SELECT `slug` FROM tbl_posts where slug = ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            return true;
        }
        $stmt->close();
        return false;
    }

    public function countSlug($slug)
    {
        $stmt = $this->conMysql->prepare("SELECT count(slug) as c 
        FROM tbl_posts 
        where slug = ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            return $row['c'];
        }
        $stmt->close();
        return 0;
    }
}
