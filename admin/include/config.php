<?php
$a_result = $o_db->getAll('select * from config');
$a_config=array();
for ($i=0;$i<count($a_result);$i++) $a_config[$a_result[$i]['configkey']]=$a_result[$i]['configvalue'];

echo '<tr><td class="titlu">Configurare</td></tr>';	
echo'<tr><td><form method="post" action="submit.php" onsubmit="return validate_form([[\'title\',\'required\',\'Titlu\']]);">';
echo '<table border="0"  cellspacing="1" cellpadding="1" width="100%"><tr><td style="width:150px;">Titlu: *</td>';
echo'<td><input type="hidden" name="page" value="config"><input type="hidden" name="action" value="title">';
echo'<input type="text" class="textfield" name="title" id="title" value="'.$a_config['title'].'"></td></tr>';
echo' <tr><td>Motto:</td>';
echo'<td><input type="text" class="textfield" name="motto" id="motto" value="'.$a_config['motto'].'"><br></td>';
echo' <tr><td>Descriere:</td>';
echo' <td><textarea rows="3" cols="20" name="description">'.$a_config['description'].'</textarea></td></tr>';
echo' <tr><td>Cuvinte cheie:</td>';
echo' <td class="comment"><textarea rows="3" cols="20" name="keywords">'.$a_config['keywords'].'</textarea>&nbsp(separate prin virgula)</td></tr>';
echo '<tr><td colspan="2"><input type="Submit" value="Actualizeaza" class="button"></td></tr></table>';
echo '</form></tr></td>';
?>