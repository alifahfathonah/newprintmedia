<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
</head>
<body>

<div class="container">
    <div class="main-buku">
    <div class="row">
        <div class="col-sm-12" style="margin-bottom: 10px;">
            <div class="card">
                <div class="card-header text-white">
                    Villages 
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered display" id="table" >
                    <thead> <!-- ABU ABU -->
                        <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>DISTRICT ID</th>
                        <th>NAME </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    
                    ?>
                        <tr>
                            <td><?php //echo $no++; ?></td>
                            <td><?php //echo $row['id']; ?></td>
                            <td><?php //echo $row['district_id']; ?></td>
                            <td><?php //echo $row['name']; ?></td>
                        </tr>
                    
                    </tbody>
                </table>
                </div>
                <select name="" id="">
                <?php
                $this->db->from('provinces');
                //$this->db->limit(50);
                $data = $this->db->get();
                $data = $data->result_array();
                foreach($data as $row) {
                ?>
                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#table').DataTable();
} );

$('#table').DataTable( {
    paging: true,
    scrollY: 400
} );
</script>
</body>
</html>