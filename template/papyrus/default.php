<div id="header">
  <div id="logo">
    <h1><a href="index.php"><?php   echo $a_config['title']; ?>  </a></h1>
    <h2><?php  echo $a_config['motto']; ?></h2>
  </div>
</div>
<div id="content">
  <div id="colOne">
    <div id="latest-post">
         <?php 
         if (!empty($i_pageid)) 
         {    
            echo '<h2 class="title">'.$a_page[$i_pageid]['title'].'</h2><br/>'; 
            echo '<div class="story">'.$a_page[$i_pageid]['content'].'</div>';
         }
         elseif (!empty($i_categoryid)) 
         {
            echo '<h2 class="title">'.$a_category[$i_categoryid]['title'].'</h2><br/>'; 
            echo '<div class="story">'.$a_category[$i_categoryid]['content'].'</div>';
            
            foreach($a_article as $i_key=>$a_value) 
            {
                echo '<h2 class="title"><a href="index.php?articleid='.$i_key.'">'.$a_value['title'].'</a></h2><br/><div class="story">'.$a_value['description'].'</div><br/>';
            }
            
         }
         else
         {
            echo '<h2 class="title">'.$a_article['title'].'</h2><br/>'; 
            echo '<div class="story">'.$a_article['content'].'</div>';
         }
        ?>    
    </div>   
    <div style="clear: both; height: 1px;"></div>
  </div>
  <div id="colTwo">
    <ul>
      <li>
        <h2>Pagini</h2>
        <ul>
        <?php
            foreach($a_page as $i_key=>$a_value) 
                if ($i_key==$i_pageid) 
                    echo '<li class="active"><a href="index.php?pageid='.$i_key.'">'.$a_value['title'].'</a></li>';	
                else  
                    echo '<li><a href="index.php?pageid='.$i_key.'">'.$a_value['title'].'</a></li>';	
        ?>
        </ul>      
      </li>
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
             <h1>Legaturi</h1>
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
    <div style="clear: both;">&nbsp;</div>
  </div>
</div>
<div id="footer">
  <p>Copyright &copy; 20010 <?php echo $a_config['title'];  ?>.</p>
</div>