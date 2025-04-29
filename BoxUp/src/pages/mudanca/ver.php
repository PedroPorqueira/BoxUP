<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
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
                    const total = element.preco * element.km;
                    html += `
                    <div class="max-w-[30rem] p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center gap-2">
                            <img src="/BoxUp/src/images/caminhaosemfundo.png" width="100" alt="Perfil" />
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">\${element.endereco_final}</h5>
                        </div>
                        <div class="flex flex-col gap-2 mt-4">
                            <div>
                                <label class="block mb-1 text-sm font-normal dark:text-gray-400">Endereço inicial:</label>
                                <input disabled value="\${element.endereco_inicial}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2 dark:bg-gray-900 dark:border-black dark:text-gray-300" />
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-normal dark:text-gray-400">Endereço final:</label>
                                <input disabled value="\${element.endereco_final}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2 dark:bg-gray-900 dark:border-black dark:text-gray-300" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 mt-3">
                            <div>
                                <label class="block mb-1 text-sm font-normal dark:text-gray-400">Valor da mudança:</label>
                                <input disabled value="R$ \${total}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2 dark:bg-gray-900 dark:border-black dark:text-gray-300" />
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-normal dark:text-gray-400">Status da mudança:</label>
                                <input disabled value="\${element.status == 0 ? 'Em andamento' : element.status == 1 ? 'Concluída' : 'Cancelada'}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2 dark:bg-gray-900 dark:border-black dark:text-gray-300" />
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="block mb-1 text-sm font-normal text-gray-900 dark:text-gray-400">Objetos a serem transportados:</label>
                            <textarea disabled rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-900 dark:border-black dark:text-gray-300">\${element.objetos}</textarea>
                        </div>
                        <div class="mt-3">
                            <label class="block mb-1 text-sm font-normal text-gray-900 dark:text-gray-400">Observações:</label>
                            <textarea disabled rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-900 dark:border-black dark:text-gray-300">\${element.observacoes}</textarea>
                        </div>
                    </div>`;
                });
                $("#container").html(html);
            } else {
                $("#container").html("<p class='text-2xl font-bold text-white'>Nenhuma mudança agendada <span class='text-blue-700'>ainda!</span></p>");
            }
        },
        error: (error) => {
            console.log(error);
        }
    });
</script>

<div class="min-h-screen bg-[#191825] py-12 px-6">
    <h1 class="text-[35px] font-bold text-blue-700 mb-6">Ver as minhas mudanças</h1>
    <div id="container" class="flex flex-wrap gap-5">
        <!-- Mudancas serao renderizadas aqui -->
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