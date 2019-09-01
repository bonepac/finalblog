<?php
include 'mysql.php';
mysql_safe_query('DELETE FROM category WHERE id=%s LIMIT 1', $_GET['id']);
redirect('category.php');