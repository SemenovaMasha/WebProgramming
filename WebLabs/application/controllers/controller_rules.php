<?php

class Controller_Rules extends Controller
{
        function __construct()
	{
		$this->model = new Model_Rules;
		$this->view = new View();
	}
        
	function action_index($parms)
	{	
            $data = $this->model->get_data();		
            $this->view->generate('rules_view.php', 'template_view.php', $data);
	}
}