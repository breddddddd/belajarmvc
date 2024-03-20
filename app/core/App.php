<?php
class App{
    public function __construct()
    {
        $url = $this->parseURL();
        var_dump ($url);
    }

    public function parseURL()
    {
        if (isset ($_GET['url']))
        {
            //mengambil value url
            $url = $_GET['url'];
            //buang tanda '/' di akhir url
            $url = rtrim($url, '/');
            //filter url dari karakter karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //pecah url berdasarkan tanda '/' sebagai pemisah
            $url = explode ('/', $url);

            return $url;
        }
    }
}