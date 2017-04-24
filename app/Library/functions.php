<?php 
	function show_roles ($roles)
	{
		foreach ($roles as $role) {
			echo "<option value='".$role->id."'>$role->role_name</option>";
		}
	}
 ?>