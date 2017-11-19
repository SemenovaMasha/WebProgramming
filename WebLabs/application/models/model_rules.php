<?php
class Model_Rules extends Model
{
	public function get_data()
	{	
            $data=array();
            session_start();
            
            $hello;
            $name = "Guest";
            if (!empty($_SESSION)&&!empty($_SESSION["name"])){
                $hello="Sign Out";
                $name  =$_SESSION["name"];
            }else {
                $hello="Sign In";
            }
            $name='Hello, '.$name.'!';
            
            $data['name']=$name;
            $data['hello']=$hello;
            
            return $data;
	}
}