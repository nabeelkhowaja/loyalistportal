<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Loyalist Portal</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <style>
        #logout {
            height: 30px;
            text-align: right;
            right: 160px;
            position: fixed;
        }
    </style>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><b>Loyalist Portal</b></a>
            </div>


            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                   
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#view">View</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#addemployee">Add Employee</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#editdetails">Edit Details</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="about_us.php">About Us</a>
                    </li>
                    <li id="logout">
                        <a class="page-scroll" href="logout.php">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section id="intro" class="intro-section">
    	<header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                	<h1 id="headingintro">Welcome to Loyalist Portal</h1>
                	<a href="#view" class="button page-scroll">Start Exploring</a>
                </div>  
            </div>
        </div>
        </header>
    </section>

    <section id="view" class="view-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>View</h1>
                    <BR>
                    <p style="text-align: left;">
                    Employees are the most valuable assets an organization has. It's their abilities, knowledge, and experience that can't be replaced.
                    Click '<span style="color: #FF9131;">All employees</span>' to view all the employees working at Loyalist college.<br> 
                    <br>
                    Loyalist college has many departments. Most of the employees work across departments to gain a holistic view of the organization’s work.
                    '<span style="color: #d198ed;">Employee departments</span>' feature will list the departments that an employee has served along with the tenure.
                    </p>
					<div class = "btn-group">
						<a href="all_employees.php" class="button page-scroll" id="allemployees">All employees</a>
						<a href="search_employee.php" class="button page-scroll" id="searchbyemployee">Employee departments</a>
					</div>
                </div>
            </div>
        </div>
    </section>

    <section id="addemployee" class="addemployee-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Add Employee</h1>
                    <BR>
                    <p style="text-align: left;">
                    New employees will help to grow Loyalist College and bring added value to the team with fresh ideas and expanded perspectives.
                    Click '<span style="color: #FF9131;">Add new employee</span>' button to add a new recruit.<br> 
                    </p>
					<div class = "btn-group">
						<a href="add_employee.php" class="button page-scroll" id="allemployees">Add new employee</a>
                        <br><br><br><br>
					</div>
                    <br>
                </div>
            </div>
        </div>
    </section>


    <div id="mPlayer">
        <div> </div>
    </div>

    <section id="editdetails" class="editdetails-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Edit Details</h1>
                    <BR>
                    <BR>
                    <p style="text-align: left;">
                    Sometimes data can be missing, invalid or inconsistent and it is important to have a feature to edit the information. 
                   '<span style="color: #d198ed;">Edit employee details</span>' provide such benefit to edit the information of employees working at Loyalist college.<br> 
                    <br>
                    <div class = "btn-group">
						<a href="edit_employee_search.php" class="button page-scroll" id="allemployees">Edit employee details</a>
					</div>
                    <br>
                    <br>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$(".navbar-nav li a").click(function(event) {
    			if (!$(this).parent().hasClass('dropdown'))
        			$(".navbar-collapse").collapse('hide');
			});

    	});
    </script>


    <script src="js/jquery.js"></script>


    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

  <footer style="text-align: center; background-color: #eee;">&copy; Copyright 2022 - Web Development Using PHP</footer>

</body>

</html>
