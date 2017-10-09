<?php echo $this->session->flashdata('pesan') ?>
<?php $this->load->helper('url'); ?>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th><?php echo anchor('active_record/tambah_user','Tambah') ?></th>
        </tr>
        <tbody>
            <?php $i=0; foreach($users as $row) { $i++; ?>
                <tr>
                    <td> <?php echo $i ?></td>
                    <td> <?php echo $row->username ?></td>
                    <td> <?php echo anchor('active_record/update_user/'.$row->id,'Update') ?>
                        <?php echo anchor('active_record/delete_user/'.$row->id,'Hapus',
                        array('onClick'=>'return confirm(\'apakah anda yakin ingin hapus \')'))?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </thead>
    </table>