<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('SITENAME','FreeCoin');
define('EDIT_ICON','<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="20" height="18" viewBox="0 0 13.06 12.813"> <defs> <style> .cls-1 { fill: #3a8ffd; fill-rule: evenodd; } </style> </defs> <path d="M12.722,2.926 C11.831,2.046 10.937,1.170 10.040,0.297 C9.602,-0.132 9.153,-0.131 8.711,0.302 L7.244,1.740 C4.944,3.994 2.643,6.249 0.351,8.512 C0.156,8.704 0.019,9.018 0.010,9.292 C-0.015,10.019 -0.009,10.757 -0.004,11.471 L-0.001,11.880 C0.003,12.495 0.309,12.798 0.935,12.804 C1.241,12.808 1.544,12.806 1.849,12.806 L2.253,12.805 C2.377,12.805 2.501,12.807 2.626,12.810 C2.751,12.812 2.878,12.814 3.007,12.814 C3.189,12.814 3.373,12.810 3.556,12.793 C3.789,12.772 4.112,12.679 4.318,12.478 C6.656,10.203 8.985,7.920 11.314,5.636 L12.716,4.262 C12.938,4.044 13.047,3.824 13.047,3.592 C13.048,3.360 12.941,3.142 12.722,2.926 ZM9.290,5.333 L8.117,6.483 C6.572,7.998 5.027,9.512 3.486,11.032 C3.374,11.141 3.278,11.169 3.122,11.175 C2.875,11.169 2.628,11.167 2.377,11.167 C2.219,11.167 2.060,11.168 1.898,11.169 L1.627,11.169 L1.627,10.956 C1.626,10.466 1.625,9.992 1.628,9.552 C1.631,9.542 1.650,9.512 1.684,9.479 C3.557,7.640 5.432,5.804 7.306,3.968 L7.607,3.674 L9.290,5.333 ZM10.991,3.636 L10.539,4.066 L8.905,2.464 L9.363,2.031 L10.991,3.636 Z" class="cls-1"/></svg></span>');
define('DELETE_ICON','<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="18" height="20" viewBox="0 0 12 14"> <defs> <style> .cls-1 { fill: #3a8ffd; fill-rule: evenodd; } </style> </defs> <path d="M11.380,3.494 C11.273,3.511 11.165,3.509 11.044,3.506 L11.044,11.488 C11.043,13.040 10.140,14.004 8.689,14.005 C7.700,14.006 6.712,14.007 5.724,14.007 C4.911,14.007 4.099,14.006 3.287,14.005 C1.875,14.003 0.965,13.030 0.966,11.526 L0.966,3.508 C0.862,3.511 0.767,3.510 0.674,3.500 C0.271,3.454 0.021,3.173 0.008,2.748 C0.002,2.560 0.064,2.382 0.183,2.249 C0.316,2.101 0.507,2.019 0.720,2.017 C1.331,2.009 1.944,2.009 2.556,2.010 L11.112,2.011 C11.222,2.009 11.281,2.009 11.339,2.015 C11.735,2.055 11.987,2.330 11.999,2.732 C12.012,3.140 11.774,3.432 11.380,3.494 ZM2.373,3.528 L2.373,11.491 C2.374,12.222 2.642,12.506 3.331,12.508 C4.873,12.512 6.417,12.512 7.959,12.509 L8.731,12.509 C9.339,12.508 9.635,12.193 9.635,11.547 L9.638,3.528 L2.373,3.528 ZM7.994,10.184 C7.992,10.908 7.661,11.000 7.519,11.006 C7.513,11.006 7.507,11.006 7.500,11.006 C7.372,11.006 7.260,10.948 7.177,10.835 C7.069,10.690 7.014,10.469 7.013,10.178 C7.012,9.044 7.011,7.911 7.011,6.778 L7.010,5.928 C7.010,5.820 7.010,5.747 7.015,5.675 C7.043,5.255 7.247,4.971 7.530,5.003 C7.813,5.036 7.985,5.296 7.989,5.697 C7.994,6.112 7.993,6.526 7.993,6.940 L7.992,7.826 L7.994,8.564 L7.994,10.184 ZM4.796,10.872 C4.715,10.961 4.617,11.007 4.510,11.007 C4.475,11.007 4.439,11.002 4.403,10.992 C4.249,10.949 3.991,10.796 3.992,10.245 C3.994,9.708 3.994,9.171 3.993,8.634 L3.993,7.373 C3.992,6.859 3.992,6.345 3.994,5.831 C3.994,5.545 4.054,5.315 4.166,5.169 C4.256,5.052 4.368,4.992 4.511,4.999 C4.745,5.011 4.995,5.236 4.995,5.829 C4.996,7.290 4.996,8.750 4.993,10.211 C4.992,10.497 4.922,10.732 4.796,10.872 ZM8.259,1.002 C8.015,1.004 7.772,1.004 7.529,1.004 C7.356,1.004 7.182,1.004 7.009,1.004 L6.490,1.003 L5.973,1.003 C5.578,1.004 4.182,1.005 3.788,1.002 C3.529,1.001 3.317,0.942 3.176,0.833 C3.058,0.742 2.997,0.621 3.002,0.484 C3.011,0.250 3.221,0.001 3.784,-0.000 C4.939,-0.003 7.095,-0.002 8.252,-0.000 C8.697,0.001 8.992,0.189 9.007,0.478 C9.014,0.612 8.952,0.738 8.832,0.832 C8.695,0.940 8.491,1.000 8.259,1.002 Z" class="cls-1"/></svg></span>');

/* Spin Rewriter Settings */
define('SPIN_EMAIL_ACCOUNT','chrisxjv@gmail.com');
define('SPIN_API_KEY','c86625c#ef87ffc_89037b4?88618c4');
define('SPIN_PROTECTED_TERMS_DB',"2pac,Alleyez,Hiphop,California,Outlawz,Deathrow");
define('SPIN_PROTECTED_TERMS_STATIC','2pac,Alleyez,Hiphop,California,Outlawz,Deathrow,NEWSSTORY,SONGNAME,FIRSTLINES,CHORUSHOOK,CITY,VENUE,[widget]');
define('KEYWORD_TERMS','w_artistname,w_latestalbum,w_genre,w_hometown,w_friends,w_recordlabel');