<?php
define('SERVER_NAME', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', 'raul93611');
define('BD_NAME', 'rfp');

define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('NOMBRE_BD', 'elogic');

define('SERVER', 'http://192.168.1.80/rfp/');
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
define('SAVE_INFO_PROJECT_AND_SERVICES', SERVER . 'save_info_project_and_services/');
define('DELETE_PROJECT', SERVER . 'delete_project/');
define('SAVE_INFO_PROJECT', SERVER . 'save_info_project/');
define('FLOWCHART', PROFILE . 'flowchart/');
define('SAVE_FLOWCHART', SERVER . 'save_flowchart/');
define('DELETE_DOCUMENT', SERVER . 'delete_document/');
define('INFO_PROJECT_AND_SERVICES', PROFILE . 'info_project_and_services/');
/*******************************************************************************/
/********************************SERVICES OPTIONS*******************************/
define('ADD_STAFF', PROFILE . 'add_staff/');
define('SAVE_STAFF', SERVER . 'save_staff/');
define('EDIT_SINGLE_STAFF', PROFILE . 'edit_single_staff/');
define('SAVE_EDIT_SINGLE_STAFF', SERVER . 'save_edit_single_staff/');
define('ADD_COST', PROFILE . 'add_cost/');
define('SAVE_COST', SERVER . 'save_cost/');
define('EDIT_COST', PROFILE . 'edit_cost/');
define('SAVE_EDIT_COST', SERVER . 'save_edit_cost/');
/********************************************************************************/
/*****************************SEND ERROR QUOTE EMAIL****************************/
define('SEND_ERROR_QUOTE_EMAIL', SERVER . 'send_error_quote_email');
/*******************************************************************************/
/*****************************EXTRA ROUTES**************************************/
define('CSS', SERVER . 'css/');
define('JS', SERVER . 'js/');
define('IMG', SERVER . 'img/');
define('PLUGINS', SERVER . 'plugins/');
define('DIST', SERVER . 'dist/');
define('DOCS', SERVER . 'documents/');
/*******************************************************************************/
?>
