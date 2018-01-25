<?php
class Db 
{
    //-- Tip conexiune
    var $Persistent = true;

    
    var $i_Link     = 0;
    var $i_Query    = 0;

    
    var  $i_Halt     = 0;           
    var  $i_Errno    = 0;
    var  $str_Error  = "";
    var  $affected   = 0;

    /*
    ** Clasa constructor
    */
    function Db() 
    {
        //-- Stabilire conexiune, selectare baza de date 
        if ( 0 == $this->i_Link ) 
        {
            //-- Conectare
            $this->i_Link = $this->Persistent ? @mysql_pconnect(DB_HOST, DB_USER, DB_PASS) : @mysql_connect(DB_HOST, DB_USER, DB_PASS);

            //-- Eroare?
            if (!$this->i_Link) 
            {
                $this->Halt('Aplicatia nu se poate conecta la server!');
                return 0;
            }

            if (!@mysql_select_db(DB_NAME, $this->i_Link)) 
            {
                $this->Halt("Aplicatia nu se poate conecta la baza de date!");
                return 0;
            }
        }
    }
    
    /*
    ** Executare sql
    */
    function execute($Query_String) { return $this->Query($Query_String); }
    function query($Query_String) 
    {
        //-- Nou sql
        if ($this->i_Query)
        {
            $this->Free(); 
        }
        //--Executare
        $this->i_Query      = @mysql_query($Query_String,$this->i_Link);

        //--Randuri afectare
        $this->affected     = @mysql_affected_rows($this->i_Link);

        //-- Erori
        $this->i_Errno      = mysql_errno();
        $this->str_Error    = mysql_error();

        if (!$this->i_Query) 
        {
            $this->Halt("Invalid SQL: ".$Query_String);
        }

        return $this->i_Query;
    }
    
    /*
    ** Verificare modificare
    */

    function isAffected() 
    {
        return $this->affected ? true : false;
    }    

    /*
    ** Extragerea ultimului insert id
    */
    function insertId() 
    {
        return @mysql_insert_id($this->i_Link);
    }    

    /*
    ** Extragerea primului element din rezultat
    */
    function GetOne($Query_String) 
    {
        //-- Executare
        $this->query($Query_String);

        //-- Returnare
        $a_row = @mysql_fetch_array($this->i_Query);

        return isset($a_row[0]) ? $a_row[0] : NULL;
    }

    /*
    ** Extragerea primului rand din rezultat 
    */
    function GetRow($Query_String) 
    {
        //-- Executare
        $this->query($Query_String);

        //-- Returnare
        return @mysql_fetch_assoc($this->i_Query);
    }

    /*
    ** Extragerea primuei coloane din rezultat 
    */
    function GetCol($Query_String) 
    {
        
        $a_result = array();

        //-- Executare
        $this->query($Query_String);

        while ($a_row = @mysql_fetch_array($this->i_Query))
        {
            //-- Prima coloana din fiecare rand
            $a_result[] = $a_row[0];
        }

        //-- Returnare
        return $a_result;
    }

    /*
    ** Extragere coloane
    */
    function GetAll($Query_String) 
    {
       
        $a_result = array();

        //-- Executare
        $this->query($Query_String);

        while ($a_row = @mysql_fetch_assoc($this->i_Query))
        {
            //-- Prima coloana din fiecare rand
            $a_result[] = $a_row;
        }

        //-- Returnare
        return $a_result;
    }

    function GetAssoc($Query_String, $field) 
    {
     $res    = $this->GetAll($Query_String);

     $result = array();
     for ($i=0;$i<count($res);$i++) { $result[$res[$i][$field]]=$res[$i]; }
     return $result;
    }

    /*
    ** Manage erori
    */
    function Halt($msg) 
    {
        $this->str_Error    = @mysql_error($this->i_Link);
        $this->i_Errno      = @mysql_errno($this->i_Link);

        if (0 == $this->i_Halt)
        {
           echo "
            <TABLE cellSpacing=2 cellPadding=2 width='55%' border=0 align='center' style='background-color:#EFEFDE;border: 1px solid #666666;'>
             <TR>
              <TD vAlign=center>
                <P><STRONG><FONT face=Arial color='#ff0000' size=2>Eroare!</FONT></STRONG></P>
                <P align=left><FONT face=Arial size=2>$msg<br><br>". $this->str_Error ." (". $this->i_Errno .")</FONT></P>
              </TD>
             </TR>
            </TABLE>";
        }
        else
        {
           echo "
            <TABLE cellSpacing=2 cellPadding=2 width='55%' border=0 align='center' style='background-color:#EFEFDE;border: 1px solid #666666;'>
             <TR>
              <TD vAlign=center>
                <P><STRONG><FONT face=Arial color='#ff0000' size=2>Eroare!</FONT></STRONG></P>
                <P align=left><FONT face=Arial size=2>Pagina nu poate fi accesata</P>
              </TD>
             </TR>
            </TABLE>";
        }

        die();
    }

    /*
    ** Eliberare resurse
    */
    function Free() 
    {
       @mysql_free_result($this->i_Query);
       $this->i_Query = 0;
    }

    /*
    ** Inchidere conexiune
    */
    function Close()
    {
        if ($this->i_Link != 0 && !$this->Persistent) 
        {
            mysql_close($this->i_Link);
            $this->i_Link = 0;
        }
    }
}

?>