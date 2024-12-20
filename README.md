# **Setup do Projeto da Clinica Unicuritiba**

## **Descrição**
Este script realiza toda a configuração necessária para rodar o projeto Laravel localmente.

---

## **Pré-requisitos**
Certifique-se de ter as seguintes ferramentas instaladas:

- **PHP** >= 8.1
- **Composer**
- **MySQL/MariaDB**
- **Git**

---

## **Comandos para Configuração**

### **1. Clone o Repositório**
```bash
https://github.com/Davi-Mancebo/a3-back-laravel.git
cd seu-repositorio
```
### **2. Instale as Dependências do Composer**
crie o arquivo .env e adicione os valores da tabela abaixo
```
.env.example
```
Atualize as informações no .env:
```
DB_CONNECTION=mysql // mysql ou mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### **4. Gere a Chave da Aplicação**
```
php artisan key:generate
```
### **5. Faça a migração das tabelas para o seu banco de dados**
```
php artisan migrate
```

### **6. Executar o Servidor**
Após a configuração, inicie o servidor local:
```
php artisan serve
```
---
## ***Testes da API com Postman***
### __Endpoints Disponíveis__
**Clientes:**
```
GET /clients - Lista todos os clientes.
GET /clients/{id} - Retorna um cliente específico.
POST /clients - Cria um cliente.
PUT /clients/{id} - Atualiza um cliente.
DELETE /clients/{id} - Remove um cliente.
```
**Matrículas:**

```
GET /enrollments - Lista todas as matrículas.
GET /enrollments/client/{id} - Retorna todas as consultas do cliente.
GET /enrollments/student/{id} - Retorna os clientes dos alunos.
POST /enrollments - Cria uma nova matrícula.
PUT /enrollments/{id} - Atualiza uma matrícula.
DELETE /enrollments/{id} - Remove uma matrícula.
```

# Limpeza e Reset do Banco
**Caso precise resetar as tabelas e dados**

```
php artisan migrate:reset
php artisan migrate
```
___
Agora o seu projeto estará funcionando ❤
