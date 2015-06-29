<?php



$tablepost='posts';


function displayposts(){
		$tablepost='posts';
		$sql="SELECT * FROM $tablepost ORDER BY timestamp DESC";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		if($count>0){$i=0;
			while($row = mysql_fetch_array($result))
  					{$i=$i+1;
  						$heading=$row['posthead'];
  						$text=$row['posttext'];
  						$time=$row['timestamp'];
  						$by=$row['name'];
  						$imageurl=$row['imageurl'];

  					
  						if($i%2==1)
  						   {
           					 print "<div class='calloutodd'>
  						   
            				<h4><a href='index.php'>".$heading."</a></h4>
							<div class='datetime'>".$time."</div>
            		  		<p>
            			 	<a href='index.php' title=''><img  class='thumbnail' src='".$imageurl."' /></a>
             
              		  		<p>".
								$text.
							"</p>

		
            			 <b class='notch'></b>
             			 <b class='roundodd'>
            			 <img src='images/gravatar.jpg' />
            				</b>
            				<b class='byodd'>".
              					$by.
            				"</b>
            				</div>";
            			}

            			else 
            				{
           					 print "<div class='callouteven'>
  						   
            				<h4><a href='index.php'>".$heading."</a></h4>
							<div class='datetime'>".$time."</div>
            		  		<p>
            			 	<a href='index.php' title=''><img  class='thumbnail' src='".$imageurl."' /></a>
             
              		  		<p>".
								$text.
							"</p>

		
            			 <b class='notch'></b>
             			 <b class='roundeven'>
            			 <img src='images/gravatar.jpg' />
            				</b>
            				<b class='byeven'>".
              					$by.
            				"</b>
            				</div>";
            			}

  					}
		}
		else{
			print "members are too busy to post, checkout later !!";
		}


	}
?>