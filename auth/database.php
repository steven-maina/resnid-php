<?php

    $link = mysqli_connect("localhost","root","","oresnd_realestate");
    if (!$link)
    {
        echo "MySQL Error: " . mysqli_connect_error();
    }
?>