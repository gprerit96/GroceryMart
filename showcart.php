
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
                            <!-- <ul class="left">                      
                                <li>
                                    <h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/materialize-logo.png" alt="logo" height= 50px width=25px></a> <span class="logo-text">Logo</span>
                                    </h1>
                                </li>
                            </ul> -->
                                    
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
                                            $user_id= $_SESSION['user_id'];
                                            $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE U_Id = $user_id;");
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
  <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Cart Details</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <p class="caption">Order your Grocery here.</p>
          <div class="divider"></div>
      <form class="formValidate" id="formValidate" method="post" action="place-order.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Order Grocery</h4>
              </div>
              <div>
                  <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Store Name</th>
                        <th>Final Price</th>
                        <th>Quantity</th>
                        <th>Net Price</th>
                        <th> delete</th>
                      </tr>
                    </thead>

                    <tbody>
        <?php
      
        $u_id = $_SESSION['user_id'];

        $my_cart = mysqli_query($con, "SELECT * FROM Cart WHERE Cart.U_Id=$u_id;");
        $total = 0;
        while($row = mysqli_fetch_array($my_cart))
        {
          // echo $row['I_Id'];
          

          $iid=$row['I_Id'];
          $sid=$row['S_Id'];
          $i_name = mysqli_query($con, "SELECT Name from Item I WHERE I.I_Id=$iid;");
          $price = mysqli_query($con, "SELECT Price from Item I WHERE I.I_Id=$iid;");
          $s_name = mysqli_query($con, "SELECT Name from Store S WHERE S.S_Id=$sid;");
          $discount = mysqli_query($con, "SELECT Discount from Sold_By S WHERE S.S_Id=$sid AND S.I_Id=$iid;");
          $iname =mysqli_fetch_array($i_name);
          $sname =mysqli_fetch_array($s_name);
          $discount_value =mysqli_fetch_array($discount);
          $price_value =mysqli_fetch_array($price);
          $temp = $discount_value['Discount'];
          $f_price = (1 - $temp/100)*$price_value['Price'];
          $net_price = $f_price*$row['Quantity']; 
          echo '<tr><td>'.$iname['Name'].'</td><td>'.$sname['Name'].'</td><td>'.$f_price.'</td><td>'.$row['Quantity'].'</td><td>'.$net_price.'</td>';
        echo "<td><a href='routers/delete.php?sid=".$sid."&iid=".$iid."'>Delete</a></td>";
        echo "</tr>";
          $total = $total + $net_price;                     
          //echo '<td><div class="input-field col s12"><label for='.$row["id"].' class="">Quantity</label>';
            //echo '<input id="'.$row["id"].'" name="'.$row['id'].'" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td></tr>';  
          //$total = $total + $net_price;
        }
        // echo 'Total =', $total;

        ?>
                    </tbody>
</table> <?php echo "<h5>","Total Amount: ₹",$total,"</h5>"; ?>
              </div>
        <!-- <div class="input-field col s12">
              <i class="mdi-editor-mode-edit prefix"></i>
              <textarea id="description" name="description" class="materialize-textarea"></textarea>
              <label for="description" class="">Any note(optional)</label>
        </div> -->
        <div>
            <div class="input-field col s12">
                <button class="btn cyan waves-effect waves-light right" type="submit" name="action" href='place-order.php'>Proceed to Payment
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