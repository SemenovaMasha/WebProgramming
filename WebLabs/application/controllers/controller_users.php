<?php

class Controller_Users extends Controller
{
        function __construct()
	{
		$this->model = new Model_Users;
		$this->view = new View();
	}
        
	function action_index($parms)
	{	
            $data = $this->model->get_data();		
            $this->view->generate('users_view.php', 'template_view.php', $data);
	}
}