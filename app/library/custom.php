<?php

class Custom {
	
	public function makeSlug($string){
	
		 $str = htmlentities($string);
	     
	     $str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
	     $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
	     $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
	     
	     $str = preg_replace('/\W+/', '', $str);
	    
	     return $str;  
	}
	
}