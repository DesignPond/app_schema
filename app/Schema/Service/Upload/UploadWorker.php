<?php namespace Schema\Service\Upload;

use Intervention\Image\Facades\Image;

class UploadWorker implements UploadInterface {

	/*
	 * upload selected file 
	 * @return array
	*/	
	public function upload( $file , $destination ){
		
		$name = $file->getClientOriginalName();
		$ext  = $file->getClientOriginalExtension();
		$new  = $file->move($destination,$name);
		$size = $new->getSize();
		$mime = $new->getMimeType();
		$path = $new->getRealPath();
		
		// test resize		
		//$this->resize( $path, $path , 200 , null , true );
		//$this->rename( $path, $name , 'files/test/' );
		
		$newfile = array( 'name' => $name ,'ext' => $ext ,'size' => $size ,'mime' => $mime ,'path' => $path  );
		
		if( $new )
		{			
			return $newfile;
		}
		
		return FALSE;		
	}	
	
	/*
	 * rename file 
	 * @return instance
	*/	
	public function rename( $file , $name , $path ){
		
		$newpath = $path.$name;
		
		return Image::make( $file )->save($newpath);
	}
	
	/*
	 * resize file 
	 * @return instance
	*/	
	public function resize( $path, $name , $width = null , $height = null, $ratio ){
		
		return Image::make( $path )->resize($width, $height , $ratio)->save($name);		
	}
    
}