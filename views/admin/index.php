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
<h1>Produk</h1>
<div id="body">
<?php $this->load->view('admin/menu')?>
<?php echo $message;?>
<table border="1">
    <thead>
        <tr>
            <td>No.</td>
            <td>Gambar</td>
            <td>ID</td>
            <td>Harga</td>
            <td>Nama Produk</td>
            <td>Option name</td>
            <td>Option values</td>
            <td colspan="2"><a href="<?php echo site_url('produk/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
</td>
        </tr>
    </thead>
    <?php $no=0; foreach($produk as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><img src="<?php echo base_url('./image/products/'.$row->image);?>" height="100px" width="100px"></td>
        <td><?php echo $row->id;?></td>
        <td><?php echo $row->price;?></td>
        <td><?php echo $row->name;?></td>
        <td><?php echo $row->option_name;?></td>
        <td><?php echo $row->option_values;?></td>
        <td><a href="<?php echo site_url('produk/edit/'.$row->name);?>"><i class="glyphicon glyphicon-edit">edit</i></a></td>
        <td><a href="<?php echo site_url('produk/hapus/'.$row->id);?>" class="hapus" ><i class="glyphicon glyphicon-trash">hapus</i></a></td>
    </tr>
    <?php endforeach;?>
</table>
<?php echo $pagination;?>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>

</div>
</div>

</body>
</html>