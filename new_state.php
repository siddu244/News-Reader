<?php

//echo "Fd";
$feed_url= $_GET['q'];

      $s="";
      $content = file_get_contents($feed_url);
      $x = new SimpleXmlElement($content);
      $i=0;
      foreach($x->channel->item as $entry) {
          echo '<a style="color: darkblue;" target="_blank" href='.$entry->link.'>'.$entry->title.'</br></a>'.'</br></br><hr style="margin-top: -11;border-top: 1px solid #899C9A;">';
          $i++;
      }
      //echo $ar;
?>