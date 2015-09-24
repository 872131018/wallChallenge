<?php
	error_reporting(-1);
    ini_set('display_errors', 'On');

    require_once('commentManager.php');

	//use these for running from command line
    //$_GET['action'] = 'saveComment';
    //$_GET['name'] = 'john';
    //$_GET['email'] = 'john@email.com';
    //$_GET['website'] = 'www.coolWebsite.com';
    //$_GET['comment'] = 'This is a comment!';

    $manager = new commentManager();
    switch($_GET['action'])
    {
    	case 'saveComment':
			//add comment to database
    		$result = $manager->saveComment($_GET);
    		if($result == 'true')
    		{
    			$comment = $manager->commentToJSON($_GET);
                echo $result.'>'.$comment;
    		}
    		else
    		{
    			echo 'nope not today!';
    		}
    		return $result;
    		break;
        case 'getWallContents':
            $result = $manager->getWallContents($_GET['sortOrder']);
            if($result == NULL)
            {
                echo 'false';
            }
            else
            {
                echo $result;
            }
            break;
    }

?>