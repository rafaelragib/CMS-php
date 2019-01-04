<?php 


                              /*Update Category*/
                              if(isset($_POST['update']))
                              {
                                  $cat_title=$_POST['cat_title'];
                                  $query="UPDATE category SET cat_title ='{$cat_title}' WHERE cat_id='{$cat_id}'";
                                  $update_query=mysqli_query($conn,$query);
                                  if(!$update_query)
                                  {
                                      die('Something went wrong'.mysqli_error($conn));
                                  }   
                                  header("location:category.php");
                              }
?>
<?php 
                              if(isset($_GET['edit']))
                              {
                                  $category_id=$_GET['edit'];
                                  $query="SELECT * FROM category where cat_id='{$category_id}'";
                                  $select_query=mysqli_query($conn,$query);
                                  $row=mysqli_fetch_assoc($select_query);
                                  $cat_title=$row['cat_title'];
                              }?>

                             <form action="" method="post"> <!-- Update Query -->
                                 <div class="form-group">  
                                     <label for="cat-title" class="">
                                         Edit Category</label>
                                         <!-- <input type="text" class="form-control" name="cat_title"> -->                                      
                                         <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title))echo "$cat_title";?>">
                                 </div>
                                 <div class="form-group">
                                     <input class="btn btn-primary" type="submit" name="update" value="EditCategory">
                                     
                                 </div>
                             </form>
                          <!-- form category -->
