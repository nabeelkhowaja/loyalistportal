<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <style>
        #logout {
            height: 30px;
            text-align: right;
            right: 160px;
            position: fixed;
        }
        th{
            text-align: center;
        }
    </style>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
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
                <a class="navbar-brand page-scroll" href="home.php"><b>Loyalist Portal</b></a>
            </div>


            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                   
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="home.php#view">View</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="home.php#addemployee">Add Employee</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="home.php#editdetails">Edit Details</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="about_us.php"">About Us</a>
                    </li>
                    <li id="logout">
                        <a class="page-scroll" href="logout.php">Sign out</a>
                    </li>
                </ul>
            </div>
          
        </div>
       
    </nav>

    <section id="urdu-guide" class="urdu-guide-section">
        <div class="container">
            <div class="row">

            <div class="col-xs-12">

                <h1>Edit Employee Details</h1>
                <BR>
                <?php
                // Process delete operation after confirmation
                if(isset($_POST["emp_no"]) && !empty($_POST["emp_no"])){
                    // Include config file
                    require_once "config.php";
                    
                    // Prepare a delete statement
                    $sql = "DELETE FROM employee WHERE emp_no = ?";
                    
                    if($stmt = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "i", $param_emp_no);
                        
                        // Set parameters
                        $param_emp_no = trim($_POST["emp_no"]);
                        
                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){
                            // Records deleted successfully. Redirect to landing page
                            header("location: edit_employee_search.php");
                            exit();
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    
                    // Close statement
                    mysqli_stmt_close($stmt);
                    
                    // Close connection
                    mysqli_close($link);
                } else{
                    // Check existence of id parameter
                    if(empty(trim($_GET["emp_no"]))){
                        // URL doesn't contain id parameter. Redirect to error page
                        header("location: error.php");
                        exit();
                    }
                }
                ?>

                <form style="margin: auto; width: 260px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="alert alert-danger">
                        <input type="hidden" name="emp_no" value="<?php echo trim($_GET["emp_no"]); ?>"/>
                        <p>Do you want to delete this employee?</p>
                        <p>
                            <input type="submit" value="Yes" class="btn btn-danger">
                            <a onclick="history.back()" class="btn btn-secondary">No</a>
                        </p>
                    </div>
                </form>
                
            		
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

</body>
</html>