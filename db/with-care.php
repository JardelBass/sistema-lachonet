<?php
include "../app/models/connection-class.php";
include "ustawia-bank.php";

$connectionB = new connection();
$connectionB->connectionBD(BANK,HOST,USER,PASSWORD);  