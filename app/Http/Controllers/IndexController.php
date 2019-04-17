<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Function index
     * 函数的含义说明
     * @access  public
     * @return array
     * @author sunct
     * @time  2019-04-11 17:58
     * @since 1.0
     */
    public function index(){

    }
    /**
     * Function about
     * 函数的含义说明
     * @access  public
     * @return array
     * @author sunct
     * @time  2019-04-11 17:57
     * @since 1.0
     */
    public function about(){
        $aboutTitle="关于";
        $aboutInfo="这是关于文本内容";
        return view('index.about',compact('aboutTitle','aboutInfo'));


    }
}
