<?php
session_start();

if(isset($_SESSION['FN']))
{
    $text = $_POST['text'];
    $link = $_POST['link'];
     
    date_default_timezone_set('Australia/Sydney'); // make sure timezone is for Australia as its an Australian application
    $fp = fopen($link, 'a')or die('fopen failed');
    $filename= substr($link, 3);
     
    $modified= date('Y/m/d',filemtime($filename)); // check when file was last modified 
   
   // if file has been modified on that particular day then do not add todays date, only add full date when users comments for the first time on this day
   if($modified != date('Y/m/d'))
   {
	      $ft=fwrite($fp, "<div class='box'><div class='msgln'>(".date("g:i A").") <b>".$_SESSION['FN']."</b>:<div class='lastmsg'>".stripslashes(htmlspecialchars($text))."</div></div></div>")or die('fwrite failed');
   }
   
   else
   {
	    $ft=fwrite($fp, "<div class='chatDate'>".date('Y/m/d')."</div><div class='box'><div class='msgln'>(".date("g:i A").") <b>".$_SESSION['FN']."</b>:<div class='lastmsg'>".stripslashes(htmlspecialchars($text))."</div></div></div>")or die('fwrite failed');
   }
 

    
    if($ft == true)
    {
	    echo "yes";
    }
    fclose($fp);
    clearstatcache();

}
?>

