<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
     
        <title>College Project</title>
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
								        <a href="./index.php">Question 1</a>
								    </li>
								    <li>
								        <a href="./index.php?page=two">Question 2</a>
								    </li>
								    <li>
								        <a href="./index.php?page=three">Question 3</a>
								    </li>
								    <li>
								        <a href="./index.php?page=four">Question 4</a>
								    </li>
								    <li>
								        <a href="./index.php?page=oneFive">Question 5</a>
								    </li>
								      <li>
								        <a href="./index.php?page=six">Question 6</a>
								    </li>
								      <li>
								        <a href="./index.php?page=seven">Question 7</a>
								    </li>
								    <li>
								        <a href="./index.php?page=sixEg">Question 8</a>
								    </li>
								    <li>
								        <a href="./index.php?page=nine">Question 9</a>
								    </li>
								    <li>
								        <a href="./index.php?page=ten">Question 10</a>
								    </li>
								    <li>
								        <a href="./index.php?page=elTen">Questions 11</a>
								    </li>
								    <li>
								        <a href="./index.php?page=twel">Questions 12</a>
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
							$this->content .= $this->table();

						
					
					}

					public function table(){
						$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							
						$STH = $DBH->query('SELECT h.INS, sum(e.EY) as ts
												FROM effy2010 e, hd2011 h
												WHERE e.ID = h.ID AND e.EY > 50000
												GROUP BY e.ID
												ORDER BY ts DESC
												LIMIT 5;');  
						$STH->setFetchMode(PDO::FETCH_OBJ); 
						$tab = '<h4>Highest Enrollment 2010</h4>
								   <table class="table">
									<tr><th>School</th><th>Enrollment</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>'; 

							 $STH = $DBH->query('SELECT h.INS, sum(e.EY) as ts
												FROM effy2011 e, hd2011 h
												WHERE e.ID = h.ID AND e.EY > 50000
												GROUP BY e.ID
												ORDER BY ts DESC
												LIMIT 5;');  
						$STH->setFetchMode(PDO::FETCH_OBJ); 
						$tab .= '<h4>Highest Enrollment 2011</h4>
								   <table class="table">
									<tr><th>School</th><th>Enrollment</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>'; 
							 
					
						return $tab;


					}

					
						
				
				
				
					
				}
					class two extends page {
					
					function get($arg) {
								
							$arg = $_REQUEST['arg'];
							$this->content .= $this->menu();
							$this->content .= $this->table();

						
					
					}

					public function table(){
						$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
						$STH = $DBH->query('SELECT INS, sum(LIA) as Total_Liabilities
												FROM f1a0910 f, hd2011 h
												WHERE f.ID = h.ID AND f.LIA > 500000
												Group By INS 
												ORDER BY LIA DESC
												LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Most Liabilities 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Liabilities</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Total_Liabilities . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';

							  $STH = $DBH->query('SELECT INS, sum(LIA) as Total_Liabilities
												FROM f1a1011 f, hd2011 h
												WHERE f.ID = h.ID AND f.LIA > 5000000
												Group By INS
												ORDER BY LIA DESC
												LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Most Liabilities 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Liabilities</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->Total_Liabilities . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';
							 
					
						return $tab;


					}

					
						
				
				
				
					
				}

					class three extends page {
					
					function get($arg) {
								
							$arg = $_REQUEST['arg'];
							$this->content .= $this->menu();
							$this->content .= $this->table();

						
					
					}

					public function table(){
						$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
						  $STH = $DBH->query('SELECT h.INS, f.NA
													FROM f1a0910 f, hd2011 h
													WHERE f.ID = h.ID AND NA > 100000
													
													ORDER BY NA DESC
													LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Top Net Assests 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Net Assets</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->NA . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';


							   $STH = $DBH->query('SELECT h.INS, f.NA
													FROM f1a1011 f, hd2011 h
													WHERE f.ID = h.ID AND NA > 100000
													
													ORDER BY NA DESC
													LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Top Net Assests 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Net Assets</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->NA . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';
	
							 
					
						return $tab;


					}

					
						
				
				
				
					
				}

					class four extends page {
					
					function get($arg) {
								
							$arg = $_REQUEST['arg'];
							$this->content .= $this->menu();
							$this->content .= $this->table();

						
					
					}

					public function table(){
						$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
						  $STH = $DBH->query('SELECT h.INS, f.NA
													FROM f1a0910 f, hd2011 h
													WHERE f.ID = h.ID AND NA > 100000
													
													ORDER BY NA DESC
													LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Top Net Assests 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Net Assets</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->NA . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';


							   $STH = $DBH->query('SELECT h.INS, f.NA
													FROM f1a1011 f, hd2011 h
													WHERE f.ID = h.ID AND NA > 100000
													
													ORDER BY NA DESC
													LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Top Net Assests 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Net Assets</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->NA . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';
	
							 
					
						return $tab;


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
							

							 

							 

							 $STH = $DBH->query('SELECT INS, REV
													FROM f1a0910 f, hd2011 h
													WHERE f.ID = h.ID AND REV > 200000

													ORDER BY REV DESC
													LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Total Revenue 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Total Revenue</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->REV . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';
							 $STH = $DBH->query('SELECT INS, REV
													FROM f1a1011 f, hd2011 h
													WHERE f.ID = h.ID AND REV > 200000

													ORDER BY REV DESC
													LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Total Revenue 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Total Revenue</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->REV . '</td></tr>';
							    
							    
							} 
					
							 $tab .= '</table>';


							  
						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}
					


						return $tab;
					
					}
					
					
					
				}

				class six extends page {
					
					function get($arg) {
						
						$this->content .= $this->menu();
						$this->content .= $this->table();
						
					
					}

					public function table() {
						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							$STH = $DBH->query('SELECT INS, (REV / sum(e.EY)) as ts
												FROM f1a0910 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID AND REV > 100000000 
												Group By e.ID
												ORDER BY ts DESC
												LIMIT 5');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Total Revenue per Student 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Revenue per Student</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';
							
							$STH = $DBH->query('SELECT INS, (REV / sum(e.EY)) as ts
												FROM f1a1011 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID AND REV > 100000000 
												Group By e.ID
												ORDER BY ts DESC
												LIMIT 5;');  
	  
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
					class seven extends page {
					
					function get($arg) {
						
						$this->content .= $this->menu();
						$this->content .= $this->table();
						
					
					}

					public function table() {
						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							$STH = $DBH->query('SELECT INS, (NA / sum(e.EY)) as ts
												FROM f1a0910 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID AND NA > 100000000
												Group By INS
												ORDER BY ts DESC
												LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Total Net Assets per Student 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Assests per Student</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';

							$STH = $DBH->query('SELECT INS, (NA / sum(e.EY)) as ts
												FROM f1a1011 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID AND NA > 100000000
												Group By INS
												ORDER BY ts DESC
												LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab .= '<h4>Total Net Assets per Student 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Assests per Student</th></tr>';

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
				class sixEg extends page {
					
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->tables();
						
					}
					
					public function tables() {

						try {

							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							
							
							$STH = $DBH->query('SELECT INS, (LIA / sum(e.EY)) as ts
												FROM f1a0910 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID AND LIA > 100000000
												Group By INS
												ORDER BY ts DESC
												LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Total Libilities per Student 09-10</h4>
								   <table class="table">
									<tr><th>School</th><th>Liabilities per Student</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';
							$STH = $DBH->query('SELECT INS, (LIA / sum(e.EY)) as ts
												FROM f1a1011 f, hd2011 h, effy2010 e
												WHERE f.ID = h.ID AND e.ID = f.ID AND e.ID = h.ID AND LIA > 100000000
												Group By INS
												ORDER BY ts DESC
												LIMIT 5;');  
	  
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
						$this->content .= $this->stat($arg);
						
					}


					public function stat($arg) {

						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 

	
								$STH = $DBH->query('SELECT INS, sum(e.EY) as ts, sum(f.LIA) as tl, sum(f.NA) as na, sum(f.REV) as tr, (sum(f.REV) / sum(e.EY)) as rps, (sum(f.NA) / sum(e.EY)) as naps, (sum(f.LIA) / sum(e.EY)) as lps
													FROM effy2011 e, f1a1011 f, hd2011 h
													WHERE e.ID = h.ID AND f.ID = h.ID AND e.ID = f.ID AND e.EY > 50000
													GROUP BY e.ID
													ORDER BY ts DESC
													LIMIT 5;');  
	  
								$STH->setFetchMode(PDO::FETCH_OBJ);
					
							$tab = '<h4>Sorted Statistics</h4>
								   <table class="table">
									<tr><th>School</th><th><a href="./index.php?page=nine">Total Students</a></th><th><a href="./index.php?page=nineone">Total Liabilities</a></th><th><a href="./index.php?page=ninetwo">Liabilities per Student</a></th><th><a href="./index.php?page=ninethree">Net Assets</a></th><th><a href="./index.php?page=ninefour">Net Assets per Student</a></th><th><a href="./index.php?page=ninefive">Total Revenue</a></th><th><a href="./index.php?page=ninesix">Revenue per Student</a></th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td><td>' . $row->tl . '</td><td>' . $row->lps . '</td><td>' . $row->na . '</td><td>' . $row->naps . '</td><td>' . $row->tr . '</td><td>' . $row->rps . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';




						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}


						return $tab;


					}
					
					
				}

				class nineone extends page {
					
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->stat($arg);
						
					}


					public function stat($arg) {

						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 

	
								$STH = $DBH->query('SELECT INS, sum(e.EY) as ts, sum(f.LIA) as tl, sum(f.NA) as na, sum(f.REV) as tr, (sum(f.REV) / sum(e.EY)) as rps, (sum(f.NA) / sum(e.EY)) as naps, (sum(f.LIA) / sum(e.EY)) as lps
													FROM effy2011 e, f1a1011 f, hd2011 h
													WHERE e.ID = h.ID AND f.ID = h.ID AND e.ID = f.ID AND f.LIA > 50000000
													GROUP BY e.ID
													ORDER BY tl DESC
													LIMIT 5;');  
	  
								$STH->setFetchMode(PDO::FETCH_OBJ);
					
							$tab = '<h4>Sorted Statistics</h4>
								   <table class="table">
									<tr><th>School</th><th><a href="./index.php?page=nine">Total Students</a></th><th><a href="./index.php?page=nineone">Total Liabilities</a></th><th><a href="./index.php?page=ninetwo">Liabilities per Student</a></th><th><a href="./index.php?page=ninethree">Net Assets</a></th><th><a href="./index.php?page=ninefour">Net Assets per Student</a></th><th><a href="./index.php?page=ninefive">Total Revenue</a></th><th><a href="./index.php?page=ninesix">Revenue per Student</a></th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td><td>' . $row->tl . '</td><td>' . $row->lps . '</td><td>' . $row->na . '</td><td>' . $row->naps . '</td><td>' . $row->tr . '</td><td>' . $row->rps . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';




						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}


						return $tab;


					}
					
					
				}

				class ninetwo extends page {
					
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->stat($arg);
						
					}


					public function stat($arg) {

						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 

	
								$STH = $DBH->query('SELECT INS, sum(e.EY) as ts, sum(f.LIA) as tl, sum(f.NA) as na, sum(f.REV) as tr, (sum(f.REV) / sum(e.EY)) as rps, (sum(f.NA) / sum(e.EY)) as naps, (sum(f.LIA) / sum(e.EY)) as lps
													FROM effy2011 e, f1a1011 f, hd2011 h
													WHERE e.ID = h.ID AND f.ID = h.ID AND e.ID = f.ID AND f.LIA > 100000000
													GROUP BY e.ID
													ORDER BY lps DESC
													LIMIT 5;');  
	  
								$STH->setFetchMode(PDO::FETCH_OBJ);
					
							$tab = '<h4>Sorted Statistics</h4>
								   <table class="table">
									<tr><th>School</th><th><a href="./index.php?page=nine">Total Students</a></th><th><a href="./index.php?page=nineone">Total Liabilities</a></th><th><a href="./index.php?page=ninetwo">Liabilities per Student</a></th><th><a href="./index.php?page=ninethree">Net Assets</a></th><th><a href="./index.php?page=ninefour">Net Assets per Student</a></th><th><a href="./index.php?page=ninefive">Total Revenue</a></th><th><a href="./index.php?page=ninesix">Revenue per Student</a></th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td><td>' . $row->tl . '</td><td>' . $row->lps . '</td><td>' . $row->na . '</td><td>' . $row->naps . '</td><td>' . $row->tr . '</td><td>' . $row->rps . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';




						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}


						return $tab;


					}
					
					
				}

				class ninethree extends page {
					
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->stat($arg);
						
					}


					public function stat($arg) {

						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 

	
								$STH = $DBH->query('SELECT INS, sum(e.EY) as ts, sum(f.LIA) as tl, sum(f.NA) as na, sum(f.REV) as tr, (sum(f.REV) / sum(e.EY)) as rps, (sum(f.NA) / sum(e.EY)) as naps, (sum(f.LIA) / sum(e.EY)) as lps
													FROM effy2011 e, f1a1011 f, hd2011 h
													WHERE e.ID = h.ID AND f.ID = h.ID AND e.ID = f.ID AND NA > 100000
													GROUP BY e.ID
													ORDER BY na DESC
													LIMIT 5;');  
	  
								$STH->setFetchMode(PDO::FETCH_OBJ);
					
							$tab = '<h4>Sorted Statistics</h4>
								   <table class="table">
									<tr><th>School</th><th><a href="./index.php?page=nine">Total Students</a></th><th><a href="./index.php?page=nineone">Total Liabilities</a></th><th><a href="./index.php?page=ninetwo">Liabilities per Student</a></th><th><a href="./index.php?page=ninethree">Net Assets</a></th><th><a href="./index.php?page=ninefour">Net Assets per Student</a></th><th><a href="./index.php?page=ninefive">Total Revenue</a></th><th><a href="./index.php?page=ninesix">Revenue per Student</a></th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td><td>' . $row->tl . '</td><td>' . $row->lps . '</td><td>' . $row->na . '</td><td>' . $row->naps . '</td><td>' . $row->tr . '</td><td>' . $row->rps . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';




						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}


						return $tab;


					}
					
					
				}

				class ninefour extends page {
					
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->stat($arg);
						
					}


					public function stat($arg) {

						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 

	
								$STH = $DBH->query('SELECT INS, sum(e.EY) as ts, sum(f.LIA) as tl, sum(f.NA) as na, sum(f.REV) as tr, (sum(f.REV) / sum(e.EY)) as rps, (sum(f.NA) / sum(e.EY)) as naps, (sum(f.LIA) / sum(e.EY)) as lps
													FROM effy2011 e, f1a1011 f, hd2011 h
													WHERE e.ID = h.ID AND f.ID = h.ID AND e.ID = f.ID AND NA > 100000000
													GROUP BY e.ID
													ORDER BY naps DESC
													LIMIT 5;');  
	  
								$STH->setFetchMode(PDO::FETCH_OBJ);
					
							$tab = '<h4>Sorted Statistics</h4>
								   <table class="table">
									<tr><th>School</th><th><a href="./index.php?page=nine">Total Students</a></th><th><a href="./index.php?page=nineone">Total Liabilities</a></th><th><a href="./index.php?page=ninetwo">Liabilities per Student</a></th><th><a href="./index.php?page=ninethree">Net Assets</a></th><th><a href="./index.php?page=ninefour">Net Assets per Student</a></th><th><a href="./index.php?page=ninefive">Total Revenue</a></th><th><a href="./index.php?page=ninesix">Revenue per Student</a></th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td><td>' . $row->tl . '</td><td>' . $row->lps . '</td><td>' . $row->na . '</td><td>' . $row->naps . '</td><td>' . $row->tr . '</td><td>' . $row->rps . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';




						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}


						return $tab;


					}
					
					
				}

				class ninefive extends page {
					
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->stat($arg);
						
					}


					public function stat($arg) {

						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 

	
								$STH = $DBH->query('SELECT INS, sum(e.EY) as ts, sum(f.LIA) as tl, sum(f.NA) as na, sum(f.REV) as tr, (sum(f.REV) / sum(e.EY)) as rps, (sum(f.NA) / sum(e.EY)) as naps, (sum(f.LIA) / sum(e.EY)) as lps
													FROM effy2011 e, f1a1011 f, hd2011 h
													WHERE e.ID = h.ID AND f.ID = h.ID AND e.ID = f.ID AND REV > 200000000
													GROUP BY e.ID
													ORDER BY tr DESC
													LIMIT 5;');  
	  
								$STH->setFetchMode(PDO::FETCH_OBJ);
					
							$tab = '<h4>Sorted Statistics</h4>
								   <table class="table">
									<tr><th>School</th><th><a href="./index.php?page=nine">Total Students</a></th><th><a href="./index.php?page=nineone">Total Liabilities</a></th><th><a href="./index.php?page=ninetwo">Liabilities per Student</a></th><th><a href="./index.php?page=ninethree">Net Assets</a></th><th><a href="./index.php?page=ninefour">Net Assets per Student</a></th><th><a href="./index.php?page=ninefive">Total Revenue</a></th><th><a href="./index.php?page=ninesix">Revenue per Student</a></th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td><td>' . $row->tl . '</td><td>' . $row->lps . '</td><td>' . $row->na . '</td><td>' . $row->naps . '</td><td>' . $row->tr . '</td><td>' . $row->rps . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';




						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}


						return $tab;


					}
					
					
				}
				class ninesix extends page {
					
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->stat($arg);
						
					}


					public function stat($arg) {

						try {
							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 

	
								$STH = $DBH->query('SELECT INS, sum(e.EY) as ts, sum(f.LIA) as tl, sum(f.NA) as na, sum(f.REV) as tr, (sum(f.REV) / sum(e.EY)) as rps, (sum(f.NA) / sum(e.EY)) as naps, (sum(f.LIA) / sum(e.EY)) as lps
													FROM effy2011 e, f1a1011 f, hd2011 h
													WHERE e.ID = h.ID AND f.ID = h.ID AND e.ID = f.ID AND REV > 200000000
													GROUP BY e.ID
													ORDER BY rps DESC
													LIMIT 5;');  
	  
								$STH->setFetchMode(PDO::FETCH_OBJ);
					
							$tab = '<h4>Sorted Statistics</h4>
								   <table class="table">
									<tr><th>School</th><th><a href="./index.php?page=nine">Total Students</a></th><th><a href="./index.php?page=nineone">Total Liabilities</a></th><th><a href="./index.php?page=ninetwo">Liabilities per Student</a></th><th><a href="./index.php?page=ninethree">Net Assets</a></th><th><a href="./index.php?page=ninefour">Net Assets per Student</a></th><th><a href="./index.php?page=ninefive">Total Revenue</a></th><th><a href="./index.php?page=ninesix">Revenue per Student</a></th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->ts . '</td><td>' . $row->tl . '</td><td>' . $row->lps . '</td><td>' . $row->na . '</td><td>' . $row->naps . '</td><td>' . $row->tr . '</td><td>' . $row->rps . '</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';




						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}


						return $tab;


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
												WHERE f.ID = h.ID AND f2.ID = h.ID AND f.ID = f2.ID AND f.LIA > 1000000
												Group By INS
												ORDER BY lia DESC
												LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Precentage Increase of Liabilities 10-11</h4>
								   <table class="table">
									<tr><th>School</th><th>Percentage</th></tr>';

							while($row = $STH->fetch()) {  

							    $tab .= '<tr><td>' . $row->INS . '</td><td>' . $row->lia . '%</td></tr>';
							    
							    
							} 
					
							$tab .= '</table>';
						


						} catch(PDOException $e) {
								echo $e->getMessage();
						}

						return $tab;

					}

					
					
					
				}

				class twel extends page {
					function get($arg){
						$this->content .= $this->menu();
						$this->content .= $this->tab();
					
					}


					public function tab() {

						try {

							$DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							
							$STH = $DBH->query('SELECT INS, tsp
												FROM PIE
												ORDER BY tsp DESC
												LIMIT 5;');  
	  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							$tab = '<h4>Precentage Increase of Enrollment 10-11</h4>
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


