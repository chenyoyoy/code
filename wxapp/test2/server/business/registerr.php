<?php
header("Content-type: text/html; charset=utf-8");
header('Access-Control-Allow-Origin:*');

include 'ResultBean.php';
include_once  'DbCreate.php';
include 'tableCreate.php';

$name = $_POST["name"];
$phone = $_POST["phone"];
$resultBean = new ResultBean();
$resultBean->code = -1;
$resultBean->message = 'success';
$resultBean->data = 'success';

function checkBeforeQuery()
{
    global $name, $resultBean, $phone;
    if (!$name) {
        $resultBean->message = 'please input name';
        $resultBean->code = -1;
        return false;
    }
    if (!$phone) {
        $resultBean->message = 'please input password';
        $resultBean->code = -2;
        return false;
    }
    return true;
}

function beforeRegister()
{
    global $resultBean, $phone;
    if(!checkBeforeQuery()){
        return;
    }
    $dbConnect = new DbConnet();
    $conn = $dbConnect->connectDb();
    if (!$conn) {
        $resultBean->message = 'system error';
        $resultBean->code = -3;
    }else{
        $sql = "SELECT * FROM `joinInfo` WHERE `phone` = '$phone' ORDER BY `_id` ASC LIMIT 0, 1 ";
        $result = mysqli_query($conn,$sql);
        if (mysqli_fetch_array($result)) {
            $resultBean->message = "had registered ";
            $resultBean->code = -7;
        } else {
            register($conn);
        }
    }

    mysqli_close($conn);
}

function register($conn)
{
    global $name, $resultBean, $phone;
    $sql = "INSERT INTO joinInfo (name,phone) VALUES ('$name','$phone')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $resultBean->message = "register success ";
        $resultBean->code = 0;
    } else {
        $resultBean->message = "register fail ";
        $resultBean->code = -5;
        $resultBean->data = "";
    }
}

$dbcreate =new DbCreater();
$dbcreate->create();

$table = new TableCreater();
$table->create();

beforeRegister();
echo json_encode($resultBean);
