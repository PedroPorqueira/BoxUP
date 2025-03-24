<?php
session_start();
?>


<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./assets/styles/styles.css" /> -->
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
</head>
<?php include_once("../header.php") ?>

<script>
    $.ajax({
        url: "/BoxUp/src/api/controller/ListarMudancaController.php",
        method: "GET",
        success: (data) => {
            data = JSON.parse(data);
            let html = "";

            if (data.data.length > 0) {
                data.data.forEach(element => {
                    const total = element.preco * element.km
                    console.log(total)

                    console.log(element)
                    html += `<div class="max-w-[30rem] p-6  mb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-start gap-2">
        <div class="flex w-[20]">
            <img src="/BoxUp/src/images/caminhaosemfundo.png" width="100" class="" alt="Perfil" />
        </div>
        <div>
            <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${element.endereco_final}</h5>
        </div>
    </div>
    <div class="flex gap-4 mt-4 w-full">
        <div class="w-full">
            <label for="nome" class="block mb-1 text-sm font-normal dark:text-gray-400">Endereço inicial:</label>
            <input type="text" disabled value="${element.endereco_inicial}" name="nome" id="nome" class="bg-gray-50  border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2 dark:bg-gray-900 dark:border-black dark:placeholder-gray-400 dark:text-gray-300" placeholder="" required="">
        </div>
        <div class="w-full">
            <label for="nome" class="block mb-1 text-sm font-normal dark:text-gray-400">Endereço final:</label>
            <input type="text" disabled value="${element.endereco_final}" name="nome" id="nome" class="bg-gray-50  border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2 dark:bg-gray-900 dark:border-black dark:placeholder-gray-400 dark:text-gray-300" placeholder="" required="">
        </div>
    </div>
    <div class="flex gap-4 mt-3">
        <div class="w-full">
            <label for="nome" class="block mb-1 text-sm font-normal dark:text-gray-400">Valor da mudança:</label>
            <input type="text" disabled value="R$ ${total}" name="nome" id="nome" class="bg-gray-50  border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2 dark:bg-gray-900 dark:border-black dark:placeholder-gray-400 dark:text-gray-300" placeholder="" required="">
        </div>
        <div class="w-full">
            <label for="nome" class="block mb-1 text-sm font-normal dark:text-gray-400">Statu da mudança:</label>
            <input type="text" disabled value="${element.status == 0 ? "Em andamento" : element.status == 1 ? "Concluída" : "Cancelada"}" name="nome" id="nome" class="bg-gray-50  border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2 dark:bg-gray-900 dark:border-black dark:placeholder-gray-400 dark:text-gray-300" placeholder="" required="">
        </div>
    </div>
    <div class="mt-3">
        <label for="message" class="block mb-1 text-sm font-normal text-gray-900 dark:text-gray-400">Objetos a serem transportados:</label>
        <textarea id="carac" disabled rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-900 dark:border-black dark:placeholder-gray-400 dark:text-gray-300 dark:focus:ring-blue-500 dark:focus:border-blue-500">${element.objetos}</textarea>
    </div>
    <div class="mt-3">
        <label for="message" class="block mb-1 text-sm font-normal text-gray-900 dark:text-gray-400">Observações:</label>
        <textarea id="carac" disabled rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-900 dark:border-black dark:placeholder-gray-400 dark:text-gray-300 dark:focus:ring-blue-500 dark:focus:border-blue-500">${element.observacoes}</textarea>
    </div>
</div>`;
                });
                $("#container").html(html)
            } else {
                $("#container").html("<p class='self-start text-2xl font-bold'>Nenhuma mudança agendada <spam class='text-blue-700'>ainda!</spam></p>")

            }

        },
        error: (error) => {
            console.log(error)
        }
    })
</script>

<div class="flex flex-col items-start bg-[#191825]">
    <div class="text-start text-[35px] font-bold text-blue-700 mt-[5%] ml-[5%]">Ver as minhas mudanças</div>
    <div id="container" class="flex w-full mt-6 h-full items-center gap-5 px-16 flex-wrap">

    </div>
</div>

<style>
      ::-webkit-scrollbar {
    width: 5px;
  }

  ::-webkit-scrollbar-thumb {
    background-color: #2e89c0;
  }

  ::-webkit-scrollbar-track {
    background-color: #121824;
  }
</style>

<?php include_once("../footer.php") ?>


</html>