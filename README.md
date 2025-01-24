# Teste Técnico para a Kabum

## Descrição
Este projeto é uma API baseada em PHP que fornece funcionalidades de autenticação e gerenciamento de usuários como um teste técnico para a empresa Kabum.

## Instruções de Instalação
1. Clone o repositório.
2. Navegue até o diretório do projeto.
3. Configure o banco de dados usando o esquema SQL fornecido em `database.sql`.
4. Configure a conexão do banco de dados em `backend/config/database.php`.

## Uso
- **API de Login**: 
  - Endpoint: `/api/login.php`
  - Método: `POST`
  - Parâmetros: `username`, `password`
  - Resposta: Retorna um objeto JSON com uma mensagem de sucesso e token ou uma mensagem de erro.

## Contribuição
Contribuições são bem-vindas! Por favor, envie um pull request ou abra uma issue para discussão.

## Licença
Este projeto é licenciado sob a Licença MIT.
