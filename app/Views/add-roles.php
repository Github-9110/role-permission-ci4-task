
<body>
    <?= $this->include('header')?>
<?= $this->include('sidebar')?>
<!-- Start Role Add -->

        <div class="card col-lg-10" style="    position: relative; left: 255px; bottom: 450px;">
        <div class="card-body">
        <?php if (session()->getFlashdata('Addition') !== NULL) { ?>
        <div class="alert alert-danger alert-dismissible fade show text-center mb-3" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            <?php echo session()->getFlashdata('Addition'); ?>
        </div>
        <?php } ?>
        <form class="needs-validation" method="POST" action="<?php echo site_url('insert-role'); ?>" novalidate>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Role name</label>
                            <input type="hidden" class="form-control" name="roleurl" id="roleurl" value="<?php echo base_url() ?>/Roles/alreadyrole" required>
                            <input type="text" class="form-control" name="role" id="role" placeholder="Role name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <span id="rolealert"></span>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="mb-6">
                        <?php foreach($section as $value){  ?>
                            
                            <input type="checkbox" class=""  name="section[]" value="<?php echo $value['id'] ?>" placeholder="">
                            <label for="validationCustom01" class="form-label m-3"><?php echo $value['section'] ?></label>
                            
                            <?php } ?>
                            <div class="valid-feedback">
                                Looks good!
                            </div> 
                            <span id="sectionalert"></span>

                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                        </div>
            </form>
        </div>
    </div>

<!-- End -->
<?= $this->include('script')?>
</body>
