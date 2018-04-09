<?php
/**
 * Created by PhpStorm.
 * User: chenyou
 * Date: 2018/2/23
 * Time: 15:06
 */
include_once 'DbConnet.php';

class DbCreater
{

    public function __construct()
    {
    }

    public function create()
    {
        $manager = new DbConnet();
        $connect = $manager->connectManger();
        $exist = mysqli_select_db($connect, "activity_join_db");
        if ($exist) {
            echo "db is exist";
            return;
        }
        $create = "CREATE DATABASE activity_join_db";
        $result = mysqli_query($connect, $create);
        if ($result) {
            echo "create success";
        } else {
            echo "create failed";
        }
    }

}