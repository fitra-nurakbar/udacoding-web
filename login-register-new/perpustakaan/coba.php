<?php include('connect.php'); ?>
			<select name="id_petugas">
						<option>--Pilih id penjaga--</option>
						<?php
						include 'connect.php';
						$sqlpetugas = mysql_query("SELECT id_petugas from petugas ORDER BY id_petugas ASC");
						if(mysql_num_rows($sqlpetugas) != 0){
							while($data = mysql_fetch_assoc($sqlpetugas)){
								echo '<option>'.$data['id_petugas'].'</option>';
							}
						}
						?>
					</select>
		