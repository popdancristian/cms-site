<?php
$a_category = $o_db->getAll('select * from category order by ordon');

$article_select=$o_db->GetRow("select * from article where articleid='".$_GET['articleid']."'");
echo '<tr><td class="titlu"><a href="index.php?page=articles" class="calea">Gestionare Articole</a>&nbsp;>&nbsp;Modificare</td></tr>';
echo'<tr><td> <form method="post"  action="submit.php" onsubmit="return validate_form([[\'title\',\'required\',\'Titlu\']]);">';

echo '<table border="0"  cellspacing="1" cellpadding="1" width="100%">';

echo '<tr><td>Categoria:</td><td><select name="categoryid">';
for ($i=0;$i<count($a_category);$i++) 
if ($article_select['categoryid'] == $a_category[$i]['categoryid'])
echo'<option value='.$a_category[$i]['categoryid'].' selected>'.$a_category[$i]['title'].'</option>';
else
echo'<option value='.$a_category[$i]['categoryid'].'>'.$a_category[$i]['title'].'</option>';
echo'</select></td></tr>';

echo '<tr><td style="width:150px;">Titlu: *</td><input type="hidden" name="page" value="articles"><input type="hidden" name="action" value="update"><input type="hidden" name="articleid" value="'.$_GET['articleid'].'"><td><input type="text" class="textfield" name="title" value="'.$article_select['title'].'"  id="title"></td></tr>';
echo'<tr><td valign="top">Descriere:</td><td><textarea rows="2" cols="20" name="description" id="description">'.$article_select['description'].'</textarea></td></tr>';
echo '<tr><td>Cuvinte cheie:</td>';
echo '<td class="comment"><input type="text" class="textfield" name="keywords" id="keywords" value="'.$article_select['keywords'].'">&nbsp(separate prin virgula)</td>';
echo '</tr>';
echo'<tr><td colspan="2">Continut:</td></tr><tr><td colspan="2">'. getEditor('content',$article_select['content']).'</td></tr>';
echo '<tr><td><input type="Submit" value="Actualizeaza" class="button"></td></tr></table>';
echo '</form></tr></td>';
?>