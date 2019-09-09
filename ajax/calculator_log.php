<?php

    /**
	 * @author Nikola Tomic - dzo87bl
	 * @copyright 2019
	 */

	/* security */
	if ( $_SERVER['REQUEST_METHOD'] != 'POST' ) {
    	die('You do not have sufficient permissions to access this page!');
	}

	/* headers */
	header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	/* error reporting */
	error_reporting(E_ALL);
	set_error_handler("var_dump");
	ini_set('display_errors', 0);
	ini_set("log_errors", 0);
	ini_set("error_log", "error_log.txt");

    /* config */
    set_time_limit(120);
    include_once('../includes/config.php');

    /* variables to return */
    $fields = array('factor1', 'factor2', 'result',);
    $data = array();
	$info = null;
	$error = 0;

	/* get the request parameter */	
	foreach ( $_REQUEST as $k => $v ) {
        mysqli_real_escape_string($con, $v);
        strip_tags($v);
        filter_var($v, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $$k = $v;
        if ( in_array( $k, $fields ) ) {
            $data[$k] = $v;
        } else {
            
        }
	}

    $data['operation'] = '*';

    /* action */
    // Retrieve the keys of the array (column titles)
    $columns = array_keys($data);
    // Sanitization the values of the array (column values)
    $variables = array_map(array($con, 'real_escape_string'), array_values($data));
    // Build the query
    $sql = "INSERT INTO log (`".implode('`,`', $columns)."`) VALUES('".implode("','", $variables)."')";
    // Run and return the query result resource
    mysqli_query($con, $sql) or die(mysqli_error($con));

    /* debug */
	/*ob_start();
	echo print_r($_REQUEST);
	$data = ob_get_clean();
	$fp = fopen("debug.txt", "w");
	fwrite($fp, $data);
	fclose($fp);*/

	/* return variables */
	$return = array(
		'info' => $info,
		'error' => $error,
	);
	echo json_encode( $return );

?>