<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SFSU Bazaar</title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <!-- JS -->
        <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
        <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

        <!-- CSS -->
        <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    </head>

    <style>

        body {
            padding-top: 110px;
        }

    </style>

    <script>
        $(function() {
            $('#search-term').on('keypress', function(e) {
                if (e.which == 95 || e.which == 37)
                    return false;
            });
        });
    </script>

    <body>
        <div class="container-fluid">
            <!-- Navbar -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">

                    <!-- Title Banner and Tag Line -->
                    <a href="<?php echo URL; ?>"><img class="logo-img" src="<?php echo URL; ?>public/img/logo-img.png"></a>

                    <div class="navbar-header">
                        <!-- collapse toggle button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>

                    <!-- department, sell, search bar be callapsed here -->
                    <div class="navbar-collapse collapse">

                        <!-- login/register links -->
                        <ul class="nav navbar-nav navbar-right">
                        	<li><a href="<?php echo URL; ?>product/newProduct"><span class="glyphicon glyphicon-tag"</span>Sell</a></li>
                        	<?php if (empty($_SESSION)) { ?>
                                <li><a href="<?php echo URL; ?>login/index"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                <li><a href="<?php echo URL; ?>register/index"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                            	<?php } else { ?>
                                <li><a href="<?php echo URL; ?>login/userLogout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            	<?php } ?>
                        </ul>

                        <!-- Search Bar -->
                        <div class="search-bar nav-item">
                            <form action="<?php echo URL; ?>listing/search" method="GET">

                                <div class="form-group" style="display:inline;">
                                    <div class="input-group" style="display:table;">

					<!-- search departments -->
					<div class="input-group-btn search-panel">

						<!-- Dropdown button -->
						<select id="category" type="button" name="category" class="btn btn-default">
						<?php   
                                                        echo '<option value="All"' . ($_GET['category'] == 'All' ? ' selected="selected"' : '').'>All</option>';
							
                                                        $categories = Product::getAllCategories();
							foreach($categories as $category)
							{   
								echo '<option value="' . $category->name . '"' . ($_GET['category'] == $category->name ? ' selected="selected"' : '').'>' . $category->name . '</option>';
							}
						?>
						</select>

					</div>
					<!-- Search Bar --> 
					<input id="search-term" class="form-control" type="text" name="search-term" value="<?php if(isset($_GET['search-term'])){ echo $_GET['search-term']; }?>"/>

                                        <!-- Search Button -->
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit" name="search" value="Search">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
			<br><center><i><small>SFSU/FAU/Fulda Software Engineering Project, Summer 2016. For Demonstration Only.</small></i></center>
                        </div> <!-- end of search bar -->
                    </div> <!-- end of collapse  -->
                </div>
            </nav> <!-- end of nav -->
        </div>
