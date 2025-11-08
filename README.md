# Neuro-Educa API

API para o sistema de gestão educacional pedagógica Neuro-Educa.

## Sobre o Projeto

Sistema de gestão educacional pedagógica para acompanhamento de alunos, desenvolvido com Laravel 12 e PHP 8.2+.

## Funcionalidades

- Gestão de Secretarias e Escolas
- Cadastro de Educadores e Alunos
- Gerenciamento de Responsáveis
- Habilidades Individuais
- Inventário de Habilidades
- Orientações Pedagógicas
- Metas Educacionais
- Entrevista Familiar
- Diagnósticos
- Planejamento Pedagógico
- Registro Pedagógico
- Anexos

## Tecnologias

- Laravel 12
- PHP 8.2+
- PostgreSQL
- Vite
- JWT Authentication

## Instalação

```bash
# Instalar dependências
composer install
npm install

# Configurar ambiente
cp .env.example .env
php artisan key:generate

# Executar migrations
php artisan migrate

# Construir assets
npm run build
```

## Desenvolvimento

```bash
# Servidor de desenvolvimento
composer dev
```

Este comando inicia:
- Servidor Laravel (porta 8000)
- Queue worker
- Log viewer (Pail)
- Vite dev server

## Documentação da API

A documentação interativa da API está disponível via Scramble:

**URL da Documentação:** `http://localhost:8000/docs/api`

A documentação é gerada automaticamente a partir dos controllers e form requests, incluindo:
- Endpoints disponíveis
- Parâmetros de requisição
- Estrutura de resposta
- Validações
- Exemplos de uso

### Exportar OpenAPI Spec

```bash
# Gerar arquivo api.json
php artisan scramble:export
```

## Autenticação

A API utiliza JWT (JSON Web Tokens) para autenticação.

### Login

```http
POST /api/auth/login
Content-Type: application/json

{
  "cpf": "12345678900",
  "password": "senha123"
}
```

### Usar Token

```http
GET /api/auth/me
Authorization: Bearer {seu-token-jwt}
```

## Arquitetura

O projeto segue uma arquitetura em camadas:

**Controller → Service → Repository → Model**

- **Controllers**: Gerenciam requisições HTTP
- **Services**: Contêm lógica de negócio
- **Repositories**: Gerenciam acesso a dados
- **Models**: Representam entidades do banco

Todas as camadas utilizam injeção de dependência com propriedades readonly.

## Testes

```bash
composer test
```

## Code Style

```bash
./vendor/bin/pint
```

## Licença

Este projeto está licenciado sob a Licença MIT.
