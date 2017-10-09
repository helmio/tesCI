<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome to CodeIgniter</title>

  <style type="text/css">

  ::selection{ background-color: #E13300; color: white; }
  ::moz-selection{ background-color: #E13300; color: white; }
  ::webkit-selection{ background-color: #E13300; color: white; }

  body {
    background-color: #fff;
    margin: 40px;
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
  }

  a {
    color: #003399;
    background-color: transparent;
    font-weight: normal;
  }

  h1 {
    color: #444;
    background-color: transparent;
    border-bottom: 1px solid #D0D0D0;
    font-size: 19px;
    font-weight: normal;
    margin: 0 0 14px 0;
    padding: 14px 15px 10px 15px;
  }

  code {
    font-family: Consolas, Monaco, Courier New, Courier, monospace;
    font-size: 12px;
    background-color: #f9f9f9;
    border: 1px solid #D0D0D0;
    color: #002166;
    display: block;
    margin: 14px 0 14px 0;
    padding: 12px 10px 12px 10px;
  }

  #body{
    margin: 0 15px 0 15px;
  }
  
  p.footer{
    text-align: right;
    font-size: 11px;
    border-top: 1px solid #D0D0D0;
    line-height: 32px;
    padding: 0 10px 0 10px;
    margin: 20px 0 0 0;
  }
  
  #container{
    margin: 10px;
    border: 1px solid #D0D0D0;
    -webkit-box-shadow: 0 0 8px #D0D0D0;
  }
  </style>
</head>

<body>

<div id="container">
<h1>Shopping cart</h1>
    <div id="body">
        
       <p><?php $this->load->view('menu'); ?></p>
       
       <!--Katalog-->
       
       <table border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse">
           <tr>
               <th>No</th>
               <th>Image</th>
               <th>Nama Product</th>
               <th>Harga</th>
               <th>Option</th>
               <th>Qty</th>
               <th>Aksi</th>
           </tr>
           
           <tbody>
               <?php $i=0; foreach($products as $row): $i++; ?>
               <?php echo form_open('shop/add'); ?>
                   <tr>
                       <td><?php echo $i; ?></td>
                       <td><?php echo img(array('src'=>'image/products/'.$row->image, 'height'=>'70px')); ?></td>
                       <td><?php echo $row->name; ?></td>
                       <td><?php echo $row->price; ?></td>
                       <td><?php echo $row->option_name; ?>
                           <?php $options = explode(',', $row->option_values); ?>
                           <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                           <select name="option_value">
                               <?php for($j=0; $j<count($options); $j++): ?>
                               <option value="<?php echo trim($options[$j]); ?>"> <?php echo trim($options[$j]); ?> </option>
                               <?php endfor; ?>
                           </select>
                       
                       
                       </td>
                       <td><input type="text" name="qty" value="1"></td>
                       <td> <input type="submit" value="Tambah ke Keranjang"> </td>
                   </tr>
                   <?php echo form_close(); ?>
               <?php endforeach; ?>
               
           </tbody>
       </table>
        <?php //print_r($products); ?>  
        
         <!--end Katalog-->
         
         
          <!-- Keranjang -->
        <?php if ($cart = $this->cart->contents()): ?> <!-- cek apakah kerajang ada isinya -->
            <div id="cart">
                <table border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse">
                <caption>Keranjang Belanja</caption>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Option</th>
                         <th>Qty</th>
                        <th>Harga</th>
                        <th></th>
                    </tr>
                </thead>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td>
                            <?php if ($this->cart->has_options($item['rowid'])) {
                                foreach ($this->cart->product_options($item['rowid']) as $option => $value) {
                                    echo $option . ": <em>" . $value . "</em>";
                                }
                                
                            } ?>
                        </td>
                        
                        <td>
                            <?php echo form_open('shop/edit/'.$item['rowid']); ?>
                                <input type="text" name="qty" value="<?php echo $item['qty']; ?>" >
                                <input type="submit" value="update">
                            <?php echo form_close(); ?>
                        </td>
                        <td>$<?php echo $item['subtotal']; ?></td>
                        <td class="remove">
                            <?php echo anchor('shop/delete/'.$item['rowid'],'X'); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total">
                    <td colspan="2"><strong>Total</strong></td>
                    <td>$<?php echo $this->cart->total(); ?></td>
                </tr>
                </table>        
            </div>
            <?php endif; ?>
        <!----end Keranjang---->
             
        

        
    </div>

    <p class="footer"> <?php echo anchor('welcome', 'Halaman Welcome') ?> Page rendered in <strong>{elapsed_time}</strong> seconds</p> 
    <!--untuk link pake HTML Helper aja biar suffixnya (ekstensinya) jalan-->
</div>
</body>
</html>

