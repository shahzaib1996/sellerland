<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Your Site</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/nice-select.css">	
        <link rel="stylesheet" href="css/hexagons.min.css">							
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
        
    </head>
    <body style="background:#F0F3F8;">	
         

    
        <nav class="navbar navbar-expand-lg navbar-light " style="background:linear-gradient(90deg,#0b58f1 0%,#3fc1ff 100%); padding: 15px;">
            <a class="navbar-brand text-light" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
           
          </nav>


          <div class="col-sm-12">
                <div class="vendor-contact-form">
                        <p class="text-center p-1" style="color:black;">Create Your Query</p>
                        <hr>
                    <?= form_open('Main/send_query/'.$this->uri->segment(4)) ?>
                    <div class="form-group">
                          <label for="formGroupExampleInput">Title</label>
                          <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Title" required>
                        </div>  
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Email</label>
                          <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                                <label for="formGroupExampleInput2">Message</label>
                                <textarea class="form-control" rows="5" name="message"  placeholder="Write Your Query..." required></textarea>
                        </div>
                        <button type="submit" class="btn " style="background:#5390ff; color:white; width:100%; padding: 10px;">Send</button>
                      <?= form_close(); ?>
                </div>
                 
          </div>
     


  



	
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="js/vendor/bootstrap.min.js"></script>			
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
          <script src="js/easing.min.js"></script>			
        <script src="js/hoverIntent.js"></script>
        <script src="js/superfish.min.js"></script>	
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>	
        <script src="js/owl.carousel.min.js"></script>	
        <script src="js/hexagons.min.js"></script>							
        <script src="js/jquery.nice-select.min.js"></script>	
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>							
        <script src="js/mail-script.js"></script>	
        <script src="js/main.js"></script>	
    </body>
</html>



