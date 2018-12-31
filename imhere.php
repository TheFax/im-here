<?php

if(isset($_GET['pass']) == true)
{
  $pass = $_GET['pass'];
  if($pass == "05535") 
  {  
    if(isset($_GET['name']) == true) 
    {
      $file = $_GET['name'] . ".txt";
      $myfile = fopen($file, "w") or die("Unable to open file!");
      $txt = "HTTP_X_FORWARDED_FOR: " . $_SERVER['HTTP_X_FORWARDED_FOR'];
      fwrite($myfile, $txt);
      
      $ip = "Advanced IP: " . ($_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']));
      fwrite($myfile, $ip);
      
      if(isset($_GET['newip']) == true)
      {
        $txt = "\r\nNEW_IP: " . $_GET['newip'];
        fwrite($myfile, $txt);
      }
      $txt = "\r\n" . date('Y-m-d H:i:s');
      fwrite($myfile, $txt);
      fclose($myfile);


      $file = $_GET['name'] . ".html";
      $myfile = fopen($file, "w") or die("Unable to open file!");
      $txt = '<HTML><HEAD><TITLE>Nas connection</TITLE><meta name="viewport" content="width=device-width, initial-scale=1"></HEAD><BODY><a href="http://';
      $txt = $txt . $_GET['newip'];
      $txt = $txt . ':9081">Link diretto</a>' ;
      fwrite($myfile, $txt);
      fclose($myfile);


      $file = $_GET['name'] . ".php";
      $myfile = fopen($file, "w") or die("Unable to open file!");
      /*<?php header("Location: http://ip:9081"); ?>*/
      $txt = '<?php header("Location: http://';
      $txt = $txt . $_GET['newip'];
      $txt = $txt . ':9081"); ?>' ;
      fwrite($myfile, $txt);
      fclose($myfile);
      chmod($_GET['name'] .".php",0755); 

    }

  }  
}
 
?>
