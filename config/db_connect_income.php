<?php

    // write query for all courses
    $sql = 'SELECT * FROM incomes ORDER BY created_at';

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting as an array
    $incomes = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);


    // print_r($expenses);
    $totalin = 0;
    $totalincome = 0;

    foreach($incomes as $income):
       $totalincome = $totalincome + $income['amount'];
    endforeach;


?>