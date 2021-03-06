<?php
/**
* Base_Controller
*/
class Base_Controller
{
    private $_path_model = 'model/%s_model';
    private $_path_view = 'view/%s_view';

    protected function load_model($file)
    {
        $path = sprintf($this->_path_model, $file);

        $this->_require($path);

        $class = get_the_class_name($path);

        return new $class();
    }

    protected function load_view($file, $data=null)
    {
        $this->_require(sprintf($this->_path_view, $file), $data);
    }

    private function _require($path, $data=null)
    {
        if ($data)
        {
            extract($data);
        }

        require_once $path . '.php';
    }
}