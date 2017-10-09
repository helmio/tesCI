<div id="container">
    <h1>Selamat datang, <?php echo $this->session->userdata('username') ?></h1>

    <div id="body">
        <?php $this->load->view('admin/menu') ?>
        </p>Ini adalah halaman admin</p>

    </div>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> Seconds</p>
</div>