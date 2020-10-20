<?php

defined('LB') ? null : define('LB', DIRECTORY_SEPARATOR);
 define('SITE_ROOT', LB . 'XAMPP'.LB. 'htdocs'.LB. 'Visi_projektai_php'.LB.'oop1');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.LB.'admin'.LB.'include');



require_once ("functions.php");
require_once ("new_config.php");
require_once ("database.php");
require_once ("db_object.php");
require_once ("class-user.php");
require_once ("class-session.php");

require_once ("class-photo.php");
require_once ("class-comments.php");
require_once ("class-paginate.php");





