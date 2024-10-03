<head>
    <!-- CSS -->
    <link href="css/timetable.css" rel="stylesheet">
    <link href="css/detail.css" rel="stylesheet">
    
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


    <title>My Timetable</title>
   
</head>

<body>
    
    <!-- display header function -->
    <?php function displayheader($name,$button,$linknav,$linkbutton) { ?>
        <div class="nav">
            <div class="nav-background">
                <div class="header-left">
                    <a href=<?= $linknav ?> class="big-heading"><?= $name ?></a>
                </div>
                <div class="header-right">    
                    <a href=<?= $linkbutton ?> ><button class="btn-brand"><?= $button ?></button></a>
                </div>
            </div>
            
        </div>
    <?php } ?>