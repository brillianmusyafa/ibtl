<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Storage;

class EngineController extends Controller
{
	public function index()
	{
		// $myFile = fopen("export.sql","w");
		// $txt = $this->_create('users');

		$showTable = $this->_show_table();
		foreach ($showTable as $key => $value) {
			// dd($value->Tables_in_belanja_tidak_langsung);
			$create = $this->_create($value->Tables_in_belanja_tidak_langsung);
			$file = Storage::append('export.sql',$create);
		}

		// fwrite($myFile, $txt);
		// fclose($myFile);
		// dd($txt);
		return 'success';

		// return response()->download($)

	}

	protected function _show_table(){

		return DB::SELECT("SHOW TABLES");
	}

	protected function _describe($table){
		return DB::SELECT("DESCRIBE $table");
	}


	protected function _create($table){
		$desc = $this->_describe($table);
		$create = "DROP TABLE IF EXISTS `$table`; \n";
		$create .= "CREATE TABLE ".$table.'(';
		// dd($desc[0]);
		foreach ($desc as $key => $v) {
			foreach ($v as $key => $value) {
				if($key == "Key" && $value == "PRI"){
					$primary = $v->Field;
				}
				else{
					if($key == "Field"){
						$create .= "`$value` ";
					}
					else{
						if($key == "Null"){
							$create .= $this->_not_null($value);
						}
						else{
							$create .="$value ";	
						}
					}
				}
			}
			$create .=",\n";
		}
		$create .= isset($primary)?"PRIMARY KEY (`$primary`) \n":"";
		$create .=");\n\n";

		return $create;
	}

	protected function _not_null($val){
		if($val == "NO"){
			return " NOT NULL ";
		}
		if($val == "YES"){
			return " NULL ";
		}
	}
}
