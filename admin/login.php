<?php 
session_start();  //-- Start sesiune
?>

<!--Pagina de logare--> 
<html>
 <head>
  <title>Administrare - SGCweb</title>
  <script type="text/javascript" language="JavaScript" src="include/functions.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css"> 
 </head>
 <body>
	<!--Formular logare--> 
	<form  method="post" action="submit.php" onsubmit="return validate_form([['username','required','Utilizator'],['password','required','Parola']]);">
    <input type="hidden" name="page" value="login">
	<table align="center" class="tabel"  border="0" cellspacing="1" cellpadding="5" width="250">
	<tr><td style="background-color:#8CC7E7" colspan="2" align="center"><img src="images/logo.gif" width="200" height="50" border="0" alt="Administrare - SGCweb"/></td></tr>
    <?php 
     //-- Eroare de logare, afisare eroare
     if (!empty($_SESSION['error'])) 
     {
        echo '<tr><td colspan="2" align="center" class="eroare">'.$_SESSION['error'].'</td>';
        unset($_SESSION['error']);
     }
    ?>
	<tr>
	 <td align="right">Utilizator: *</td>
	 <td>&nbsp<input type="text" class="stextfield" name="username" id="username"></td>
	</tr>
	<tr>
	 <td align="right" >Parola: *</td> 
	 <td>&nbsp<input type="password" class="stextfield" name="password" id="password"></td>
	</tr>
	<tr><td colspan="2" align="center"><input type="submit" value="INTRA" class="button"></td></tr>
	</table>
	</form>
 
</body>


</html>