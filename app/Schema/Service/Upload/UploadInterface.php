<?php namespace Schema\Service\Upload;

interface UploadInterface{

	/*
	 * upload selected file 
	 * @return array
	*/	
	public function upload( $file , $destination );	
	
	/*
	 * rename file 
	 * @return array
	*/	
	public function rename( $file , $name , $path );
	
	/*
	 * resize file 
	 * @return array
	*/	
	public function resize( $path, $name , $width = null , $height = null , $ratio  );
    
}