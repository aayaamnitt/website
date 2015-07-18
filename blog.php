<?php
include 'authenticate.php';
include 'displayposts.php';
include 'displaycomments.php';
?>


<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aayaam</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />

    <!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body id="top">

<!-- header
============================================================================= -->

<div id="header-wrap"><header>

        <hgroup>
            <h1><a href="index.php">hi</a></h1>
            <h3>A open Blog</h3>
        </hgroup>


        <nav2>
          <ul>


          <?php 
              $notLoggedin="  <li id='login'>
              <a id='login-trigger' href='#'>
                Log in <span>▼

                </span>
              </a>
              <div id='login-content'>
                <form action='process.php' method='post'>

                  <fieldset id='inputs'>
                    <input id='username' type='email' name='username' placeholder='Your email address' required></br>
                    <input id='password' type='password' name='password' placeholder='Password' required>
                  </fieldset>
                  <fieldset id='actions'>

                    <input type='submit' name='submit' value='Login' >

                  </fieldset>
                </form>
              </div>
            </li>


                 <li id='signup'>
              <a id='signup-trigger' href='#'>
                Sign up <span>▼

                </span>
              </a>
              <div id='signup-content'>
                <form action='signup.php' method='post'>

                  <fieldset id='inputs'>
                    <input id='name' type='text' name='name' placeholder='Your name' required></br>
                    <input id='username' type='email' name='username' placeholder='Your email address' required></br>
                    <input id='password' type='password' name='password' placeholder='Password' required>
                  </fieldset>
                  <fieldset id='actions'>

                    <input type='submit' name='submit' value='Login' >

                  </fieldset>
                </form>
              </div>
            </li>

            </li>";

           
              try{
                if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])){
                     if(!authenticate($_COOKIE['username'],$_COOKIE['password']))
                  print $notLoggedin;

                   else {
                             $loggedIn= "<li id='welcome'>
                            <a>
                             welcome ".$_COOKIE['username']."  
                              
              
                            </li>
                            <li id='logout'>
                             <a id='logout-trigger' href='#'>

                            Logout</a>
                            </li>";
                            print $loggedIn;
                        }
               }

            else  {
              
              print   $notLoggedin;
            }

          }
          catch (Exception $e){
            print  $notLoggedin;
          }
          ?>
             

          </ul>
        </nav2>


		<nav>
		    <ul>
			    <li id="current"><a href="index.php">Home</a><span></span></li>
			    <li><a href="style.html">About us</a><span></span></li>

          <?php
             if(isset($_GET['msg'])){
             {$msg=$_GET['msg'];
                
              echo "<li id='msg'><a href='index.php'>".$msg."</a><span></span></li>";
              

              }
            }
           ?>
		   
        </ul>

	    </nav>



<div id='logo'>

</div>
<!--
        <form id="quick-search" method="get" action="index.php">
            <fieldset class="search">
                <label for="qsearch">Search:</label>
                <input class="tbox" id="qsearch" type="text" name="qsearch" value="Search..." title="Start typing and hit ENTER" />
                <button class="btn" title="Submit Search">Search</button>
            </fieldset>
-->

	<!-- /header -->
</header></div>
<!-- Content
============================================================================== -->
<div id="content-wrap">

    <!-- main -->
    <section id="main">

        <article class="post">



        <?php

        		if(isset($_GET['postid'])){
        			$postid=$_GET['postid'];

        			$tablepost='posts';
					$sql="SELECT * FROM $tablepost WHERE id=$postid ORDER BY timestamp DESC";
					$result=mysql_query($sql);
					$count=mysql_num_rows($result);
					if($count==1){$i=0;
						while($row = mysql_fetch_array($result))
  								{$i=$i+1;
			  						$heading=$row['posthead'];
			  						$text=$row['posttext'];
			  						$time=$row['timestamp'];
			  						$by=$row['name'];
			              			$id=$row['id'];
			  						$imageurl=$row['imageurl'];




				            print"<h2>".$heading."</h2>

							<p class='post-info'>Posted by: ".$by."</p>

							<div class='image-section'>
				                <img src='".$imageurl."' alt='image post' />
				         	</div>

							<p>".$text."
							</p>

							

							<p class='postmeta'>
								<a href='index.php' class='comments'>Comments</a> |
								<span class='date'>".$time."</span> 
							</p>";


			  					}
        		}
        		else{
        			echo "not found";
        		}
        	}
        	else{
        			print "<script type='text/javascript'>window.location='index.php;</script>";
        		}

        ?>


        </article>

        <!-- Comments
        ================================================================================================ -->

        <h3>Responses</h3>

					<ol class="commentlist">

						<?php

						
						displaycomments($postid);
						?>
					</ol>

        <!-- Reply Form
        ================================================================================================ -->

     

        <?php 

        	 if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])){
                     if(!authenticate($_COOKIE['username'],$_COOKIE['password']))
                  print "
              <div>please login to comment</div>";
              else

        print "
        <form action='comments.php?postid=".$postid."'; method='post' id='commentform'>

           
            <div>
				
				<textarea id='message' name='comment' rows='10' cols='18' tabindex='4'></textarea>
			</div>
            <div class='no-border'>
			    <input class='button' type='submit' value='Comment' tabindex='5' />
			</div>

        </form>
        ";
    }
        ?>

    <!-- /main -->
    </section>

    <!-- sidebar -->
    

</div>

<!-- extra
============================================================================== -->
<div id="extra-wrap"><div id="extra" class="clearfix">

    <div class="xcol">

		    <h3>Contact Info</h3>

		    <p>
		    <strong>Phone: </strong>+9898989898<br/>
		    <strong>Fax: </strong>+989898989
		    </p>

		    <p><strong>Address: </strong>Nit trichy campus</p>
            <p><strong>E-mail: </strong>aayaam@nitt.edu</p>
		    <p>Want more info - go to our <a href="#">contact page</a></p>

            

	</div>

    <div class="xcol">

           <h3>Follow Us</h3>

            <div class="footer-list social">
                <ul>
                    <li class="facebook"><a href="index.php">Facebook</a></li>
                    <li class="twitter"><a href="index.php">Twitter</a></li>
                    <li class="googleplus"><a href="index.php">Google+</a></li>
                    <li class="email"><a href="index.php">Email</a></li>
                    <li class="rss"><a href="index.php">RSS Feed</a></li>
                </ul>
            </div>


           
    </div>

    <div class="xcol">



           

          

	       

	</div>



    <div class="xcol last">

        <h3>About</h3>

        <p>
        <a href="index.php"><img width="40" height="40" class="align-left" alt="firefox" src="images/gravatar.jpg"></a>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.
        Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc
        justo tempus leo. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.
        Cras id urna. <a href="#">Learn more...</a>
        </p>


    </div>

</div></div>

<!-- footer
============================================================================== -->
<footer class="clearfix">

	<p class="footer-left">
		&copy; 2015 Aayaam &bull;
		Design by <a href="index.php">Webteam</a>
	</p>

	<p class="footer-right">
	   <a href="index.php">Home</a> |
		<a href="index.php">Sitemap</a> |
		<a href="index.php">RSS Feed</a> |
      <a class="back-to-top" href="#top">Back to Top</a>
    </p>

<!-- /footer -->
</footer>

<!-- scripts
============================================================================== -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.6.1.min.js"><\/script>')</script>

<script src="js/scrollToTop.js"></script>

</body>
</html>
