<?php
    include 'includes/connect.php';
    $name = $_SESSION['firstname'];

    if($_SESSION['customer_sid']==session_id())
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="msapplication-tap-highlight" content="no">
            <title>Order Grocery</title>

            <!-- Favicons-->
            <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
            <!-- Favicons-->
            <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
            <!-- For iPhone -->
            <meta name="msapplication-TileColor" content="#00bcd4">
            <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
            <!-- For Windows Phone -->


            <!-- CORE CSS-->
            <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
            <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
            <!-- Custome CSS-->    
            <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
            <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
            <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

            <style type="text/css">
                .input-field div.error{
                position: relative;
                top: -1rem;
                left: 0rem;
                font-size: 0.8rem;
                color:#FF4081;
                -webkit-transform: translateY(0%);
                -ms-transform: translateY(0%);
                -o-transform: translateY(0%);
                transform: translateY(0%);
                }
                .input-field label.active{
                  width:100%;
                }
                .left-alert input[type=text] + label:after, 
                .left-alert input[type=password] + label:after, 
                .left-alert input[type=email] + label:after, 
                .left-alert input[type=url] + label:after, 
                .left-alert input[type=time] + label:after,
                .left-alert input[type=date] + label:after, 
                .left-alert input[type=datetime-local] + label:after, 
                .left-alert input[type=tel] + label:after, 
                .left-alert input[type=number] + label:after, 
                .left-alert input[type=search] + label:after, 
                .left-alert textarea.materialize-textarea + label:after{
                  left:0px;
                }
                .right-alert input[type=text] + label:after, 
                .right-alert input[type=password] + label:after, 
                .right-alert input[type=email] + label:after, 
                .right-alert input[type=url] + label:after, 
                .right-alert input[type=time] + label:after,
                .right-alert input[type=date] + label:after, 
                .right-alert input[type=datetime-local] + label:after, 
                .right-alert input[type=tel] + label:after, 
                .right-alert input[type=number] + label:after, 
                .right-alert input[type=search] + label:after, 
                .right-alert textarea.materialize-textarea + label:after{
                  right:70px;
                }
            </style> 
        </head>

        <body>
            <!-- Start Page Loading -->
            <div id="loader-wrapper">
                <div id="loader"></div>        
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
            <!-- End Page Loading -->
            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START HEADER -->
            <header id="header" class="page-topbar">
                <!-- start header nav-->
                <div class="navbar-fixed">
                    <nav class="navbar-color">
                        <div class="nav-wrapper">
                            <h4 align="center"> Grocery Mart </h4>     
                        </div>
                    </nav>
                </div>
            <!-- end header nav-->
            </header>
            <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
          <div id="main">
            <!-- START WRAPPER -->
            <div class="wrapper">
                <!-- START LEFT SIDEBAR NAV-->
                <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal"><?php echo $role;?></p>
                            </div>
                        </div>
                    </li>
                    <li class="bold active"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Order Grocery</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="orders.php">All Orders</a>
                                        </li>
                                        <?php
                                            $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
                                            while($row = mysqli_fetch_array($sql)){
                                                            echo '<li><a href="orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                                            </li>';
                                            }
                                            ?>
                                    </ul>
                                </div>
                            </li>
                    </ul>
                </li>
                  
            <li class="bold"><a href="details.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Edit Details</a>
            </li>
            <li class="bold"><a href="showcart.php" class="waves-effect waves-cyan"><i class="mdi-action-add-shopping-cart"></i> Cart</a>
            </li>       
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">
        <?php
        $i_id = $_GET['link'];
        $sqll = mysqli_query($con, "Select * from item where I_Id=$i_id;");
        $ans=mysqli_fetch_array($sqll);
        $iname=$ans['Name'];
        $manfby=$ans['Manf_by'];
        $details=$ans['Details'];
        $type=$ans['Type'];
        $price=$ans['Price'];
        ?>
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title"><?php echo $iname ;?></h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        <?php
                
                echo '<img height="200" width="150" src="images/items/'.$i_id.'.jpg">'; 

          ?>

        <!--start container-->
        <div class="container">
          <p class="caption"> <?php 
                                    echo 'Manufactured By- ' .$manfby. '<br>';
                                    echo "Type- " .$type. "<br>";
                                    echo '' .$details. "<br>";
                                    ?></p>
          <div class="divider"></div>
          
      <form class="formValidate" id="formValidate" method="post" action="routers/addtocart.php?link=<?php echo $i_id ?>" novalidate="novalidate">
            <div class="row">
                <div class="col s12 m4 l3">
                    <h4 class="header">Price: ₹<?php echo $price ;?></h4>
                </div>
                <div>
                    <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Store Name</th>
                                <th>Rating</th>
                                <th>Discount</th>
                                <th>Available quantity</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
     
                                $result = mysqli_query($con, "SELECT S.S_Id as id,S.Name AS Name,S.Rating as Rating,B.Discount as Discount, B.Available_qty as avail FROM Item I,Sold_By B,Store S WHERE I.I_Id = $i_id and I.I_id=B.I_Id and B.S_Id=S.S_Id ORDER BY Discount DESC;");
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo '<tr><td>'.$row["Name"].'</td><td>'.$row["Rating"].'</td><td>'.$row["Discount"].'</td><td>'.$row["avail"].'</td>';                      
                                    echo '<td><div class="input-field col s12"><label for='.$row["id"].' class="">Quantity</label>';
                                    echo '<input id="'.$row["id"].'" name="'.$row['id'].'" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td></tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
        <!-- <div class="input-field col s12">
              <i class="mdi-editor-mode-edit prefix"></i>
              <textarea id="description" name="description" class="materialize-textarea"></textarea>
              <label for="description" class="">Any note(optional)</label>
        </div> -->
                <div>
                    <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add to cart
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="divider"></div>
            
          </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->


  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2019 <a class="grey-text text-lighten-4" href="#" target="_blank">Group 2</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">Group 2</a></span>
        </div>
    </div>
  </footer>
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
  
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
      <?php
      $result = mysqli_query($con, "SELECT * FROM Item;");
      while($row = mysqli_fetch_array($result))
      {
        echo $row["id"].':{
        min: 0,
        max: 10
        },
        ';
      }
    echo '},';
    ?>
        messages: {
      <?php
      $result = mysqli_query($con, "SELECT * FROM Item;");
      while($row = mysqli_fetch_array($result))
      {  
        echo $row["id"].':{
        min: "Minimum 0",
        max: "Maximum 10"
        },
        ';
      }
    echo '},';
    ?>
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
    </script>
</body>

</html>
<?php
  }
  else
  {
    if($_SESSION['admin_sid']==session_id())
    {
      header("location:admin-page.php");    
    }
    else{
      header("location:login.php");
    }
  }
?>