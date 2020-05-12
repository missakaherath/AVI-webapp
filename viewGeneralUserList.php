<!DOCTYPE HTML>
<html>
<?php require_once('./PHP/initialize.php'); ?>

<head>
	<title>About</title>

	<style >
    		table{
    			border-collapse: collapse;
    			width: 95%;
    			color: #588c7e;
    			font-family: monospace;
    			font-size: 15px;
    			text-align: left;
    			margin: 2.5% 0 0 2.5%;
    		}
    		th{
    			background-color: #3d3d29;
    			color: white;
    			padding: 1%;
    		}tr{
    			background-color: #f2f2f2;
    		}
    		td{
    			height: 30px;
			}
			.container-table{
                font-family: sans-serif;
                border-collapse: collapse;
                margin: 25px 25px;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 5px 5px 5px 5px;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                padding : 10px 10px 10px 10px;
            }
            .container-table th{
                padding : 10px;
                /* text-align: center; */
                background-color: #009879;
                color: #ffffff;
                text-align: left;
                font-weight: bold;
            }
            .container-table th, .container-table td{
                padding: 12px 15px;
                text-align: left;
            }
            .container-table tr {
                /* border-bottom: 1px solid #dddddd; */
            }
            .container-table tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }
            .container-table tr:last-of-type {
                 border-bottom: 2px solid #009879;
            }

            .container-table tr{
            font-weight: bold;
            color: #009879;
            }
    	</style>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Web application integrated to the AVI system which is developed for automatic vehicle number plate recognition" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.8.3.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!---End-smoth-scrolling---->
</head>
<body>
	<div style="background-color: #e5f4f1" class="header">
		<div class="container">
			<div class="header-top">
				<div class="logo">
				<a href="homePage.php">
					<img alt="AVI" src="images/4.png" width="70px" height="70px" style="margin-top:-20px">
				</a>
					<!-- <a style="color: #0b0b0b" href="index.html">A V I</a> -->
				</div>
				<div class="top-menu">
					<span class="menu"><img src="images/nav.png" alt=""/> </span>
						<ul>
							<li><a href="homePage.php">home</a></li>
							<li><a href="viewBlockedVehicles.php">Blacklisted Vehicles</a></li>
							<li><a href="viewReleasedVehicles.php">Released Vehicles</a></li>
							<li><a href="viewAdminList.php">Admin List</a></li>
							<li><a class="active" href="viewGeneralUserList.php">General Users</a></li>
                            <li><a href="LogOut.php">Logout</a></li>
						</ul>
				</div>
				<!--script-nav-->
						 <script>
						 $("span.menu").click(function(){
						 $(".top-menu ul").slideToggle("slow" , function(){
						 });
						 });
						 </script>
					<div class="clearfix"></div>
				</div>
				</div>
					 <!-- Slider-starts-Here -->
	 <script src="js/responsiveslides.min.js"></script>
	 <script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto:true,
			nav: false,
			speed: 500,
			namespace: "callbacks",
			pager:true,
		  });
		});
		
	   </script>
	<div class="banner">		  			
		<div class="bnr2">						  
	</div>
    <div>
    	<table class="container-table">
    		<tr>
    			<th>General User</th>
    			<th>Branch</th>
    			<th>Registration No</th>
    			<th style='text-align: center;'>Status</th>
    			<th style='text-align: center;'>Edit</th>
    			<th style='text-align: center;'>Remove</th>
    		</tr>

    <?php
    	$userList=$_SESSION['userList'];
    	foreach ($userList as $user){
    		$fullName=$user['name'];
    		$userID=$user['userID'];
    		$branch=$user['branchName'];
    		$regNo=$user['regNo'];
    		if ($user['isActive']==1){
    			$isActive="active";
    		}else{
    			$isActive="Inactive";
    		}
    		echo "<tr style='border: 1px #3d3d29; color: #009879; font-weight: bold;'>
    		<form class=\"box\" action=\"./PHP/manager.php\" method=\"post\">
    			<input type='hidden' name='name' value=". $fullName . ">
    			<input type='hidden' name='branch' value=". $branch . ">
    			<input type='hidden' name='regNo' value=". $regNo . ">
    			<td style='padding:0.5%;'>".$fullName."</td>
    			<td style='padding:0.5%;'>".$branch."</td>
    			<td style='padding:0.5%;'>".$regNo."</td>
    			<td style='text-align: center;'>".$isActive."</td>
    			<td style='text-align: center;'>" .  '<button name="edit_G_user" type="submit" value="'.$userID .'" >Edit Details</button>'.  "</td>
    			<td style='text-align: center;'>" .  '<button name="remove_G_user" type="submit" value="'.$userID .'" >Change State</button>'.  "</td>

    			</form>
    		</tr>";
    }
    	echo "</table>";
     ?>
     </table>
    </div>

</body>
</html>