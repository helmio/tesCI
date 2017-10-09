<?php
    if($this->input->post('mysubmit')){
        $nama_lengkap    =set_value('nama_lengkap');
        $jenis_kelamin    =set_value('jenis_kelamin');
        $no_tlp            =set_value('no_tlp');
        $email             =set_value('email');
        $alamat         =set_value('alamat');
    }else{
        //dr db = $karyawan->nama_lengkap
        $nama_lengkap    =$karyawan->nama_lengkap;
        $jenis_kelamin    =$karyawan->jenis_kelamin;
        $no_tlp            =$karyawan->no_tlp;
        $email             =$karyawan->email;
        $alamat         =$karyawan->alamat;
    }
    
?>

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
    <h1>Form Tambah Karyawan</h1>

    <div id="body">

        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('pesan'); ?>
        <?php echo form_open('karyawan/edit_karyawan/'.$karyawan->id) ?>

        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?php echo form_input('nama_lengkap', $nama_lengkap); ?></td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo form_input('jenis_kelamin', $jenis_kelamin); ?></td>
            </tr>

            <tr>
                <td>Nomor Telepon/HP</td>
                <td>:</td>
                <td><?php echo form_input('no_tlp', $no_tlp); ?></td>
            </tr>

            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo form_input('email', $email); ?></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo form_textarea('alamat', $alamat); ?></td>
            </tr>


            <tr>
                <td colspan="3"><?php echo form_submit('mysubmit', 'Simpan'); ?></td>
            </tr>
        </table>

        <?php echo form_close() ?>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
