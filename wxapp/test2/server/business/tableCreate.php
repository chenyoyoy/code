<?php
/**
 * Created by PhpStorm.
 * User: chenyou
 * Date: 2018/2/23
 * Time: 15:26
 */

include_once 'DbConnet.php';

class TableCreater
{

    public function __construct()
    {
    }

    public function create()
    {
        $manager = new DbConnet();
        $connect = $manager->connectDb();
        mysqli_select_db($connect, "activity_join_db");
        $create = "CREATE TABLE IF NOT EXISTS joinInfo(
_id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) NOT NULL ,
phone VARCHAR (255),
PRIMARY KEY (_id)
)";
        $result = mysqli_query($connect, $create);
        if ($result) {
            echo 'create table success';
        } else {
            echo 'create table failed';
        }
        mysqli_close($connect);
    }
}