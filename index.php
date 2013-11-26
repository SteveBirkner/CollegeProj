<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
     
        <title>PHP Bank Site</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="main.css" type="text/css"/>
      
    <body>
    	
    	<div class="container">
    		<?php 

				
				
				$program = new program;
				
				class program {
				
					    public function __construct() {
				
				                $page = 'homepage';
								$arg = NULL;
								if (isset($_REQUEST['page'])){
									$page = $_REQUEST['page'];
								}
				                if (isset($_REQUEST['arg'])){
									$arg = $_REQUEST['arg'];
								}
								$arg = $_REQUEST['arg'];
								$page = new $page($arg);
				
				        }
				
					
				
				        public function __destruct() {
				
				                //echo 'goodbye';
				
				        }
				
				
				
				}
				
				abstract class page {
						
						
					public $menu;
					public $content;
					
					function menu() {
						$menu = '<div class="nbar"><ul class="nav nav-pills">
								    <li>
								        <a href="./index.php">Homepage</a>
								    </li>
								    <li>
								        <a href="./index.php?page=oneFive">Questions 1-5</a>
								    </li>
								    <li>
								        <a href="./index.php?page=sixEg">Question 6-8</a>
								    </li>
								    <li>
								        <a href="./index.php?page=nine">Question 9</a>
								    </li>
								    <li>
								        <a href="./index.php?page=ten">Question 10</a>
								    </li>
								    <li>
								        <a href="./index.php?page=elTen">Questions 11 &  12</a>
								    </li>
								</ul></div>';
					
					return $menu;
					}
						
					function __construct($arg = NULL) {
						
						if ($_SERVER['REQUEST_METHOD'] == 'GET') {
							$this->get();
						} else {
							$this->post();
						}
						
					}
					
					function get() {
						
						
						
						
					}
					
					function post() {
						echo "post";
						
					}
					
					function __destruct() {
						
						echo $this->content;
					}
					
					
				}
				
				class homepage extends page {
					
					function get($arg) {
								
							$arg = $_REQUEST['arg'];
							$this->content .= $this->menu();
							
						
						
					
					}

					
						
				
				
				
					
				}
				
				class oneFive extends page {
					
					function get($arg) {
						
						$this->content .= $this->menu();
						$this->content .= $this->table();
						
					
					}

					public function table() {
						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							$STH = $DBH->query('SELECT h.INS, sum(e.EY) as Total_Students
												FROM effy2010 e, hd2011 h
												WHERE e.ID = h.ID 
												GROUP BY INS
												ORDER BY EY DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Highest Enrollment 2010</h4>
								   <table class="table">
									<tr><th>School</th><th>Enrollment</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Total_Students . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';

							 $STH = $DBH->query('SELECT h.INS, sum(e.EY) as Total_Students
												FROM effy2011 e, hd2011 h
												WHERE e.ID = h.ID 
												GROUP BY INS
												ORDER BY EY DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Highest Enrollment 2011</h4>
								   <table class="table">
									<tr><th>School</th><th>Enrollment</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Total_Students . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';

							 $STH = $DBH->query('SELECT INS, sum(LIA) as Total_Liabilities
												FROM f1a0910 f, hd2011 h
												WHERE f.ID = h.ID
												Group By INS
												ORDER BY LIA DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Most Liabilities 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Liabilities</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Total_Liabilities . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';

							  $STH = $DBH->query('SELECT INS, sum(LIA) as Total_Liabilities
												FROM f1a1011 f, hd2011 h
												WHERE f.ID = h.ID
												Group By INS
												ORDER BY LIA DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Most Liabilities 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Liabilities</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Total_Liabilities . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';

							   $STH = $DBH->query('SELECT INS, sum(NA) as Net_Assests
													FROM f1a0910 f, hd2011 h
													WHERE f.ID = h.ID
													Group By INS
													ORDER BY NA DESC
													LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Top Net Assests 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Net Assets</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Net_Assests . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';


							   $STH = $DBH->query('SELECT INS, sum(NA) as Net_Assests
													FROM f1a1011 f, hd2011 h
													WHERE f.ID = h.ID
													Group By INS
													ORDER BY NA DESC
													LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Top Net Assests 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Net Assets</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Net_Assests . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';


							 $STH = $DBH->query('SELECT INS, sum(REV) as Total_Revenue
													FROM f1a0910 f, hd2011 h
													WHERE f.ID = h.ID
													Group By INS
													ORDER BY REV DESC
													LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Total Revenue 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Total Revenue</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Total_Revenue . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';
							 $STH = $DBH->query('SELECT INS, sum(REV) as Total_Revenue
													FROM f1a1011 f, hd2011 h
													WHERE f.ID = h.ID
													Group By INS
													ORDER BY REV DESC
													LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Total Revenue 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Total Revenue</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Total_Revenue . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';


							  
						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}
					


						return $tab;
					
					}
					
					
					
				}
				
				class sixEg extends page {
					
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->tables();
						
					}
					
					public function tables() {

						try {

							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							$STH = $DBH->query('SELECT INS, (sum(REV) / sum(e.EY)) as ts
												FROM f1a0910 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID
												Group By INS
												ORDER BY ts DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Total Revenue per Student 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Revenue per Student</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';
							
							$STH = $DBH->query('SELECT INS, (sum(REV) / sum(e.EY)) as ts
												FROM f1a1011 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID
												Group By INS
												ORDER BY ts DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Total Revenue per Student 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Revenue per Student</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';







						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}


						return $tab;

					}
					
					
					
				}
				
				class nine extends page {
					
					function get($arg){
						$this->content .= $this->menu();
						
					}
					
					
				}
				
				class ten extends page {
					function get($arg){
						session_start();
						$this->content .= $this->menu();
						
					}
					
					
					
				}
				
				class elTen extends page {
					function get($arg){
						$this->content .= $this->menu();
					
					}

					
					
					
				}
				
				
				
				
				
				
				?>
		  
		</div>
		
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  
    </body>
</html>


