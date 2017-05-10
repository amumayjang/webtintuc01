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

//upload image ($file) to server (into directory $dir) and return file name save
	function files_upload($dir = 'public/admin/uploads/', $file)
	{
        $fileName = str_random(5).'_'.$file->getClientOriginalName();
        while (file_exists($dir.$fileName)) {
            $fileName = str_random(5).'_'.$file->getClientOriginalName();
        };
        $file->move($dir, $fileName);
        return $fileName;
	}

//show category option of select input. Input are list category ($cates) and selected default ($select)
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

	//Show article relate
	function relateNews($tags, $cate, $numNews)
	{
		$countNewsOfTag = 0;
		foreach ($tags as $tag) {
			if (count($tag->articles()->get()) > 0) {
				foreach ($tag->articles()->get() as $artOfTag) {
					if ($artOfTag->status == 1) {
						echo "<li><a href='".asset('/'.$artOfTag->slug)."'>".$artOfTag->title."</a></li>";
						$countNewsOfTag++;
						if ($countNewsOfTag == $numNews) {
							break;
						}
					}
				}
			}
		}
		if ($countNewsOfTag < $numNews) {
			if (count($cate->articles()->get()) > 0) {
				foreach ($cate->articles()->get() as $artOfCate) {
					if ($artOfCate->status == 1) {
						echo "<li><a href='".asset('/'.$artOfCate->slug)."'>".$artOfCate->title."</a></li>";
						$countNewsOfTag++;
						if ($countNewsOfTag == $numNews) {
							break;
						}
					}
				}
			}
		}
	}

 ?>
