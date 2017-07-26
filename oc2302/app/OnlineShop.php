<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Warehouse;

class OnlineShop extends Model
{


	public static function products(){

		return DB::connection('mysql')->table('oc_product')->get()->toArray();


	}

	public static function add_categories(){

		$categories = Warehouse::get_category_info();
		// DB::connection('mysql')->table('oc_category_description')->delete();

		// DB::connection('mysql')->table('oc_category')->delete();

		$date = date('Y-m-d');

		foreach ($categories as $category) {
			DB::connection('mysql')->table('oc_category_description')->insert(
				['category_id' => $category['ID'],
				'name' => $category['name'],
				'meta_title' => $category['name'],
				'language_id' => 3,
				'description' => 'description',
				'meta_description' => 'meta_description',
				'meta_keyword' => 'meta_keyword']
				);


			// DB::connection('mysql')->table('oc_category')->insert(

			// 	['category_id' => $category['ID'],
			// 	'parent_id' => $category['parent_id'],
			// 	'status' => 1,
			// 	'top' => 0,
			// 	'date_added' => $date,
			// 	'date_modified' => $date,
			// 	'column' => 0,]
			// 	);
		}
		
	}

	public static function add_category_path()
	{
		$category_paths = Warehouse::get_category_path();

		foreach ($category_paths as $category_path) {
			foreach ($category_path['paths'] as $path) {
				DB::connection('mysql')->table('oc_category_path')->insert(
					[
					'category_id' 	=> $path['category_id'],
					'path_id' 		=> $path['path_id'],
					'level' 		=> $path['level'],
					]
					);
			}
		}

	}

}
