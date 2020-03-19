<?php
require("controler.php");

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ToDoList</title>
        <link href="style/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    <h1>My To do List</h1>
    <h2>To do</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

            <ul>
                <?php
                    ToDo();
                    up();
                    
                ?>
            </ul>

            <input type="submit" name="save" value="save">

            </form>
        <h2>Done</h2>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                <ul>
                    <?php
                        back();
                        done();
                        
                    ?>
                </ul>

                <input type="submit" name="back" value="back">
            </form>
    <hr>

    <h2>New task</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="newTask">Add new task</label>
            <input type="text" name="newTask" id="newTask">
            
            <input type="submit" name="submit" id="submit">
        </form>
    </body>
</html>

