<?php 
    session_start();
    if(isset($_SESSION['message'])){
        ?>
        <div class="alert alert-success text-center" style="margin-top:10px;">
            <?php echo $_SESSION['message']; ?>
        </div>
    <?php
        unset($_SESSION['message']);
    }
?>
<?php
if (isset($_GET['search'])) {
    $searchkey = $_GET['search'];
    $sql = "SELECT * FROM subject WHERE name LIKE '%$searchkey%'";
} else {
    $sql = "SELECT * FROM subject";
    $searchkey = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Exam</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body class="bg-dark">
    <!-- Main -->
    <div class="container mt-4 pt-4">
        <h3 class="page-header text-center text-light fs-1">Student Registration</h3>
        <hr>
        <div class="row">
            <div class="">
                <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#add_subject">Add New Subject</a>
                <br>
                <br>
                <form action="" method="GET">
                    <div class="row justify-content-start mb-3">
                        <div class="col-md-3">
                            <input type="text" name="search" class="form-control" placeholder="Search by subject" value="<?php echo $searchkey; ?>">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary" id="button-addon2"> <i class="bi bi-search text-light"></i>Search</button>
                        </div>
                    </div>
                </form>
                <div class="table">
                    <table class="table table-dark text-light">
                        <thead>
                            <th class="fs-5">Id</th>
                            <th class="fs-5">Subject Code</th>
                            <th class="fs-5">Course Id</th>
                            <th class="fs-5">Description</th>
                            <th class="fs-5">Total Units</th>
                            <th class="fs-5">With Lab Component</th>
                        <tbody>
                        <?php
                            //include our connection
                            include_once('include/database.php');
                            $database = new Connection();
                            $db = $database->open();
                            try{	
                                if (!isset($_GET['search'])) {
                                    $sql = 'SELECT * FROM subject ORDER BY name ASC';
                                }
                                $no = 0;
                                foreach ($db->query($sql) as $row) {
                                    $no++;
                        ?>
                                     <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['subject_code']; ?></td>
                                        <td><?php echo $row['course_id']; ?></td>
                                        <td><?php echo $row['course_description']; ?></td>
                                        <td><?php echo $row['total_units']; ?></td>
                                        <td><?php echo $row['with_lab_component']; ?></td>
                                        <td align="right">
                                            <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit_subject<?php echo $row['id']; ?>">Edit</a>
                                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_subject<?php echo $row['id']; ?>">Delete</a>
                                        </td>
                                        <?php include('subject/view_delete_subject.php'); ?>
                                        <?php include('subject/view_edit_subject.php'); ?>
                                    </tr>
                        <?php 
                                }
                            }
                            catch(PDOException $e){
                                echo "There is some problem in connection: " . $e->getMessage();
                            }

                            //close connection
                            $database->close();

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include('subject/view_add_subject.php'); ?>
    <?php include('subject/view_edit_subject.php'); ?>
    <!-- JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>