<?php

$id = "table";
$table = new table($db, $id);
$table->setTable("profile");
$types = array("number", "text");
$cols = array("profile_id", "profile_description");
$table->setCols($cols);
$table->setTitles($cols);
$table->setTypes($types);
$table->renderTable();