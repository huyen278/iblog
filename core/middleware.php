<?php

class Middleware
{
    public function generateCsrf()
    {
        $tmp = bin2hex(random_bytes(32));
        $_SESSION['token'] = $tmp;
        return $tmp;
    }

    public function filterConent($content)
    {
        $content = $this->replace($content, '<script');
        $content = $this->replace($content, '<script');
        $content = $this->replace($content, '<iframe');
        $content = $this->replace($content, '</iframe');
        $content = $this->replace($content, '<head');
        $content = $this->replace($content, '</head');
        $content = $this->replace($content, '<body');
        $content = $this->replace($content, '</body');
        $content = $this->replace($content, '<base');
        $content = $this->replace($content, '</base');
        $content = $this->replace($content, '<button');
        $content = $this->replace($content, '</button');
        $content = $this->replace($content, '<canvas');
        $content = $this->replace($content, '</canvas');
        $content = $this->replace($content, '<embed');
        $content = $this->replace($content, '</embed');
        $content = $this->replace($content, '<audio');
        $content = $this->replace($content, '</audio');
        $content = $this->replace($content, '<video');
        $content = $this->replace($content, '</video');
        $content = $this->replace($content, '<svg');
        $content = $this->replace($content, '</svg');
        $content = $this->replace($content, '<style');
        $content = $this->replace($content, '</style');
        $content = $this->replace($content, '<xml');
        $content = $this->replace($content, '</xml');
        $content = $this->replace($content, '<frameset');
        $content = $this->replace($content, '</frameset');
        $content = $this->replace($content, '<html');
        $content = $this->replace($content, '</html');
        $content = $this->replace($content, '<input');
        $content = $this->replace($content, '</input');

        return $content;
    }

    public function filterPhpCode($content)
    {
        while (stripos($content, '<?php') !== false) {
            $content = str_ireplace('<?php', '&lt;?php', $content);
        }
        return $content;
    }

    public function replace($content, $tag)
    {
        while (stripos($content, $tag) !== false) {
            $tmp = preg_replace("/[^\/a-zA-Z]+/", "", $tag);
            $content = str_ireplace($tag, '&lt;' . $tmp, $content);
        }
        return $content;
    }

    public function newSlug($slug, $count)
    {
        return $slug . '-' . $count;
    }

    public function creatSlug($text)
    {
        $divider = '-';
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function createNameImg($name)
    {
        return str_ireplace(' ', '-', $name);
    }
}
