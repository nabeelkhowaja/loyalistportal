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
                    <li style="color: #777; background-color: #7FDBFF ;">
                        <a class="page-scroll" href="" style="color: #777;">About Us</a>
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

                <p>
                    This project is developed by:<br>
                    Nabeel Khowaja, 
                    Sukhandeep Kaur,
                    Priya Suman,
                    Nitil Juneja,
                    Manpreet Kaur
                </p>
            		
				
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