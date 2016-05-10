<?php  
/*
|--------------------------------------------------------------------------
| Init
|--------------------------------------------------------------------------
|
|
|	Tout ça tu t'en fout complet !!!
|
*/
$path = __DIR__;
require($path.'/vendor/autoload.php');
include($path.'/vendor/asphalte.php');
if(isset($_GET["request"])){ $request = $_GET["request"];
}else{$request = "";}
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(array(	$path."/templates/"));
$twig = new Twig_Environment($loader, array('cache' =>false,'debug' => false));
$route = new Asphalte;





/*
|--------------------------------------------------------------------------
| System de routing
|--------------------------------------------------------------------------
|
|
|	Exemple : if(	$route->get("")->statut ){ ...ton code.. }
|
*/

	/*
	|--------------------------------------------------------------------------
	| Home
	|--------------------------------------------------------------------------
	|
	|
	*/
	if(	$route->get("")->statut ){
		
		/*
		|--------------------------------------------------------------------------
		| Ton array de datas ( la base koi !!)
		|--------------------------------------------------------------------------
		*/
		$datas = array(
			"titre"=>"Mon super titre",
			"content"=>"mon blablabla"
		);
		
		echo $twig->render("home.twig", $datas);
		
	
	
	/*
	|--------------------------------------------------------------------------
	| Si l'url est égale à http://monsite.com/contact
	|--------------------------------------------------------------------------
	|
	|
	*/
		
	}else if(	$route->get("contact")->statut ){
		
		echo $twig->render("contact.twig");
	
	/*
	|--------------------------------------------------------------------------
	| Si l'url est égale à http://monsite.com/mapage
	|--------------------------------------------------------------------------
	|
	|
	*/
	}else if(	$route->get("mapage")->statut ){
		
		/*
		|--------------------------------------------------------------------------
		| Ton array de datas ( la base koi !!)
		|--------------------------------------------------------------------------
		*/
		$datas = array(
			"titre"=>"Mon super titre",
			"content"=>"mon blablabla"
		);
		
		echo $twig->render("pages.twig", $datas);	
		
	/*
	|--------------------------------------------------------------------------
	| Si l'url est égale à http://monsite.com/news/toto par exemple
	|--------------------------------------------------------------------------
	*/	
	}else if(	$route->get("news/toto")->statut ){	
		
		/*
		|--------------------------------------------------------------------------
		| Ton array de datas ( la base koi !!)
		|--------------------------------------------------------------------------
		*/
		$datas = array(
			"titre"=>"Mes news",
			"content"=>"mon blablabla",
			"mesnews"=>array(
				"Ma news1",
				"Ma news2",
				"Ma news3",
				"Ma news4",
				"Ma news5"
			)
		);
		echo $twig->render("news.twig", $datas);
	
	/*
	|--------------------------------------------------------------------------
	| Sinon c'est 404
	|--------------------------------------------------------------------------
	*/	
	}else{
	
		echo $twig->render("404.twig");
	
	}


/*
|--------------------------------------------------------------------------
| Sinon c'est quoi twig ??? >> http://twig.sensiolabs.org/doc/templates.html
|--------------------------------------------------------------------------
*/	



?>