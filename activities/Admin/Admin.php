<?php

namespace Admin;

use Auth\Auth;



class Admin{

        function __construct(){
                $auth = new Auth();
                $auth->checkAdmin();
                $this->currentDomain = CURRENT_DOMAIN;
                $this->basePath = BASE_PATH;
        }


        public function redirect($url){

                header("Location: ". trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
                exit;

        }
        public function redirectBack()
        {
                header("Location: ". $_SERVER['HTTP_REFERER']);
                exit;
        }


        
        protected function saveImage($image, $imagePath, $imageName = null)
        {

                if($imageName)
                {
                        $extension = explode('/', $image['type'])[1];
                        $imageName = $imageName . '.' . $extension;
                }
                else{
                        $extension = explode('/', $image['type'])[1];
                        $imageName = date("Y-m-d-H-i-s"). '.' . $extension;
                }
                
                $imageTemp = $image['tmp_name'];
                $imagePath = 'public/' . $imagePath . '/';
                if(is_uploaded_file($imageTemp))
                {
                        if(move_uploaded_file($imageTemp, $imagePath . $imageName))
                        {
                                return $imagePath . $imageName;
                        }
                        else{
                                return false;

                        }
                }
                else{
                        return false;
                }

        }


        
        protected function removeImage($path)
        {
                // $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
                $path = trim($path, '/ ');
                if(file_exists($path)){
                        unlink($path);
                }

        }



}