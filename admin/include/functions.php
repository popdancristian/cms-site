<?php
function getEditor($str_field,$str_value,$a_param = array())
{        
	//-- include editor
    include_once PATH_SITE.'/class/fckeditor/fckeditor.php';
	
    if (empty($a_param['width'])) $width = '100%';
    else $width = $a_param['width'];
    if (empty($a_param['height'])) $height = '300';
    else $height = $a_param['height'];

    $oFCKeditor = new FCKeditor($str_field) ;
    $oFCKeditor->BasePath	= URL_SITE.'/class/fckeditor/';
    $oFCKeditor->Value		= $str_value ;
    $oFCKeditor->Width      = $width;
    $oFCKeditor->Height     = $height;

    return $oFCKeditor->CreateHtml();
}

function error() 
{
   echo "
    <TABLE cellSpacing=2 cellPadding=2 width='55%' border=0 align='center' style='background-color:#EFEFDE;border: 1px solid #666666;'>
     <TR>
      <TD vAlign=center>
        <P><STRONG><FONT face=Arial color='#ff0000' size=2>Eroare!</FONT></STRONG></P>
        <P align=left><FONT face=Arial size=2>Pagina nu exista sau nu poate fi accesata.</P>
      </TD>
     </TR>
    </TABLE>";
   die();
}
?>