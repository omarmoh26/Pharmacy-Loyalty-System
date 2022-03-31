<?php
	class ViewUsersModel extends model
	{
		public  $title = 'Users View Page';
		public function ViewUsers()
		{
			$this->dbh->query('SELECT name from users');
			$name=$this->dbh->execute();
			return $name;
		}
	}
?>