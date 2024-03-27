<?php
class App{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        //controller
        if (file_exists('../app/controllers/' . $url[0] . '.php'))
        {
            $this -> controller = $url[0];
            unset ($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if(isset($url[1]))
        {
            if (method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if(!empty($url))
        {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
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