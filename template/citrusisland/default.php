<div id="wrap">
  <div id="header">    
    <h1 id="logo"><a href="index.php"><?php   echo $a_config['title']; ?>  </a></h1>
    <h2 id="slogan"><?php  echo $a_config['motto']; ?></h2>
  </div>
  <div id="menu">
    <ul>
        <?php
            foreach($a_page as $i_key=>$a_value) 
                if ($i_key==$i_pageid) 
                    echo '<li id="current"><a href="index.php?pageid='.$i_key.'">'.$a_value['title'].'</a></li>';	
                else  
                    echo '<li><a href="index.php?pageid='.$i_key.'">'.$a_value['title'].'</a></li>';	
        ?>
    </ul>
  </div>
  <div id="sidebar" >
     <h1>Categorii</h1>
     <ul class="sidemenu">
        <?php
          foreach($a_category as $i_key=>$a_value) echo '<li><a href="index.php?categoryid='.$i_key.'">'.$a_value['title'].'</a></li>';	
        ?>					
     </ul>
     <?php
        if (!empty($a_link))
        {
        ?>
             <h1>Legaturi</h1>
             <ul class="sidemenu">
                <?php
                    foreach($a_link as $i_key=>$a_value) echo '<li><a href="'.$a_value['url'].'" target="_blank">'.$a_value['title'].'</a></li>';	
                ?>					
            </ul>
        <?php
        }
      ?>  
  </div>
  <div id="main"> 

    <?php 
     if (!empty($i_pageid)) 
     {    
        echo '<h1>'.$a_page[$i_pageid]['title'].'</h1>'; 
        echo '<div class="post-orange">'.$a_page[$i_pageid]['content'].'</div>';
     }
     elseif (!empty($i_categoryid)) 
     {
        echo '<h1>'.$a_category[$i_categoryid]['title'].'</h1>'; 
        echo '<div class="post-orange">'.$a_category[$i_categoryid]['content'].'</div>';
        
        foreach($a_article as $i_key=>$a_value) 
        {
            echo '<div class="post-green">';
            echo '<a href="index.php?articleid='.$i_key.'">'.$a_value['title'].'</a><br>'.$a_value['description'].'<br>';	
            echo '</div>';
        }
        
     }
     else
     {
        echo '<h1>'.$a_article['title'].'</h1>'; 
        echo '<div class="post-orange">'.$a_article['content'].'</div>';
     }
    ?>

</div>
<div id="footer">
  <div id="footer-content">   
    <div id="footer-left"> &copy; Copyright 2010 <strong><?php echo $a_config['title'];  ?></strong> All rights reserved.&nbsp;</div>
  </div>
</div>