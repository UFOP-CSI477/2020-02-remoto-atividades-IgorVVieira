# **CSI606-2020-02 - Remoto - Trabalho Final - Resultados**
## *Aluno: Igor Vitor Vieira*

--------------

<!-- Este documento tem como objetivo apresentar o projeto desenvolvido, considerando o que foi definido na proposta e o produto final. -->

### Resumo

O trabalho prático consiste em um sistema de gerenciamento acadêmico, onde alunos podem se vincular a disciplinas, registrar suas provas e resultados. Além de poder trocar mensagens com alunos que cursam a mesma disciplina.

### 1. Funcionalidades implementadas
<!-- Descrever as funcionalidades que eram previstas e foram implementas. -->
  - Cadastro e login de usuários;
  - Possibilidade de se vincular a disciplinas;
  - Criação e agendamento de provas/atividades avaliativas;
  - Histórico de notas e disciplinas cursadas;
  - Troca de mensagens entre usuários que estão cursando a mesma disciplina;
  
### 2. Funcionalidades previstas e não implementadas
<!-- Descrever as funcionalidades que eram previstas e não foram implementas, apresentando uma breve justificativa do porquê elas não foram incluídas -->
  - Possibilidade de cursar a disciplina novamente, da forma que o sistema está modelado, o usuário só pode se vincular a disciplina uma vez. Mesmo caso ele tenha sido aprovado ou reprovado, faltou uma verificação do que se caso ele tenha sido reprovado, seja aberto a passibilidade de cursar novamente.
  - Troca de mensagens em tempo real, atualmente a troca de mensagens ocorre com requisiçõe AJAX, evitando recarregar página, mas não está sendo realizado envio com Socket por exemplo.

### 3. Outras funcionalidades implementadas
<!-- Descrever as funcionalidades implementas além daquelas que foram previstas, caso se aplique.  -->
 - Calendário com data de todas provas/atividades avaliativas, inicialemente a ídeia era somente ter as provas no formato de tabelas ordenada de forma descrente pela data.

### 4. Principais desafios e dificuldades
<!-- Descrever os principais desafios encontrados no desenvolvimento do trabalho, quais foram as dificuldades e como elas foram superadas e resolvidas. -->
  - Adaptação do template utilizado e configuração dos plugins Javascipt, como FullCallendar e Summernote.
### 5. Instruções para instalação e execução
<!-- Descrever o que deve ser feito para instalar (ou baixar) a aplicação, o que precisa ser configurando (parâmetros, banco de dados e afins) e como executá-la. -->
  - Pré-requisitos
    - PHP, disponível em: https://www.php.net/downloads.php
    - Composer, disponível em: https://getcomposer.org/download/
    - PostgreSQL, disponível em: https://www.postgresql.org/download/
  - Funcionamento
    - Clonar o repositório;
    - Instalar as dependências: `composer install`
    - Criar um novo arquivo `.env`, copiar tudo do `.env.example` e alterar as credenciais do banco de dados;
    - Criar o banco de dados referente no arquivo `.env.example`
    - Rodar as migrations: `php artisan migrate`
    - Rodar o seeder de disciplinas: `php artisan db:seed`

### 6. Referências
<!-- Referências podem ser incluídas, caso necessário. Utilize o padrão ABNT. -->
 Eloquent Getting Started - Laravel the PHP web framwork for wb artisans, 2021. Disponível em: https://laravel.com/docs/8.x. Acesso em: 21 ago. 2021.

