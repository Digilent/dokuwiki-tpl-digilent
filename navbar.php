<?php
	
	function getNavBar()
	{
		//debugClear();
		$navHTML = file_get_contents(dirname(__FILE__).'/navbar.tpl.html');
		//debugLog($navHTML);
		return $navHTML;
	}
	
	//Clear debug log
	function debugClear()
	{			
		file_put_contents('/var/www/logs/navDebug.txt', '');
	}
	
	//Log debug info
	function debugLog($data)
	{
		$data = $data . "\n";
		file_put_contents('/var/www/logs/navDebug.txt', $data, FILE_APPEND);
	}