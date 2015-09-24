<?php 
	require_once('connector.php');

	class commentManager
	{
		private $connection;

		public function __construct()
		{
			$this->connection= new connector('127.0.0.1', 'root', 'root', 'wall');
		    if(isset($this->connection))
			{
				$this->connection->createConnection();
			}
			else
			{
				die('Error creating connection');
			}
		}

		public function __destruct()
		{
			$this->connection->closeConnection();
		}

		public function saveComment($passedGet)
		{
			unset($passedGet['action']);
			$queryString = 'INSERT INTO wallContents (';
			foreach($passedGet as $key=>$value)
			{
				$queryString .= $key.', ';
			}
			$queryString = substr_replace(rtrim($queryString), ')', -1);
			$queryString .= ' VALUES (';
			foreach($passedGet as $key=>$value)
			{
				$queryString .= '"'.$value.'"'.', ';
			}
			$queryString = substr_replace(rtrim($queryString), ')', -1);
			$result = $this->connection->doQuery($queryString);
			if($result != TRUE)
			{
				return 'false';
			}
			else
			{
				return 'true';
			}
		}

		public function commentToJSON($passedComment)
		{
			unset($passedComment['action']);
			$queryString = 'SELECT * FROM wallContents WHERE ';
			foreach($passedComment as $key=>$value)
			{
				$queryString .= $key.'='.'"'.$value.'"'.' AND ';
			}
			$queryString = substr_replace(rtrim($queryString), '', -3);
			$result = $this->connection->doQuery($queryString);
			if ($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$jsonString = '{';
				foreach($row as $key=>$value)
				{
					$jsonString .= '"'.$key.'"'.':'.'"'.$value.'", ';
				}
				$jsonString = substr_replace(rtrim($jsonString), '', -1);
				$jsonString .= '}';
				return $jsonString;
			} 
			else
			{
				return 'false';
			}
		}

		public function getWallContents($passedSortOrder)
		{
			$queryString = 'SELECT name, email, website, comment, submittedAt FROM wallContents ';
			$queryString .= 'ORDER BY submittedAt '.$passedSortOrder;
			$result = $this->connection->doQuery($queryString);
			if($result == false)
			{
				return 'false';
			}
			else if($result->num_rows > 0)
			{
				$index = 0;
				$jsonString = '{';
				while($row = $result->fetch_assoc())
				{
					foreach($row as $key=>$value)
					{
						$jsonString .= '"'.$key.$index.'"'.':'.'"'.$value.'", ';
					}
					$index++;
				}
				$jsonString = substr_replace(rtrim($jsonString), '', -1);
				$jsonString .= '}';
				return $jsonString;
			}
		}
	}//end class definition
?>