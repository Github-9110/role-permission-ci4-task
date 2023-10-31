
<body>
<?= $this->include('header')?>
<?= $this->include('sidebar')?>
<!-- Start Role Add -->

<div class="card col-lg-10" style="    position: relative; left: 255px; bottom: 450px;">
        <div class="card-body">
        <h1 class=" title display-8">Role</h1>
        </div>
        <?php if (session()->getFlashdata('Addition') !== NULL) { ?>
        <div class="alert alert-success alert-dismissible fade show text-center mb-3" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            <?php echo session()->getFlashdata('Addition'); ?>
        </div>
        <?php } ?>
        <?php if (session()->getFlashdata('Deleted') !== NULL) { ?>
            <div class="alert alert-danger alert-dismissible fade show text-center mb-3" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                <?php echo session()->getFlashdata('Deleted'); ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                         <thead class="table-light">
                         <tr> 
                            <th class="align-middle">Serial No.</th>
                            <th class="align-middle">Role</th>
                            <th class="align-middle">Permission</th>
                            <th class="align-middle">Action</th>
                         </tr>
                         </thead>
                         <tbody>
                            <?php $i = 1;
                            foreach ($posts as $post) { ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $post['role']; ?></td>
                                <td><?= $permission ?></td>
                                <td>
                                    <div>
                                        <a href="<?= base_url() ?>edits/roles/<?= $post['id']; ?>" class="d-none btn btn-warning">Edit</a>
                                        <a href="<?= base_url() ?>/delete/roles/<?= $post['id']; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                           </tbody>
                           <input type="hidden" id="url" class="form-control" value="<?= base_url() ?>Roles/deleteroles/">
                         </table>
                    </div>
                </div>
            </div>
          </div>

</div>

<!-- End -->
<?= $this->include('script')?>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#datatable').DataTable( {

    } );
} );
</script> 
</body>
