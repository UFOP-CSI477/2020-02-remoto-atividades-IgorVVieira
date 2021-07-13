<?php

$dbFile = './database/database.sqlite';

$strConnection = 'sqlite:' . $dbFile;

$connection = new PDO($strConnection);
