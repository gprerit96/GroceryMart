<?php


// $selectoption =$_POST['address'];
// echo $selectoption;

// foreach($_POST as $key=>$value)
// 	{
// 		if($key!= "action"){
// 			echo $key;
// 			echo "<br>";
// 			echo $value;
// 			echo "<br>";
// 		}
// 	}


?>


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

        <section id="content">
        	<h3 align="center"> Thank you for Ordering</h3>
        	<h5>Your order details</h5>
        	<div class="container">
        	<div class="row">
        	<div>
                <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Store Name</th>
                        <th>Final Price</th>
                        <th>Quantity</th>
                        <th>Net Price</th>
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
		          echo '<tr><td>'.$iname['Name'].'</td><td>'.$sname['Name'].'</td><td>'.$f_price.'</td><td>'.$row['Quantity'].'</td><td>'.$net_price.'</td></tr>'; 
		          $total = $total + $net_price;                     
		          //echo '<td><div class="input-field col s12"><label for='.$row["id"].' class="">Quantity</label>';
		            //echo '<input id="'.$row["id"].'" name="'.$row['id'].'" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td></tr>';  
		          //$total = $total + $net_price;
        		}
        // echo 'Total =', $total;

       			 ?>
                    </tbody>
				</table> 
						<?php echo "<h5>","Total Amount: ₹",$total,"</h5>"; ?>
              </div>
			</div>
		</div>
		<b>Address: </b>
			<?php
				$result_card = mysqli_query($con, "SELECT * from card_details where U_Id = '$user_id';");
				$count_card =1;
				$cardno =0;
				while($row = mysqli_fetch_array($result_card))
                {
                	if($count_card == $_POST['card']){
                		$cardno = $row['Card_No'];
                	}
                	$count_card+=1;
                }

                $timestamp = date("Y-m-d H:i:s");
				$result = mysqli_query($con, "SELECT * from user_add where U_Id = '$user_id';");

				$count=1;
                while($row = mysqli_fetch_array($result))
                {
                	if ($count == $_POST['address']) {

                		$street = $row['A_street'];
                		$city = $row['A_city'];
                		$state = $row['A_state'];
                		$pin = $row['A_PIN'];
                		$phone_no =$row['Phone_no'];
                		echo '<p>'.$row["A_street"].','.$row["A_city"].','.$row['A_state'].','.$row["A_PIN"].','.$row["Phone_no"].'</p>';

                		break;
                	}
                	$count+=1;
                }
			?>

			<b> Delivered by:</b>

			<?php
			$sql = " select * from delivery_person where Available = '1'";
			$result =mysqli_query($con,$sql);

			$count = mysqli_num_rows($result);
			$d_id = 0;
			if($count >= 1){
				$row = mysqli_fetch_array($result);
				echo '<p>'.$row["Name_f"].' '.$row["Name_l"].'</p>';
				$d_id = $row["D_Id"];
				$sql_ph =  "select * from delivery_ph where D_id = '$d_id'";
				$result_ph =mysqli_query($con,$sql_ph);
				$row_ph = mysqli_fetch_array($result_ph);
				echo '<p> Phone: '.$row_ph["Phone_No"].'</p>';

				$sql_insert= "insert into orders(Date_time,Amount,U_Id,A_street,A_city,A_state,A_PIN,Phone_no,Card_No,D_Id) values('$timestamp','$total','$user_id','$street','$city','$state','$pin','$phone_no','$cardno','$d_id');";
				$result_insert = mysqli_query($con, $sql_insert);
			}
			else echo "delivery boy soon to be assigned";


			$sql_orderid = "select * from orders where Date_time = '$timestamp';";
			$result_orderid = mysqli_query($con, $sql_orderid);
			$row_orderid = mysqli_fetch_array($result_orderid);
			$orderid = $row_orderid['Order_Id'];

			$my_cart = mysqli_query($con, "SELECT * FROM Cart WHERE Cart.U_Id=$u_id;");
	        while($row = mysqli_fetch_array($my_cart))
	        {
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
	          $quantity = $row['Quantity'];
	          $sql_insert_order = "insert into order_details values('$orderid','$iid','$quantity','null','$net_price','$sid');";
	          $sql_result = mysqli_query($con,$sql_insert_order);
	          $sql_update = "update sold_by set Available_qty = Available_qty - '$quantity' where S_Id = '$sid' and I_Id = '$iid';";
	          $sql_result = mysqli_query($con,$sql_update);
    		}

			$sql_empty = "delete from cart where U_Id ='$user_id';";
			$result_delete = mysqli_query($con, $sql_empty);

			?>



			<br>
        	<a href="orders.php">View all orders</a>
        	<a href="index.php"> order more items</a>

        </section>


    </div>
</div>
<footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2019 <a class="grey-text text-lighten-4" href="#" target="_blank">Group 2</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">Group 2</a></span>
        </div>
    </div>
  </footer>

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