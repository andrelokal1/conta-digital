# Projeto Teste : Menu

Este Projeto é um teste e não tem nenhuma aplicação comercial.

## Licença de uso
Este projeto código livre.

## Informações tecnicas:
* Api: Lumen

  ## Instalação
    ```
    $ git clone https://github.com/andrelokal1/conta-digital.git
    
    # Dentro da pasta conta-digital/ :
        $ docker-compose up -d --build
        $ docker-compose up -d
        $ docker exec -it conta-digital_bancodedados_1 bash
        $ mysql -uroot -psecret
        $ create database conta_digital;
        $ exit;
        $ exit
        $ docker exec -it conta-digital_app_1 bash
        $ composer install
        $ php artisan migrate
    
    # Caso queira criar uma massa de dados:
        $ php artisan db:seed
    
    ```
  ## Testes
    ```
    
    # Teste Unitario: Dentro da pasta api:
        $ php vendor/bin/phpunit
    
    # Chamada cURL para a API
      curl --location --request POST 'localhost:86/transaction' \
      --header 'Content-Type: application/json' \
      --data-raw '{
        "value" : "100.00",
        "payer" : "1",
        "payee" : "2"
      }'
    
    # URL Local e Serviço : localhost:86/transaction
    
    ```
### Requisitos:
* docker
* docker-compose
* git

## Autor
    * André Martos - andrelokal@gmail.com






