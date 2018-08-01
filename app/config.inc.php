<?php
define('SERVER_NAME', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', 'raul93611');
define('BD_NAME', 'rfp');

define('SERVER', 'http://localhost/rfp/');
define('ERROR', SERVER . 'error');
define('PROFILE', SERVER . 'profile/');
define('LOG_OUT', SERVER . 'log_out');

/**************OPTIONS ADMIN****************************************************/
define('SIGN_IN', PROFILE . 'sign_in');
define('DELETE_USER', PROFILE . 'delete_user');
define('DISABLE_USER', PROFILE . 'disable_user/');
define('ENABLE_USER', PROFILE . 'enable_user/');
/*******************************************************************************/

/********************OPTIONS PROJECTS*******************************************/
define('SAVE_PROJECT', SERVER . 'save_project');
define('INFO_PROJECT', PROFILE . 'info_project/');
define('SAVE_INFO_PROJECT', SERVER . 'save_info_project/');
define('FLOWCHART', PROFILE . 'flowchart/');
define('SAVE_FLOWCHART', SERVER . 'save_flowchart/');
/*******************************************************************************/

/*****************************EXTRA ROUTES**************************************/
define('CSS', SERVER . 'css/');
define('JS', SERVER . 'js/');
define('IMG', SERVER . 'img/');
define('PLUGINS', SERVER . 'plugins/');
define('DIST', SERVER . 'dist/');
/*******************************************************************************/
?>
