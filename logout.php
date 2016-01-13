<?php
/**
  * Created by SublimeText3
 * User: Marina Helie
 * Date: 10/01/2016
 */
session_start();
session_unset();
session_destroy();
header("Location: header.php");
?>