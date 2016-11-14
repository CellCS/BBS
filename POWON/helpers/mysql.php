<?php

	/**
	 * inquiry table name,[inquire items],[condition],[order by],[offset and limitation]
	 */
	function dbSelect($tableName, $selectName = '*', $where = null, $orderBy = null, $limit = null)
	{
		$sql = 'select '.$selectName.' from '.DB_PREFIX.$tableName;
		if(!empty($where)){
			$sql.=' where '.$where;
		}
		if(!empty($orderBy)){
			$sql.=' order by '.$orderBy;
		}
		if(!empty($limit)){
			$sql.=' limit '.$limit;
		}
		//echo $sql.'<br />';
		//exit;
		return dbConn(trim($sql), true);
	}

	//multiple table inquiry table name 1,table name 2, table name 3, [inquire items],[condition],[order by],[offset and limitation]
	function dbDuoSelect($tableName1, $tableName2, $on, $tableName3=null, $on1=null, $selectName='*', $where=null, $orderBy=null ,$limit=null){

		$sql='select '.$selectName.' from '.DB_PREFIX.$tableName1.' inner join '.DB_PREFIX.$tableName2.' '.$on;

		if(!empty($tableName3)){
			$sql='select '.$selectName.' from '.DB_PREFIX.$tableName1.' inner join '.DB_PREFIX.$tableName2.' '.$on.' inner join '.DB_PREFIX.$tableName3.' '.$on1;
		}
		
		if(!empty($where)){
			$sql.=' where '.$where;
		}

		if(!empty($orderBy)){
			$sql.=' order by '.$orderBy;
		}

		if(!empty($limit)){
			$sql.=' limit '.$limit;
		}
		//echo $sql;
		//exit;
		return dbConn(trim($sql), true);
	
	}

	//calculate inquiry result  table name,[sql function],[condition]
	function dbFuncSelect($tableName, $funcName='sum(id)', $where=null)
	{
		$sql='select '.$funcName.' from '.DB_PREFIX.$tableName;
		if(!empty($where)){
			$sql.=' where '.$where;
		}
		if(!empty($orderBy)){
			$sql.=' order by '.$orderBy;
		}
		if(!empty($limit)){
			$sql.=' limit '.$limit;
		}
		return dbConn(trim($sql), true, true);
	
	}

	//insertion  table name,[string: attribute ],[value]
	function dbInsert($tableName, $Key=null, $Val=null){

		$sql='';

		if(empty($Key) || empty($Val)){

			return false;
		
		}else{
			
			$Key=trim($Key);

			$Val=trim($Val);

			$sql='insert into '.DB_PREFIX.$tableName.'('.$Key.') values('.$Val.')';

//			echo $sql;

			return dbConn(trim($sql));
		
		}

		
	}

	//deletion  table name,[condition]
	function dbDel($tableName, $where=null)
	{
		if(empty($where)){
			return false;
		}
		$sql='delete from '.DB_PREFIX.$tableName.' where '.$where;

		return dbConn(trim($sql));
	}

	//modification  table name,[attribute=value，...],[condition]
	function dbUpdate($tableName, $value, $where=null)
	{
		if(empty($where)){
			$sql='update '.DB_PREFIX.$tableName.' set '.$value;
		}else{
			$sql='update '.DB_PREFIX.$tableName.' set '.$value.' where '.$where;
		}
//		echo $sql;
//		exit;
		return dbConn(trim($sql));
	}
	
	/**
	 * open database,param1：sql statement，param2：return result when true，param3：true if sql functions are used
	 * @param 
	 * @param 
	 * @param 
	 * @return 
	 */
	function dbConn($sql, $rtn=false, $func=false)
	{
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(mysqli_connect_errno($conn)){
			return false;
		}
		mysqli_set_charset($conn, DB_CHARSET);
		$result = mysqli_query($conn, $sql);
		if($result && mysqli_affected_rows($conn))
		{
			if($func)
			{
				return $data = mysqli_fetch_assoc($result);
			}
			
			if($rtn)
			{
				$rlt = array();
				while($data = mysqli_fetch_assoc($result))
				{
					array_push($rlt, $data);
				}
				return $rlt;
			}else{
				return $result;
			}
		}else{
			return false;
		}
		mysqli_close($conn);

	}