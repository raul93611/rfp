<?php

class Redirection {

    public static function redirect($url) {
        header('Location: ' . $url, true, 301);
        exit();
    }

    public static function redirect1($url) {
        echo '<script type="text/javascript">window.location.assign("' . $url . '");</script>';
    }

}

?>
