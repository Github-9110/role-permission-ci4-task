
<body>
<?= $this->include('header')?>
<?= $this->include('sidebar')?>
<!-- Start Role Add -->

<div class="card col-lg-10" style="    position: relative; left: 255px; bottom: 450px;">
        <div class="card-body">
        <h1 class=" title display-8">User List</h1>
        </div>
        <div class="row col-lg-12">
        <?php if (session()->getFlashdata('added') !== NULL) { ?>
                <div class="col-lg-12 alert alert-success alert-dismissible fade show text-center mb-3" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    <?php echo session()->getFlashdata('added'); ?>
            </div>
        <?php } ?>
        <?php if (session()->getFlashdata('deleted') !== NULL) { ?>
            <div class="col-lg-12 alert alert-danger alert-dismissible fade show text-center mb-3" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                <?php echo session()->getFlashdata('deleted'); ?>
            </div>
        <?php } ?>
        </div>
       
        <div class="row">
            <div class="col-12">
            <div class="d-flex flex-row">
            <?php if(!empty($perm) && in_array(1,$perm)) {?>
            <div class="col-sm-4">
                <a href="<?= base_url('form')?>" class="text btn btn-primary mb-2">Form</a>
            </div>
            <?php }?>
            </div>
                <div class="xxxx">
                    <div class="xx">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                         <thead class="table-light">
                         <tr>
                            <th>S No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                         </thead>
                         <tbody>
                            <?php $i = 1;
                          foreach($records as $each) {?>
                            <tr>
                                <td> <?= $i ?></td>
                                <td><?= $each['name'] ?></td> <br>
                                <td><?= $each['email'] ?></td> <br>
                                <td><?= $each['mobile'] ?></td> <br>
                                <td><?= $each['rname'] ?? "By Default super admin and create roles" ?></td><br>
                                <td>
                                    <div class="row">
                                    <?php if(!empty($perm) && in_array(2,$perm)) {?>
                                    <div>
                                        <a class="text-dark btn m-4  bg-warning rounded" href="<?= base_url('edit/'.$each['id'])?>">Edit</a>
                                    </div>
                                    <?php } ?>
                                    <?php if(!empty($perm) && in_array(3,$perm)) {?>
                                    <div>
                                        <a class="text-dark btn m-4  bg-danger rounded" href="<?= base_url('remove/'.$each['id'])?>" >Delete</a>
                                    </div>
                                    <?php } ?>
                                    </div>
                                </td>
                                
                            </tr>
                            <?php $i++; } ?>
                           </tbody>
                           
                         </table>
                    </div>
                </div>
            </div>
          </div>

</div>

<!-- End -->
<?= $this->include('script')?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#datatable').DataTable( {
        dom: 'Bfrtip',
        "searching":false,
        
    } );
} );

</script> 

<script>
$(document).ready(function(){
    $('br').remove();
});
</script>
</body>
