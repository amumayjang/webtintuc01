<?php 
//Show select role in views
	function show_roles ($roles, $select = 0)
	{
		foreach ($roles as $role) {
			if ($role->id == $select) {
				echo "<option selected value='".$role->id."'>$role->role_name</option>";
			} else {
				echo "<option value='".$role->id."'>$role->role_name</option>";
			}
		}
	}

//upload file to public/admin/uploads/ and return result name of file upload
	function files_upload($dir = 'public/admin/uploads/', $file)
	{
        $fileName = str_random(5).'_'.$file->getClientOriginalName();
        while (file_exists($dir.$fileName)) {
            $fileName = str_random(5).'_'.$file->getClientOriginalName();
        };
        $file->move($dir, $fileName);
        return $fileName;
	}

	function show_cates($cates, $select = 0, $parent = 0, $str = '')
	{
		foreach ($cates as $cate) {
			$id = $cate->id;
			$name = $cate->cate_name;
			if ($parent == $cate->parent_id) {
				if ($id == $select) {
					echo "<option selected value='".$id."'>$str $name</option>";
				} else {
					echo "<option value='".$id."'>$str $name</option>";
				}
				show_cates($cates, $select, $id, $str.'--');
			}
		}
	}
 ?>