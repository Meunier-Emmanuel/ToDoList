<?php 
require('model.php');


function up(){
    if(!empty($_POST['checkBox']))
    {
        $checkBox=verifyInput($_POST['checkBox']);
        upDate();
        header("location:read.php");
    }
}

function back(){
    if(!empty($_POST['checkBoxDone']))
    {
        $checkBox=verifyInput($_POST['checkBoxDone']);
        rollBack();
        header("location:read.php");
    }
}

if(!empty($toDo))
{
    $toDo=verifyInput($_POST['newTask']);
    add();
    header("location:read.php");
}

function verifyInput($var)
{
    $var = filter_var($var,FILTER_SANITIZE_STRING);
    $var = trim ($var);
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlspecialchars($var);
    return $var;
}

