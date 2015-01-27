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
              $to = $email;
               $subject = "All News";
               $message = "<b>Be in touch for more update</b>";
               $message .= "<h1>Successfully Subscribed</h1>";
               $header = "From:siddu244@gmail.com \r\n";
               $header .= "MIME-Version: 1.0\r\n";
               $header .= "Content-type: text/html\r\n";
               $retval = mail ($to,$subject,$message,$header);
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
        xmlhttp.open("GET","new_state.php?q="+str,true);
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
<div id="topbar" style="position: fixed;
margin-top: -135;">
<div style="background:white;">
  <h1 style="margin-top: -14;
margin-left: 475;
margin-bottom: -61;font-weight: 400;
font-family: fantasy;"><img src="images/ne.jpg" style="width: 651;
height: 51;opacity: 0.3;
margin-left: -642;">THE ALL NEWS STACK<img src="images/ne1.jpg" style="width: 404;
height: 51;margin-left: 472;
margin-top: -60;opacity: 0.3;"></h1>
</div>
</div>
<!-- Latest compiled and minified JavaScript -->
<nav class="navbar navbar-default navbar-fixed-top" style="margin-top: 53;height: 63;">
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
              <ul id="navbar" class="nav navbar-nav" style="margin-top: 5;">
                <li class="activeclass"><a href="index.php">Headlines<span class="sr-only">(current)</span></a></li>
                <li><a href="world.php">World</a></li>
                <li><a href="business.php">Business</a></li>
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
                        <ul style="margin-top: 155;font-size: 22;margin-left: -39;">
                              <li style="margin-top: 19;margin-bottom: 23;"><button class="button" type="button" onclick="loadXMLDoc('http://timesofindia.feedsportal.com/c/33039/f/533965/index.rss','TOI')">TOI</button></li>
                              <li style="margin-bottom: 22;"><button type="button" class="button" onclick="loadXMLDoc('http://feeds.bbci.co.uk/news/rss.xml','BBC')">BBC</button></li>
                              <li style="margin-bottom: 22;"><button type="button" class="button" onclick="loadXMLDoc('http://economictimes.indiatimes.com/rss.cms','ECONOMIC')">ECONOMICS</button></li>
                              <li style="margin-bottom: 22;"><button type="button" class="button" onclick="loadXMLDoc('http://feeds.feedburner.com/NdtvNews-TopStories','NDTV')">NDTV</button></li>
                              <li><button type="button" class="button" onclick="loadXMLDoc('http://rss.cnn.com/rss/edition.rss','CNN')">CNN</button></li>
                        </ul>
             </nav>

      </div>  
<!-- Button trigger modal -->


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

<div id="business_main" style="
    margin-left: 73;
    font-size: 22;
">
  <ul>
      
      <div id="b_list">
        <h2 style="margin-bottom: 31;margin-top: 134;margin-left: 407;"> --  TOP STORIES  --</h2><hr style="margin-top: -12px;margin-bottom: 20px;border: 0;border-top: 1px solid #292929;">
      <div id="b_l">
      <?php

        $s="";
      $content = file_get_contents('http://timesofindia.feedsportal.com/c/33039/f/533965/index.rss');
      $x = new SimpleXmlElement($content);
      $i=0;
      foreach($x->channel->item as $entry) {
          echo '<a style="color: darkblue;" target="_blank" href='.$entry->link.'>'.$entry->title.'</br></a>'.'</br></br><hr style="margin-top: -11;border-top:1px solid #899C9A;">';
            $i++;
      }
      ?>
    </div>
      </div>
  </ul> 
</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>
<!-- <script type="text/javascript" src="js/bootstrap-modal.js"></script> -->
</body>
</html>