<?php

class Controller_Main extends Controller
{
        function __construct()
	{
		$this->model = new Model_Main;
		$this->view = new View();
	}
        
	function action_index($parms)
	{	
            $data = $this->model->get_data(isset($parms['page'])?$parms['page']:null,isset($parms['tags'])?$parms['tags']:null);		
            $this->view->generate('main_view.php', 'template_view.php', $data);
	}
}