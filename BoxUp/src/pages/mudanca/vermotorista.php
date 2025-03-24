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
    function abrirmodal() {
        var html = `<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0" selected>Em andamento</option>
                        <option value="1">Concluida</option>
                        <option value="2">Cancelada</option>
                    </select>`
        swal.fire({
            title: 'Editar mudança',
            html: html,
            icon: 'info',
            customClass: {
                popup: 'my-swal-popup-class',
                confirmButton: 'my-confirm-button-class'
            }
        })
    };

    function buscaMudancas() {
        $.ajax({
            url: "/BoxUp/src/api/controller/ListarMudancaMotorista.php",
            method: "GET",
            success: (data) => {
                data = JSON.parse(data);
                let html = "";
                console.log(data)

                if (data.data.length > 0) {

                    data.data.forEach(element => {
                        const total = element.preco * element.km

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
                <button onClick="abrirmodal(${element.id})" type="button" class="px-2 py-2 mt-5 mr-2 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800  focus:outline-none  rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 ">
                    <img src="/BoxUP/src/images/pencil.png" width="20" />
                </button>
                <button onClick="excluirmudanca(${element.id})" type="button" class="px-2 py-2 text-sm font-medium text-white inline-flex items-center bg-red-700 hover:bg-red-800  focus:outline-none  rounded-lg text-center dark:bg-red-600 dark:hover:bg-red-700 ">
                    <img src="/BoxUP/src/images/trash.png" width="20" />
                </button>

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
    }


    function excluirmudanca(id) {
        var html = `<div class="flex gap-3"><button type="button" class="w-full text-white  font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700" id="excluir">Excluir</button>
                    <button type="button" class="w-full text-white  font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700" id="cancelar">Cancelar</button></div>`

        swal.fire({
            title: 'Tem certeza que quer excluir a mudança?',
            html: html,
            icon: 'info',
            showConfirmButton: false,
            customClass: {
                popup: 'my-swal-popup-class',
                confirmButton: 'my-confirm-button-class'
            }
        })


        $("#excluir").click(() => {
            $.ajax({
                url: "/BoxUp/src/api/controller/ExcluirMudanca.php",
                method: "POST",
                data: {
                    id
                },
                success: () => {
                    swal.fire({
                        icon: "success",
                        title: "Mudança deletada com sucesso",
                        customClass: {
                            popup: 'my-swal-popup-class',
                            confirmButton: 'my-confirm-button-class'
                        }
                    })

                    buscaMudancas();
                },
                error: (error) => {
                    swal.fire({
                        icon: "error",
                        title: data.data.message,
                        customClass: {
                            popup: 'my-swal-popup-class',
                            confirmButton: 'my-confirm-button-class'
                        }
                    })
                }
            })
        })

        $("#cancelar").click(() => {
            swal.close()
        })
    };




    function abrirmodal(id) {
        var html = `<div style="display: flex; flex-direction: column; align-items: start" class="flex flex-column items-start">
                        <label for="selectdms" class="block mb-2 text-sm font-medium text-gray-900">Alterar status:</label>
                        <select id="selectdms" class="border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-300 dark:border-gray-200 dark:placeholder-gray-700 dark:text-gray-700">
                            <option value="0" selected>Em andamento</option>
                            <option value="1">Concluida</option>
                            <option value="2">Cancelada</option>
                        </select>
                    </div>`
        swal.fire({
            title: 'Editar mudança',
            html: html,
            icon: 'info',
            customClass: {
                            popup: 'my-swal-popup-class',
                            confirmButton: 'my-confirm-button-class'
                        }
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "/BoxUp/src/api/controller/EditarMudanca.php",
                    method: "POST",
                    data: {
                        status: $("#selectdms").val(),
                        id
                    },
                    success: (data) => {
                        swal.fire({
                            icon: "success",
                            title: "Status editado!",
                            customClass: {
                            popup: 'my-swal-popup-class',
                            confirmButton: 'my-confirm-button-class'
                        }
                        })

                        buscaMudancas();
                    },
                    error: (error) => {
                        console.log(error)
                        swal.fire({
                            icon: "error",
                            title: error.error,
                            customClass: {
                            popup: 'my-swal-popup-class',
                            confirmButton: 'my-confirm-button-class'
                        }
                        })

                    }
                })
            }
        })
    };

    buscaMudancas();
</script>

<div class="flex flex-col items-start bg-[#191825]">
    <div class="text-start text-[35px] font-bold text-blue-700 mt-[5%] ml-[5%]">Ver as minhas mudanças</div>
    <div id="container" class="flex w-full mt-6 h-full items-center gap-5 px-16 flex-wrap">

    </div>
</div>


<?php include_once("../footer.php") ?>


</html>
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