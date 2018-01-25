<?php
echo '<tr><td class="titlu">Harta site</td></tr>';
$a_page = $o_db->getAll('select * from page p order by ordon');

echo '<tr><td><table border="0" width="100%" class="tabel" cellspacing="1" cellpadding="2">';
for ($i=0;$i<count($a_page);$i++) 
{
	echo '<tr><td class="td"><a href="index.php?page=pages&action=mod&pageid='.$a_page[$i]['pageid'].'" title="Modificare">'.$a_page[$i]['title'].'</a></td></tr>';
}
echo '</table><br/>';
echo '<table border="0" width="100%" class="tabel" cellspacing="1" cellpadding="2">';
$a_category = $o_db->getAll('select * from category order by ordon');
for ($i=0;$i<count($a_category);$i++) 
{
	echo '<tr><td class="td"><a href="index.php?page=categories&action=mod&categoryid='.$a_category[$i]['categoryid'].'" title="Modificare">'.$a_category[$i]['title'].'</a></td></tr>';
    
    $a_article = $o_db->getAll('select * from article where categoryid = '.$a_category[$i]['categoryid'].' order by dateadd desc');
    for ($j=0;$j<count($a_article);$j++) 
    {
	    echo '<tr><td class="td">&nbsp;&nbsp;<a href="index.php?page=articles&action=mod&articleid='.$a_article[$j]['articleid'].'" title="Modificare">'.$a_article[$j]['title'].'</a></td></tr>';
    }

}
echo '</table>';


echo'</td></tr>';



?>