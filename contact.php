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
                <li><a href="business.php">Business</a></li>
               <li><a href="economics.php">Economics</a></li>
                <li><a href="tech.php">Tech</a></li>
                <li><a href="sports.php">Sports</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="hacker.php">Hacker</a></li>
                <li><a href="state.php">States News</a></li>
                <li><a href="mov_list.php">Movies Reviews</a></li>
                <li class="activeclass"><a href="contact.php">Contact</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
               <li><a type="button" data-toggle="modal" data-target="#myModal">
                      Subscribe
                    </a></li>
              </ul>
        </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

 </nav>

<div>
<h2 style="margin-top: 157;margin-bottom: 22;margin-left: 596;">Siddartha</h2>
<hr style="margin-left: 573;margin-top: -12px;margin-bottom: 20px;border: 0;border-top: 1px solid #292929;width: 177;">
<img src="images/abt.png" style="width: 167;
margin-left: 313;
margin-top: 20;
height: 167;">
<hr style="border: 0;
border-top: 1px solid #292929;
width: 75;
margin-left: 484;
margin-top: -88;">
<hr style="border: 0;
border-top: 500px solid #292929;
width: 2;
height: 1;
margin-top: -270;
margin-left: 563;">
<hr style="border: 0;
border-top: 1px solid #292929;
width: 75;
margin-left: 484;
margin-top: -88;">
<a target="_blank" href="https://www.facebook.com/siddu.lk" ><img src="images/fb.png" style="width: 40;margin-top: -64;
margin-left: 437;"></a>
<a id="gmail"><img src="images/google.png" style="width: 40;margin-top: -62;
margin-left: -109;"></a>
<a target="_blank" href="https://github.com/siddu244" ><img src="images/git.png" style="width: 47;margin-top: -62;
margin-left: -109;"></a>
<div id="mail">
</div>

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

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>
<link rel="stylesheet" href="css/last.css">
<script>
$("#gmail").click(function(){
  alert("siddu244@gmail.com");
});
</script>
<!-- <script type="text/javascript" src="js/bootstrap-modal.js"></script> -->
</body>
</html>