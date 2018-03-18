<?php
header("Content-type: text/html; charset=utf-8");
header('Access-Control-Allow-Origin:*');

include 'ResultBean.php';
include 'DbConnet.php' ;

$name = $_POST["name"];
$password = $_POST["password"];
$resultBean = new ResultBean();
$resultBean->code=0;
$resultBean->message='success';
$resultBean->data='success';

function  checkBeforeQuery(){
    global  $name,$resultBean,$password;
    if (!$name) {
        $resultBean->message= 'please input name';
        $resultBean->code =-1 ;
        return false;
    }
    if (!$password) {
        $resultBean->message= 'please input password';
        $resultBean->code =-2 ;
        return false;
    }
    return true;
}

function query(){
    global  $name,$resultBean,$password;

    $dbConnect = new DbConnet() ;
    $conn =$dbConnect->connect();
    if (!$conn) {
        $resultBean->message= 'system error';
        $resultBean->code =-3 ;
        return ;
    }
    $sql = "SELECT * FROM `user` WHERE `nikeName` = '$name' ORDER BY `_id` ASC LIMIT 0, 30 ";
    $result = $conn->query($sql);
    if (!$result) {
        $resultBean->message= 'please register first';
        $resultBean->code =-4 ;
        return ;
    } else {
        $row = mysqli_fetch_array($result);
        if (!$row || count($row) == 0) {
            $resultBean->message= 'please register first';
            $resultBean->code =-4 ;
            return ;
        }
        if ($row["passWord"] == $password) {
            $resultBean->message= 'login success';
            $resultBean->data= $row['_id'];
            $resultBean->code =0 ;
        } else {
            $resultBean->message= 'password error';
            $resultBean->code =0 ;
        }
    }
    mysqli_close($conn);
}

if(checkBeforeQuery()){
    query();
}
echo json_encode($resultBean);