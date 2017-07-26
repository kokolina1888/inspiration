<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Warehouse extends Model
{
	public static function goods(){

		return DB::table('dbo.Goods')->get()->toArray();

	}

	public static function get_category_info(){
		$data = DB::table('dbo.GoodsGroups')->get()->toArray();
		$new_data = [];
		foreach ($data as $value) {
			$current_data = [];
			$flag = false;
			$current_data['ID'] = $value->ID; 
			$current_data['name'] = $value->Name; 
			$current_data['Code'] = $value->Code; 

	//personal code
			//echo $value->Code . ' - ';
	//parent code
			$parent_code = substr($value->Code, 0, -3);
			//echo $parent_code . '<br>';

			foreach ($data as $check) {
				if($check->Code === $parent_code){
					$flag = true;
					break;
				}
			}
			if($flag === true){
				$current_data['parent_id'] = $check->ID;
			} else {
				$current_data['parent_id'] = 0;

			}

			array_push($new_data, $current_data);
		}

		return $new_data;
	}

	public static function get_category_path()
	{
		$data = DB::table('dbo.GoodsGroups')->get()->toArray();

		$new_data = [];

		foreach ($data as $value) {
			$current_data = [];
			$flag = false;
			$current_data['ID'] = $value->ID; 
			$current_data['name'] = $value->Name; 
			$current_data['Code'] = $value->Code;	

			$current_data['number_of_paths'] = strlen($value->Code)/3;

			$current_data['paths'] = [];

			$parent_code = $value->Code;
			
			//setting category paths
			for($i = $current_data['number_of_paths']-1; $i >=0;  $i--){
				
				//category_id
				$current_data['paths'][$i]['category_id'] = $value->ID;

				//path_id

				foreach($data as $check){
					if($check->Code === $parent_code){
						$current_data['paths'][$i]['path_id'] = $check->ID;
					}
				}
				
				//level
				$current_data['paths'][$i]['level'] = $i;

				$parent_code = substr($parent_code, 0, -3);
			}

			array_push($new_data, $current_data);

		}

		return $new_data;
	}

}
