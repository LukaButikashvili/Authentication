<?php 
   $path = $_SERVER["REQUEST_URI"];
   $str_arr = explode ("/", $path);
   $temp_title = $str_arr[2];
   $title = explode (".", $temp_title)[0];
   if($title === "index") {
       $title = "home";
   }
   
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($title) ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>