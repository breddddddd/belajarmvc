<?php

class About 
{
    public function index()
    {
        echo "Anda Masuk Class About dan Method Index";
    }
    public function page($name ="andre", $pekerjaan = "programmer")
    {
        echo "halo nama saya $name, saya adalalah $pekerjaan";
    }
}