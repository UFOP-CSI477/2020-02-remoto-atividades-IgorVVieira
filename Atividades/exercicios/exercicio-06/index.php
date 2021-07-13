<?php

require_once './database/connection.php';

$estados = $connection->query("SELECT * FROM estados");

require_once './estadosView.php';