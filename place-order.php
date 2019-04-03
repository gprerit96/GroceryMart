<?php
  include 'includes/connect.php';

  if($_SESSION['customer_sid']==session_id())
  {
    $user_id =$_SESSION['user_id'];
    $name = $_SESSION['firstname'];
    // $result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
    // while($row = mysqli_fetch_array($result)){

    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Provide Order Details</title>

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


  .table-responsive tbody tr {
  cursor: pointer;
}
.table-responsive .table thead tr th {
  padding-top: 15px;
  padding-bottom: 15px;
}
.table-responsive .table tbody tr td {
  padding-top: 15px;
  padding-bottom: 10px;
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
                      <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/materialize-logo.png" alt="logo" height= 50px width=25px></a> <span class="logo-text">Logo</span></h1></li>
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
            <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Order Grocery</a>
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

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
        <!--breadcrumbs end-->


        <!--start container-->
				    <div class="container">
              <div class="divider"></div>
                <div class="row">

                  <div class="col s12 m4 l3">
                  </div>
                  <div>
                    <div class="card-panel">
                        <div class="table-responsive">
                          <h5>Address details</h5>
                            <table id="address_display" class="table table-hover" cellspacing="0">
                            <thead>
                              <tr>
                                <th>select</th>
                                <th>street</th>
                                <th>city</th>
                                <th>state</th>
                                <th>pin</th>
                                <th>phone</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                                $user_id = $_SESSION['user_id'];
                                $result = mysqli_query($con, "SELECT * from user_add where U_Id = '$user_id';");
                                $count=1;
                                while($row = mysqli_fetch_array($result))
                                {
                                  echo '<tr>
                                  <td>'
                                     .$count. 
                                    '</td>
                                  <td><input type="radio" name="news2" value="1"></td>
                                  <td>'.$row["A_street"].'</td><td>'.$row["A_city"].'</td><td>'.$row["A_state"].'</td><td>'.$row["A_PIN"].'</td><td>'.$row["Phone_no"].'</td></tr>'; 
                                  $count+=1;                     
                                }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  <div class="row">
                    <button class="btn success" onclick="showDivaddress()">add address</button>
                      <div class="row" id ="street_div" style="display: none;">
                        <form class="formValidate" id="formValidate" method="post" action="routers/address-router.php" novalidate="novalidate"class="col s12">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="street" id="street" type="text" value="" data-error=".errorTxt8">
                            <label for="street" class="">street</label>
                            <div class="errorTxt8"></div>
                        </div>
                    <div class="row" id ="city_div" style="display: none;">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="city" id="city" type="text" value="" data-error=".errorTxt9">
                            <label for="city" class="">city</label>
                            <div class="errorTxt9"></div>
                        </div>
                    </div>
                    <div class="row" id ="state_div" style="display: none;">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="state" id="state" type="text" value="" data-error=".errorTxt10">
                            <label for="state" class="">state</label>
                            <div class="errorTxt10"></div>
                        </div>
                    </div>

                    <div class="row" id ="pin_div" style="display: none;">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="pin" id="pin" type="text" value="" data-error=".errorTxt11">
                            <label for="pin" class="">pin</label>
                            <div class="errorTxt11"></div>
                        </div>
                    </div>
                    <div class="row" id ="phone_div" style="display: none;">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="phone" id="phone" type="text" value="" data-error=".errorTxt12">
                            <label for="phone" class="">phone</label>
                            <div class="errorTxt12"></div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </div>
              </form>
            </div>
        </div>
                        
        <div class="container">
              <div class="divider"></div>
                <div class="row">

                  <div class="col s12 m4 l3">
                  </div>
                  <div>
                    <div class="card-panel">
                        <div class="table-responsive">
                          <h5>card details</h5>
                            <table id="card_display" class="table table-hover" cellspacing="0">
                            <thead>
                              <tr>
                                <th>select</th>
                                <th>card number</th>
                                <th>first name</th>
                                <th>last name</th>
                                <th>expriry date</th>
                                <th>type</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                                $user_id = $_SESSION['user_id'];
                                $result = mysqli_query($con, "SELECT * from card_details where U_Id = '$user_id';");
                                $count1 = 1;
                                $rowid = "radio";
                                while($row = mysqli_fetch_array($result))
                                {
                                  echo '<tr>
                                    <td>'
                                     .$count1. 
                                    '</td>
                                  <td>'.$row["Card_No"].'</td><td>'.$row["Name_f"].'</td><td>'.$row["Name_l"].'</td><td>'.$row["Expiry_date"].'</td><td>'.$row["Type"].'</td></tr>';                      
                                  $count1+=1;
                        
                                }
                              ?>
                            </tbody>
                          </table>

                          
                        </div>
                      </div>
                    </div>

                  <div class="row">
                    <button class="btn success" onclick="showDivcard()">add credit/debit card</button>
                      <div class="row" id ="cardno_div" style="display: none;">
                        <form class="formValidate" id="formValidate" method="post" action="routers/card-router.php" novalidate="novalidate"class="col s12">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="cardno" id="cardno" type="text" value="" data-error=".errorTxta">
                            <label for="cardno" class="">Card Number</label>
                            <div class="errorTxta"></div>
                        </div>
                    <div class="row" id ="firstname_div" style="display: none;">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="firstname" id="firstname" type="text" value="" data-error=".errorTxtz">
                            <label for="firstname" class="">First Name</label>
                            <div class="errorTxtz"></div>
                        </div>
                    </div>
                    <div class="row" id ="lastname_div" style="display: none;">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="lastname" id="lastname" type="text" value="" data-error=".errorTxtq">
                            <label for="lastname" class="">Last Name</label>
                            <div class="errorTxtq"></div>
                        </div>
                    </div>

                    <div class="row" id ="expirydate_div" style="display: none;">
                      <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                      <b style="margin-left: 60px">Expiry_date :</b>
                      <div class="divider"></div>
                       <input type="date" name="expirydate">
                        <!-- <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="exprirydate" id="exprirydate" type="date" value="" data-error=".errorTxtw">
                            <label for="exprirydate" class="">Expiry date</label>
                            <div class="errorTxtw"></div> -->
                          </div>
                    </div>
                    <div class="row" id ="type_div" style="display: none;">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input name="type_card" id="type_card" type="text" value="" data-error=".errorTxe">
                            <label for="type_card" class="">Type</label>
                            <div class="errorTxte"></div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </div>
              </form>

            </div>

        </div>

          

                <div>
                  <div class="card-panel">
                    <div class="row">
                          <form class="formValidate" id="formValidate" method="post" action="order_summary.php" novalidate="novalidate"class="col s12">

                            <?php
                              $temp =$count-1;
                                echo "<b>Select option for address</b><select name ='address' id ='address' style= 'width : 50px'>";
                                while($temp!=0){
                                  echo "<option value ='$temp'>".$temp.'</option>';
                                  $temp-=1;
                                
                                }
                                  echo '</select>';
                            ?>



                            <?php
                              echo "<b>Select option for card</b><select name ='card' style= 'width : 1px'>";
                              $temp =$count1-1;
                              while($temp!=0){
                                echo "<option value ='$temp'>".$temp.'</option>';
                                $temp-=1;
                              }
                                echo '</select>';
                              ?>
                    <div class="row">
                    <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!--end container-->

      </section >
      <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->

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
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />

    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>	
	<script type="text/javascript" src="js/plugins/formatter/jquery.formatter.min.js"></script>   
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
	<script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            address: {
                required: true,
                minlength: 5
            },
            cc_number: {
                required: true,
                minlength: 16,
            },
            cvv_number: {
                required: true,
                minlength: 3,
			},
		},
        messages: {
           address:{
                required: "Enter a address",
                minlength: "Enter at least 5 characters"
            },	
           cc_number:{
                required: "Please provide card number",
                minlength: "Enter at least 16 digits",
            },	
           cvv_number:{
                required: "Please provide CVV number",
                minlength: "Enter at least 3 digits",		
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
	  $('#cc_number').formatter({
          'pattern': '{{9999}}-{{9999}}-{{9999}}-{{9999}}',
          'persistent': true
      });
	  $('#cvv_number').formatter({
          'pattern': '{{9}}-{{9}}-{{9}}',
          'persistent': true
      });
		$('#payment_type').change(function() {
		if ($(this).val() === 'Cash On Delivery') {
		  $("#cc_number").prop('disabled', true);
		  $("#cvv_number").prop('disabled', true);		  
		}
		if ($(this).val() === 'Wallet'){
		  $("#cc_number").prop('disabled', false);
		  $("#cvv_number").prop('disabled', false);	
		}
		});
    function showDivaddress() {
   document.getElementById('street_div').style.display = "block";
   document.getElementById('city_div').style.display = "block";
   document.getElementById('state_div').style.display = "block";
   document.getElementById('pin_div').style.display = "block";
   document.getElementById('phone_div').style.display = "block";

}

 function showDivcard() {
   document.getElementById('cardno_div').style.display = "block";
   document.getElementById('firstname_div').style.display = "block";
   document.getElementById('lastname_div').style.display = "block";
   document.getElementById('expirydate_div').style.display = "block";
   document.getElementById('type_div').style.display = "block";

}
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