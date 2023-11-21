# Projeto 3 Laboratório de Desenvolvimento de Software

# Membros do grupo

- João Francisco Carvalho Soares de Oliveira Queiroga
- Klaus Leão Teles
- Diego Machado Cordeiro
- Vinicius Gonzaga Guilherme
- Lucas Tabosa Guedes
- Henrique Santana Diniz

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

# Configuração do Projeto:

## Pré-requisitos

1. **PHP**: Laravel é um framework PHP, então você precisa ter o PHP instalado em sua máquina. https://www.php.net/downloads.php (minha versão é a 7.4.33, mas acredito que não precisa ser necessariamente a mesma)
2. **Composer**: O Laravel utiliza o Composer para gerenciar suas dependências. Portanto, certifique-se de ter o Composer instalado em sua máquina. https://getcomposer.org/download/
3. **MySQL**: Como você está usando MySQL como seu banco de dados, você precisa ter o MySQL instalado e configurado em sua máquina. https://dev.mysql.com/downloads/installer/
4. **Node.js e NPM**: Tailwind CSS é um framework CSS baseado em utilitários e requer Node.js e NPM para instalação. https://nodejs.org/en/download/

segue um vídeo de um cara ensinando a instalar o php (neste video ele instala o php pelo xampp, oque da pra fazer também, não tem problema), o laravel e o composer: https://www.youtube.com/watch?v=X4aaPtEbeVM&t=8s
se este vídeo não estiver bom tem vários outros, mas qualquer coisa pode me chamar.

## Configuração do Projeto

1. **Clonar o repositório**: Primeiro, você precisa clonar o repositório do projeto em sua máquina local.
2. **Instalar dependências do Composer**: Navegue até a pasta do projeto clonado e execute `composer install` para instalar todas as dependências do Laravel.
3. **Configurar o ambiente**: Copie o arquivo `.env.example` para `.env` e atualize as configurações do banco de dados de acordo com sua configuração local do MySQL. O arquivo `.env` é onde você define as variáveis de ambiente para o seu projeto. Ele é carregado pelo Laravel durante o bootstrap e todas as variáveis são colocadas no array `$_ENV` do PHP e também podem ser acessadas através da função `env()` do Laravel.
4. **Gerar chave de aplicativo**: Execute `php artisan key:generate` para gerar uma chave de aplicativo.
5. **Executar migrações**: Execute `php artisan migrate` para criar as tabelas no banco de dados. (se der algum problema com o banco de dados pode me chamar, mas qualquer coisa tem uma pasta aqui no repositório com todas as tabelas certinho e tal, acho mais seguro pegar elas pra clonar o banco)
6. **Instalar dependências do Node.js**: Execute `npm install` para instalar todas as dependências do Node.js, incluindo Tailwind CSS.
7. **Compilar CSS**: Execute `npm run dev` para compilar seu CSS.

## Estrutura de Pastas

Aqui está uma visão geral da estrutura de pastas do Laravel e suas funções:
- **/app**: Esta pasta contém o código-fonte da aplicação. É aqui que a maior parte do seu código personalizado está.
    - **/app/Http/Controllers**: Aqui estão todos os controladores da sua aplicação. Os controladores são responsáveis por definir o comportamento das rotas da aplicação, além de os métodos de lógicas e manipulação do banco de dados estarem neles.
    - **/app/Models**: Aqui estão todos os modelos da sua aplicação. Os modelos representam as tabelas do seu banco de dados.
    - **/app/Notifications**: Aqui estão todas as classes de notificação da sua aplicação. As notificações no Laravel são usadas para enviar notificações a usuários por vários canais, incluindo email, SMS (via Nexmo) e Slack. As notificações também podem ser armazenadas no banco de dados para que possam ser exibidas na interface da web.
- **/bootstrap**: Esta pasta contém alguns scripts de inicialização do framework.
- **/config**: Esta pasta contém todos os arquivos de configuração do seu aplicativo.
- **/database**: Esta pasta contém seus arquivos de migração de banco de dados e seeds.
- **/public**: Esta pasta contém o front controller e seus assets (imagens, JavaScript, CSS, etc.) (boa parte da estilização das páginas estão nas próprias views)
- **/resources**: Esta pasta contém suas views e arquivos brutos de assets. (também existe uma pasta dentro chamada layouts, nela tem apenas um arquivo, que é o navigation.blade.php, ele é o header das páginas)
    - **/resources/views**: Aqui estão todas as views da aplicação. As views contêm a HTML da sua aplicação e fornecem uma maneira conveniente de separar o seu controlador e código de domínio da sua lógica de apresentação HTML.
- **/routes**: Esta pasta contém todas as rotas da web e da API definidas para o aplicativo. O arquivo `web.php` é particularmente importante, pois é onde as rotas da web são definidas.
- **/storage**: Esta pasta contém suas sessões compiladas Blade, caches de arquivo e outros arquivos gerados pelo framework.
- **/tests**: Esta pasta contém seus testes automatizados.
- **/vendor**: Esta pasta contém suas dependências do Composer.

## Executando o Projeto

1. **Iniciar o servidor de desenvolvimento**: Na pasta onde está o projeto, execute `php artisan serve` no terminal. Isso iniciará o servidor de desenvolvimento do Laravel. Você verá uma mensagem indicando que o servidor está sendo executado e o endereço do servidor (geralmente `http://127.0.0.1:8000`).
2. **Acessar o aplicativo**: Abra um navegador web e navegue até o endereço fornecido pelo comando `php artisan serve` (por exemplo, `http://127.0.0.1:8000`). Você deverá ver o aplicativo Laravel em execução.

Lembre-se, sempre que fizer alterações no código, você pode precisar reiniciar o servidor para que as alterações tenham efeito. Para parar o servidor, você pode pressionar `Ctrl + C` no terminal.

