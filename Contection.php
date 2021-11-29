<?php
$coon = mysqli_connect('localhost','admin','Igorek13!','ua92');

if(!$coon){
    echo 'Connection not succeful error:'. mysqli_connect_error();
}else{
    echo 'conecction succesful';
}

?>