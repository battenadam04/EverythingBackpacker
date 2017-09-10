<?php
       session_start();

       $resultnew1=Array();
       $finalemail=Array();
       $email=$_SESSION['Email'];
       $files=glob("../convos/*.txt");
       date_default_timezone_set('Australia/Sydney');
       $resultnew=Array();


   function update(&$files, &$email)
   {
	 
	     require('connect.php');
	   
	      $c = 0;
          $t=0;
          $sessEmail="";
          $lastarray=Array();
          $result=Array();
          $error=false;
          
          if(empty($_SESSION["recip-email"]))
          {
	        $emailnew="null";
          }
          
          else
          {
	        $emailnew=$_SESSION["recip-email"];	          
          }
     
          $count=count($files);
          
          for ($x=0; $x<$count; $x++) 
             {
	             
	             $newitem=$files[$x];
	   
	             //check if users email is in the file name of any files in $files
	             if(strpos(strtolower($newitem), strtolower($email))) 
                    {
	                  $lastarray[]=$newitem;
                    }
                    
                    else
                    {
	                  $error=true;
                    }
             }

             //count returned amount of files and strip down to get email address of users recipient 
             if($error != 0)
             {
           
                   for ($x=0; $x<count($lastarray) ; $x++) 
                   {
                
                      $item = $lastarray[$x];
                      $link1=substr($item,0,strrpos($item,'-'));
                      $link1=substr($link1, 10);
                      $link1=str_replace($email,"", $link1);
                      $link1=str_replace('[', '', str_replace('-', '', $link1));
                      $key="file";
	                  $key2="Email";
	                  $newkey=$key . $c;
	                  $newkey2=$key2 . $c;
                      $result[$newkey]= $item;
                      $result[$newkey2]=$link1;
                      $c++;  
                    }     
             } 
            

                $checkemail="../convos/".$emailnew."-".$email."-.txt";
                $checkemail1="../convos/".$email."-".$emailnew."-.txt";
                
               // if users email cannot be found then create a new file
                 if((!in_array($checkemail, $lastarray)) && (!in_array($checkemail, $lastarray)) && ($emailnew != "null"))
                 {
	                     
                    unset($resultnew);
                   
	                 $fp = fopen("../convos/".$emailnew."-".$email."-.txt", "w+")or die("Unable to open file!");
                     $fw=fwrite($fp, "<div class='chatDate'>".date('Y/m/d')."</div>");
                     fclose($fp);  
                    
                     $filesnew=glob("../convos/".$emailnew."-".$email."-.txt");
         
                     $link=substr($filesnew[0],0,strrpos($filesnew[0],'-'));
                     $link=substr($link, 10);
                     $link=str_replace($email,"", $link);
                    
                     $link=str_replace('[', '', str_replace('-', '', $link));
      
                     $key="file";
                     $key2="Email";
                     $key3="newfile";
	        
	                 $newkey=$key . $c ;
	                 $newkey2=$key2 . $c;
	                 $newkey3=$key3 . $c ;
                     $result[$newkey]= $filesnew[0];
                     $result[$newkey2]=$link;
                 }
            
                // if user is clicking on comments link in nav instread of going through an advert chat service then make sure new file isnt created
                if(!$result)
                 {             
	               $result["NOFILE"]="NOFILE";
                 }
                   
             
                 if(!array_key_exists('NOFILE', $result))
                   {
                
                    for ($i=0; $i <= count($result); $i++) 
                      {
	                        if (array_key_exists('Email'.$i, $result))
	                        {
	         
	                         $name="Email";
	                         $newname=$name . $i; 
	                         $item = $result[$newname];
	                           
	                         $sql="SELECT Fname, Email FROM backpacker WHERE Email = '".$item."';";
                             $sql.="SELECT Fname, Email FROM Advertiser WHERE Email = '".$item."'";
     
                             $t++; 
                             $newname=$name . $t; 
     
                               // Execute multi query
                               if (mysqli_multi_query($mysqli,$sql))
                              {
                                  do
                                   {
                                     // Store first result set
                                     if ($results=mysqli_store_result($mysqli)) 
                                     {
                        
                                       while ( $row = $results->fetch_array(MYSQLI_ASSOC))
                                       {
	                                     $key="Name";
	                                     $newkey=$key . $i;
	                                     $result[$newkey]=$row["Fname"];
                                        }
        
                                          // Free result set
                                         mysqli_free_result($results);
                                      }
                                    }
                                      while (mysqli_next_result($mysqli));
                               }
                            }
              
                        }
                            mysqli_close($mysqli);

              }
              
                echo json_encode($result);
   }//close function
          
          if(count($files) <= 0)
          {
	         $ft = fopen("../convos/".$_SESSION['recip-email']."-".$_SESSION['Email']."-.txt", "w+")or die("Unable to open file!");
             $fw=fwrite($ft, "<div class='chatDate'>".date('Y/m/d')."</div>");
             
             fclose($ft);
             unset($files);  
             $files=glob("../convos/*.txt"); // reset this variables value after adding new file to system
             update($files, $email);
         
          }
          
          else
          { 
	           update($files, $email);
          }
?>