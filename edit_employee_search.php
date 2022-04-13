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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>
    <script>
        
    </script>

</head>

<script src="js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".navbar-nav li a").click(function(event) {
            if (!$(this).parent().hasClass('dropdown'))
                $(".navbar-collapse").collapse('hide');
        });

    });
</script>



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

                    echo '<form method="post" name="departmentlist">
                    Enter Employee First Name:
                        <input type="text" name="employee" placeholder="First Name"/>
                        <input type="submit" value="Go" />
                    </form><br><br>';

                    $employee = $_POST["employee"]; 


                    $sql = "Select emp_no, first_name, last_name, birth_date from employee where first_name='" . $employee . "'";

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){

                            echo "<p>" . $employee . "</p>"; 

                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th></th>";
                                        echo "<th>Employee No.</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Date of Birth</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                
                                while($emp_row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                    //$dept_id = $dept_manager_row["dept_id"];
                                    //$emp_no = $dept_manager_row["emp_no"];

                                    //$dept_result = mysqli_query($link, "SELECT first_name, last_name, birth_date FROM employee WHERE dept_id=" . $dept_id);
                                    //$dept_row = mysqli_fetch_row($dept_result);
                                    echo "<tr>";
                                        echo "<td>";
                                            echo '<a href="edit_employee.php?emp_no='. $emp_row['emp_no'] .' "title="Update Record" data-toggle="tooltip">Edit<span class="fa fa-pencil"></span></a>';
                                        echo "</td>";
                                        echo "<td>" . htmlentities($emp_row["emp_no"]) . "</td>";
                                        echo "<td>" . htmlentities($emp_row["first_name"]) . "</td>";
                                        echo "<td>" . htmlentities($emp_row["last_name"]) . "</td>";
                                        echo "<td>" . htmlentities($emp_row["birth_date"]) . "</td>";
                                        
                                    echo "</tr>";
                                }

                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            if($employee != '')
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
		
            </div>
        </div>
    </section>

    

</body>
</html>