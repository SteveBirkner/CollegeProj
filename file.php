<?php
	
	$file = new file();
	$data = array(
		array('PKMN','TYPE'),
		array('Charizard','Fire'),
		array('Chesnaught','Grass/Fighting'),
		array('Absol','Dark'),
		array('Salamence','Dragon/Flying'),
		array('Lucario','Fighting/Steel'),
		array('Vaporeon','Water')
		);
	//$file->appendCSV($data);
	//$file->read_csv();
	//$file->writeCSV($data);
	$file->read_csv();
	
	
	
	class file { 
		
		//change this back to countries for countries csv. 
		public $file_name = 'effy2010.csv';
		//public $file_name = 'countries.csv';
		
		public function read_csv ($file_name) {
			$first_run = true;
			
			if (($handle = fopen($this->file_name, "r")) !== FALSE) {
				while (($data= fgetcsv($handle, 0, ",")) !== FALSE) {
					
					if($first_run == TRUE) {
						
						$feild_names = $this->create_feild_names($data);
						$records[] = $this->create_record($data, $feild_names);
						$first_run = FALSE;
						
					} else {
						$records[] = $this->create_record($data, $feild_names);
					}
				}
				
				fclose($handle);
				//print_r($records);
				html::createTable($records);
				/*foreach($records as $record){
				 foreach($record as $label => $value) {
				  	echo $label . ' : ' . $value . '</br>';
				  	
				 }
				}*/
				
			}
		}
		
		public function create_feild_names($data){
			return $data;
		}
		
		public function create_record($data, $feild_names) {
			$data = array_combine($feild_names,$data);
			return $data;
		}
		
		//Changing this to append since IDK exactly what the professor wanted. 
		public function appendCSV($data) {
			$fp = fopen('countries.csv','a');
			
			foreach($data as $feilds) {
				fputcsv($fp, $feilds);
				
			}
			
			fclose($fp);
		}
		
		public function writeCSV($data) {
			$fp = fopen('example.csv','w');
			
			foreach($data as $feilds) {
				fputcsv($fp, $feilds);
				
			}
			
			fclose($fp);
		}
		
		
	}
	
	class html {
		
		public static function createTable($data) {
			
			$first_run = TRUE;
			
			echo "<table border=\"1px solid black\">"; 
			
			
			foreach ($data as $key=>$row) {
				echo "<tr>";
				foreach($row as $key2=>$row2){
					if($first_run){
						echo "<th>" . $row2 . "</th>";
						
					} else {
						echo "<td>" . $row2 . "</td>";
					}
				}
				$first_run = FALSE;
				echo "</tr>";
			}
			echo "</table>";
			
		}
		
		
		
	}
	
	
	
	


?>