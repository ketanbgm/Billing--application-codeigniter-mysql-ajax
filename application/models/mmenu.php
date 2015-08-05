<?php
	class mmenu extends CI_Model
	{
		public function getMenu($id='')
		{
			$ret = NULL;
			$c = 0;
			$sql = "SELECT * FROM menu";
			if($id!='')
				$sql=$sql." where mid = ".$id."";
			$res1 = $this->db->query($sql);
	
			foreach($res1->result() as $row)
			{
				$ret[$c]['mid'] = $row->mid;
				$ret[$c]['mname'] = $row->mname;
				$c++;
			} 
			return $ret;
		}
	}
?>