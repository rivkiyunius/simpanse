<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class User extends RestController{

    function __construct($config = 'rest')
	{
		parent::__construct($config);
	}

	public function users_get()
	{

	}
}
