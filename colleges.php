<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
     
        <title>Colleges Assignment</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="main.css" type="text/css"/>
    </head>  
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
				
				         
				        }
				
				
				
				}
				
				abstract class page {
						
						
					public $menu;
					public $content;
					
					function menu() {
						$menu =	'<div><ul>
								    <li>
								        <a href="./colleges.php">Homepage</a>
								    </li>
								    <li>
								        <a href="./colleges.php?page=oneFive">Questions 1-5</a>
								    </li>
								    <li>
								        <a href="./colleges.php?page=sixEight">Questions 6-8</a>
								    </li>
								    <li>
								        <a href="./colleges.php?page=nine">Question 9</a>
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
							//$this->content .= $this->conn();
							
						
					
					}

					public function conn(){
						
					}

					

					
				
					
				}

				class oneFive extends page {

					function get($arg) {
								
							$arg = $_REQUEST['arg'];
							$this->content .= $this->menu();
							
							
						
					
					}

					
				}
				class sixEight extends page {

					function get($arg) {
								
							$arg = $_REQUEST['arg'];
							$this->content .= $this->menu();
							
							
						
					
					}

					
				}
				class nine extends page {

					function get($arg) {
								
							$arg = $_REQUEST['arg'];
							$this->content .= $this->menu();
							$this->content .= $this->conn();
							
						
					
					}
				}
				
				class dbConn {
					
					function __construct(){
						
						
						try {
							 $DBH = new PDO("mysql:host=sql2.njit.edu;dbname=smb38", smb38, V81iX37K); 
							/* $STH = $DBH->query('SELECT title from Songs');  
	  
							# setting the fetch mode  
							$STH->setFetchMode(PDO::FETCH_OBJ);  
							  
							# showing the results  
							while($row = $STH->fetch()) {  
							    echo $row->title . "\n";  
							    
							} */
					
						
							  
						} catch(PDOException $e) {
							echo $e->getMessage();
							
						}
					}
					
					
					}
				}
    		?>
    		
		</div>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	</body>
</html>