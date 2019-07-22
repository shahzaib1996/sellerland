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
    <title>Thread</title>

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


                
        <div class="container" style="margin-top: 20px;">
         <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"> Query Title "<?php echo $client_query[0]['title']; ?>" </h6>
                </div>

                <h6 style="margin:10px 10px 0px 10px;"> Vendor: <?php echo $client_query[0]['store_name']; ?> </h6>
                <h6 style="margin:10px 10px 0px 10px;"> User Email: <?php echo $client_query[0]['email']; ?> </h6>


                <h5 style="margin:10px 10px 0px 10px;"> Message </h5>

                <div class="" style="padding: 10px;margin:10px;border:1px solid #eee;">
                    <?php echo $client_query[0]['message']; ?>
                </div>

                <h5 style="margin:10px 10px 0px 10px;"> Replies </h5>

                <?php $x=1; if(count($query_reply) != 0) { foreach ($query_reply as $k=>$v) {
                    if($v['vendor_id'] == 0 || $v['vendor_id'] == null) {
                    ?>
                        
                        <div class="" style="padding: 10px;margin:10px;border:1px solid red;border-radius:10px;background: #ffd7d7;">
                            <h6 style="float: left;padding-right: 10px;line-height: 25px !important;"> Mine: </h6>
                                <?php echo $v['reply'] ?>
                        </div>

                    <?php } else { ?>

                        <div class="" style="padding: 10px;margin:10px;border:1px solid green;border-radius:10px;background: #d5ffda;">
                            <h6 style="float: left;padding-right: 10px;line-height: 25px !important;"> Vendor: </h6>
                            <?php echo $v['reply'] ?>
                        </div>

                    <?php } } } else { echo "<div style='padding: 10px;margin:10px;text-align:center;'>No Reply Found!</div> "; } ?>

                <!-- <div class="" style="padding: 10px;margin:10px;border:1px solid red;">
                    <h6 style="float: left;padding-right: 10px;"> My Reply </h6>
                    This is treply
                </div>

                <div class="" style="padding: 10px;margin:10px;border:1px solid green;">
                    <h6 style="float: left;padding-right: 10px;"> Vendor Reply </h6>
                    This is treply
                </div>
 -->    

                <div style="padding: 10px;margin:10px;border:1px solid #eee;" >
                    <?= form_open('Main/add_user_reply/'.$this->uri->segment(4)) ?>
                        <textarea style="width: 100%;" name="reply" required></textarea>
                        <input type="submit" name="submit" value="Reply" class="btn btn-primary">
                    <?= form_close(); ?>
                </div>
                  
              
              </div>

              <!-- Color System -->

            </div>
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



