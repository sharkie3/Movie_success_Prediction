
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movieprediction";

$conn = new mysqli($servername, $username, $password, $dbname);

	if ( isset( $_POST['searchname'] ) )
	{
		if ( $_POST['moviename']!=null) {
			
		
			$display = '';
			$movie_name = $_POST['moviename'];
			$sql = "select * from new_movies where movie_name='$movie_name'";
			$status = $conn-> query($sql);
			if(! $status){
				die('Error in connection') ;
			}
			while($row = $status->fetch_assoc()){
				$actorString = $row['actors'];
				$actressString = $row['actress'];
				$directorString = $row['directors'];
				$writerString = $row['writer'];
				$producerString = $row['producers'];
			}
			//Actor
		   	$actorArray = split ("\", $actorString); 
		   	$i = 0;
		   	$actorClass = 0;
		   	while ($i < sizeof( $actorArray)) {
		 		$actor=$actorArray[$i] ; 
		 		$lblArray[$i]=1; 
                                                $query1=" SELECT lbl FROM actors_lbl WHERE actor_name='$actor'";
				$status=$conn->query(query1);
				if(! $status){
					$lblArray[$i] = 1; // if actor is new or actor is not found in database
				}
				else{
					while($row = $status->fetch_assoc()){
						$lbl = $row['lbl'];
						if ($lbl<6) {
							$lblArray[$i]  = 1; // 1 for flop
						}
						else if ($lbl<8) {
							$lblArray[$i]  = 2; // 2 for hit
						}
						else {
							$lblArray[$i]  = 3; // 3 for super hit
						}
					}
				}
				//echo $lblArray[$i] ;
				$actorClass = $actorClass + $lblArray[$i] ;
			   	$i = $i+1;
			}
			$actorClass = $actorClass/sizeof($lblArray) ;
				//echo $actorClass;
			//Actress
			$actressArray = split ("\", $actressString); 
		   	$i = 0;
		   	$actressClass = 0;
		   	while ($i < sizeof( $actressArray)) {
		 		$actress = $actressArray[$i] ; // taking name
		 		$lblArray[$i] = 1; //initialize
		   		$sql = "select label from actress_label where actress_name='$actress'";
				$status = $conn-> query($sql);
				if(! $status){
					$lblArray[$i] = 1; // if actor is new or actor is not found in database
				}
				else{
					while($row =$status->fetch_assoc()){
						$lbl = $row['label'];
						if ($lbl<6) {
							$lblArray[$i]  = 1; // 1 for flop
						}
						else if ($lbl<8) {
							$lblArray[$i]  = 2; // 2 for hit
						}
						else {
							$lblArray[$i]  = 3; // 3 for super hit
						}
					}
				}
				//echo $lblArray[$i] ;
				$actressClass = $actressClass + $lblArray[$i] ;
			   	$i = $i+1;
			}
			$actressClass = $actressClass/sizeof($lblArray) ;
				//echo $actorClass;

			//Director
			$directorArray = split ("\", $directorString); 
		   	$i = 0;
		   	$directorClass = 0;
		   	while ($i < sizeof( $directorArray)) {
		 		$director = $directorArray[$i] ; // taking name
		 		$lblArray[$i] = 1; //initialize
		   		$sql = "select lbl from directors_lbl where director_name='$director'";
				$status = $conn-> query($sql);
				if(! $status){
					$lblArray[$i] = 1; // if actor is new or actor is not found in database
				}
				else{
					while($row = $status->fetch_assoc()){
						$lbl = $row['lbl'];
						if ($lbl<6) {
							$lblArray[$i]  = 1; // 1 for flop
						}
						else if ($lbl<8) {
							$lblArray[$i]  = 2; // 2 for hit
						}
						else {
							$lblArray[$i]  = 3; // 3 for super hit
						}
					}
				}
				//echo $lblArray[$i] ;
				$directorClass = $directorClass + $lblArray[$i] ;
			   	$i = $i+1;
			}
			$directorClass = $directorClass/sizeof($lblArray) ;
				//echo $directorClass;

			//producer
			$producerArray = split ("\", $producerString); 
		   	$i = 0;
		   	$producerClass = 0;
		   	while ($i < sizeof( $producerArray)) {
		 		$producer = $producerArray[$i] ; // taking name
		 		$lblArray[$i] = 1; //initialize
		   		$sql = "select lbl from producers_lbl where producer_name='$producer'";
				$status = $conn-> query($sql);
				if(! $status){
					$lblArray[$i] = 1; // if actor is new or actor is not found in database
				}
				else{
					while($row =$status->fetch_assoc()){
						$lbl = $row['lbl'];
						if ($lbl<6) {
							$lblArray[$i]  = 1; // 1 for flop
						}
						else if ($lbl<8) {
							$lblArray[$i]  = 2; // 2 for hit
						}
						else {
							$lblArray[$i]  = 3; // 3 for super hit
						}
					}
				}
				//echo $lblArray[$i] ;
				$producerClass = $producerClass + $lblArray[$i] ;
			   	$i = $i+1;
			}
			$producerClass = $producerClass/sizeof($lblArray) ;
				//echo $producerClass;

			//writer	
			$writerArray = split ("\", $writerString); 
		   	$i = 0;
		   	$writerClass = 0;
		   	while ($i < sizeof( $writerArray)) {
		 		$writer = $writerArray[$i] ; // taking name
		 		$lblArray[$i] = 1; //initialize
		   		$sql = "select lbl from writers_lbl where writer_name='$writer'";
				$status = $conn-> query($sql);
				if(! $status){
					$lblArray[$i] = 1; // if actor is new or actor is not found in database
				}
				else{
					while($row =$status->fetch_assoc()){
						$lbl = $row['lbl'];
						if ($lbl<6) {
							$lblArray[$i]  = 1; // 1 for flop
						}
						else if ($lbl<8) {
							$lblArray[$i]  = 2; // 2 for hit
						}
						else {
							$lblArray[$i]  = 3; // 3 for super hit
						}
					}
				}
				//echo $lblArray[$i] ;
				$writerClass = $writerClass + $lblArray[$i] ;
			   	$i = $i+1;
			}
			$writerClass = $writerClass/sizeof($lblArray) ;
				//echo $writerClass;

			//Calculation
			$result = ($actorClass*5 + $actressClass*4 + $directorClass*3 + $writerClass*2 + $producerClass*1)/15;
			if ($result<=1) {
				//echo "Flop";
				echo '<div id="display">Flop</div> ';
			}
			else if ($result<=2) {
				//echo 'Hit';
				echo '<div id="display">Hit</div> ';
			}
			else{
				//echo "Super Hit";
				echo '<div id="display">Super Hit</div> ';
			}
			
		}
	}
?>


