<center><!--  center Begin  -->
    
    <h1> Moje objednávky </h1>
    
    <p class="lead"> Všetky objednávky na jednom mieste</p>
    
    <p class="text-muted">
        
       Ak máte akékoľvek otázky <a href="../contact.php">kontaktujte nás</a>. Na telefónnom čísle sme Vám k dispozíci <strong>24/7</strong>.
<!--        <br>Objednávka sa dá zrušiť iba ak je stav objednávky: <strong>Objednané</strong>.-->
        
    </p>
    
</center><!--  center Finish  -->


<hr>


<div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> ID: </th>
                <th> Dlžná suma: </th>
                <th> Fakturačné číslo: </th>
                <th> Množstvo: </th>
                <th> Dátum objednávky:</th>
                <th> Stav: </th>
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
           
           <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='Objednané'){
                    
                    $order_status = 'Objednané';
                    
                }elseif($order_status=='Pripravené'){
                        
                    $order_status = 'Pripravené';
                    
                }else{
                    
                    $order_status = 'Neznáme';
                    
                }
            
            ?>
            
            <tr><!--  tr Begin  -->
                
                <th> <?php echo $i; ?> </th>
                <td> €<?php echo $due_amount; ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                
                
            </tr><!--  tr Finish  -->
            
            <?php } ?>
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->