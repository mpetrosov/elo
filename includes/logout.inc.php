<?php

include_once 'auth.inc.php';

logout();

header("Location: ../index.php?logout=success");
exit();