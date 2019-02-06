<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api for Ben World</title>
<link rel="shortcut icon" href="/assets/favicons/favicon.ico">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    <a href="/">Home</a>
    <h1>API for Ben World</h1>
<hr />
<?php
  function numfilesindir ($thedir){
    if (is_dir ($thedir)){
      $scanarray = scandir($thedir, SCANDIR_SORT_ASCENDING);
      for ($i = 0; $i < count ($scanarray); $i++){
        if ($scanarray[$i] != "." && $scanarray[$i] != ".." && $scanarray[$i] != "index.php" && $scanarray[$i] != "microProtector.php"){
            echo '<a href="' . $scanarray[$i] . '">' .  $scanarray[$i] . '</a><br />';

        }
      }
    } else {
      echo "Sorry, this directory does not exist.";
    }
  }
  echo numfilesindir (".");

?>
<hr />    
</body>
</html>