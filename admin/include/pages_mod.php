<?php
$page_select=$o_db->GetRow("select * from page where pageid='".$_GET['pageid']."'");
echo '<tr><td class="titlu"><a href="index.php?page=pages" class="calea">Gestionare pagini</a> > Modificare</td></tr>';
echo'<tr><td> <form method="post" action="submit.php" onsubmit="return validate_form([[\'title\',\'required\',\'Titlu\']]);"><input type="hidden" name="page" value="pages"><input type="hidden" name="action" value="update"><input type="hidden" name="pageid" value="'.$_GET['pageid'].'">';
echo '<table border="0"  cellspacing="1" cellpadding="1" width="100%">';
echo '<tr>';
echo '<td style="width:150px;">Titlu: *</td>';
echo '<td><input type="text" class="textfield" name="title" value="'.$page_select['title'].'"  id="title"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Descriere:</td>';
echo '<td><textarea name="description" id="description">'.$page_select['description'].'</textarea></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Cuvinte cheie:</td>';
echo '<td><input type="text" class="textfield" name="keywords" value="'.$page_select['keywords'].'"  id="keywords"></td>';
echo '</tr>';
echo'<tr><td colspan="2">Continut:</td></tr>';
echo'<tr><td colspan="2">'. getEditor('textarea',$page_select['content']).'</td></tr>';
echo '<tr>';
echo '<td>Ordonare:</td>';
echo '<td><input type="text" class="stextfield" name="ordon" id="ordon" value="'.$page_select['ordon'].'"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Publicare:</td>';
echo '<td><input type="checkbox" name="publish" id="ordon" value="1"'; 
if ($page_select['publish']==1) echo ' checked';
echo '></td>';
echo '</tr>';

echo '<tr><td><input type="Submit" value="Actualizeaza" class="button"></td></tr></table>';
echo '</form></tr></td>';
?>