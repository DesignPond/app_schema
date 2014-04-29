<?php namespace Schema\Service\Upload;

interface UploadInterface{

	/*
	 * upload selected file 
	 * @return array
	*/	
	public function upload( $file , $destination ,$newname);	
	
	/*
	 * rename file 
	 * @return array
	*/	
	public function renameFile( $file , $name , $path );
	
	/*
	 * rename image 
	 * @return array
	*/	
	public function renameImg( $file , $name , $path );
	
	/*
	 * resize file 
	 * @return array
	*/	
	public function resizeImg( $path, $name , $width = null , $height = null , $ratio  );
    
}