<?php
include 'authenticate.php'
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
			    <li id="current"><a href="index.html">Home</a><span></span></li>
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





        <form id="quick-search" method="get" action="index.html">
            <fieldset class="search">
                <label for="qsearch">Search:</label>
                <input class="tbox" id="qsearch" type="text" name="qsearch" value="Search..." title="Start typing and hit ENTER" />
                <button class="btn" title="Submit Search">Search</button>
            </fieldset>


	<!-- /header -->
</header></div>

<!-- featured
============================================================================== -->

<div id="featured-wrap"><article id="featured" class="clearfix">



    <div class="image-block">
        <a title="" href="#"><img width="335" height="240" alt="featured" src="images/img-featured.jpg" /></a>
    </div>

    <div class="text-block">
        <h2><a href="#">the Head line</a></h2>
        <p class="post-meta">Posted by <a href="index.html">pradeep</a>  <a href="index.html"></a>, <a href="index.html">internet</a></p>

        <p>some introduction about aayam.
          blah blah blah
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.
                Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu
                posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum
                odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra


        </p>



        <p><a href="index.html" class="more">Continue Reading</a></p>

    </div>

</article></div>

<!-- Content
============================================================================== -->

<div id="content-wrap-home">

    <!-- main -->
    <section id="main">

     


      <h4> <a id='post-trigger' href='#'>
                Post Something  <span>▼</span></a>
                    </h4>

           <div id='postform-content2'>
           </div>
          <div id='postform-content'>
         <form action="index.php" method="post" id="formtemp">
         </form>
           <form action="posts.php" method="post" id="postform">
            

            
            <div>
              
              <input id="heading" name="heading" placeholder="Heading" type="text" tabindex="1" />
            </div>
            <div>
              
              <textarea id="post" name="text"  cols="50" tabindex="2" placeholder="Post"></textarea>
            </div>
            
            <div class="no-border">
                <input class="button" type="submit" value="Submit" tabindex="3" />
            </div>

        </form>
        </div>





        <h3>Recent Posts</h3>

        

           <!-- <a href="index.html" title=""><img width="240" height="100" alt="img" class="thumbnail" src="images/thumb-1.jpg" /></a>

            <div class="top">

               <h4><a href="index.html">Aliquam Risus Justo Lorem Ipsum Dolor Sit Amet</a></h4>
               <p><span class="datetime">December 19, 2011</span><a class="comment" href="index.html">2 Comments</a></p>

            </div>
                -->
              

            <div class="calloutodd">
            <h4><a href="index.html">head</a></h4>

             <a href="index.html" title=""><img  class="thumbnail" src="images/thumb-1.jpg" /></a>
                <p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.
				Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu
				posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum
			   	odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra
				condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque.
				</p>

		
             <b class="notch"></b>
             <b class="roundodd">
            <img src="images/gravatar.jpg" />
            </b>

			</div>

     

        

        


             <!-- <a href="index.html" title=""><img width="240" height="100" alt="img" class="thumbnail" src="images/thumb-1.jpg" /></a>

            <div class="top">

               <h4><a href="index.html">Aliquam Risus Justo Lorem Ipsum Dolor Sit Amet</a></h4>
               <p><span class="datetime">December 19, 2011</span><a class="comment" href="index.html">2 Comments</a></p>

            </div>
                -->
            <div class="callouteven">
                     <h4><a href="index.html">head</a></h4>
             <a href="index.html" title=""><img  class="thumbnail" src="images/thumb-2.jpg" /></a>
                <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.
                Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu
                posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum
                odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra
                condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque.
                </p>

                 
             <b class="notch"></b>
              <b class="roundeven">
            <img src="images/gravatar.jpg" />
            </b>
             
            </div>






    </section>

    <!-- sidebar -->
   <!-- <aside id="sidebar">

				<div class="sidemenu">
					<h3>Sidebar Menu</h3>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="index.html">TemplateInfo</a></li>
						<li><a href="style.html">Style Demo</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="archives.html">Archives</a></li>
					</ul>
				</div>


				<div class="sidemenu">
					<h3>Sponsors</h3>
					<ul>
						<li><a title="Site Templates" href="http://themeforest.net?ref=ealigam">Themeforest
                            <span>Site Templates, Web &amp; CMS Themes</span>
                            </a>
                        </li>
						<li><a title="Website Templates" href="http://www.4templates.com/?go=228858961">4Templates
                            <span>Low Cost High-Quality Templates</span>
                            </a>
                        </li>
						<li><a title="Web Templates" href="http://store.templatemonster.com?aff=ealigam">TemplateMonster
                            <span>Delivering the Best Templates on the Net!</span>
                            </a>
                        </li>
						<li><a title="Stock Graphics" href="http://graphicriver.net?ref=ealigam">GraphicRiver
                            <span>Awesome Stock Graphics</span>
                            </a>
                        </li>
					</ul>
				</div>

				<h3>Photostream</h3>

				<ul class="photostream clearfix">
					<li><a href="index.html"><img width="50" height="50" alt="thumbnail" src="images/thumb.jpg"></a></li>
					<li><a href="index.html"><img width="50" height="50" alt="thumbnail" src="images/thumb.jpg"></a></li>
					<li><a href="index.html"><img width="50" height="50" alt="thumbnail" src="images/thumb.jpg"></a></li>
					<li><a href="index.html"><img width="50" height="50" alt="thumbnail" src="images/thumb.jpg"></a></li>
					<li><a href="index.html"><img width="50" height="50" alt="thumbnail" src="images/thumb.jpg"></a></li>
					<li><a href="index.html"><img width="50" height="50" alt="thumbnail" src="images/thumb.jpg"></a></li>
				</ul>

            <div class="ads">

               <h3>Get Hosting</h3>

               <p>
               Looking for an awesome and reliable webhosting? Try <a href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT"><span>DreamHost</span></a>.
					Get <strong>$50 off</strong> when you sign up with the promocode <strong>styleshout</strong>.
					

               <a class="button" href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">Sign Up Now</a>
               </p>

            </div>



	</aside>
    -->

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
                    <li class="facebook"><a href="index.html">Facebook</a></li>
                    <li class="twitter"><a href="index.html">Twitter</a></li>
                    <li class="googleplus"><a href="index.html">Google+</a></li>
                    <li class="email"><a href="index.html">Email</a></li>
                    <li class="rss"><a href="index.html">RSS Feed</a></li>
                </ul>
            </div>


           
    </div>

    <div class="xcol">



           

          

	       

	</div>



    <div class="xcol last">

        <h3>About</h3>

        <p>
        <a href="index.html"><img width="40" height="40" class="align-left" alt="firefox" src="images/gravatar.jpg"></a>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.
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
		Design by <a href="index.html">Webteam</a>
	</p>

	<p class="footer-right">
	   <a href="index.html">Home</a> |
		<a href="index.html">Sitemap</a> |
		<a href="index.html">RSS Feed</a> |
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
