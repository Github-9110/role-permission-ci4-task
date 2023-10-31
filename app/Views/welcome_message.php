<?= $this->include('header')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <style>
    a:hover{
            text-decoration:none;
          }
  </style>
</head>
<body>
    <div class="container mt-4">
       <div class="row col-lg-12">
             <?php if (session()->getFlashdata('added') !== NULL) { ?>
                    <div class="col-lg-12 alert alert-success alert-dismissible fade show text-center mb-3" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        <?php echo session()->getFlashdata('added'); ?>
                    </div>
                <?php } ?>
              <br/>

              <?php if (session()->getFlashdata('deleted') !== NULL) { ?>
                    <div class="col-lg-12 alert alert-danger alert-dismissible fade show text-center mb-3" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        <?php echo session()->getFlashdata('deleted'); ?>
                    </div>
                <?php } ?>
              <br/>
       </div>

        <div class="form-group">     
        <div class="d-flex flex-row">
        <div class="col-sm-4">
              <a href="<?= base_url('form')?>" class="text btn btn-primary">Form</a>
           </div>

        </div>

         <div class="col-lg-12 mt-4">
            <table id="myTable">
                <thead>
                <tr>
                    <th>S No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php 
                 $i=1;
                foreach($records as $each) {?>
                <tr>
                    <td> <?= $i ?></td>
                    <td><?= $each['name'] ?></td> <br>
                    <td><?= $each['email'] ?></td> <br>
                    <td><?= $each['mobile'] ?></td> <br>
                    <td><img src="<?= base_url('assets/uploads/'.$each['img_name']) ?>" alt="img" hieght="150" width="150"></td><br>
                    <td>
                        <div class="row">
                        <div>
                            <a class="text-dark font-weight-bold m-4 px-4 py-3 bg-danger rounded" href="<?= base_url('edit/'.$each['id'])?>">Edit</a>
                        </div>
                        <div>
                            <a class="text-dark font-weight-bold m-4 p-3 bg-warning rounded" href="<?= base_url('remove/'.$each['id'])?>" >Delete</a>
                        </div>
                        </div>
                    </td>
                    
                </tr>
                <?php $i++; } ?>
            </table>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
      <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        $('#myTable_filter').addClass('d-none');
        } );
      </script>

</body>
</html>
