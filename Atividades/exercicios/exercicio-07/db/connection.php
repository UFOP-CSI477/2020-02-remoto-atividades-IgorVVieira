<?php

$dbFile = './db/database.sqlite';

$strConnection = 'sqlite:' . $dbFile;

$connection = new PDO($strConnection);
