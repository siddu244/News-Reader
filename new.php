<?php

//echo "Fd";
$feed_url= $_GET['q'];

      $s="";
      $content = file_get_contents($feed_url);
      $x = new SimpleXmlElement($content);
      $i=0;
      foreach($x->channel->item as $entry) {
      	  if(strpos($feed_url, 'ndtv') || strpos($feed_url, 'timesofindia'))
          echo '<a style="color: darkblue;" target="_blank" href='.$entry->link.'>'.$entry->title.'</br><div id="mov_des" style="font-size: 17;font-style: oblique;font: larger;color: darkslategrey;">'.$entry->description.'</div></a>'.'</br></br></br><hr style="margin-top: -483;border-top: 2px solid #899C9A;">';
          else
          echo '<a style="color: darkblue;" target="_blank" href='.$entry->link.'>'.$entry->title.'</br><div id="mov_des" style="font-size: 17;font-style: oblique;font: larger;color: darkslategrey;">'.$entry->description.'</div></a>'.'</br></br></br><hr style="margin-top: -11;border-top: 2px solid #899C9A;">';

          $i++;
      }
      //echo $ar;
?>