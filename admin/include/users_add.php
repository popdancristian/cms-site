<?php
$a_group=$o_db->getAll('select * from `group`');

echo '<tr><td class="titlu"><a href="index.php?page=users" class="calea">Gestionare Utilizatori</a>&nbsp;>&nbsp;Adaugare</td></tr>';
echo '<tr><td><form method="post" action="submit.php" onsubmit="return validate_form([[\'username\',\'required\',\'Utilizator\'],[\'firstname\',\'required\',\'Nume\'],[\'lastname\',\'required\',\'Prenume\'],[\'password\',\'required\',\'Parola\'],[\'email\',\'required\',\'Email\'],[\'email\',\'email\',\'Email\']]);"><input type="hidden" name="page" value="users"><input type="hidden" name="action" value="add">';
echo '<table border="0" width="100%" cellspacing="1" cellpadding="2">';
echo '<tr><td style="width:150px;">Utilizator: *</td>';
echo '<td><input type="text" class="textfield" name="username" id="username"></td>';
echo '</tr>';
echo '<tr><td>Nume: *</td>';
echo '<td><input type="text" class="textfield" name="firstname" id="firstname"></td>';
echo '</tr>';
echo '<tr><td>Prenume: *</td>';
echo '<td><input type="text" class="textfield" name="lastname" id="lastname"></td>';
echo '</tr>';
echo '<tr><td>Parola: *</td>';
echo '<td><input type="password" class="textfield" name="password" id="password"></td>';
echo '</tr>';
echo '<tr><td>Email: *</td>';
echo '<td><input type="text" class="textfield" name="email" id="email"></td>';
echo '</tr>';
echo '<tr><td>Group:</td><td><select name="groupid">';
for ($i=0;$i<count($a_group);$i++) 
echo'<option value='.$a_group[$i]['groupid'].'>'.$a_group[$i]['title'].'</option>';
echo'</select></td></tr>';

echo '<tr><td><input type="Submit" value="Adauga" class="button"></td></tr></table>';
echo '</form></tr></td>';
?>