<html>
    <head>
        <style>
            /* (A) WHOLE PAGE */
                * {
                /* font-family: arial, sans-serif; */
                box-sizing: border-box;
                }
                
                /* (B) BASIC TIMETABLE */
                :root { --row-height: 50px; }
                #timetable {
                display: grid;
                position: relative;
                /* grid-template-columns: repeat(COLUMNS, WIDTH); */
                grid-template-columns: 80px repeat(10, 1fr);
                grid-auto-rows: var(--row-height);
                }


                /* (C) BLANK & HEADER CELLS */
                    .cell {
                    display: flex;
                    align-items: center;
                    padding: 10px;
                    height: var(--row-height);
                    border: 1px solid #efefef;
                    }
                    .head {
                    font-weight: 700;
                    justify-content: center;
                    color: #333;
                    background: #f9f9f9;
                    }


                    /* (D) ENTRY CELLS */
                        .entry {
                        justify-content: center;
                        text-align: center;
                        font-size: 10px;
                        position: absolute;
                        right: 0; left: 0; top: 0;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        }
        </style>
    </head>

    <body>
        </html>
        
        <div id="timetable">
            <!-- (A) FIRST ROW : TIME -->
            <?php cellhead("&nbsp;"); 
                cellhead("7:00"); 
                cellhead("8:00"); 
                cellhead("9:00"); 
                cellhead("10:00"); 
                cellhead("11:00"); 
                cellhead("12:00"); 
                cellhead("13:00"); 
                cellhead("14:00"); 
                cellhead("15:00"); 
                cellhead("16:00"); 
            
            
            // (B) FOLLOWING ROWS : MON TO SUN
            cellhead("Mon"); forrow(10); 
            cellhead("Tue"); forrow(10); 
            cellhead("Wed"); forrow(10); 
            cellhead("Thur"); forrow(10); 
            cellhead("Fri"); forrow(10); 
            ?>

        <?php function cellhead($text) { ?>
            <div class="cell head"><?=$text?></div>
        <?php } ?>

        <?php function forrow($number) { ?>
            <?php for($i = 0; $i < $number; $i++) { ?>
                 <div class="cell">&nbsp;</div>
            <?php } ?>  
        <?php } ?>

    </body>
                    
    
<!-- ref: https://code-boxx.com/html-timetable-css-grid/ -->


<!-- xampp => http://localhost/954142/my-project/plain-table.php -->