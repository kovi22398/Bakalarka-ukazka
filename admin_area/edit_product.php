<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        
        $get_p = "select * from products where product_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['product_id'];
        
        $p_title = $row_edit['product_title'];

        $m_id = $row_edit['category_id'];
        
        $p_image1 = $row_edit['product_img1'];
        
        $p_image2 = $row_edit['product_img2'];
        
        $p_image3 = $row_edit['product_img3'];
        
        $p_price = $row_edit['product_price'];
        
        $p_keywords = $row_edit['product_keywords'];
        
        $p_desc = $row_edit['product_desc'];
        
    }
        
        $get_category = "select * from categories where category_id='$m_id'";
        
        $run_category = mysqli_query($con,$get_category);
        
        $row_category = mysqli_fetch_array($run_category);
        
        $category_id = $row_category['category_id'];
        
        $category_title = $row_category['category_title'];

?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Vloženie Produktu </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Upraviť Produkt
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Upraviť Produkt 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Názov </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Kategória </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="category" class="form-control"><!-- form-control Begin -->

                              <option disabled value="Vyber kateróriu">Vyber Kategóriu</option>
                              
                              <option selected value="<?php echo $category_id; ?>"> <?php echo $category_title; ?> </option>
                              
                              <?php 
                              
                              $get_category = "select * from categories";
                              $run_category = mysqli_query($con,$get_category);
                              
                              while ($row_category=mysqli_fetch_array($run_category)){
                                  
                                  $category_id = $row_category['category_id'];
                                  $category_title = $row_category['category_title'];
                                  
                                  echo "
                                  
                                  <option value='$category_id'> $category_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Obrázok 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Obrázok 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Obrázok 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Cena </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Klúčové Slová </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Podrobnosti </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_desc" cols="19" rows="6" class="form-control">
                              
                              <?php echo $p_desc; ?>
                              
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Upraviť produkt" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    $product_title = $_POST['product_title'];
    $category_id = $_POST['category'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];

    if(is_uploaded_file($_FILES['product_img1']['tmp_name'])){

            // work for upload / update image
        
        $product_img1 = $_FILES['product_img1']['name'];
        
        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        
        $update_product = "update products set category_id='$category_id',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Produkt bol Upravený.')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
    }elseif(is_uploaded_file($_FILES['product_img2']['tmp_name'])){
        
        $product_img2 = $_FILES['product_img2']['name'];

        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        
        $update_product = "update products set category_id='$category_id',date=NOW(),product_title='$product_title',product_img2='$product_img2',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Produkt bol Upravený.')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
        
    }elseif(is_uploaded_file($_FILES['product_img3']['tmp_name'])){
        
        $product_img3 = $_FILES['product_img3']['name'];
        
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name3,"product_images/$product_img3");
        
        $update_product = "update products set category_id='$category_id',date=NOW(),product_title='$product_title',product_img3='$product_img3',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Produkt bol Upravený.')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
        
    }else{

        // work when no update image
        
        $update_product = "update products set category_id='$category_id',date=NOW(),product_title='$product_title',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Produkt bol Upravený.')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
    }
    
}

?>


<?php } ?>