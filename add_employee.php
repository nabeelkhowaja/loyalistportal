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
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

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

                <h1>Add New Employee</h1>
                <BR>
                <?php
                // Include config file
                require_once "config.php";
                
                // Define variables and initialize with empty values
                $first_name = $last_name = $birth_date = "";
                $first_name_err = $last_name_err = $birth_date_err = "";
                
                // Processing form data when form is submitted
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    // Validate name
                    $input_first_name = trim($_POST["first_name"]);
                    if(empty($input_first_name)){
                        $first_name_err = "Please enter your first name.";
                    } elseif(!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                        $first_name_err = "Please enter a valid name.";
                    } else{
                        $first_name = $input_first_name;
                    }

                    // Validate name
                    $input_last_name = trim($_POST["last_name"]);
                    if(empty($input_last_name)){
                        $last_name_err = "Please enter your last name.";
                    } elseif(!filter_var($input_last_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                        $last_name_err = "Please enter a valid name.";
                    } else{
                        $last_name = $input_last_name;
                    }
                    
                    // Validate date of birth
                    $input_birth_date = trim($_POST["birth_date"]);
                    if(empty($input_birth_date)){
                        $birth_date_err = "Please enter your date of birth.";     
                    } else{
                        $birth_date = $input_birth_date;
                    }
                    
                    // Check input errors before inserting in database
                    if(empty($first_name_err) && empty($last_name_err) && empty($birth_date_err)){
                        // Prepare an insert statement
                        $sql = "INSERT INTO employee (first_name, last_name, birth_date) VALUES (?, ?, ?)";
                        
                        if($stmt = mysqli_prepare($link, $sql)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "sss", $param_first_name, $param_last_name, $param_birth_date);
                            
                            // Set parameters
                            $param_first_name = $first_name;
                            $param_last_name = $last_name;
                            $param_birth_date = $birth_date;
                            
                            // Attempt to execute the prepared statement
                            if(mysqli_stmt_execute($stmt)){
                                // Records created successfully. Redirect to landing page
                                header("location: home.php#addemployee");
                                exit();
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                        }
                        
                        // Close statement
                        mysqli_stmt_close($stmt);
                    }
                    
                    // Close connection
                    mysqli_close($link);
                }

                
                ?>

                <form style="margin: auto; width: 220px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                        <span class="invalid-feedback"><?php echo $first_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>">
                        <span class="invalid-feedback"><?php echo $last_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" name="birth_date" id="txtDate">
                        <span class="invalid-feedback"><?php echo $birth_date_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="home.php#addemployee" class="btn btn-secondary ml-2">Cancel</a>
                    
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
        $(function(){
            var dtToday = new Date();
            
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;
            $('#txtDate').attr('max', maxDate);
        });
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>
</html>