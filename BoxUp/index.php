<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Box Up!</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <script type="module" src="../js/tailwind.config.mjs"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</head>

<body class="bg-[#FFFEE6]" style="background-color: #FFFEE6; ">
  <main class="h-screen" style="height: 100vh">
    <header class="!bg-[#000] h-16 flex items-center justify-between pr-10 pl-10 p-2 sticky top-0">
      <div>
        <h1 class="text-white font-medium text-2xl border-r border-white pr-2">BoxUP</h1>
      </div>
      <div>
        <a href="./src/pages/usuario/login.php">
          <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-1">Entre / cadastra-se</button>
        </a>
      </div>
    </header>

    <div class="div1">
      <div class="d-flex flex-column align-items-start w-50       flex flex-col  items-start w-[50%]">
        <h1 class="text-start text-[45px] font-bold m-0 p-0 " style="
        font-size: 45px;
        font-weight:600;
            margin: 0;
            padding: 0;
          ">
          Agende sua mudança <br> aqui na
          <span class="text-blue-700">BoxUp</span>!
        </h1>
        <div class=" text-black d-flex justify-content-start text-start opacity-80 text-[20px] mt-[20px] font-semibold flex justify-start" style="
            opacity: 80%;
            font-size: 20px;
            margin-top: 20px;
            font-weight:600;
            text-shadow: none !important;
          ">
          Preparar-se para uma nova etapa da vida nunca foi tão fácil: descubra, agende e realize com tranquilidade sua mudanças residenciais, garantindo conforto e confiabilidade em cada passo do processo. <br />
       
        </div>
        <a href="./src/pages/usuario/login.php">
          <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-5">Mostre-me mais</button>
        </a>
      </div>
      <div class="imagemlanding"></div>
    </div>
  </main>
</body>

</html>
<style>
  .colorblue {
    background-color: #2E89C0 !important;
    color: #e5f0f9 !important;
  }

  .div1 {
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 1);
    width: 80%;
    height: 90vh;
    max-width: 80%;
    margin: 0 auto;
    text-align: center;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
  }

  body {
    /* background-image: url("./assets/images/BackgroundImage.jpeg");
     background-size: cover;  */
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #121824;
    overflow-x: hidden;
  }

  .logo {
    display: flex;
    padding: 0px 100px;
    height: 100px;
  }

  .botao {
    position: absolute;
    top: 40px;
    right: 80px;
  }

  h1,
  h3,
  h5 {
    color: black;
    text-shadow: none;
  }

  p {
    text-shadow: none;
  }

  ::-webkit-scrollbar {
    width: 0px;
  }

  ::-webkit-scrollbar-thumb {
    background-color: #2e89c0;
  }

  ::-webkit-scrollbar-track {
    background-color: #121824;
  }

  .imagemlanding {
    width: 40%;
    height: 50%;
    background-image: url("./src/images/landing.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
  }
</style>
<script>

</script>

</html>