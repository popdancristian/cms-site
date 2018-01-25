function trim(str_string) {return str_string.replace(/^\s+|\s+$/g,"");}
function isEmail(str_email)
{
   validRegExp = /^[^@]+@[^@]+.[a-z]{2,}$/i;  
   // search email text for regular exp matches
   if (str_email.search(validRegExp) == -1) return false;
   return true; 
}
function isUrl(s) 
{
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(s);
}

function validate_form(a_validate)
{   
    for (var i=0;i<a_validate.length;i++)
    {
        switch(a_validate[i][1])
        {
            case 'required':
              if (trim(document.getElementById(a_validate[i][0]).value)=='')
                {alert('Campul `'+a_validate[i][2]+'` este obligatoriu!');document.getElementById(a_validate[i][0]).focus();return false;}
            break;
			case 'email':
              if (!isEmail(document.getElementById(a_validate[i][0]).value))
                {alert('Campul `'+a_validate[i][2]+'` este invalid!');document.getElementById(a_validate[i][0]).focus();return false;}
            break;
			case 'url':
              if (!isUrl(document.getElementById(a_validate[i][0]).value))
                {alert('Campul `'+a_validate[i][2]+'` este invalid!');document.getElementById(a_validate[i][0]).focus();return false;}
            break;
        }
    }
    return true;
}