 <?php
$servername = "localhost";
$username = "root";
$password = "password";
$db1="stressfit_live";
$db2="stressfit_live_new";
$con1=mysqli_connect("localhost",$username,$password,$db1);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$con2=mysqli_connect("localhost",$username,$password,$db2);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //read old db 
  	$sql = "SELECT * FROM sf_videos";
	$result = $con1->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        
	        $row['category'] = ucwords($row['category']);
	        $chk = "SELECT * FROM `video_category` WHERE `title` = '".$row['category']."'";
	        $video_category = $con2->query($chk);
	        if ($video_category->num_rows <= 0)
	        {
		        $ins = "INSERT INTO `video_category` (`id`, `title`, `active`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '".$row['category']."', '1', '1', '1', now(), now(), NULL)";
		        mysqli_query($con2,$ins);
		        $chk = "SELECT * FROM `video_category` WHERE `title` = '".$row['category']."'";
	        	$video_category = $con2->query($chk);
	    	}


	    	$row['essence'] = ucwords($row['essence']);
	        $chk = "SELECT * FROM `video_essence` WHERE `title` = '".$row['essence']."'";
	        $video_essence = $con2->query($chk);
	        if ($video_essence->num_rows <= 0)
	        {
		        $ins = "INSERT INTO `video_essence` (`id`, `title`, `active`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '".$row['essence']."', '1', '1', '1', now(), now(), NULL)";
		        mysqli_query($con2,$ins);
		        $chk = "SELECT * FROM `video_essence` WHERE `title` = '".$row['essence']."'";
	        	$video_essence = $con2->query($chk);
	    	}
	    	//print_r($video_category->fetch_assoc()['id']);
	    	//$row['title'] = mysqli_real_escape_string($con2, $row['title']);
	        //$chk = "SELECT * FROM `videos` WHERE `title` = '".$row['title']."'";
	        //echo $chk."\n";
	        //die;
	        //$videos = $con2->query($chk);
	        //if ($videos->num_rows <= 0)
	        if(1)
	        {
	        	$slug=str_replace(' ', '_', strtolower($row['title']));
	        	$short_description ='';
	        	$description = mysqli_real_escape_string($con2, $row['description']);
	        	$title = mysqli_real_escape_string($con2, $row['title']);
	        	 $ins =  "INSERT INTO `videos` (`id`, `title`, `slug`, `active`, `approved`, `short_description`, `description`, `video_url`, `author`, `isfree`, `recommended`, `category_id`, `essence_id`, `cover_img`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) 
	        	VALUES (NULL, 
	        		'".$title."', 
	        		'".$slug."', 
	        		'1', 
	        		'1', 
	        		'".$short_description."', 
	        		'".$description."',
	        		'url',
	        		'', 
	        		'1', 
	        		'1', 
	        		'".$video_category->fetch_assoc()['id']."', 
	        		'".$video_essence->fetch_assoc()['id']."', 
	        		'image',
	        		'1', 
	        		'1', 
	        		now(), 
	        		now(), 
	        		NULL)";

		        mysqli_query($con2,$ins);

		        // /echo $ins; die;
		        $video_id = mysqli_insert_id($con2);
	    	}
	    	//echo $video_id;
	    	$chk = "SELECT * FROM `sf_videos_cover` WHERE `video_id` = '".$row['video_id']."'";
	        $videos_cover = $con1->query($chk);
	        if ($videos_cover->num_rows > 0)
	        {
	        	$update = "UPDATE `videos` SET `cover_img` = '".$videos_cover->fetch_assoc()['image_url']."', `deleted_at` = NULL WHERE `videos`.`id` = '".$video_id."'";
		        mysqli_query($con2,$update);	        	
	    	}

	    	//echo $video_id;
	    	$chk = "SELECT * FROM `sf_videos_youtube` WHERE `video_id` = '".$row['video_id']."'";
	        $videos_cover = $con1->query($chk);
	        if ($videos_cover->num_rows > 0)
	        {
	        	$update = "UPDATE `videos` SET `video_url` = '".$videos_cover->fetch_assoc()['video_url']."', `deleted_at` = NULL WHERE `videos`.`id` = '".$video_id."'";
		        mysqli_query($con2,$update);	        	
	    	}


	    }
	} else {
	    echo "0 results";
	}
	echo "done";
?> 