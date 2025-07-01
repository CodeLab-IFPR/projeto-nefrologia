# Projeto de Nefrologia

Um sistema de gerenciamento desenvolvido em Laravel, criado para auxiliar os pacientes da Clínica do Rim no acompanhamento de seu tratamento e acesso a informações importantes

---

## 📋 Pré-requisitos

Antes de começar, certifique-se de ter os seguintes softwares instalados em sua máquina:

* [PHP](https://www.php.net/) (versão 8.1 ou superior)
* [Composer](https://getcomposer.org/) (Gerenciador de dependências do PHP)
* Um banco de dados [MySQL](https://www.mysql.com/)

## ⚙️ Guia de Instalação e Execução

Siga os passos abaixo para clonar, instalar e executar o projeto em seu ambiente de desenvolvimento local.

**1. Clonar o Repositório**

Primeiro, clone este repositório para a sua máquina local usando o comando:
```bash
git clone https://github.com/CodeLab-IFPR/projeto-nefrologia.git
```

**2. Acessar a Pasta do Projeto**

Navegue até o diretório recém-criado:
```bash
cd projeto-nefrologia
```

**3. Instalar Dependências do PHP**

Execute o Composer para instalar todas as dependências de backend necessárias para o Laravel funcionar:
```bash
composer install
```

**4. Configurar o Ambiente**

Copie o arquivo de ambiente de exemplo. É nele que ficam as configurações principais do projeto:
```bash
cp .env.example .env
```

**5. Gerar a Chave da Aplicação**

Este comando gera uma chave de segurança única para a sua instalação do Laravel:
```bash
php artisan key:generate
```

**6. Configurar o Banco de Dados**

Abra o arquivo `.env` que você acabou de criar em um editor de texto. Encontre as seguintes linhas e atualize com as informações do seu banco de dados MySQL local.

*Crie um banco de dados vazio no seu MySQL (ex: `nefrologia_db`) e use o nome dele aqui.*

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aqui_vai_o_nome_do_seu_banco
DB_USERNAME=aqui_vai_seu_usuario_mysql
DB_PASSWORD=aqui_vai_sua_senha_mysql
```

**7. Criar as Tabelas do Banco (Migrations)**

Este comando irá ler os arquivos de migração do projeto e criar todas as tabelas necessárias no seu banco de dados:
```bash
php artisan migrate
```

**8. Executar o Projeto**

Finalmente, inicie o servidor de desenvolvimento local do Laravel:
```bash
php artisan serve
```

Pronto! A aplicação estará rodando e acessível em seu navegador no endereço: **http://127.0.0.1:8000**
