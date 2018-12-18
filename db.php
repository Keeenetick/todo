<?php
require "libs/rb.php";
 R::setup( 'mysql:host=localhost;dbname=todo', 'root', '' ); 


        if(!R::testConnection()){
            exit('Нет подключения к БД');
        }
?>