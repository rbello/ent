<?php

// Used by Doctrine

include dirname(__FILE__) . '/../system/init.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);