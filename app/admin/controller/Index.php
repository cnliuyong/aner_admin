<?php
namespace app\admin\controller;

use think\facade\View;

use app\admin\controller\Admin;

class Index extends Admin{

    public function index(){
        var_dump($this->version);
    }
}