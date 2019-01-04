<?php
    include "include/header.php";
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
            include "include/sidebar.php";
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->

                         <div class="col-xs-6">
                            <?php //add category
                            if(isset($_POST['submit']))
                            {
                                
                            $cat_title=$_POST['cat_title'];

                            if($cat_title =="" || empty($cat_title))
                            {
                                echo "Nothing was created";
                            }
                            else
                            {
                            $query="INSERT INTO category(cat_title)";
                            $query.="VALUE ('{$cat_title}')";
                            $create_query=mysqli_query($conn,$query);
                            echo "YO";                       
                            if(!$create_query)
                            {
                                die('Create Failed'.mysqli_error($conn));
                            }
                            }
                            }
                            
                            ?>
                             <form action="" method="post">
                                 <div class="form-group">  
                                     <label for="cat-title" class="">
                                         Add Category</label>
                                         <input type="text" class="form-control" name="cat_title">                                      
                                 </div>
                                 <div class="form-group">
                                     <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                 </div>
                             </form>
                             <?php
                             /*Update Category*/
                            if(isset($_GET['edit']))
                            {
                                $cat_id=$_GET['edit'];
                                include "include/update_category.php";
                            }?>
                           </div>  
                         <div class="col-xs-6">
                           <table class="table table-bordered table-hover">
                            <?php 
                    
                    ?>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php /*Show all the data*/
                                    $query="SELECT * FROM category";
                    $category_admin= mysqli_query($conn,$query);
                                while ($row=mysqli_fetch_assoc($category_admin)) {
                                    $category_id=$row['cat_id'];
                                    $category_name=$row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$category_id}</td>";
                                    echo "<td>{$category_name}</td>";
                                    echo "<td><a href='category.php?delete={$category_id}'>Delete</a></td>";
                                    echo "<td><a href='category.php?edit={$category_id}'>Edit</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                                
                                 

                              <?php 
                            
                              /*delete data*/
                              if(isset($_GET['delete']))
                              {
                                  $category_id=$_GET['delete'];
                                  $query="DELETE FROM category where cat_id='{$category_id}'";
                                  $delete_query=mysqli_query($conn,$query);
                                  if(!$delete_query)
                                  {
                                      die('Something went wrong'.mysqli_error($conn));
                                  }   
                                  header("location:category.php");
                              }
                              ?>
                                </tbody>
                            </table> 

                         </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
