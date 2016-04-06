<html>
	<body>
		<form method="post" action="<?= base_url().'absensi/absenMahasiswa';?>">
			<table>
				<tr>
					<td>NIM</td>
					<td>:</td>
					<td><input name="nim"></td>
				</tr>
				<tr>
					<td>Id Ruang</td>
					<td>:</td>
					<td><input name="id_ruang"></td>
				</tr>
				<tr>
					<td><button type="submit">absen</button></td>
				</tr>
			</table>
		</form>
	</body>
</html>