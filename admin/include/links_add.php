<?php
echo '<tr><td class="titlu"><a href="index.php?page=links" class="calea">Gestionare Legaturi</a>&nbsp;>&nbsp;Adaugare</td></tr>';
echo'<tr><td><form method="post"  action="submit.php" onsubmit="return validate_form([[\'title\',\'required\',\'Titlu\'],[\'url\',\'required\',\'URL\'],[\'url\',\'url\',\'URL\']]);"><input type="hidden" name="page" value="links"><input type="hidden" name="action" value="add">';
echo '<table border="0" width="100%" cellspacing="1" cellpadding="2">';
echo '<tr><td style="width:150px;">Title: *</td>';
echo '<td><input type="text" class="textfield" name="title" id="title"></td>';
echo '</tr>';
echo '<tr><td style="width:150px;">URL: *</td>';
echo '<td class="comment"><input type="text" class="textfield" name="url" id="url" value="http://">&nbsp(ex: http://www.sgcweb.info)</td>';
echo '</tr>';
echo '<tr><td><input type="Submit" value="Adauga" class="button"></td></tr></table>';
echo '</form></tr></td>';
?>