<?php 

    // write query for all courses
    $sql = 'SELECT * FROM expenses ORDER BY created_at';

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting as an array
    $expenses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    // print_r($expenses);
    $totalex = 0;
    $totalexpense = 0;


    foreach($expenses as $expense):
        $totalexpense = $totalexpense + $expense['amount'];
    endforeach;


?>