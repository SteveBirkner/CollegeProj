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
						//echo "post";
						
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
							$STH = $DBH->query('SELECT INS, (sum(NA) / sum(e.EY)) as ts
												FROM f1a0910 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID
												Group By INS
												ORDER BY ts DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Total Net Assets per Student 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Assests per Student</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';

							$STH = $DBH->query('SELECT INS, (sum(NA) / sum(e.EY)) as ts
												FROM f1a1011 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID
												Group By INS
												ORDER BY ts DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Total Net Assets per Student 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Assests per Student</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';
							$STH = $DBH->query('SELECT INS, (sum(LIA) / sum(e.EY)) as ts
												FROM f1a0910 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID
												Group By INS
												ORDER BY ts DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Total Libilities per Student 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Liabilities per Student</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';
							$STH = $DBH->query('SELECT INS, (sum(LIA) / sum(e.EY)) as ts
												FROM f1a1011 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID
												Group By INS
												ORDER BY ts DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Total Libilities per Student 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Liabilities per Student</th></tr>';

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
						$this->content .= $this->menu();
						$this->content .= $this->STAB();

						
					}

					public function STAB(){

						$form = '<h3>School Finder</h3>
								 <p>Enter the Abbriviation of the state you want to see schools for.</p>  
						         <form action="index.php?page=tenData" method="post">
								 <p> 
								 	<label for="stab">State Abbriviation: </label>
									<input type="text" name="stab" id="stab"><br>
								 </p>';

						return $form;
					}
					
					
					
				}

				class tenData extends page {

					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->STAB($arg);

						
					}

					public function STAB($arg){

							try {
								$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							    $STH = $DBH->query('SELECT INS
													FROM hd2011
													WHERE hd2011.AB="'. $arg .'";');  
		  
								$STH->setFetchMode(PDO::FETCH_OBJ);  
								  
								$tab = '<h4>Schools in the State: ' . $arg . '</h4>
									   <table class="table">
										<tr><th>School</th></tr>';

								while($row = $STH->fetch()) {  

								    $tab .= '<tr><td>' . $row->INS . '</td></tr>';
								    
								    
								} 
						
								$tab .= '</table>';

							} catch(PDOException $e) {
								echo $e->getMessage();
							}




						return $tab;
					}


					function post(){

						$stab = $_POST['stab'];

						$this->get($stab);

					}



				}
				
				class elTen extends page {
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->tab();
					
					}


					public function tab() {

						try {

							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							$STH = $DBH->query('SELECT INS, (((sum(f.LIA)-sum(f2.LIA))/sum(f2.LIA))*100) as lia
												FROM f1a0910 f2, f1a1011 f, hd2011 h
												WHERE f.ID = h.ID AND f2.ID = h.ID AND f.ID = f2.ID 
												Group By INS
												ORDER BY lia DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Precentage Increase of Liabilities 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Percentage</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->lia . '%</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';
							$STH = $DBH->query('SELECT h.INS, (((sum(e2.EY)-sum(e.EY))/sum(e.EY))*100) as tsp
												FROM effy2010 e, effy2011 e2, hd2011 h
												WHERE e.ID = h.ID AND e2.ID = h.ID AND e.ID = e2.ID
												GROUP BY INS
												ORDER BY tsp DESC
												LIMIT 10;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Precentage Increase of Enrollment 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Percentage</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->tsp . '%</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';


						} catch(PDOException $e) {
								echo $e->getMessage();
						}

						return $tab;

					}

					
					
					
				}
				
				
				
				
				
				
				?>
		  
		</div>
		
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  
    </body>
</html>


