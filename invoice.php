<?php
session_start();
if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
    header("Location: signin.php");
    die();
}

$id = $_SESSION['usr_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intez</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous">
</script>

<script> 
$(function(){
  $("#main-wrapper").load("comon.php");
  $(".sidebar").load("sidebar.php"); 

 
});
</script> 
</head>

<body class="dashboard">
<!--div id="preloader">
    <i>.</i>
    <i>.</i>
    <i>.</i>
</div-->

<div id="main-wrapper"></div>
<div class="sidebar"></div>

    <div class="content-body">
        <div class="container">
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>Invoice</h3>
                            <p class="mb-2">Welcome Intez Invoice page</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs"><a href="#">Home </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Invoice</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="stat-widget d-flex align-items-center bg-white">
                        <div class="widget-icon me-3 bg-primary"><span><i class="ri-file-copy-2-line"></i></span></div>
                        <div class="widget-content">
                <?php include 'connect.php';
                $query = "SELECT Iname FROM invoice WHERE usr_id=$id";
                $result = mysqli_query($sql,$query);
                if($result)
            {
                $row = mysqli_num_rows($result);
                if($row){ ?>
                             <h3><?php echo $row ?></h3>
                <?php } 
                
                else{  ?>
                    <h3> 0 </h3>
                <?php  
                        mysqli_free_result($result);
            } } 
                ?>
                            
                            <p>Total Invoices</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="stat-widget d-flex align-items-center bg-white">
                        <div class="widget-icon me-3 bg-success"><span><i class="ri-file-list-3-line"></i></span></div>
                        <div class="widget-content">
            <?php
            include 'connect.php';
            $qry = "SELECT * FROM invoice WHERE status='PAID' AND usr_id=$id "; 
            $result = mysqli_query($sql,$qry);
            
            if($result)
            {
                $row = mysqli_num_rows($result);
                if($row){ ?>
                             <h3><?php echo $row ?></h3>
                <?php } 
                
                else  ?>
                    <h3> 0 </h3>
                <?php  
                        mysqli_free_result($result);
            }   
                ?>
                            <p>Paid Invoices</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="stat-widget d-flex align-items-center bg-white">
                        <div class="widget-icon me-3 bg-warning"><span><i class="ri-file-paper-line"></i></span></div>
                        <div class="widget-content">    
            <?php
            include 'connect.php';
            $qry = "SELECT * FROM invoice WHERE status = 'NOT PAID' AND usr_id = $id";
            $result = mysqli_query($sql,$qry);
             if($result)
            {
                $row = mysqli_num_rows($result);
                if($row){ ?>
                            <h3><?php echo $row ?></h3>
                <?php }
                 else
                {?>
                <h3>0</h3>
                    
                <?php }
                        mysqli_free_result($result);
                    }   
                ?>
                            <p>Unpaid Invoices</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="stat-widget d-flex align-items-center bg-white">
                        <div class="widget-icon me-3 bg-danger"><span><i class="ri-file-paper-2-line"></i></span></div>
                        <div class="widget-content">
                            <h3>0</h3>
                            <p>Canceled Invoices</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header flex-row">
                            <h4 class="card-title">Invoice </h4>
<a class="btn btn-primary" href="create-invoice.php"><span><i
                                        class="bi bi-plus"></i></span>Create Invoice</a>
                        </div>
                        <div class="card-body">
                            <div class="invoice-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                
                                                <th>Client</th>
                                                <th>Name</th>
                                                <th>Due</th>
                                                <th>Amount</th>
                        <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        <?php
                            include 'connect.php';
                            $qry = "SELECT * FROM invoice WHERE usr_id = $id ORDER BY Date";
                            $result = mysqli_query($sql,$qry);?>
                                            <tr>
                            <?php while($data = mysqli_fetch_assoc($result))
                                
                            {?>
                                                
                        
                                                <td><img src="images/avatar/3.png" alt="" width="30"
                                                        class="me-2">
                            
                        </td>
                                                <td><?php echo $data['Iname'] ;?> </td>

                        <td><?php echo $data['Ddate']; ?></td>

                                                <td><?php echo $data['Total']; ?></td>
                        
                    <td><a href="delete.php?id=<?php echo $data['Id'];?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>   
                        
                                            </tr>
                        <?php } 
                        ?>
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
