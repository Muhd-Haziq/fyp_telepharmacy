<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="uploadPrescFile.php" method="post" enctype="multipart/form-data">
            <input type="file" name="presc"/>
            <input type="number" name="room_id"/>
            
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>
