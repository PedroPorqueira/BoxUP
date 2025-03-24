<?php
session_start();

// include_once('../header.php');

?>

<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="/BoxUp/src/js/jquery.min.js"></script>
  <title>BoxUp!</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</head>

<?php

include_once('../toast.php');

?>

<body>
  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-white">
            Logar
          </h1>
          <form class="space-y-4 md:space-y-6" action="#">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
              <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="exemplo@gmail.com" required="">
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
              <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
            </div>
            <button type="button" id="logar" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Entrar</button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              Não tem uma conta? <a href="./cadastro.php" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Cadastrar</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>


  <script>
    $("#logar").click(() => {
      const email = $('#email').val()
      const senha = $('#password').val()

      if (!email) {
        showToast();
        $('#message').html("Insira o email!")
      } else if (!senha) {
        showToast();
        $('#message').html('Insira a senha!')
      } else {
        $.ajax({
          url: "/BoxUp/src/api/controller/LoginController",
          method: "POST",
          data: {
            email,
            senha
          },
          success: (data) => {
            data = JSON.parse(data);

            swal.fire({
              title: "Sucesso",
              html: data.message,
              icon: "success",
              customClass: {
                            popup: 'my-swal-popup-class',
                            confirmButton: 'my-confirm-button-class'
                        }
            }).then(() => {
              window.location.href = window.location.href.replace('usuario', 'home').replace('login', 'home')
            })
          },
          error: (error) => {
            console.log(error)
            swal.fire({
              title: "Erro",
              html: "Erro ao logar",
              icon: "error",
              customClass: {
                            popup: 'my-swal-popup-class',
                            confirmButton: 'my-confirm-button-class'
                        }
            })
          }
        })
      }
    })
  </script>

  <style>
    .my-swal-popup-class {
    background-color: #374151;
    color: white;
  }

  .my-confirm-button-class {
    background-color: #2563eb;
    color: black;
  }
  </style>

  <?php

  include_once('../footer.php');

  ?>