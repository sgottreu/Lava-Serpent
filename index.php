<?php

include('database.inc');

mysql_connect(DBHOST,DBUSER,DBPASS);
mysql_select_db('wordpress');

if(isset($_REQUEST['controller']))
{
    $cls = "Controller_" . ucfirst($_REQUEST['controller']);
    if(isset($_REQUEST['view']))
    {
        $view = $_REQUEST['view'];
    }
    $controller = new $cls($_POST, $view);
    if($view)
    {
        $controller->$view();
    }
}
else
{
    include('views/home.php');
}

/** Use autoload to include my classes as I need them.
 *  I understand the documentation suggests using spl_autoload_register, but I've not used it before
 *   and I am using autoload based on the time constraints of this project
 ***/

function __autoload($cls) {
    include "$cls.php";
}

