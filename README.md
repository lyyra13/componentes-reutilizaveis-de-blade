# Componentes Reutilizáveis do Blade

## Descrição

Este trabalho apresenta a utilização de componentes reutilizáveis do Blade no projeto NotesB, desenvolvido com Laravel. O objetivo é melhorar a organização do código, reduzir a repetição de estruturas HTML e CSS e manter a padronização visual da aplicação.

O projeto já utiliza recursos de templates Blade, como `@extends`, `@section`, `@yield` e `@include`, além do Bootstrap para a estilização das páginas.

A proposta é ampliar essa reutilização por meio de uma biblioteca interna de componentes Blade, utilizando propriedades (*props*) e slots para personalizar o conteúdo e a aparência dos elementos.

## Funcionalidades

- **Componente de alerta (`<x-alert>`):** permite exibir mensagens de sucesso, erro, aviso e informação, utilizando diferentes estilos visuais do Bootstrap.
- **Componente de botão (`<x-button>`):** proposta de componente para padronizar botões de ação, permitindo configurar o texto, o ícone, a aparência e o destino ou tipo de ação.
- **Componente de confirmação (`<x-modal>`):** proposta de estrutura reutilizável para apresentar mensagens de confirmação, com título, conteúdo e área para botões de ação.
- **Passagem de dados:** utilização de `@props` para definir propriedades e de `$slot` para receber o conteúdo dos componentes.
- **Organização de templates:** utilização dos recursos do Blade para compartilhar layouts e partes da interface entre diferentes páginas.

## Requisitos para execução

- PHP compatível com a versão do Laravel utilizada no projeto.
- Composer instalado.
- Laravel e suas dependências instalados.
- Banco de dados configurado conforme as instruções do projeto.
- Bootstrap disponível para a estilização dos componentes.
- Font Awesome disponível caso sejam utilizados os ícones nos botões.
- Arquivos dos componentes Blade criados em `resources/views/components/`, quando aplicável.

## Como executar o projeto

1. Clone o repositório do GitHub.
2. Acesse a pasta do projeto.
3. Instale as dependências do PHP:

   ```bash
   composer install
   ```

4. Configure o arquivo `.env` de acordo com o ambiente local e com o banco de dados utilizado pelo projeto.
5. Gere a chave da aplicação, se necessário:

   ```bash
   php artisan key:generate
   ```

6. Execute as migrações, caso o banco de dados ainda não esteja preparado:

   ```bash
   php artisan migrate
   ```

7. Inicie o servidor de desenvolvimento:

   ```bash
   php artisan serve
   ```

8. Acesse o endereço informado pelo Laravel no terminal.

## Benefícios

A utilização de componentes Blade contribui para a redução da duplicação de código, a padronização visual, a facilidade de manutenção e a organização das interfaces. As propriedades e os slots permitem adaptar os componentes a diferentes páginas sem precisar repetir toda a estrutura HTML.

## Observação

Os componentes descritos devem ser considerados implementados somente quando seus arquivos estiverem presentes no projeto e suas utilizações estiverem integradas às páginas correspondentes. O componente de botão e o comportamento interativo do modal dependem da implementação e da integração efetivamente realizadas.