<?php
	session_start();
	include_once('../include/database.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//make use of prepared statement to prevent sql injection
			$sql = $db->prepare("INSERT INTO subject (id, subject_code, course_id, course_description, total_units, with_lab_component) VALUES (:id, :subject_code, :course_id, :course_description, :total_units, :with_lab_component)");

			//bind
			$sql->bindParam(':id', $_POST['id']);
            $sql->bindParam(':suject_code', $_POST['subject_code']);
			$sql->bindParam(':course_id', $_POST['course_id']);
			$sql->bindParam(':course_description', $_POST['course_description']);
			$sql->bindParam(':total_units', $_POST['total_units']);
			$sql->bindParam(':with_lab_component', $_POST['with_lab_component']);
			

			//if-else statement in executing our prepared statement
			$_SESSION['message'] = ( $sql->execute()) ? 'Subject added successfully' : 'Something went wrong. Cannot add subject.';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../index.php');
	
?>