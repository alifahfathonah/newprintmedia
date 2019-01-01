<!DOCTYPE html>
<html>
<head>
  <!-- SRC include  -->
  <?php $this->load->view('Developer/head'); ?>
  <title>PrintMedia-Admin | Universitas</title>
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php $this->load->view('Developer/navbar');?>

 <!--sidebar load  -->
 <?php $this->load->view('Developer/sidebar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a onclick="add_book()" class="btn btn-block btn-outline-primary fa fa-plus tambah"></a></li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>" class="btn btn-danger">PDF</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>" class="btn btn-success">EXCEL</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>" class="btn btn-primary">SQL</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Universitas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Universitas</th>
                  <th>Kota</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $info) {?>
                <tr>
                  <td><?php echo $info['universitas_id'];?></td>
                  <td><?php echo $info['nama_univ'];?></td>
                  <td><?php echo $info['kota'];?></td>
                  <td>
                   <a  class="fa fa-times remove" id="remove" data-id="<?php echo $info['universitas_id']; ?>" href="javascript:void(0)" ></a>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Universitas</th>
                  <th>Kota</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('Developer/footer'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

 

<!-- Script include  -->
<?php $this->load->view('Developer/script'); ?>
<script>
	$('.remove').click(function(e){
			
			var productId = $(this).data('id');
			SwalDelete(productId);
			e.preventDefault();
		});

  $.widget.bridge('uibutton', $.ui.button)


  $(function () {
    $("#example1").DataTable(
      {"stateSave": true}
    );
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
      
    });
    
  });



function SwalDelete(Id){
		
		swal({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			  
			preConfirm: function() {
			  return new Promise(function(resolve) {
			       
			     $.ajax({
			   		url: "<?php echo base_url('Developer/Hapus_Univ')?>/"+Id,
			    	type: 'POST',
			       	data: 'delete='+Id,
			       	dataType: 'json'
			     })
			     .done(function(response){
                    swal({
                         title: "Done",
                         text: "Success Delete Data",
                         timer: 1500,
                         showConfirmButton: false,
                         type: 'success'
                     }).then(function(){ 
                        window.location.reload(null,false);
                        }
                      );
			     })
			      .fail(function(){
			      	swal('Oops...', 'Something went wrong with ajax !', 'error');
			      });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

function add_book()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo base_url('Developer/Inputdb_Univ')?>";
      }
      else
      {
        //url = "<?php echo site_url('index.php/book/book_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               swal({
                         title: "Done",
                         text: "Success Add Data",
                         timer: 1500,
                         showConfirmButton: false,
                         type: 'success'
                     }).then(function(){ 
                        window.location.reload(null,false);
                        }
                      );
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                //alert('Error adding / update data');
                
                 swal({
                               text: "Mohon Lebih Teliti",
                               title: "<?php echo $this->session->flashdata('error_univ'); ?>",
                               showConfirmButton: true,
                               type: 'error'
                               });
            }
        });
    }
 
</script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Universitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="form" method="post">
           <div class="form-group">
             <label for="inputUniversitas">Nama Universitas</label>
             <?php $data1 = array('type' => 'text', 'id' => 'univ', 'name' => 'univ', 'class' => 'form-control', 'value' => set_value('univ'), 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')', 'autofocus' => 'true'); 
                          echo form_input($data1); 
              ?>
           </div>
           <div class="form-group">
             <label for="inputKota">Kota</label>
             <select class="form-control select2" style="width: 100%;" name="kota">
             <?php foreach ($kota as $info) {?>
             <option><?php echo $info['name'];?></option>
             <?php } ?>
             </select>
           </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save</button>
      </div>
    </div>
  </div>
  </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

</body>
</html>
