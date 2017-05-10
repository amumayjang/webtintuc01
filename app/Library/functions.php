<?php 
/**
 * [show_roles show all role in select input]
 * @param  [type]  $roles  [all role has]
 * @param  integer $select [role want select default]
 * @return [type]          [list role in option tag]
 */
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

/**
 * [files_upload upload image]
 * @param  string $dir  [directory to foder contain of image]
 * @param  [type] $file [file of input]
 * @return [type]       [name file just upload successfully]
 */
	function files_upload($dir = 'public/admin/uploads/', $file)
	{
        $fileName = str_random(5).'_'.$file->getClientOriginalName();
        while (file_exists($dir.$fileName)) {
            $fileName = str_random(5).'_'.$file->getClientOriginalName();
        };
        $file->move($dir, $fileName);
        return $fileName;
	}

/**
 * [show_cates show all category in select tag]
 * @param  [type]  $cates  [all category]
 * @param  integer $select [id category need select]
 * @param  integer $parent [id parent of category default = 0]
 * @param  string  $str    [string show when category has child]
 * @return [type]          [list category in <li> tag]
 */
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

	/**
	 * [relateNews show relate news]
	 * @param  [type] $tags    [all tag of article]
	 * @param  [type] $cate    [category of article]
	 * @param  [type] $numNews [number news relate of article]
	 * @return [type]          [list relate news in tag <li>]
	 */
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
							break 2;
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
