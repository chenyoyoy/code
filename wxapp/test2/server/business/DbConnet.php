<?php
/**
 * Created by PhpStorm.
 * User: chenyou
 * Date: 2018/2/9
 * Time: 16:41
 */

class DbConnet
{
    public function __construct()
    {
    }
    public function connect(){
        $dbhost ='localhost:3306';  // mysql服务器主机地址
        $dbuser = 'root';            // mysql用户名
        $dbpass = 'binye4021';          // mysql用户名密码
        $dbname = 'actRegistDb';          // mysqldb名称
        return new mysqli($dbhost, $dbuser, $dbpass, $dbname) ;
    }
}