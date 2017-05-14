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

	function NewPosts ($num)
	{
		return DB::table('articles')
                    ->join('categories', 'articles.cate_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.id', 'articles.title', 'articles.slug', 'articles.view', 'articles.imgThumb', 'articles.time_public', 'articles.description', 'categories.cate_name', 'categories.slug_cate', 'users.name')
                    ->orderBy('articles.time_public', 'DESC')
                    ->where('status', 1)
                    ->get()
                    ->take($num);
	}

	function PopularPost ($num)
	{
		return DB::table('articles')
                    ->join('categories', 'articles.cate_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.id', 'articles.title', 'articles.slug', 'articles.view', 'articles.imgThumb', 'articles.time_public', 'categories.cate_name', 'categories.slug_cate', 'users.name')
                    ->orderBy('articles.view', 'DESC')
                    ->where('articles.status', 1)
                    ->get()
                    ->take($num);	
	}

	function HotPost ($num)
	{
		return DB::table('articles')
                    ->join('categories', 'articles.cate_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.id', 'articles.title', 'articles.slug', 'articles.view', 'articles.imgThumb', 'articles.time_public', 'categories.cate_name', 'categories.slug_cate', 'users.name')
                    ->orderBy('articles.time_public', 'DESC')
                    ->where('articles.status', 1)
                    ->where('articles.hot', 1)
                    ->get()
                    ->take(3);
	}

	function RelatePosts ($id, $idTags, $slugCate, $num)
	{
		$relatedPostOfTag = DB::table('articles')
                    ->join('article_tags', 'articles.id', '=', 'article_tags.article_id')
                    ->join('tags', 'article_tags.tag_id', '=', 'tags.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.title', 'articles.slug', 'articles.view', 'articles.imgThumb', 'articles.time_public', 'users.name')
                    ->orderBy('articles.time_public', 'DESC')
                    ->where('articles.id', '<>', $id)
                    ->where('articles.hot', 1)
                    ->whereIn('article_tags.tag_id', $idTags)
                    ->get()
                    ->take($num);
        $relatedPostOfCate = DB::table('articles')
                    ->join('categories', 'articles.cate_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.title', 'articles.slug', 'articles.view', 'articles.imgThumb', 'articles.time_public', 'users.name')
                    ->orderBy('articles.time_public', 'DESC')
                    ->where('categories.slug_cate', $slugCate)
                    ->where('articles.id', '<>', $id)
                    ->where('articles.hot', 1)
                    ->get()
                    ->take($num);
        $relatePosts = count($relatedPostOfTag) > 0 ? $relatedPostOfTag : $relatedPostOfCate;
        return $relatePosts;
	}

	function NewComments ($num)
	{
		return DB::table('comments')
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->join('articles', 'comments.article_id', '=', 'articles.id')
                    ->select('comments.content_cmt', 'users.name', 'users.avatar', 'articles.slug')
                    ->orderBy('comments.created_at', 'DESC')
                    ->get()
                    ->take($num);
	}

	function GetPostInCate ($cate, $num)
	{
		return DB::table('articles')
                        ->join('categories', 'articles.cate_id', '=', 'categories.id')
                        ->join('users', 'articles.user_id', '=', 'users.id')
                        ->select('articles.id', 'articles.title', 'articles.slug', 'articles.view', 'articles.imgThumb', 'articles.time_public', 'articles.description', 'categories.cate_name', 'categories.slug_cate', 'users.name')
                        ->orderBy('articles.time_public', 'DESC')
                        ->where('articles.status', 1)
                        ->where('articles.cate_id', $cate)
                        ->get()
                        ->take($num);
	}

 ?>
