<?php namespace Schema\Service\Upload;

use Intervention\Image\Facades\Image;

class UploadWorker implements UploadInterface {

	/*
	 * upload selected file 
	 * @return array
	*/	
	public function upload( $file , $destination , $newname){
		
		$name = $file->getClientOriginalName();
		$ext  = $file->getClientOriginalExtension();
		$new  = $file->move($destination,$newname.'.'.$ext);
		$size = $new->getSize();
		$mime = $new->getMimeType();
		$path = $new->getRealPath();
		
		// test resize		
		//$this->resize( $path, $path , 200 , null , true );
		//$this->rename( $path, $name , 'files/test/' );
		
		chmod($path, 0775); 
		
		$newfile = array( 'name' => $name ,'ext' => $ext ,'size' => $size ,'mime' => $mime ,'path' => $path , 'imageobject' => $new );
		
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
	public function renameImg( $file , $name , $path ){
		
		$newpath = $path.$name;
		
		return Image::make( $file )->save( $newpath );
	}

	/*
	 * rename file 
	 * @return instance
	*/	
	public function renameFile( $file , $name , $path ){
		
		$newpath = $path.$name;
		
		return rename($file, $newpath);
	}
	
	/*
	 * resize file 
	 * @return instance
	*/	
	public function resizeImg( $path, $name , $width = null , $height = null, $ratio ){
		
		return Image::make( $path )->resize($width, $height , $ratio)->save($name);		
	}
    
}