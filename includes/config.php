<?php 

    /**
	 * @author Nikola Tomic - dzo87bl
	 * @copyright 2018
	 */

    // var
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'mt_log';

    // connection
    $con = mysqli_connect( $host, $user, $pass, $db );

    // check connection
    if ( mysqli_connect_errno() ) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

?>