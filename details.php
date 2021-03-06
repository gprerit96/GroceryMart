<?php
include 'includes/connect.php';
// print_r($_SESSION);
$email = $_SESSION['email'];
$name = $_SESSION['firstname'];
$result = mysqli_query($con, "SELECT * FROM Users where Email = '$email'");
while($row = mysqli_fetch_array($result)){
$firstname = $row['Name_f'];
$lastname = $row['Name_l'];

//$sql_address=mysqli_query($con,"Select address from User_ph where");
}
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
  <title>Edit Details</title>
  <style>
.btn {
  border: none;
  background-color: inherit;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  display: inline-block;
}

.btn:hover {background: #eee;}

.success {color: green;}
.info {color: dodgerblue;}
.warning {color: orange;}
.danger {color: red;}
.default {color: black;}
</style>

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

                    <!-- <ul class="left">   

                      <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/materialize-logo.png" alt="logo" height= 50px width=25px></a> <span class="logo-text">Logo</span></h1></li>
                    </ul>	 -->
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
                
            <li class="bold active"><a href="details.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Edit Details</a>
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
                <h5 class="breadcrumbs-title">User Details</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
            <p class="caption">Edit your details here which are required for delivery and contact.</p>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m4 l3">
                    <h4 class="header">Details</h4>
                </div>
                <div>
                    <div class="card-panel">
                        <!-- <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-communication-email prefix"></i>
                                <input name="email" id="email" type="email" value="<?php echo $email;?>" data-error=".errorTxt3">
                                <label for="email" class="">Email</label>
                                <div class="errorTxt3"></div>
                            </div>
                        </div> -->
                        <div class="row">
                            <form class="formValidate" id="formValidate" method="post" action="routers/details-router.php" novalidate="novalidate"class="col s12">
                              <div class="row"></div>
                              <b>Email:  </b><?php echo $email; ?>
                          
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-account-circle prefix"></i>
                                        <input name="Name_f" id="Name_f" type="text" value="<?php echo $firstname;?>" data-error=".errorTxt2">
                                        <label for="Name_f" class="">First_Name</label>
						                  <div class="errorTxt2"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-account-circle prefix"></i>
                                        <input name="Name_l" id="Name_l" type="text" value="<?php echo $lastname;?>" data-error=".errorTxt2">
                                        <label for="Name_l" class="">Last_Name</label>
                                        <div class="errorTxt2"></div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-lock-outline prefix"></i>
                                        <input name="password" id="password" type="password" data-error=".errorTxt4">
                                        <label for="password" class="">Password</label>
						                <div class="errorTxt4"></div>
                                    </div>
                                </div> -->
                                
                            </div>					  
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                        <i class="mdi-content-send right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <button class="btn success" onclick="showDiv()">change password</button>
                                <div class="row" id ="old_password" style="display: none;">
                                    <form class="formValidate" id="formValidate" method="post" action="routers/password-router.php" novalidate="novalidate"class="col s12">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-account-circle prefix"></i>
                                        <input name="old_password_edit" id="old_password_edit" type="text" value="" data-error=".errorTxt3">
                                        <label for="old_password_edit" class="">old password</label>
                                        <div class="errorTxt3"></div>
                                    </div>
                                <div class="row" id ="new_password" style="display: none;">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-account-circle prefix"></i>
                                        <input name="new_password_edit" id="new_password_edit" type="text" value="" data-error=".errorTxt3">
                                        <label for="new_password_edit" class="">new password</label>
                                        <div class="errorTxt3"></div>
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
                     <?php
                            if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                                echo "Wrong Password";
                            }
                            ?>

                <div class="divider"></div>

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

                    <div>
                      <h5>Address details</h5>
                    <table id="address_display" class="responsive-table display" cellspacing="0">
                        <thead>
                            <tr>
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
                                // $i_id = $_GET['link'];
                                // $_POST['item_id'] = $i_i
        //$sql_item = mysqli_query($con, "SELECT * FROM Item WHERE  I_Id = $i_id;");
        //$result = mysqli_query($con, "SELECT * FROM Item;");
        //$result = mysqli_query($con, "SELECT S.Name AS Name,Rating,Discount FROM Item INNER JOIN Sold_By USING "I_Id" INNER JOIN Store S USING " S_Id" WHERE I_Id = $i_id;");
                                $result = mysqli_query($con, "SELECT * from user_add where U_Id = '$user_id';");
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo '<tr><td>'.$row["A_street"].'</td><td>'.$row["A_city"].'</td><td>'.$row["A_state"].'</td><td>'.$row["A_PIN"].'</td><td>'.$row["Phone_no"].'</td></tr>';                      
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                        </div>
                </div>
                   </div>
                </div>
              </div>
            <div class="divider"></div>
            
          </div>
        <!--end container-->

      </section>
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
    <script type="text/javascript">
function showDiv() {
   document.getElementById('new_password').style.display = "block";
   document.getElementById('old_password').style.display = "block";
}

function showDivaddress() {
   document.getElementById('street_div').style.display = "block";
   document.getElementById('city_div').style.display = "block";
   document.getElementById('state_div').style.display = "block";
   document.getElementById('pin_div').style.display = "block";
   document.getElementById('phone_div').style.display = "block";

}
</script>

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

    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
				maxlength: 10
            },
            name: {
                required: true,
                minlength: 5,
				maxlength: 15
            },
            email: {
				required: true,
				maxlength: 35,
			},
			password: {
				required: true,
				minlength: 5,
				maxlength: 16,
			},
            phone: {
				required: true,
				minlength: 4,
				maxlength: 11
			},
			address: {
				required: true,
				minlength: 10,
				maxlength: 300
			},
        },
        messages: {
            username: {
                required: "Enter username",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 10 characters are required."				
            },
            name: {
                required: "Enter name",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 15 characters are required."
            },
            email: {
				required: "Enter email",
                maxlength: "Maximum 35 characters are required."				
			},
			password: {
				required: "Enter password",
				minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 16 characters are required."				
			},
            phone:{
				required: "Specify contact number.",
				minlength: "Minimum 4 characters are required.",
                maxlength: "Maximum 11 digits are accepted."				
			},	
            address:{
				required: "Specify address",
				minlength: "Minimum 10 characters are required.",
                maxlength: "Maximum 300 characters are accepted."				
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
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:admin-page.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>