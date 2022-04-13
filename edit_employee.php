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
                // Include config file
                require_once "config.php";
                
                // Define variables and initialize with empty values
                $first_name = $last_name = $birth_date = "";
                $first_name_err = $last_name_err = $birth_date_err = "";
                
                // Processing form data when form is submitted
                if(isset($_POST["emp_no"]) && !empty($_POST["emp_no"])){
                    // Get hidden input value
                    $emp_no = $_POST["emp_no"];
                    
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
                        
                        // Prepare an update statement
                        $sql = "UPDATE employee SET first_name=?, last_name=?, birth_date=? WHERE emp_no=?";
                        
                        if($stmt = mysqli_prepare($link, $sql)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "sssi", $param_first_name, $param_last_name, $param_birth_date, $param_emp_no);
                            
                            // Set parameters
                            $param_first_name = $first_name;
                            $param_last_name = $last_name;
                            $param_birth_date = $birth_date;
                            $param_emp_no = $emp_no;
                            
                            // Attempt to execute the prepared statement
                            if(mysqli_stmt_execute($stmt)){
                                // Records updated successfully. Redirect to landing page
                                header("location: edit_employee_search.php");
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
                } else{
                    // Check existence of id parameter before processing further
                    if(isset($_GET["emp_no"]) && !empty(trim($_GET["emp_no"]))){
                        // Get URL parameter
                        $emp_no =  trim($_GET["emp_no"]);
                        
                        // Prepare a select statement
                        $sql = "SELECT * FROM employee WHERE emp_no = ?";
                        if($stmt = mysqli_prepare($link, $sql)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "i", $param_emp_no);
                            
                            // Set parameters
                            $param_emp_no = $emp_no;
                            
                            // Attempt to execute the prepared statement
                            if(mysqli_stmt_execute($stmt)){
                                $result = mysqli_stmt_get_result($stmt);
                    
                                if(mysqli_num_rows($result) == 1){
                                    /* Fetch result row as an associative array. Since the result set
                                    contains only one row, we don't need to use while loop */
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    
                                    // Retrieve individual field value
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
                                    $birth_date = $row["birth_date"];
                                } else{
                                    // URL doesn't contain valid id. Redirect to error page
                                    header("location: error.php");
                                    exit();
                                }
                                
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                        }
                        
                        // Close statement
                        mysqli_stmt_close($stmt);
                        
                        // Close connection
                        mysqli_close($link);
                    }  else{
                        // URL doesn't contain id parameter. Redirect to error page
                        header("location: error.php");
                        exit();
                    }
                }
                ?>
                
                <form style="margin: auto; width: 260px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <input type="date" class="form-control" name="birth_date" id="txtDate"<?php echo (!empty($birth_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birth_date; ?>">
                        <span class="invalid-feedback"><?php echo $birth_date_err;?></span>
                    </div>
                    <input type="hidden" name="emp_no" value="<?php echo $emp_no; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a onclick="history.back()" class="btn btn-secondary ml-2">Cancel</a>
                    <?php echo '<a style="color:red" href="delete_employee.php?emp_no='. $emp_no .'" title="Delete Record"><span class="fa fa-trash"></span>Delete Employee</a>'; ?>
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