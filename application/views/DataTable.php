
<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>


    <style type="text/css">
    	select.input-sm{
    		line-height: 20px;
    	}
    </style>
    <script type="text/javascript">
    	$(document).ready(function() {
		    $('#example').DataTable();
		} );
    </script>
    
    </head>
    <body>
        <div class="container">
        <h1>Data Artikel Novel</h1>
        <?php echo "<h2>".$this->session->flashdata('pesan')."</h2>" ?>
        <table id="example" class="table table-hover">
            <thead>
				<tr>
					<th>Id</th>
					<th>Judul Novel</th>
					<th>Genre</th>
	                <th>Tahun Terbit</th>
	                <th>Penulis</th>
	                <th>Jenis Kategori</th>
	                <th>Sinopsis</th>
	                <th>Image</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($result as $data) { ?>
		            <tr>
		            	<td><?php echo $data['id']; ?></td>
		                <td><?php echo $data['judul_novel']; ?></td>
		                <td><?php echo $data['genre']; ?></td>
		                <td><?php echo $data['thn_terbit']; ?></td>
		                <td><?php echo $data['penulis']; ?></td>
		                <td><?php echo $data['jenis_cat']; ?></td>
		                <td><?php echo $data['sinopsis']; ?></td>
		                <td><?php echo $data['img']; ?></td>
		                <td>	
		                	<a href="<?php echo base_url()."Data/preview/".$data['id']; ?>"><button class="btn btn-primary">Detail</button></a>
		                	<a href="<?php echo base_url()."Data/edit/".$data['id']; ?>"><button class="btn btn-warning">Edit</button></a>
		                	<a href="<?php echo base_url()."Data/do_delete/".$data['id']; ?>"><button class="btn btn-danger">Delete</button></a>
		                </td>
		            </tr>
		            <?php } ?>
				</tbody>
        </table>
    </div>
    </body>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
</html>