<?php
include('../config/constants.php');

session_unset();
session_destroy();

header("Location:".HOMEURL.'index.php');
exit();