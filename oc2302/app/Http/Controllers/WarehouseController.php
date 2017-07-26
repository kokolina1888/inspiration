<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;
use App\OnlineShop;

class WarehouseController extends Controller
{
    public function index(){
    	$data = Warehouse::goods();

    	dd($data);
    }

    public function get_online_data(){

    	$data = OnlineShop::products();

    	dd($data);
    }

    public function add_categories(){
    	return OnlineShop::add_categories();
    }

    public function add_category_path()
    {
    	 return OnlineShop::add_category_path();
    }
}
