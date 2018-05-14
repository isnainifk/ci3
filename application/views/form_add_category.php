<html>
	<head>
    	<title>Tambah Kategori</title>
    </head>
    <body>
    	<!--<form method="POST" action="<?php echo base_url()."crud/insert_category"; ?>"> -->
       <?php echo form_open_multipart('artikel_novel/insert_category')?>
        <table>
            <tr>
            	<td>Id Kategori</td>
                <td><textarea name="id"></textarea></td>
            </tr>
            <tr>
                <td>Nama Kategori</td>
                <td><input type="text" name="name"/></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi"/></td>

            </tr>
            
            <br /><br />
            <tr>
            	<td>
                </td>
                <td><input type="submit" name="btnSubmit" value="Simpan"/></td>
            </tr>
           
        </table>
        </form>
    </body>
</html>

