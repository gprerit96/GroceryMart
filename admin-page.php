<?php
include 'includes/connect.php';

    $name = $_SESSION['firstname'];

  if($_SESSION['admin_sid']==session_id())
  {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Grocery List</title>

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
                    <h4 align='center'>Grocery Mart</h4>
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
            <li class="bold active"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Manage Stores & Items</a>
            </li>
                    
            <li class="bold"><a href="users.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Users</a>
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
                <h5 class="breadcrumbs-title">Grocery List</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <p class="caption">Add, Edit or Remove Stores.</p>
          <div class="divider"></div>
      <form class="formValidate" id="formValidate" method="post" action="routers/modify-store.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">List of Stores</h4>
              </div>
              <div>
        <table id="data-table-admin" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Manager</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>PIN</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Delete</th>
                        <th>Modify</th>
                      </tr>
                    </thead>

                    <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM store where deleted = 0;");
        while($row = mysqli_fetch_array($result))
        {
          echo '<tr><td><div class="input-field col s12"><label for="'.$row["S_Id"].'_name">Name</label>';
          echo '<input value="'.$row["Name"].'" id="'.$row["S_Id"].'_name" name="'.$row['S_Id'].'_name" type="text" data-error=".errorTxt'.$row["S_Id"].'"><div class="errorTxt'.$row["S_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["S_Id"].'_manager">Manager</label>';
          echo '<input value="'.$row["Manager"].'" id="'.$row["S_Id"].'_manager" name="'.$row['S_Id'].'_manager" type="text" data-error=".errorTxt'.$row["S_Id"].'"><div class="errorTxt'.$row["S_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["S_Id"].'_street">Street</label>';
          echo '<input value="'.$row["A_street"].'" id="'.$row["S_Id"].'_street" name="'.$row['S_Id'].'_street" type="text" data-error=".errorTxt'.$row["S_Id"].'"><div class="errorTxt'.$row["S_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["S_Id"].'_city">City</label>';
          echo '<input value="'.$row["A_city"].'" id="'.$row["S_Id"].'_city" name="'.$row['S_Id'].'_city" type="text" data-error=".errorTxt'.$row["S_Id"].'"><div class="errorTxt'.$row["S_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["S_Id"].'_state">State</label>';
          echo '<input value="'.$row["A_state"].'" id="'.$row["S_Id"].'_state" name="'.$row['S_Id'].'_state" type="text" data-error=".errorTxt'.$row["S_Id"].'"><div class="errorTxt'.$row["S_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["S_Id"].'_pin">PIN</label>';
          echo '<input value="'.$row["A_PIN"].'" id="'.$row["S_Id"].'_pin" name="'.$row['S_Id'].'_pin" type="text" data-error=".errorTxt'.$row["S_Id"].'"><div class="errorTxt'.$row["S_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["S_Id"].'_email">Email</label>';
          echo '<input value="'.$row["Email"].'" id="'.$row["S_Id"].'_email" name="'.$row['S_Id'].'_email" type="text" data-error=".errorTxt'.$row["S_Id"].'"><div class="errorTxt'.$row["S_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["S_Id"].'_contact">Contact</label>';
          echo '<input value="'.$row["Phone_no"].'" id="'.$row["S_Id"].'_contact" name="'.$row['S_Id'].'_contact" type="text" data-error=".errorTxt'.$row["S_Id"].'"><div class="errorTxt'.$row["S_Id"].'"></div></td>'; 
          echo "<td>
                <a href='routers/store-delete.php?sid=".$row["S_Id"]."'>delete</a></td>";
          echo "<td>
                <a href='store-item.php?sid=".$row["S_Id"]."'>modify-items</a>
              </td></tr>";                         
         }
        ?>
                    </tbody>
</table>
              </div>
        <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
      </form>
      <form class="formValidate" id="formValidate1" method="post" action="routers/add-store.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Add Store</h4>
              </div>
              <div>
<table>
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Manager</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>PIN</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <!-- <th data-field="id">Name</th>
                        <th data-field="name">Item Price/Piece</th> -->
                      </tr>
                    </thead>

                    <tbody>
        <?php
          echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';
          echo '<input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';         
          echo '<td><div class="input-field col s12 "><label for="manager" class="">Manager</label>';
          echo '<input id="manager" name="manager" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';
          echo '<td><div class="input-field col s12 "><label for="street" class="">Street</label>';
          echo '<input id="street" name="street" type="text" data-error=".errorTxt03"><div class="errorTxt03"></div></td>';
          echo '<td><div class="input-field col s12 "><label for="city" class="">City</label>';
          echo '<input id="city" name="city" type="text" data-error=".errorTxt05"><div class="errorTxt04"></div></td>';
          echo '<td><div class="input-field col s12 "><label for="state" class="">State</label>';
          echo '<input id="state" name="state" type="text" data-error=".errorTxt06"><div class="errorTxt05"></div></td>';
          echo '<td><div class="input-field col s12 "><label for="pin" class="">PIN</label>';
          echo '<input id="pin" name="pin" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';
          echo '<td><div class="input-field col s12 "><label for="email" class="">Email</label>';
          echo '<input id="email" name="email" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';
          echo '<td><div class="input-field col s12 "><label for="contact" class="">Contact</label>';
          echo '<input id="contact" name="contact" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';                   
          echo '<td></tr>';
        ?>
                    </tbody>
</table>
              </div>
        <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
      </form>     
            <div class="divider"></div>
            
          </div>
        
        <!--end container-->

        <!--start container-->
        <div class="container">
          <p class="caption">Add, Edit or Remove Items.</p>
          <div class="divider"></div>
      <form class="formValidate" id="formValidate" method="post" action="routers/modify-item.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">List of Items</h4>
              </div>
              <div>
        <table id="data-table-admin" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Manufacturer</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th>Delete</th>
                      </tr>
                    </thead>

                    <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM item where deleted = 0;");
        while($row = mysqli_fetch_array($result))
        {
          echo '<tr><td><div class="input-field col s12"><label for="'.$row["I_Id"].'_name">Name</label>';
          echo '<input value="'.$row["Name"].'" id="'.$row["I_Id"].'_name" name="'.$row['I_Id'].'_name" type="text" data-error=".errorTxt'.$row["I_Id"].'"><div class="errorTxt'.$row["I_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["I_Id"].'_manf_by">Manufacturer</label>';
          echo '<input value="'.$row["Manf_by"].'" id="'.$row["I_Id"].'_manf_by" name="'.$row['I_Id'].'_manf_by" type="text" data-error=".errorTxt'.$row["I_Id"].'"><div class="errorTxt'.$row["I_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["I_Id"].'_type">Type</label>';
          echo '<input value="'.$row["Type"].'" id="'.$row["I_Id"].'_type" name="'.$row['I_Id'].'_type" type="text" data-error=".errorTxt'.$row["I_Id"].'"><div class="errorTxt'.$row["I_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["I_Id"].'_price">Price</label>';
          echo '<input value="'.$row["Price"].'" id="'.$row["I_Id"].'_price" name="'.$row['I_Id'].'_price" type="text" data-error=".errorTxt'.$row["I_Id"].'"><div class="errorTxt'.$row["I_Id"].'"></div></td>';

          echo '<td><div class="input-field col s12"><label for="'.$row["I_Id"].'_details">Details</label>';
          echo '<input value="'.$row["Details"].'" id="'.$row["I_Id"].'_details" name="'.$row['I_Id'].'_details" type="text" data-error=".errorTxt'.$row["I_Id"].'"><div class="errorTxt'.$row["I_Id"].'"></div></td>';

          echo "<td>
                <a href='routers/item-delete.php?iid=".$row["I_Id"]."'>delete</a>
              </td></tr>";                         
         }
        ?>
                    </tbody>
</table>
              </div>
        <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
      </form>
      <form class="formValidate" id="formValidate1" method="post" action="routers/add-item.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Add Item</h4>
              </div>
              <div>
<table>
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Manufacturer</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Details</th>
                      </tr>
                    </thead>

                    <tbody>
        <?php
          echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';
          echo '<input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';         
          echo '<td><div class="input-field col s12 "><label for="manf_by" class="">Manufacturer</label>';
          echo '<input id="manf_by" name="manf_by" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';
          echo '<td><div class="input-field col s12 "><label for="type" class="">Type</label>';
          echo '<input id="type" name="type" type="type" data-error=".errorTxt03"><div class="errorTxt03"></div></td>';
          echo '<td><div class="input-field col s12 "><label for="price" class="">Price</label>';
          echo '<input id="price" name="price" type="text" data-error=".errorTxt05"><div class="errorTxt04"></div></td>';
          echo '<td><div class="input-field col s12 "><label for="details" class="">Details</label>';
          echo '<input id="details" name="details" type="text" data-error=".errorTxt06"><div class="errorTxt05"></div></td>';          
          echo '<td></tr>';
        ?>
                    </tbody>
</table>
              </div>
        <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
      </form>     
            <div class="divider"></div>
            
          </div>
        </div>
        </div>
        <!--end container-->


      </section>
      <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->




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
      $result = mysqli_query($con, "SELECT * FROM items");
      while($row = mysqli_fetch_array($result))
      {
        echo $row["id"].'_name:{
        required: true,
        minlength: 5,
        maxlength: 20 
        },';
        echo $row["id"].'_price:{
        required: true, 
        min: 0
        },';        
      }
    echo '},';
    ?>
        messages: {
      <?php
      $result = mysqli_query($con, "SELECT * FROM items");
      while($row = mysqli_fetch_array($result))
      {  
        echo $row["id"].'_name:{
        required: "Ener item name",
        minlength: "Minimum length is 5 characters",
        maxlength: "Maximum length is 20 characters"
        },';
        echo $row["id"].'_price:{
        required: "Ener price of item",
        min: "Minimum item price is Rs. 0"
        },';        
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
    <script type="text/javascript">
    $("#formValidate1").validate({
        rules: {
    name: {
        required: true,
        minlength: 5
      },
    price: {
        required: true,
        min: 0
      },
  },
        messages: {
    name: {
        required: "Enter item name",
        minlength: "Minimum length is 5 characters"
      },
     price: {
        required: "Enter item price",
        minlength: "Minimum item price is Rs.0"
      },
  },
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
    if($_SESSION['customer_sid']==session_id())
    {
      header("location:index.php");   
    }
    else{
      header("location:login.php");
    }
  }
?>