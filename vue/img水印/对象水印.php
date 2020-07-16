<?php
	class Image{
		public function _construct($src){
			$this->info=getimagesize($src);
			image_type_to_extension($this->info[2],false);
			$this->info=array(
				'width'=>$info[0],
				'height'=>$info[1],
				'type'=>image_type_to_extension($this->$info[2],false);
				'mine'=>$info['mine']
			);
			$fun="imagecreatefrom{$this->info['type']}";
			$this->image=$fun($src);
		}
		
		public function thumb($width,height){
			$image_thumb=imagecreatecolor($width,$height);
			
		}
		public function _destruct(){
			imagedestroy(image);
		}
	}
?>