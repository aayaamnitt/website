<?php



$tablepost='posts';


function displaycomments($postid){
		$table='comments';
		$sql="SELECT * FROM $table WHERE postid =$postid ORDER BY timestamp ASC";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		if($count>0){$i=0;
			while($row = mysql_fetch_array($result))
  					{$i=$i+1;
  						$text=$row['commenttext'];
  						$time=$row['timestamp'];
  						$by=$row['name'];
              $id=$row['id'];
  						

  					
  				print	"<li class='depth-1'>

							<div class='comment-info'>
								<cite>
								<img alt='' src='images/gravatar.jpg' class='avatar' height='30' width='30' />
								
									<br />".$by."  <br />
									<span class='comment-data'>".$time."</span>
								</cite>
							</div>

							<div class='comment-text'>
								<p>".$text."</p>

								
							</div>
							</li> ";
            			}

  		}
		
		else{
			print "<div>Be the first to comment </div>";
		}


	}


  
?>