<div id="logo">
	<h1><a href="index.php"><?php   echo $a_config['title']; ?>  </a></h1>
	<p><em> <?php  echo $a_config['motto']; ?></em></p>
</div>
<hr />
<div id="header">
	<div id="menu">
		<ul>
			<?php
				foreach($a_page as $i_key=>$a_value) 
					if ($i_key==$i_pageid) 
						echo '<li class="current_page_item" ><a href="index.php?pageid='.$i_key.'">'.$a_value['title'].'</a></li>';	
					else  
						echo '<li><a href="index.php?pageid='.$i_key.'">'.$a_value['title'].'</a></li>';	
			?>
		</ul>
	</div>
</div>
<div id="page">
	<div id="content">
			<?php 
			 if (!empty($i_pageid)) 
			 {
				echo '<div class="post">';
				echo '<h2 class="title">'.$a_page[$i_pageid]['title'].'</h2>'; 
				echo '<div class="entry">'.$a_page[$i_pageid]['content'].'</div>';
				echo '</div>';
			 }
			 elseif (!empty($i_categoryid)) 
			 {
				echo '<div class="post">';
				echo '<h2 class="title">'.$a_category[$i_categoryid]['title'].'</h2>'; 
				echo '<div class="entry">'.$a_category[$i_categoryid]['content'].'</div>';
				echo '</div>';
				
				foreach($a_article as $i_key=>$a_value) 
				{
					echo '<div class="post">';
					echo '<a href="index.php?articleid='.$i_key.'">'.$a_value['title'].'</a><br>'.$a_value['description'].'<br>';	
					echo '</div>';
				}
				
			 }
			 else
			 {
				echo '<div class="post">';
				echo '<h2 class="title">'.$a_article['title'].'</h2>'; 
				echo '<div class="entry">'.$a_article['content'].'</div>';
				echo '</div>';
			 }
			?>
		
	</div>
	<div id="sidebar">
		<ul>
			
			<li>
				<h2>Categorii</h2>
				<ul>
					<?php
						foreach($a_category as $i_key=>$a_value) echo '<li><a href="index.php?categoryid='.$i_key.'">'.$a_value['title'].'</a></li>';	
					?>					
				</ul>
			</li>
            <?php
            if (!empty($a_link))
            {
            ?>
                <li>
				 <h2>Legaturi</h2>
				 <ul>
					<?php
						foreach($a_link as $i_key=>$a_value) echo '<li><a href="'.$a_value['url'].'" target="_blank">'.$a_value['title'].'</a></li>';	
					?>					
				</ul>
			   </li>
            <?php
            }
            ?>
		</ul>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
<div id="footer">
	<p>Copyright (c) 2008 <?php echo $a_config['title'];  ?>. All rights reserved.</p>
</div>
