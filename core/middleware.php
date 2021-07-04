<?php

class Middleware
{
    public function generateCsrf()
    {
        $tmp = bin2hex(random_bytes(32));
        $_SESSION['token'] = $tmp;
        return $tmp;
    }
}
