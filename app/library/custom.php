<?php

class Custom {
	
	public function makeSlug($string){
	
		 $str = htmlentities($string);
	     
	     $str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
	     $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
	     $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
	     
	     $str = preg_replace('/\W+/', '_', $str);
	    
	     return $str;  
	}
	
	public function limit_words($string, $word_limit){
	
		$words = explode(" ",$string);
		$new = implode(" ",array_splice($words,0,$word_limit));
		if( !empty($new) ){
			$new = $new.'...';
		}
		return $new;
	}
	
	public function if_exist(&$argument, $default="") {
	
	   if(!isset($argument)) 
	   {
	       $argument = $default;
	       
	       return $argument;
	   }
	   
	   $argument = trim($argument);
	   
	   return $argument;
	}
	
	public function formatDate($date){
		
		$Carbon = new Carbon\Carbon();
		$dateFormatted   = $Carbon->createFromFormat('Y-m-d H:i:s', $date);
		return  $dateFormatted;
	}
	
}