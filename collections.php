
<!DOCTYPE html>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <title>Welcome to Outdoor Adventures Store</title>

    <style>
        /* center the carousel */
        .carousel-inner img {
            margin: auto;
        }

        /*https://stackoverflow.com/questions/46249541/change-arrow-colors-in-bootstraps-carousel*/
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 100px;
            width: 100px;
            outline: black;
            background-size: 100%, 100%;
            /*border-radius: 10%;
            border: 1px solid black;*/
            background-image: none;
        }

            .carousel-control-next-icon:after {
                content: '>';
                font-size: 55px;
                color: red;
            }

            .carousel-control-prev-icon:after {
                content: '<';
                font-size: 55px;
                color: red;
            }

		.table td {
			text-align: center;   
		}

		#products_from_DB .img-fluid{
			max-width: 20%;
		}

		#shopping_cart {
			font-size: 0.7rem; /* 1 rem = 1 x original size */
		}
    </style>

</head>
<body>
	

    <div class="container">

        <!-- navbar from Bootstrap -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <a class="navbar-brand" href="index.html">
                <img class="img-fluid" src="images/LogoMakr_6NtMtS.png" width="200" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">


                    <li class="nav-item">
                        <a class="nav-link" href="index.html">About Outdoor Adventures</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="collections.html">Browse Our Collection</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                </ul>

                <a class="navbar-brand" href="index.html">
                    <!--link to login page-->

                    <img class="img-fluid" src="images/user-2160923_1280.png" width="100" /></a>

            </div>
        </nav>

        <div>&nbsp;</div>

        <!-- carousel https://getbootstrap.com/docs/4.1/components/carousel/ -->
        <div id="carouselIndicators" class="carousel slide col-auto" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                <li data-target="#carouselIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-50" height="200px" src="images/credit-card-851506_1920.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-50" height="200px" src="images/girl-2940655_1920.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-50" height="200px" src="images/sunset-3325079_1920.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

		<div>
			<p>
		</div>

		<div class="row">
		    <!--side box-->
			<div class="col-sm-3">
				<div class="card bg-success text-white">
					<img class="card-img-top" src="images/shopping.png" alt="Your cart" class="img-fluid">
					<div class="card-body">
						<h5 class="card-title">Your cart</h5>
						<p class="card-text">
							<table class="table" id="shopping_cart">
								<th>Item</th>
								<th>Quantity</th>
								<th>Price (€)</th>
								<th></th>
							</table>
						</p>
					</div>
				</div>
        </div>
 

		<?php
		//Step 1:  Create a database connection
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpassword = "";
		$dbname = "outdoor_adventures_db";
		$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
		
		//Test if connection occurred
		if(mysqli_connect_errno()){
			die("DB connection failed: " .
				mysqli_connect_error() .
					" (" . mysqli_connect_errno() . ")"
					);
		}

		if (!$connection){
			die('Could not connect: ' . mysqli_error());
			}
	
		//Step 2: Query the database
		$result = mysqli_query($connection,"SELECT * FROM products");

		//Step 3: User returned data

		echo "<div class='col-sm-9'>";
	
		echo "<table class='table table-striped table-borderless table-hover table-responsive' id='products_from_DB'>";

		while ($row = mysqli_fetch_array($result)) {
			echo "<tr id='" . $row['product_ID'] . "'>"; // we use product_ID as an identifier for JS function below for shopping cart
			echo "<td><img class='img-fluid rounded' src='images/products/" . $row['image_name'] . "'/></td>";
			echo "<td>" . $row['product_description'] . "</td>";
			echo "<td  class='col-sm-6'>€ " . $row['price'];
			echo "<br>";
			echo "<input type='number' placeholder='1' class='form-control-sm col-sm-2' id='quantity'>";
			//echo "&nbsp; <button class='btn btn-warning' onclick='add_items_to_cart.call(this);'>Add</button>"; //removed type='button'
			echo "&nbsp; <button onclick=add_items_to_cart.call(this);>Add</button>";
			echo "</td>";
			echo "</tr>";
		}

		echo "</table>";
		echo "</div>";

		//4.  Release returned data and Close database connection
		mysqli_free_result($result);
		mysqli_close($connection);

		//table: ensure it is responsive by using breakpoint etc. -->
        //12 images so 3 x 4 table -->
        //replace the carousel img src with php code -->
		// ensure all img tags use bootstrap - as of 07May, we're just using normal tag for quick dev

		echo "</div>";
		echo "</div>";
	?>

</body>

<script>

	function add_items_to_cart(){
	// 1. add Item/Quantity/Price based on displayed texts to shopping cart
	// 2. as the text in shopping cart changes, recalculate the total price
	
	// For this assignment, 'purchase' can mean that the user is presented with the possibility to choose a product or item, select a quantity, and if the purchased button is clicked, they will be presented with a total cost.

	var table = document.getElementById('shopping_cart');

	// Create an empty <tr> element. row(0) is the table header. we use (-1) to just item to the last position
	var row = table.insertRow(-1);
	
	// Insert new cells (<td> elements). browser compatibility: https://www.w3schools.com/jsref/met_table_insertrow.asp
	var cell1_item = row.insertCell(0);
	var cell2_quantity = row.insertCell(1);
	var cell3_price = row.insertCell(2);
	var cell4_deleteItem_button = row.insertCell(3);

	// Add some text to the new cells based on table id='products_from_DB': https://stackoverflow.com/questions/4253558/get-a-particular-cell-value-from-html-table-using-javascript

	//cell1_item.innerHTML = document.getElementById('shopping_cart').getElementByTagName('td')[1].innerText; // get text from column 2 corresponding to the row where this button is	

	cell1_item.innerHTML = this.parentNode.parentNode.childNodes[1].innerHTML; // //for text in adjacent cell. also possible to use previous/next sibling properties
	// https://stackoverflow.com/questions/48468396/javascript-get-the-text-in-a-particular-table-cell-in-this-row

	//var MyCell = this.closest('td');
	//alert('mycellindex: ' + MyCell.cellIndex); // to find tr.rowIndex. can also use td.cellIndex to get cell value (document.getElementById('table2').getElementsByTagName('tr')[MyCell.rowIndex].innerText);
	//alert('cell innertext: ' + this.closest('td').innerHTML); // this returns text in current cell but needs some stripping

	
	//cell2_quantity.innerHTML = "NEW CELL2"; // text from column 3, strip the value into 2 and get only the number
	cell3_price.innerHTML = this.closest('td').innerText.split(' ')[1];

	// @@@@@@@@@@@@@@@@@@@@@@@@@- WIP on 18May - try using getElementById
	//alert(this.parentNode.parentNode.childNodes[2].innerText); // returns '€ 20 add'
	//alert(this.parentNode.parentNode.childNodes[2].innerHTML); // returns € 30<br><input placeholder="1" class="form-control-sm col-sm-2" id="quantity" type="number">&nbsp; <button onclick="add_items_to_cart.call(this);">Add</button>
	
	alert(this.closest('td').childNodes[2].value); // works :)

	
	cell2_quantity.innerHTML = "NEW CELL3"; //  text from 
	//cell4_deleteItem_button.innerHTML = "<button type='button' class='button' id='delete_button' onclick='delete_current_row(this);'>X</button>"; // although don't really need a button for onclick method
	
	cell4_deleteItem_button.innerHTML = "<button onclick=document.getElementById('shopping_cart').deleteRow(this.parentNode.parentNode.rowIndex);>XX</button>";

	
	
	// https://www.w3schools.com/code/tryit.asp?filename=FR06TJBFRR2O
	// https://stackoverflow.com/questions/36563108/how-can-i-convert-object-htmlbuttonelement-to-html-button

	// https://www.w3schools.com/jsref/met_document_createelement.asp
	// delete row: https://www.w3schools.com/jsref/met_table_deleterow.asp
	// http://www.encodedna.com/javascript/dynamically-create-html-elements-using-createElement-method.htm
	// https://stackoverflow.com/questions/20786555/create-button-dynamically-and-assign-a-function-to-it
	// https://stackoverflow.com/questions/28773281/how-to-dynamically-add-click-button-to-an-html-table-in-d3-js
	}



	
	

// pseudo-code
   

    // https://developer.mozilla.org/en-US/docs/Web/Events/beforeunload - function to ask user to confirm before refreshing/moving to a different page
    //window.addEventListener("beforeunload", function (event) {
    //    event.returnValue = "\o/";
    //});

    //// is equivalent to
    //window.addEventListener("beforeunload", function (event) {
    //    event.preventDefault();
    //});

    // read cookie value
    //var username = document.cookie

    //if (username != null) {
    //    document.getElementById('userwelcomemessage').innerHTML = 'Welcome ' + document.cookie
    //}


      
	

</script>

</html>
