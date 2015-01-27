<?php

//echo "Fd";
$feed_url= $_GET['q'];

      $s="";
      $content = file_get_contents($feed_url);
      $x = new SimpleXmlElement($content);
      $i=0;
      foreach($x->channel->item as $entry) {
          echo '<a style="color: darkblue;" target="_blank" href='.$entry->link.'>'.$entry->title.'</br><div id="mov_des" style="font-size: 17;font-style: oblique;font: larger;color: darkslategrey;">'.$entry->description.'</div></a>'.'</br>';
                    echo '<hr style="margin-top: -283;border-top: 2px solid #899C9A;">';

          $i++;
      }
      //echo $ar;
?>