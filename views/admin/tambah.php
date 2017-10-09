<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<div class="container">
<div class="row">
<div class="col-md-12">
<br>
<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<!--<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">-->
<?php $attributes = array('class' => 'form-horizontal'); ?>
<?php echo form_open_multipart('produk/tambah',$attributes);?>


    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Produk</label>
        <div class="col-lg-5">
            <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Harga</label>
        <div class="col-lg-5">
            <input type="text" name="price" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Option Name</label>
        <div class="col-lg-5">
            <input type="text" name="option_name" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Option Values</label>
        <div class="col-lg-5">
            <input type="text" name="option_values" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Image</label>
        <div class="col-lg-5">
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('produk');?>" class="btn btn-default">Kembali</a>
    </div>
<!--</form>-->
<?php echo form_close(); ?>

</div>
</div>
</div>

