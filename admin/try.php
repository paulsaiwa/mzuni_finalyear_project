<?php
include '../connection.php';
                

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result = mysqli_query($connection, "SELECT standard_code, department_id FROM standard")) {

    /* determine number of rows result set */

    $row_cnt = mysqli_num_rows($result);

    printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    mysqli_free_result($result);
}

if ($result = mysqli_query($connection, "SELECT standard_code, department_id FROM standard WHERE department_id='FANC'")) {

    /* determine number of rows result set */

    $dep = mysqli_num_rows($result);
    //echo "oooo" .$a=1/100;

    printf("Result set has %d rows.\n", $dep);

    /* close result set */
    mysqli_free_result($result);
}
echo "nnn".(($dep/$row_cnt)/0.01).'%';


/* close connection */
mysqli_close($connection);
?> 