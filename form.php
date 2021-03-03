<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="icon" href="logo.png" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="tailwind.css" />
  <title>Click Dental Design - App</title>
</head>

<body>
  <div class="flex justify-end mr-12 mt-10">
    <img src="logo2.png" class="border-solid border-2 border-black rounded-2xl shadow-lg w-48 h-28" />
  </div>

  <nav class="no-underline flex flex-wrap justify-center cursor-pointer mb-12">
    <div style="background-color: #00c2cd" class="flex flex-wrap w-80 text-white text-xl font-bold rounded-3xl justify-center">
      <div class="hover:underline m-4"><a href="index.php">Inicio</a></div>
      <div class="hover:underline m-4"><a href="manual.php">DOCS</a></div>
      <div class="hover:underline m-4"><a href="form.php">Generar</a></div>
    </div>
  </nav>

  <form action="generate_file.php" method="POST">

  <div>
    <label for="nombre"></label>
    <input type="text" name="nombre" >
  </div>

  <button type="submit" >Enviar</button>
  </form>
        
</body>
<footer class="font-serif font-white flex mt-10 justify-center">
      <div
        class="text-white text-ml rounded-2xl w-96 h-8 text-center"
        style="background-color: #2f2785"
        ;
      >
        App Dental Click Design -- Derechos 2021
      </div>
    </footer>

</html>