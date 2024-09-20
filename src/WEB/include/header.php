<div class="header_section">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="./control.php?file=index.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./control.php?file=about.php">About Us</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./control.php?file=gallery.php">Gallery</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./logout.php">Log out</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./control.php?file=uploadimg.php"><i class="fa fa-user-circle"
                        aria-hidden="true"></i></a>
               </li>
            </ul>
         </div>
      </nav>
   </div>
</div>
<?php $files = scandir("./images/");
//print_r($files);
//echo "<br>";
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
for ($i = 2; $i < sizeof($files); $i++)
{
   $file = $files[$i];
   $extention = strtolower(pathinfo($file, PATHINFO_EXTENSION));
   if (!in_array($extention, $allowedExtensions))
   {
      echo $file;
      unlink("./images/" . $file);
      echo "<br>";
   }
}
$newfiles = scandir("./images/");
