<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>My Best Friends</title>
    
        <style>
            header {
                background-color : #000000;
                padding: 30px;
                text-align:  center;
                front-size: 35px;
                color: white;
            }

            footer {
                background-color: #000000;
                padding: 10px;
                text-align: center;
                color:white;
            }
        </style>

    </head> 

    <body>

        <header><h1>Friend Book</h1></header>
        </br>

        <form action="" method="post">
            Name: <input type="text" name="name">
            <input type="submit" value="Add new friend">
        </form>
        </br>
        
        <b>My best friends: </b>
        <?php

            $nameFilter = '';
            $arrayList = [];
            $startingWith = '';
            $filename = 'friends.txt';

            if(file_exists($filename))
            {
                $file = fopen( $filename, "r" );
                while (!feof($file)) 
                {
                    $line=fgets($file);
                    if(!empty(trim($line)))
                    {
                        array_push($arrayList, $line);
                    }
                }
                fclose($file);
            }

            if(isset($_POST['name']) && !empty(trim($_POST['name'])))
            {
                array_push($arrayList, trim($_POST['name']));
            }

            if (isset($_POST['delete'])) 
            {
              $indexToBeRemoved = $_POST['delete'];
              unset($arrayList[$indexToBeRemoved]);
              $arrayList = array_values($arrayList);
            }

            $file = fopen( $filename, "w" );
            if(!empty($arrayList))
            {
              foreach($arrayList as $name)
              {
                fwrite($file, $name. "\n");
              }
            }        
            fclose($file);

        ?>

        <form action="" method="post">

        <ul>
            <?php

            if(!empty($arrayList))
            {

                $compteur = 0;

                foreach ($arrayList as $name)
                {
                    if(isset($_POST['nameFilter']) && !empty(trim($_POST['nameFilter'])))
                    {

                       if(isset($_POST['startingWith']) && $_POST['startingWith'] == 'TRUE')
                       {
                            if(substr($name,0,strlen($_POST['nameFilter'])) == $_POST['nameFilter'])
                            {
                                echo (!empty(trim($name))) ? '<li>'.$name.' <button type="submit" name="delete" value="'.$compteur.'">Delete</button></li>' : '';
                            }
                            $startingWith = 'TRUE';
                       }
                       else
                       {
                        if(strstr($name,$_POST['nameFilter']))
                           {
                            echo (!empty(trim($name))) ? '<li>'.$name.' <button type="submit" name="delete" value="'.$compteur.'">Delete</button></li>' : '';
                           }
                       }
                       $nameFilter=$_POST['nameFilter'];
                       
                    }
                    else 
                    {
                        echo (!empty(trim($name))) ? '<li>'.$name.' <button type="submit" name="delete" value="'.$compteur.'">Delete</button></li>' : '';
                    }
                $compteur++;
                }

            }

            ?>

        </ul>
    
        </form>

        <form action="" method="post">
            <input type="text" name="nameFilter" value="<?=$nameFilter?>"> 
            <input type="submit" value="Filter List"> 

            <input type="checkbox" name="startingWith" 
            <?php if ($startingWith=='TRUE') echo "checked";?> 
            value="TRUE">Only names starting with</input>

        </form>
        </br>

        <footer> By Guillaume Ky</footer>
    </body>
</html>