

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/custom.js')?>"></script>
</head>
<body>
    <div class="container mt-4">
    <div class="row col-lg-12">
                    <div class="col-lg-12 alert alert-success alert-dismissible fade show text-center mb-3 d-none"  role="alert">
                        <i id="inserted" class="mdi mdi-check-all me-2"></i>
                    </div>
              <br/>
       </div>
    <?php $validation = \Config\Services::validation(); ?>
        <div class="row col-lg-8 m-auto">
            <h2 class="text m-4 font-weight-bold">Login Form</h2>
        </div>

    <div class="col-lg-10 m-auto">
    <form action="<?php echo base_url('/logindata')?>"  method="post" enctype="multipart/form-data">
        <div class="form-group ">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="aemail" placeholder="Email">
            <?php if($validation->getError('email')){?> 
                <div class="alert alert-danger mt-2 col-sm-12">
                     <?= $validation->getError('email')?>
                </div>
            <?php }?>
            </div>
        </div>

        <div class="form-group">
            <label for="Phone" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="password" id="password" placeholder="Enter Your Password">
            <?php if($validation->getError('password')){?> 
                <div class="alert alert-danger mt-2 col-sm-12">
                     <?= $validation->getError('password')?>
                </div>
            <?php }?>
            </div>
        </div>

        <div class="form-group row">
            
            <div class="col-sm-6">
            <input type="submit" class="btn btn-primary" id="ajaxsubmit" value="Login" placeholder="save">
            </div>
           
            <div class="col-sm-6 mb-4" style="margin-left:530px">
                <a class="btn btn-primary" href="<?php echo base_url('/form')?>">Registration</a>
            </div>
            
        </div>
    </form>
    </div> 
    </div>

</body>
</html>