<?php

//-- PAGINA DE BAZA
session_start();  //-- Start session 
$i_pageid=empty($_GET['pageid']) ? 0: intval($_GET['pageid']);
$i_categoryid=empty($_GET['categoryid']) ? 0: intval($_GET['categoryid']);
$i_articleid=empty($_GET['articleid']) ? 0: intval($_GET['articleid']);
include_once 'init.php'; //-- Include init

//-- Configurare titlu site
$a_result = $o_db->getAll('select * from config');
$a_config=array();
for ($i=0;$i<count($a_result);$i++) $a_config[$a_result[$i]['configkey']]=$a_result[$i]['configvalue'];
$str_title=$a_config['title'];

$str_keywords=$a_config['keywords'];
$str_description=$a_config['description'];
$a_page = $o_db->getAssoc('select * from page where publish = 1 order by ordon','pageid');
//-- Categorii
$a_category = $o_db->getAssoc('select * from category where publish = 1 order by ordon','categoryid');
$b_article=false;
$b_category=false;

//-- Daca suntem la articol
if (!empty($i_articleid)) 
{
	//-- Articole
	$a_article = $o_db->getRow('select a.*,c.title as category from article a inner join category c on a.categoryid=c.categoryid where articleid='.$i_articleid.' and a.publish = 1');
	if (!empty($a_article)) { 
	   $b_article=true;
	   $str_title=$a_article['title'].' .: '.$a_article['category'].' .: '.$str_title;
	
       $str_keywords=$a_article['keywords'];
       $str_description=$a_article['description'];
	}
}
//-- Daca suntem la categorie
elseif (!empty($i_categoryid))
{
	// --Categorie 
	if (isset($a_category[$i_categoryid])) 
	{
		$b_category=true;
		//--Articolele din categoria respectiva
		$a_article = $o_db->getAssoc('select * from article where categoryid='.$i_categoryid.' and publish = 1 order by dateadd','articleid');
		$str_title=$a_category[$i_categoryid]['title'].' .: '.$str_title;
		
        $str_keywords=$a_category[$i_categoryid]['keywords'];
        $str_description=$a_category[$i_categoryid]['description'];
	}
}
//-- Daca suntem la pagina
if (!$b_category and !$b_article)
{
	//--Pagina
	if (!isset($a_page[$i_pageid]))
	foreach ($a_page as $i_key => $a_value) if ($a_value['home']==1) $i_pageid=$i_key;
	$str_title=$a_page[$i_pageid]['title'].' .: '.$str_title;
	
    $str_keywords=$a_page[$i_pageid]['keywords'];
    $str_description=$a_page[$i_pageid]['description'];
}

//-- Cauta module active de tip plugin
$a_module = $o_db->getAssoc("select * from module where active = 1 and type='plugin'",'page');
if (!empty($a_module['links'])) $a_link=$o_db->getAssoc('select * from link order by linkid','linkid');

//-- Adauga aspectul active
$a_layout = $o_db->getRow('select * from layout where active = 1');

include_once 'template/header.php';
//-- Include header
include_once 'template/'.$a_layout['directory'].'/default.php';//-- Include template
include_once 'template/footer.php';
//-- Include footer
?>