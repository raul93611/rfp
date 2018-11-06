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
/**************************CALENDARS*******************************************/
define('CALENDAR_NEW_PROJECTS', PROFILE . 'calendar_new_projects');
define('CALENDAR_MY_PROJECTS', PROFILE . 'calendar_my_projects');
define('CALENDAR_PROJECTS', PROFILE . 'calendar_projects');
define('CALENDAR_MY_TASKS', PROFILE . 'calendar_my_tasks');
/**************OPTIONS ADMIN****************************************************/
define('SIGN_IN', PROFILE . 'sign_in');
define('DELETE_USER', PROFILE . 'delete_user');
define('DISABLE_USER', SERVER . 'disable_user/');
define('ENABLE_USER', SERVER . 'enable_user/');
define('EDIT_USER', PROFILE . 'edit_user/');
define('SAVE_EDIT_USER', SERVER . 'save_edit_user/');
/*******************************************************************************/
/****************************SEARCH*********************************************/
define('SEARCH', PROFILE . 'search');
/********************OPTIONS PROJECTS*******************************************/
define('SAVE_PROJECT', SERVER . 'save_project');
define('INFO_PROJECT', PROFILE . 'info_project/');
define('SAVE_INFO_PROJECT_AND_SERVICES', SERVER . 'save_info_project_and_services');
define('DELETE_PROJECT', SERVER . 'delete_project/');
define('DELETE_ONLY_PROJECT', SERVER . 'delete_only_project/');
define('SAVE_INFO_PROJECT', SERVER . 'save_info_project/');
define('FLOWCHART', PROFILE . 'flowchart/');
define('SAVE_FLOWCHART', SERVER . 'save_flowchart/');
define('DELETE_DOCUMENT', SERVER . 'delete_document/');
define('INFO_PROJECT_AND_SERVICES', PROFILE . 'info_project_and_services/');
define('SUBMITTED_PROJECTS', PROFILE . 'submitted_projects');
define('AWARD_PROJECTS', PROFILE . 'award_projects');
define('FOLLOW_UP_PROJECTS', PROFILE . 'follow_up_projects');
/*******************************SERVICES OPTINOS*****************************/
define('ADD_SERVICE', SERVER . 'add_service/');
define('SERVICE', PROFILE . 'service/');
define('SAVE_EDIT_SERVICE', SERVER . 'save_edit_service');
define('DELETE_SERVICE', SERVER . 'delete_service/');
/********************************STAFF AND COSTS OPTIONS*******************************/
define('ADD_STAFF', PROFILE . 'add_staff/');
define('SAVE_STAFF', SERVER . 'save_staff');
define('EDIT_SINGLE_STAFF', PROFILE . 'edit_single_staff/');
define('SAVE_EDIT_SINGLE_STAFF', SERVER . 'save_edit_single_staff/');
define('DELETE_SINGLE_STAFF', SERVER . 'delete_single_staff/');
define('ADD_COST', PROFILE . 'add_cost/');
define('SAVE_COST', SERVER . 'save_cost');
define('EDIT_COST', PROFILE . 'edit_cost/');
define('SAVE_EDIT_COST', SERVER . 'save_edit_cost/');
define('DELETE_COST', SERVER . 'delete_cost/');
/********************************************************************************/
/**********************************SAVE TASK*************************************/
define('SAVE_TASK', SERVER . 'save_task');
define('COMPLETED_TASK', SERVER . 'completed_task/');
/*********************************PROPOSAL***************************************/
define('MAKE_PROPOSAL', PROFILE . 'make_proposal/');
define('SAVE_PROPOSAL_DATA', SERVER . 'save_proposal_data/');
define('GENERATE_PROPOSAL', SERVER . 'generate_proposal/');
/*****************************SEND ERROR QUOTE EMAIL****************************/
define('SEND_ERROR_QUOTE_EMAIL', SERVER . 'send_error_quote_email');
/********************************PREVIOUS CONTRACT*****************************/
define('ADD_PREVIOUS_CONTRACT', SERVER . 'add_previous_contract/');
/*********************************REPORTS***************************************/
define('REPORTS', PROFILE . 'reports');
/****************************CONTACT LIST***************************************/
define('CONTACT_LIST', PROFILE . 'contact_list');
define('SAVE_CONTACT', SERVER . 'save_contact');
/****************************PARTNER LIST***************************************/
define('PARTNER_LIST', PROFILE . 'partner_list');
define('SAVE_NEW_PARTNER', SERVER . 'save_new_partner');
define('SAVE_PARTNER', SERVER . 'save_partner');
/*****************************EXTRA ROUTES**************************************/
define('CSS', SERVER . 'css/');
define('JS', SERVER . 'js/');
define('IMG', SERVER . 'img/');
define('PLUGINS', SERVER . 'plugins/');
define('DIST', SERVER . 'dist/');
define('DOCS', SERVER . 'documents/');
/*******************************************************************************/
?>
