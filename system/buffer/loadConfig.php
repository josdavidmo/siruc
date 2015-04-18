<?php

$dir = "system/lang/".LANG_DIR."/";
$handle = opendir($dir);
while ($file = readdir($handle)) {
    if ($file != "." && $file != "..") {
        require_once($dir . $file);
    }
}
closedir($handle);

$path = "system/database";
require_once "$path/Persistence.php";
require_once "$path/PersistenceImpl.php";
$implementor = NULL;
switch (DB_DRIVER) {
    case "MySQL":
        $driver = "MySQLPersistenceImplementor.php";
        require_once "$path/drivers/$driver";
        $implementor = new MySQLPersistenceImplementor(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);
        break;
} 

$dir = "system/classes/dao/";
$handle = opendir($dir);
while ($file = readdir($handle)) {
    if ($file != "." && $file != "..") {
        require_once($dir . $file);
    }
}
closedir($handle);

$dir = "system/classes/model/";
$handle = opendir($dir);
while ($file = readdir($handle)) {
    if ($file != "." && $file != "..") {
        require_once($dir . $file);
    }
}
closedir($handle);

require_once 'system/html/docs/table.php';