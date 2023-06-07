## Teste Pentagrama

Este é um Aplicação Web para Cadastro de Cidades e Bairros e Usuarios utilizando laravel.<br>

## Pré-requisitos
Certifique-se de ter as seguintes ferramentas instaladas em seu sistema:<br>

PHP (versão 8.2.4)<br>
Composer (versão 2.5.4)<br>
Servidor Web (Apache, mariadb)<br>

## Começando

Para começar, siga os passos abaixo:<br>

<p>Abra o terminal na pasta onde deseja instalar o projeto e clone este repositório: git clone https://github.com/micael-ricardo/Pentagrama.git
<p>Entre na pasta do projeto: cd Pentagrama
<p>Instale as dependências do projeto usando o Composer: composer install
<p>Copie o arquivo de configuração .env.example para .env: cp .env.example .env
<p>Execute as migrações do banco de dados para criar as tabelas: php artisan migrate
<p>Inicie o servidor local:php artisan serve

Abra o navegador da web e acesse o endereço: http://localhost:8000/ para visualizar o aplicativo.<br>

## Para realizar o teste no navegador
<p>Faça o seu cadastro clicando em “Registre-se aqui”. Após realizar o cadastro, você será redirecionado para a tela de login.
<p>Faça o login com o e-mail e senha que você usou no registro e você será redirecionado para a tela de cadastro de cidades. Nessa tela, você pode marcar o checkbox para também cadastrar um bairro. Caso queira cadastrar apenas a cidade, deixe o checkbox desmarcado.
<p>Após realizar o cadastro, você será redirecionado para a tela de listagem, onde terá uma tabela mostrando todas as cidades e bairros cadastrados no sistema.
<p>Nessa tela, você também pode usar os filtros para buscar os dados por nome da cidade, estado, data da fundação (período inicial e final) ou nome do bairro. Além disso, você pode deletar algum cadastro indesejado clicando no botão “Deletar”. Lembre-se que a deleção é permanente!
<p>Nessa tela tambem está o filtro e a opção de deletar algum cadastro indesejado lembrando que a deleção e permante! 
<p>Caso queira cadastrar mais cidades ou bairros, apenas clique em “Adicionar” que você será redirecionado para a tela de cadastro de cidades.

## APIs utilizadas

<p>Neste projeto, foram utilizadas as seguintes APIs:

<p>IBGE e Nominatim
