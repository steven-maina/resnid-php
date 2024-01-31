<?php

    $link = mysqli_connect("localhost","root","root@26","oresnd_realestate");
    if (!$link)
    {
        echo "MySQL Error: " . mysqli_connect_error();
    }
?>