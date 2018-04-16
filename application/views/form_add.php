<html>
	<head>
    	<title>Tambah Artikel</title>
    </head>
    <body>
    	<!--<form method="POST" action="<?php echo base_url()."crud/do_insert"; ?>"> -->
       <?php echo form_open_multipart('artikel_novel/do_insert')?>
        <table>
            <tr>
            	<td>Judul Novel</td>
                <td><textarea name="judul_novel"></textarea></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td><input type="text" name="genre"/></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="thn_terbit"/></td>

            </tr>
            <tr>
            	<td>Penulis</td>
                <td><textarea name="penulis"></textarea></td>
            </tr>
            <tr>
                <td>Sinopsis</td>
                <td><textarea name="sinopsis"></textarea></td>
            </tr>
            <tr>
                <td>Upload Gambar</td>
                <td><input type="file" name="userfile" size="20" /></td>
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

