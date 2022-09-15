<!DOCTYPE html>
<html lang="tr" dir="ltr">
/
<!--@author ErDeM <admin@erdemsoft.com>-->

<head>
	<meta charset="utf-8">
	<title>TC Kimlik Bilgileri Doğrulama</title>
	<link rel="stylesheet" href="css.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="izitoast/iziToast.min.css">
	<script src="izitoast/iziToast.min.js" type="text/javascript"></script>
</head>

<body class="body">

	<div class="div">
		<h2 style="text-align:center;">
			<?php
			error_reporting(0);
			if ($_GET['durum'] == "ok") { ?>
				<script>
					iziToast.success({
						title: 'Başarılı',
						message: 'Bilgiler Doğru!',
						position: "topCenter"
					});
				</script>
			<?php } elseif ($_GET['durum'] == "no") { ?>
				<script>
					iziToast.error({
						title: 'Başarısız',
						message: 'Bilgiler Yanlış!',
						position: "topCenter"
					});
				</script>
			<?php } ?>
		</h2>

		<!-- TC Kimlik Doğrulama Formu -->
		<form action="fonksiyon.php" method="POST">
			<div style="width:500px;" class="mb-9">
				<input class="form-control" type="text" required="" name="TC" maxlength="11" placeholder="TC Kimlik Numaranız"><br>
				<input class="form-control" type="text" required="" name="AD" placeholder="Adınız"><br>
				<input class="form-control" type="text" required="" name="SOYAD" placeholder="Soyadınız"><br>
				<input class="form-control" type="text" required="" name="DOGUMYILI" maxlength="4" placeholder="Doğum Yılınız"><br>
				<button class="btn btn-primary" type="submit" name="tcKimlikSorgula">Formu Gönder</button>
			</div>
		</form>
	</div>
	<footer class="footer">
		<h1>Erdem SOFT SUNAR...</h1>
	</footer>
</body>
/
<!--@author ErDeM <admin@erdemsoft.com>-->

</html>