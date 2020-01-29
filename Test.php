<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	



	public function index()
	{
	
			$this->load->helper('url');

		$this->load->dbutil();
        $prefs = array(     
                 'format'      => 'sql',             
    		'filename'    => 'my_db_backup.sql'
              );
        $backup = $this->dbutil->backup($prefs); 
        $db_name = 'backup-on_'. date("Y-m-d") .'.sql';
        $save =  dirname(__FILE__).'../../../public/'.$db_name;
        $this->load->helper('file');
        write_file($save, $backup); 
        $this->load->helper('download');

		$dir =  dirname(__FILE__).'../../../public/';
		echo $dir;
		echo dirname($_SERVER['PHP_SELF']);
		$a = scandir($dir);
		$b = scandir($dir,1);
		
		print_r($b);
		$path =  dirname(__FILE__).'../../../public/'.$b[3];
		if(isset($b[5])){
			
		unlink($path);

		}

		
		}
	

	
}

