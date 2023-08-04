<?php

putenv("HOME=/home/technolo");
$output = shell_exec('php composer.phar install 2>&1');
echo "<pre>$output</pre>";

?>