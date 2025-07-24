<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 💻 Sobre a Aplicação
- Esta aplicação é um teste técnico solicitado pela empresa Retta, desenvolvido utilizando PHP 8.2 e o framework Laravel 12. O objetivo principal é consumir uma API que fornece informações sobre deputados e suas despesas, processando esses dados de forma sincronizada. Para garantir um processamento eficiente, foi utilizado um recurso do Laravel chamado Laravel Jobs, que permite enfileirar os dados dos deputados e executá-los em segundo plano, otimizando o desempenho da aplicação.

 ## ✨ Tecnologias Utilizadas
- HTML5
- CSS3
- Bootstrap 5.3.0
- PHP 8.2
- Laravel 12.0
- Blade
- Docker 28.3.2
- Docker-Compose 2.38.2
- MySQL 8.0
 
## 🗒️ Roteiro
- [ ] Configuração e execução do Docker Compose para orquestrar os containers do Composer e MySQL, além do Dockerfile para gerenciar o container PHP com o driver pdo_mysql.
- [ ] Instalação do framework Laravel por esse comando, considerando que o PHP CLI e o Composer não estejam previamente instalados no ambiente local e sim instalado via docker-compose.
- `docker run --rm -v $(pwd):/app composer create-project --prefer-dist laravel/laravel meuprojeto`
- [ ] Criação dos Controllers para consumir a API, visando exibir os tipos de variáveis das informações dos deputados e das despesas, além da implementação das migrations e models correspondentes.
- [ ] Criação do Service que vai fazer o consumo da api trazendo as informações dos deputados e das despesas.
- [ ] Criação da Job que vai colocar os dados dos deputados em uma fila e executar em segundo plano.
- [ ] Criação de um arquivo com o recurso Laravel Command para automatizar a inserção dos dados consumidos da API no banco de dados de forma sincronizada.
- [ ] Execução da Job com esse comando, considerando que o PHP CLI e o Composer não estejam previamente instalados no ambiente local:
- `docker exec -it laravel_app php artisan queue:work`
- [ ] Execução do Arquivo com o Command para a realização da inserção, considerando que o PHP CLI e o Composer não estejam previamente instalados no ambiente local.
- `docker exec -it laravel_app php artisan sincronizar:deputados`
- [ ] Criação do template html com blade para realização de consulta dos deputados e suas despesas

## 🚀 Como Executar
- Clone o repositório com: `git clone https://github.com/Gustavo12386/teste_tecnico_retta.git`
- Abra em qualquer IDE 
- Execute o projeto com:
- `php artisan serve`
- Se não tiver o PHP CLI e o Composer instalados no ambiente local:
- `docker exec -it laravel_app php artisan serve`

## Imagens do template
<img width="1918" height="971" alt="img2" src="https://github.com/user-attachments/assets/cda332d6-8696-4228-8b6c-239f8b51abca" />
<img width="1403" height="862" alt="img4" src="https://github.com/user-attachments/assets/0846cbe0-83a3-43ac-9a86-5263734ccefe" />

## Imagem da Tabela de deputados
<img width="1343" height="968" alt="img7" src="https://github.com/user-attachments/assets/308d0edd-f62a-4ee9-b3fd-fe055d61f299" />

## Imagem da Tabela de despesas
<img width="1346" height="966" alt="img8" src="https://github.com/user-attachments/assets/07cbc40b-d576-43cc-b6b0-34950e878e40" />

## Imagem da Tabela de jobs
<img width="1342" height="966" alt="img6" src="https://github.com/user-attachments/assets/0ccb4dff-66d2-4263-b5fe-08aa15810e69" />

## Imagem de Tabela de failed_jobs
<img width="1347" height="964" alt="img5" src="https://github.com/user-attachments/assets/626046e1-643c-40d9-ae94-4355360f9015" />

## Autor
- Gustavo Calderaro

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
