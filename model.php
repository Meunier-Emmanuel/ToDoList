<?php

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function dbSelect()
{
    $db = dbConnect();
    $dataList =$db->query(
        'SELECT  *
        FROM todos');
        
    return $dataList;
}

function ToDo()
{   
    $dataList=dbSelect();
    while($toDoList=$dataList->fetch(PDO::FETCH_ASSOC))
    {  
        if($toDoList["done"]==0)
        {
            echo "<li>".'<input type="checkbox" name="checkBox[]" value='.$toDoList['id'].'>'.$toDoList["ToDo"]."</li>";
        }
        
    }
}
function done()
{   
    $dataList=dbSelect();
    while($toDoList=$dataList->fetch(PDO::FETCH_ASSOC))
    {  
        if($toDoList["done"]==1)
        {
            echo "<li>".'<span class="strike">'.'<input type="checkbox" name="checkBoxDone[]" value='.$toDoList['id'].'>'.$toDoList["ToDo"]."</span>"."</li>";
        }
        
    }
}

function add()
{
    $db = dbConnect();
    $newTask = $db->prepare(
        'INSERT INTO todos(ToDo,done)
        VALUES(:ToDo,0);
        ');
    $newTask->execute([
        'ToDo'=> $_POST['newTask'],
    ]);
}

function upDate()
{
    $db = dbConnect();
    if(isset($_POST['checkBox'])){
        $checkBoxes=$_POST['checkBox'];
            foreach ($checkBoxes as $id) 
            {
                if(isset($_POST['save']))
                {
                    $upDate = $db->prepare(
                        "UPDATE todos 
                        SET done = :done
                        WHERE id =$id");
                    $upDate->execute([
                        'done'=>"1",
                    ]);
                }
            }
        }
    
}


function rollBack()
{
    $db = dbConnect();
    if(isset($_POST['checkBoxDone'])){
        $checkBoxesDone=$_POST['checkBoxDone'];
            foreach ($checkBoxesDone as $id) 
            {
                if(isset($_POST['back']))
                {
                    $upDate = $db->prepare(
                        "UPDATE todos 
                        SET done = :done
                        WHERE id =$id");
                    $upDate->execute([
                        'done'=>"0",
                    ]);
                }
            }
        }
    
}