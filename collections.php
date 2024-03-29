﻿
<!DOCTYPE html>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	
	 <!-- js-cookie plugin: simplifies handling cookies -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

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

		.carousel-caption {
			bottom: 0;
			left: auto;
			color: red;
			font-size: 12px;
			font-style: italic;
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
                        <a class="nav-link" href="collections.php">Browse Our Collection</a>
                    </li>

                    <li class="nav-item">
                        <!-- read this from cookie set by the PHP script -->
                        <a class="nav-link disabled" href="#" id="welcome_message">Welcome Guest!</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="login-logout" href="login.php">Login</a>
                    </li>
                </ul>

                <a class="navbar-brand" href="login.php">
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
                    <img class="d-block w-20" height="200px" src="images/carousel/compass.png" alt="Compass">
					<div class="carousel-caption d-none d-md-block">
						<p>Staff's Pick #1<br>Compass</p>
					</div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-50" height="200px" src="images/carousel/hiking-shoes.jpg" alt="Hiking shoes">
					<div class="carousel-caption d-none d-md-block">
						<p>Staff's Pick #2<br>Hiking Shoes</p>
					</div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-50" height="200px" src="images/carousel/jackknife.jpg" alt="Jackknife">
					<div class="carousel-caption d-none d-md-block">
						<p>Staff's Pick #3<br>Jackknife</p>
					</div>
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
		    <!--side box for shopping_cart-->
			<div class="col-sm-4">
				<div class="card bg-success text-white">
					<img class="card-img-top" src="images/shopping.png" alt="Your cart" class="img-fluid">
					<div class="card-body">
						<h5 class="card-title">Your cart</h5>
						<p class="card-text">
							<table class="table table-responsive table-sm" id="shopping_cart" onkeyup="alert('changed');">
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

		echo "<div class='col-sm-8'>";
	
		echo "<table class='table table-striped table-borderless table-hover table-responsive table-sm' id='products_from_DB'>";

		while ($row = mysqli_fetch_array($result)) {
			echo "<tr id='" . $row['product_ID'] . "'>"; // we use product_ID as an identifier for JS function below for shopping cart
			echo "<td class='col-sm-3'><a target='_blank' href='images/products/" . $row['image_name'] .  "'><img class='img-fluid rounded' src='images/products/" . $row['image_name'] . "'/></a></td>"; // make the img larger in a new tab. possible to also use modal window but needs extensive coding
			echo "<td class='col-sm-2'>" . $row['product_description'] . "</td>";
			echo "<td class='col-sm-3'>€ " . $row['price'];
			echo "<br>";
			//echo "<input type='number' placeholder='1' class='form-control-sm col-sm-2' min='1' step='1'>"; //using input allows non-numeric entry with a bit more validation being required. instead, just use select as is done on amazon
			echo "<select class='selectpicker'>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
				</select>";
			echo "&nbsp; <button class='btn btn-info' onclick=add_items_to_cart.call(this);>Add</button>";
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

	// script (JQuery) for randomly displaying different images in carousel on page load
	// call function only when the page is completely loaded (DOM and images)

	var randomNumber = Math.floor(Math.random() * 3) + 0  // we want a randomNumber between 0 and 3 (we have only 3 images in carousel)

	$(window).on('load', function(){
		$("#carouselIndicators").carousel("pause");
		$("#carouselIndicators").carousel(randomNumber);
	});


    // read cookie value - if empty, welcome_message = Welcome Guest
    // if not empty, welcome_message = Welcome back (firstname?)

    var username = Cookies.get('user'); // using js-cookie plugin - returns 'firstname+lastname'
    username = username.split('+')[0]; // we want only the first name, so split and get the first element in the resulting array

    if (username != "") {
        document.getElementById('welcome_message').innerHTML = 'Welcome back ' + username + '!';
        //document.getElementById('login-logout').innerHTML = '<a id="login-logout" href="logout.html">Logout</a>'; // not used the class="nav-link" gives a nicer color and layout
             
        //<a class="nav-link"  href="login.php">Login</a>

        document.getElementById('login-logout').innerHTML = '<a id="login-logout" href="#" onclick="Cookies.remove(&#39user&#39, { path: &#39&#39 }); location.reload()">Logout</a>';

    } else {
        document.getElementById('welcome_message').innerHTML = 'Welcome Guest!';
    }

	function add_items_to_cart(){
		// 1. add Item/Quantity/Price based on displayed texts to shopping cart == DONE
		// 2. as the text in shopping cart changes, recalculate the total price
	
		// For this assignment, 'purchase' can mean that the user is presented with the possibility to choose a product or item, select a quantity, and if the purchased button is clicked, they will be presented with a total cost.

		table = document.getElementById('shopping_cart'); // global variable to be accessible also by shopping_cart_changed()

		// Create an empty <tr> element. row(0) is the table header. we use (-1) to just item to the last position
		var row = table.insertRow(-1);
	
		// Insert new cells (<td> elements). browser compatibility: https://www.w3schools.com/jsref/met_table_insertrow.asp
		var cell1_item = row.insertCell(0);
		var cell2_quantity = row.insertCell(1);
		var cell3_price = row.insertCell(2);
		var cell4_deleteItem_button = row.insertCell(3);

		// Add some text to the new cells based on table id='products_from_DB': https://stackoverflow.com/questions/4253558/get-a-particular-cell-value-from-html-table-using-javascript

		cell1_item.innerHTML = this.parentNode.parentNode.childNodes[1].innerHTML; // //for text in adjacent cell. also possible to use previous/next sibling properties
		// https://stackoverflow.com/questions/48468396/javascript-get-the-text-in-a-particular-table-cell-in-this-row
	
		// from: https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_option_index
	
		var x = this.closest('td').childNodes[2].selectedIndex;
		var y = this.closest('td').childNodes[2].options;
		cell2_quantity.innerText = y[x].text; // y[x].index returns the index of the selection option and .text returns the corresponding text

		cell3_price.innerHTML = (this.closest('td').innerText.split(' ')[1]).split(/\n/)[0];

		//cell4_deleteItem_button.innerHTML = "<button type='button' class='btn' id='delete_button' onclick='delete_current_row(this);'>X</button>"; // although don't really need a button for onclick method
	
		cell4_deleteItem_button.innerHTML = "<button class='btn btn-light btn-sm' onclick=document.getElementById(&#39;shopping_cart&#39;).deleteRow(this.parentNode.parentNode.rowIndex);&nbsp;shopping_cart_changed();>X</button>"; //needs escape characters here as this line is parsed by the browser into HTML first

	
		// check if 2 lines of the same item exist, in which case remove the first line of item
		var text_to_search = this.parentNode.parentNode.childNodes[1].innerHTML;
		var table_to_search = table;


		//for each row in table, loop through the first column. if text_to_search is found, delete the row
		var td_elements = table.getElementsByTagName('td'); //nodelist is not an array, so can't use .find method
		var counter_rowIndex = [];

		for (i = 0; i < td_elements.length; ) {
		
			if (td_elements[i].innerHTML == text_to_search){
				// for the first encounter, append the rowIndex (which = i/4+1) to counter_rowIndex 
				// after loop completion, if counter_rowIndex.length > 1, then delete the first element. don't worry about more than 2 elements because this function will be called after each 'Add' clicking
				counter_rowIndex.push(i/4+1);
			}
		
			i = i+4;
		}
	
		if (counter_rowIndex.length > 1) {
			table.deleteRow(counter_rowIndex[0]);
			counter_rowIndex = []; // reset the array
		} else {
			counter_rowIndex = [];
		}

		shopping_cart_changed();
	}


	function shopping_cart_changed(){

		// this function is called AFTER adding item and AFTER deleting item

		if (document.getElementById('totalRow') == null){ // scenario 1: one item added for the first time - the only thing in cart is the header (rows.length = 1)
			// i.e. there is only the header - after adding the item to cart, insert the TOTAL row
			
			// Create an empty <tr> element. row(0) is the table header. we use (-1) to just item to the last position
			var row = table.insertRow(table.rows.length);
			row.setAttribute('id', 'totalRow', 0);
	
			// Insert new cells (<td> elements). browser compatibility: https://www.w3schools.com/jsref/met_table_insertrow.asp
			var cell1_total = row.insertCell(0);
			var cell2_quantity = row.insertCell(1); // empty cell
			var cell3_totalPrice = row.insertCell(2);
			var cell4_checkout_button = row.insertCell(3);

			addUpItems();

			cell1_total.innerHTML = '<i><b>TOTAL</b></i>';
			cell3_totalPrice.innerHTML = '<i><b>' + totalPrice + '</b></i>';
			cell4_checkout_button.innerHTML = "<button class='btn btn-primary btn-sm' onclick='checkOut();'>Checkout</button>";

		} else if (table.rows.length >= 3) { // i.e. totalRow exists and there is header+item(s)+totalRow - don't add another totalRow
			
			// table.moveRow method not supported by non-IE browsers - not W3C standard, so delete the current totalRow and add a new one as above
			table.deleteRow(document.getElementById('totalRow').rowIndex);

			var row = table.insertRow(table.rows.length);
			row.setAttribute('id', 'totalRow', 0);
	
			// Insert new cells (<td> elements). browser compatibility: https://www.w3schools.com/jsref/met_table_insertrow.asp
			var cell1_total = row.insertCell(0);
			var cell2_quantity = row.insertCell(1); // empty cell
			var cell3_totalPrice = row.insertCell(2);
			var cell4_checkout_button = row.insertCell(3);

			addUpItems();

			cell1_total.innerHTML = '<i><b>TOTAL</b></i>';
			cell3_totalPrice.innerHTML = '<i><b>' + totalPrice + '</b></i>';
			cell4_checkout_button.innerHTML = "<button class='btn btn-primary btn-sm' onclick='checkOut();'>Checkout</button>";
				
		} else if (table.rows.length == 2){ // there is only header+totalRow - no item, so delete totalRow
				table.deleteRow(document.getElementById('totalRow').rowIndex);
		}
	}

	function addUpItems() {
	
		totalPrice = 0; // global variable - need to pass this to cell3_totalPrice.innerHTML

		// for each row, get the number from column1 ('quantity') and multiply with column2 ('price') to get the total per row
		// loop above for the (rows.length - 2) because we don't need the header and totalRow

		for (var i = 1; i < table.rows.length; i++) {
			var quantity = table.rows[i].cells[1].innerHTML;
			var pricePerUnit = table.rows[i].cells[2].innerHTML;
			var totalPerRow = quantity * pricePerUnit;
			totalPrice = totalPrice + totalPerRow; 
		}

	}

	function checkOut(){
		// if already logged in, alert(order has been placed)
		// else -> open login.php in a new tab, let user login...

		
		// get the value of 'user' cookie if it exists, otherwise redirect user to login
		// regex from https://developer.mozilla.org/en-US/docs/Web/API/Document/cookie
		
		var	username = document.cookie.replace(/(?:(?:^|.*;\s*)user\s*\=\s*([^;]*).*$)|^.*$/, "$1");

		if (username != ''){
			alert('You are already logged in. \nThis order has been placed on the system.\n\nThank you!');
		} else {
			window.open('login.php'); // let user login, place the cookie and return here
		}
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
