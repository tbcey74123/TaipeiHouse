<?php

function delete_mansion($id, $location, $con) {
	$sql = "DELETE FROM mansion WHERE mansion_id = $id AND location = '$location'";
	$result = mysqli_query($con, $sql);

	if($result) {
		$infor_target = "../mansion/" . $location . "/infor/mansion-" . $id;
		if(file_exists($infor_target)) 
			unlink($infor_target);
		
		$profile_target = "../mansion/" . $location . "/profile/mansion-" . $id;
		if(file_exists($profile_target)) 
			unlink($profile_target);
		
		$traffic_target = "../mansion/" . $location . "/traffic/mansion-" . $id;
		if(file_exists($traffic_target))
			unlink($traffic_target);


		$pic_dir = "../pic/mansion/" . $location . "/mansion-" . $id . "/";
		if(file_exists($pic_dir)) {
			$objs = scandir($pic_dir);
			foreach($objs as $obj) {
				if($obj != "." && $obj != "..")
					unlink($pic_dir . $obj);
			}
			rmdir($pic_dir);
		}	
 		return 1;
	}
}
?>
