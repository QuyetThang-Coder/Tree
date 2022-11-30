<?php
    class BaseController 
    {
        /**
         * Descrtiption: 
         *      + path name: folderName.fileName 
         *      + Lấy từ sau thư mục Views
         */

        const VIEW_FOLDER_NAME = 'Views';
        const MODEL_FODEL_NAME = 'Models';

        protected function view($viewPath, array $data = [])
        {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
            // die (self::VIEW_FOLDER_NAME. '/'. str_replace('.', '/', $viewPath). '.php');
            require (self::VIEW_FOLDER_NAME. '/'. str_replace('.', '/', $viewPath). '.php');
        }

        protected function loadModel($modelPath)
        {
            return require (self::MODEL_FODEL_NAME. '/'. str_replace('.', '/', $modelPath). '.php');
        }
    }