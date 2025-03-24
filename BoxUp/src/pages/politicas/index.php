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

<body class="h-screen ">
    <main class="p-5 bg-gray-900">
        <div class="flex justify-center items-start my-2">
            <div class="w-full sm:w-10/12 md:w-1/2 my-1 pt-16">
                <h2 class="text-2xl font-semibold text-gray-100 mb-2">FAQ - Perguntas frequentes, termos, Etc.</h2>
                <h4 class="text-lg font-semibold text-gray-100 mb-2 opacity-80 mt-3">Bem-vindo ao nosso site de transporte de objetos. Antes de utilizar nossos serviços, pedimos que você leia atentamente e concorde com esta política. Ao utilizar nosso site, você está concordando com a política estabelecida.</h4>
                <ul class="flex flex-col">
                    <li class="bg-gray-800 text-gray-100 my-2 shadow-lg" x-data="accordion(1)">
                        <h2 @click="handleClick()" class=" flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>Limites de dimensões e peso das encomendas</span>
                            <svg :class="handleRotate()" class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20">
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div x-ref="tab" :style="handleToggle()" class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all">
                            <p class="p-3">
                                - Dimensões máximas de 80 cm x 80 cm x 80 cm <br>
                                - O peso máximo permitido é de até 120 kg. Porém a Empresa pode cobrar taxas adicionais em pacotes com peso cúbico ou físico superior a 50Kg. <br>
                                - A transportadora não exige dimensões nem peso mínimo.
                            </p>
                        </div>
                    </li>
                    <li class="bg-gray-800 text-gray-100 my-2 shadow-lg" x-data="accordion(2)">
                        <h2 @click="handleClick()" class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>Notas Fiscais</span>
                            <svg :class="handleRotate()" class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20">
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all" x-ref="tab" :style="handleToggle()">
                            <p class="p-3">
                                - Todas as encomendas precisam conter a nota fiscal NF 55 ou declaração de conteúdo.
                                <br>- O Valor Segurado deve ser igual à quantia informada na nota fiscal ou na declaração de conteúdo. Caso os valores sejam diferentes, a Empresa vai considerar o menor montante na hora de fazer o ressarcimento.
                                <br>- Envios realizados com declaração de conteúdo não são indenizados em casos de avaria e as indenizações por extravio têm teto máximo de R$ 1.000.
                                <br>- Encomendas acompanhadas por nota fiscal recebem indenização integral (valor máximo de R$ 30.000), seguindo as políticas da transportadora Empresa.
                            </p>
                        </div>
                    </li>
                    <li class="bg-gray-800 text-gray-100 my-2 shadow-lg" x-data="accordion(3)">
                        <h2 @click="handleClick()" class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>Aceitação dos Termos</span>
                            <svg :class="handleRotate()" class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20">
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all" x-ref="tab" :style="handleToggle()">
                            <p class="p-3">
                                Ao utilizar nosso site, você concorda integralmente com estes Termos de Uso. Se você não concorda com algum destes termos, por favor, não utilize nossos serviços.
                            </p>
                        </div>
                    </li>
                    <li class="bg-gray-800 text-gray-100 my-2 shadow-lg" x-data="accordion(4)">
                        <h2 @click="handleClick()" class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>Descrição dos Serviços</span>
                            <svg :class="handleRotate()" class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20">
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all" x-ref="tab" :style="handleToggle()">
                            <p class="p-3 ">
                                Nosso site de transporte de objetos oferece uma plataforma online para conectar remetentes e transportadoras. Os usuários podem enviar solicitações de transporte de objetos e receber cotações de transportadoras parceiras. No entanto, não somos uma transportadora e não nos responsabilizamos pelos serviços de transporte em si.
                            </p>
                        </div>
                    </li>
                    <li class="bg-gray-800 text-gray-100 my-2 shadow-lg" x-data="accordion(5)">
                        <h2 @click="handleClick()" class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>Registro e Conta de Usuário</span>
                            <svg :class="handleRotate()" class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20">
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all" x-ref="tab" :style="handleToggle()">
                            <p class="p-3">
                                Para utilizar nossos serviços, você precisa se registrar e criar uma conta de usuário. Você é responsável por fornecer informações precisas e atualizadas durante o processo de registro. Você também é responsável por manter a segurança de sua conta e senha, e por todas as atividades que ocorrerem sob sua conta.
                            </p>
                        </div>
                    </li>
                    <li class="bg-gray-800 text-gray-100 my-2 shadow-lg" x-data="accordion(6)">
                        <h2 @click="handleClick()" class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>Responsabilidades do Usuário</span>
                            <svg :class="handleRotate()" class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20">
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all" x-ref="tab" :style="handleToggle()">
                            <p class="p-3">
                                Ao utilizar nosso site, você concorda em:

                                <br>4.1- Fornecer informações precisas e atualizadas sobre os objetos a serem transportados;
                                <br>4.2- Respeitar as leis aplicáveis ao transporte de objetos;
                                <br>4.3- Não utilizar nosso site para atividades ilegais, fraudulentas ou que violem os direitos de terceiros;
                                <br>4.4- Não enviar conteúdo ofensivo, difamatório, obsceno ou prejudicial;
                            </p>
                        </div>
                    </li>
                    <li class="bg-gray-800 text-gray-100 my-2 shadow-lg" x-data="accordion(7)">
                        <h2 @click="handleClick()" class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>Cotações e Contratação</span>
                            <svg :class="handleRotate()" class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20">
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all" x-ref="tab" :style="handleToggle()">
                            <p class="p-3">
                            Nosso site oferece um sistema de cotações para ajudar os usuários a obterem preços e prazos de transporte. No entanto, as cotações fornecidas são apenas estimativas e podem variar com base em fatores como distância, peso, tamanho e outros detalhes relacionados ao transporte. A contratação do serviço de transporte é realizada diretamente entre o remetente e a transportadora selecionada.
                            </p>
                        </div>
                    </li>
                    <li class="bg-gray-800 text-gray-100 my-2 shadow-lg" x-data="accordion(8)">
                        <h2 @click="handleClick()" class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>Responsabilidade Limitada</span>
                            <svg :class="handleRotate()" class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20">
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all" x-ref="tab" :style="handleToggle()">
                            <p class="p-3 ">
                            Embora nos esforcemos para fornecer um serviço confiável, não podemos garantir a precisão, pontualidade ou qualidade dos serviços prestados pelas transportadoras parceiras. Não nos responsabilizamos por quaisquer danos diretos, indiretos, incidentais, consequenciais ou especiais resultantes do uso ou incapacidade de uso do nosso site ou dos serviços de transporte contratados.
                            </p>
                        </div>
                    </li>
                    <li class="bg-gray-800 text-gray-100 my-2 shadow-lg" x-data="accordion(9)">
                        <h2 @click="handleClick()" class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>Modificações dos Termos de Uso</span>
                            <svg :class="handleRotate()" class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20">
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all" x-ref="tab" :style="handleToggle()">
                            <p class="p-3 ">
                            Podemos atualizar ou modificar estes Termos de Uso periodicamente. Recomendamos que você verifique esta página regularmente para estar ciente de quaisquer alterações. O uso continuado do nosso site após a publicação de quaisquer modificações significa sua aceitação dos novos termos.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</body>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('accordion', {
            tab: 0
        });

        Alpine.data('accordion', (idx) => ({
            init() {
                this.idx = idx;
            },
            idx: -1,
            handleClick() {
                this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
            },
            handleRotate() {
                return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
            },
            handleToggle() {
                return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
            }
        }));
    })
</script>

</html>