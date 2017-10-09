<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<div class="container">
<div class="row">
<div class="col-md-12">
<br>
<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Produk</label>
        <div class="col-lg-5">
            <input type="text" name="name" class="form-control" value="<?php echo $produk['name'];?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Price</label>
        <div class="col-lg-5">
            <input type="text" name="price" class="form-control" value="<?php echo $produk['price'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Option Name</label>
        <div class="col-lg-5">
            <input type="text" name="option_name" class="form-control" value="<?php echo $produk['option_name'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Option Values</label>
        <div class="col-lg-5">
            <input type="text" name="option_values"  class="form-control" value="<?php echo $produk['option_values'];?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Image</label>
        <div class="col-lg-5">
            <img src="<?php echo base_url('image/products/'.$produk['image']);?>" width="200px" height="200px">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label"></label>
        <div class="col-lg-5">
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Update</button>
        <a href="<?php echo site_url('produk');?>" class="btn btn-default">Kembali</a>
    </div>
</form>

</div>
</div>
</div>

