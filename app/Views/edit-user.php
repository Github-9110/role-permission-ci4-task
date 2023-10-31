
<body>
    <?= $this->include('header')?>
<?= $this->include('sidebar')?>
<!-- Start Role Add -->

<div class="container mt-4 bg-secondary">
    
    <?php $validation = \Config\Services::validation(); ?>
    <div class="col-lg-12">
    <?php if(session()->getFlashdata('update')==true){ ?>
      <div class="col-lg-10 alert alert-success">
        <?= session()->getFlashdata('update') ?>
      </div>
      <?php }?>

      <?php if(session()->getFlashdata('missing')==true){ ?>
      <div class="col-lg-10 alert alert-danger">
        <?= session()->getFlashdata('missing') ?>
      </div>
      <?php }?>

      <div class="col-lg-12">
            <?php if (session()->getFlashdata('exist') !== NULL) { ?>
                <div class="col-lg-12 alert alert-warning alert-dismissible fade show text-center mb-3" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    <?php echo session()->getFlashdata('exist'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
        <div class="row">
            <h2 class="text m-4 font-weight-bold">Update Registration Form</h2>
            <div class="mt-5 mb-2" style="margin-left:400px">
                <a class="btn btn-primary" href="<?php echo base_url('/alldata')?>" >Back</a>
            </div>
        </div>

        <form action="<?php echo base_url('/update/'.$data['id'])?>"  method="post" enctype="multipart/form-data">
        <div class="form-grouprow">
            <label for="name" class="col-sm-2 col-form-label">name</label>
            <div class="col-sm-10">
            <input type="hidden" class="form-control" name="name" id="name" placeholder="name" value="<?= $data['id']?>">
            <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?= $data['name']?>">
            </div>
            <?php if($validation->getError('name')) {?>
            <div class='alert alert-danger mt-2 col-sm-10'>
              <?= $error = $validation->getError('name'); ?>
            </div>
        <?php }?>
        </div>
        <div class="form-group ">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="Email" placeholder="Email" value="<?= $data['email']?>">
            </div>
            <?php if($validation->getError('email')){ ?>
              <div class="alert alert-danger mt-2 col-sm-10">
                <?= $validation->getError('email')?>
              </div>
            <?php }?>
        </div>
        <div class="form-group">
            <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="phone" id="inputPassword" placeholder="Phone" value="<?= $data['mobile']?>">
            </div>
            <?php if($validation->getError('phone')){?> 
                <div class="alert alert-danger mt-2 col-sm-10">
                     <?= $validation->getError('phone')?>
                </div>
            <?php }?>
        </div>

        <div class="form-group ">
            <label for="password" class="col-sm-2 col-form-label">password</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="password" id="password" value="<?= $data['password']?>" placeholder="Create password">
            </div>
            <?php if($validation->getError('password')){ ?>
              <div class="alert alert-danger mt-2 col-sm-10">
                <?= $validation->getError('password')?>
              </div>
            <?php }?>
        </div>

        <div class="form-group">
        <label for="cars">Choose Role:</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-control">
            <option value="" >Choose Roles</option>
                <?php foreach($roles as $role){?>
                    <option value="<?= $role['id']?>" <?php echo ($role['id'] == $data['role_id']) ? 'selected' : ''; ?>>
                    <?= $role['role']?></option> 
            <?php } ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
            <input type="submit" class="btn btn-primary" id="submit" value="Update" placeholder="save">
            </div>
        </div>
    </form> 
    </div>
<!-- End -->
<?= $this->include('script')?>
</body>
