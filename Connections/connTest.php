<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connTest = "localhost:8889";
$database_connTest = "registrations";
$username_connTest = "admin";
$password_connTest = "admin";
$connTest = mysql_pconnect($hostname_connTest, $username_connTest, $password_connTest) or trigger_error(mysql_error(),E_USER_ERROR); 
?>