<?php
  require('connect.php');

    if (isset($_POST['email'])){
      if($_POST['email']==""){
        $ms="all the fields are required";

        echo "<script type='text/javascript'>alert('$ms');</script>";

      }
      else{
        $email = $_POST['email'];
        $q="SELECT * from `subscribe` where email='$email'";
        $r = mysqli_query($connection,$q);
        $rows = mysqli_num_rows($r);
        if($rows==0){
              $query = "INSERT INTO `subscribe` (email) VALUES ('$email')";
              $result = mysqli_query($connection,$query);
              $msg = "Subscribtion successful";
        }
        else{
            $msg = "Already Subscribed";
      }
      echo "<script type='text/javascript'>alert('$msg');</script>";

      echo $msg;

      }
    
}

  function rss($feed_url){
      $s="";
      $content = file_get_contents($feed_url);
      $x = new SimpleXmlElement($content);
      $i=0;
      // foreach($x->channel->item as $entry) {
      //     $ar[$i]= $entry->title.'<br>';
      //     $i++;
      // }
      return $x;
  }

?>

<html>
<head>
<script>
    function loadXMLDoc(str,data)
    {
        var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            var rem=document.getElementById("b_l");
           // (rem.getElementsByTagName('h2')).innerHTML=data;
            document.getElementById("b_l").innerHTML=xmlhttp.responseText;
            }
          }
        xmlhttp.open("GET","new.php?q="+str,true);
        xmlhttp.send();
    }
</script>
</head> 
<body>

  <link rel="stylesheet" href="css/style.css">


	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="css/side_nav.css">

<!-- Latest compiled and minified JavaScript -->
<nav class="navbar navbar-default navbar-fixed-top" style="
    height: 62;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"><h2 style="margin-top: -2;font-weight: 500;">NEWS</h2></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul id="navbar"  class="nav navbar-nav" style="margin-top: 5;">
                <li><a href="index.php">Headlines<span class="sr-only">(current)</span></a></li>
                <li><a href="world.php">World</a></li>
                <li class="activeclass"><a href="business.php">Business</a></li>
                <li><a href="economics.php">Economics</a></li>
                <li><a href="tech.php">Tech</a></li>
                <li><a href="sports.php">Sports</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="hacker.php">Hacker</a></li>
                <li><a href="state.php">States News</a></li>
                <li><a href="mov_list.php">Movies Reviews</a></li>
                <li ><a href="contact.php">Contact</a></li>
              </ul>
            
              <ul class="nav navbar-nav navbar-right">
               <li><a type="button" data-toggle="modal" data-target="#myModal">
                      Subscribe
                    </a></li>
              </ul>
        </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

 </nav>
<div id="side">
               <nav>
                        <ul style="margin-top: 155;font-size: 22;">
                              <li style="margin-top: 19;margin-bottom: 23;"><button class="button" type="button" onclick="loadXMLDoc('http://feeds.bbci.co.uk/news/business/rss.xml','Times Of India')">BBC</button></li>
                              <li style="margin-bottom: 22;"><button type="button" class="button" onclick="loadXMLDoc('http://ibnlive.in.com/ibnrss/rss/business/business.xml','NDTV')">IBN</button></li>
                              <li style="margin-bottom: 24;"><button type="button" class="button" onclick="loadXMLDoc('http://feeds.feedburner.com/NDTV-Business','IBN')">NDTV</button></li>
                              <li><button type="button" class="button" onclick="loadXMLDoc('http://timesofindia.feedsportal.com/c/33039/f/533919/index.rss','BBC')">TOI</button></li>
                        </ul>
             </nav>

      </div>  


<section>  

</section>
<!-- Button trigger modal -->
<div id="business_main" style="
    margin-left: 73;
    font-size: 22;
">
  <ul>
      
      <div id="b_list">
        <h2 style="margin-bottom: 31;">Business News  --  Times Of India</h2><hr style="margin-top: -12px;margin-bottom: 20px;border: 0;border-top: 1px solid #292929;">
        <div id="b_l">
        <?php

        $s="";
      $content = file_get_contents('http://ibnlive.in.com/ibnrss/rss/business/business.xml');
      $x = new SimpleXmlElement($content);
      $i=0;
      foreach($x->channel->item as $entry) {
          echo '<a style="color: darkblue;" target="_blank" href='.$entry->link.'>'.$entry->title.'</br><div id="mov_des" style="font-size: 17;font-style: oblique;font: larger;color: darkslategrey;">'.$entry->description.'</div></a>'.'</br></br><hr style="margin-top: -11;border-top: 2px solid #899C9A;">';
          $i++;
      }
      ?>
    </div>
      </div>
  </ul> 
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <section class="container" style="margin-left: -280;">
    <div class="login">
      <h1>Subscribe</h1>
      <form method="post" action="">
        <p><input type="text" name="email" value="" placeholder="Email"></p>
        <p class="submit"><input type="submit" name="commit" value="Click here"></p>
      </form>
    </div>

    <div class="login-help">
      <p>
 Subscribe for News update
</p>
    </div>
  </section>
  </div>
</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>
<link rel="stylesheet" href="css/last.css">
<!-- <script type="text/javascript" src="js/bootstrap-modal.js"></script> -->
</body>
</html>