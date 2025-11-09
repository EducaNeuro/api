# 🧠 Neuro-Educa API

<div align="center">

**Sistema de Gestão Pedagógica para Educação Especializada**

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white)](https://postgresql.org)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](LICENSE)

</div>

---

## 📋 Índice

- [Sobre o Projeto](#-sobre-o-projeto)
- [Problema e Solução](#-problema-e-solução)
- [Funcionalidades](#-funcionalidades)
- [Arquitetura](#-arquitetura)
- [Tecnologias](#-tecnologias)
- [Instalação](#-instalação)
- [Documentação da API](#-documentação-da-api)
- [Autenticação](#-autenticação)
- [Estrutura do Projeto](#-estrutura-do-projeto)
- [Comandos Úteis](#-comandos-úteis)
- [Equipe](#-equipe)

---

## 🎯 Sobre o Projeto

**Neuro-Educa** é uma plataforma API RESTful robusta desenvolvida para revolucionar a gestão pedagógica de alunos com necessidades educacionais especializadas. O sistema centraliza informações, facilita o acompanhamento individualizado e promove uma educação mais inclusiva e eficiente.

---

## 🔍 Problema e Solução

### 😰 O Problema

- **Gestão Manual e Fragmentada**: Educadores gerenciam dados de alunos em planilhas, papéis e sistemas descentralizados
- **Falta de Histórico Consolidado**: Dificuldade para acompanhar a evolução do aluno ao longo do tempo
- **Comunicação Ineficiente**: Barreiras na troca de informações entre educadores, escola e família
- **Planejamento Pedagógico Complexo**: Criar planos individualizados demanda muito tempo e organização
- **Ausência de Métricas**: Impossibilidade de medir e comprovar o progresso dos alunos
- **Falta de profissionais especializados**

### 💡 Nossa Solução

Uma **API completa e moderna** que oferece:

✅ **Centralização de Dados** - Toda informação do aluno em um só lugar  
✅ **Histórico Completo** - Acompanhamento longitudinal do desenvolvimento  
✅ **Inventário de Habilidades** - Avaliação padronizada e rastreável  
✅ **Planejamento Integrado** - Ferramentas para criar e acompanhar metas pedagógicas  
✅ **Entrevistas Familiares** - Registro estruturado do contexto familiar  
✅ **Dashboard Analytics** - Métricas e estatísticas em tempo real  
✅ **API Documentada** - Fácil integração com qualquer frontend ou sistema

---

## ✨ Funcionalidades

### 🏫 Gestão Institucional
- **Secretarias e Escolas**: Gestão multinível de instituições educacionais
- **Educadores**: Cadastro e gerenciamento de profissionais
- **Alunos**: Perfis completos com informações acadêmicas e pessoais
- **Responsáveis**: Registro de familiares e contatos

### 📊 Acompanhamento Pedagógico
- **Diagnósticos**: Registro de avaliações e laudos médicos/pedagógicos
- **Inventário de Habilidades**: Sistema de avaliação em 5 níveis:
  - ✅ Realiza
  - 🔄 Em Desenvolvimento
  - ⚠️ Não Realiza
  - 👁️ Não Observado
  - ❓ Não Avaliado

### 📝 Planejamento e Registro
- **Orientações Pedagógicas**: Diretrizes e estratégias de ensino personalizadas
- **Metas Educacionais**: Definição e acompanhamento de objetivos
- **Planejamento Pedagógico**: Organização de atividades e intervenções
- **Planos Trimestrais**: Estruturação de metas por período letivo
- **Registros Pedagógicos**: Documentação de atividades e observações diárias

### 👨‍👩‍👧 Envolvimento Familiar
- **Entrevistas Familiares**: Coleta estruturada de informações do contexto familiar
- **Anexos**: Upload e gestão de documentos (laudos, relatórios, fotos)

### 📈 Analytics
- **Dashboard de Estatísticas**: Visão consolidada de dados institucionais
- **Métricas de Progresso**: Acompanhamento de evolução de habilidades

---

## 🏗️ Arquitetura

### Design Pattern: Arquitetura em Camadas

```
┌─────────────────────────────────────────┐
│         HTTP Request (Client)           │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────▼─────────┐
        │   🛡️ Middleware   │  ← JWT Authentication
        │  (JWT Validation) │
        └─────────┬─────────┘
                  │
        ┌─────────▼─────────┐
        │  📥 Controllers    │  ← HTTP Layer
        │   (Request/Resp)   │     - Valida requisições
        └─────────┬─────────┘     - Retorna respostas
                  │
        ┌─────────▼─────────┐
        │   💼 Services      │  ← Business Logic
        │  (Business Logic)  │     - Regras de negócio
        └─────────┬─────────┘     - Orquestração
                  │
        ┌─────────▼─────────┐
        │  🗄️ Repositories   │  ← Data Access
        │  (Data Access)     │     - Queries
        └─────────┬─────────┘     - Persistência
                  │
        ┌─────────▼─────────┐
        │   📊 Models        │  ← ORM (Eloquent)
        │    (Eloquent)      │     - Entidades
        └─────────┬─────────┘     - Relacionamentos
                  │
        ┌─────────▼─────────┐
        │   💾 PostgreSQL    │  ← Database
        └───────────────────┘
```

### Princípios Aplicados

- **Separação de Responsabilidades**: Cada camada tem uma função específica
- **Injeção de Dependências**: Uso de constructor injection com `readonly` properties
- **Single Responsibility**: Classes focadas em uma única responsabilidade
- **DRY (Don't Repeat Yourself)**: Reutilização de código através dos Repositories
- **API First**: Design pensado para integração e escalabilidade

---

## 🚀 Tecnologias

### Backend
- **[Laravel 12](https://laravel.com)** - Framework PHP moderno e robusto
- **[PHP 8.2+](https://php.net)** - Linguagem com tipagem forte e recursos modernos
- **[PostgreSQL](https://postgresql.org)** - Banco de dados relacional de alta performance
- **[JWT](https://jwt.io)** - Autenticação stateless e segura

### DevTools
- **[Scramble](https://scramble.dedoc.co/)** - Documentação automática OpenAPI 3.1
- **[Laravel Sanctum](https://laravel.com/docs/sanctum)** - Autenticação de APIs
- **[Laravel Pint](https://laravel.com/docs/pint)** - Code style fixer
- **[PHPUnit](https://phpunit.de)** - Framework de testes
- **[Vite](https://vitejs.dev)** - Build tool para assets

### Storage
- **AWS S3** - Armazenamento de anexos e documentos (via Flysystem)

---

## ⚙️ Instalação

### Pré-requisitos

```bash
- PHP >= 8.2
- Composer
- PostgreSQL >= 13
- Node.js >= 18
- NPM ou Yarn
```

### 🚀 Setup Rápido (Método Recomendado)

```bash
# Clone o repositório
git clone https://github.com/seu-usuario/neuro-educa-api.git
cd neuro-educa-api

# Execute o setup automático
composer setup
```

Este comando executa automaticamente:
- ✅ `composer install` - Instala dependências PHP
- ✅ Cria arquivo `.env` a partir do `.env.example`
- ✅ `php artisan key:generate` - Gera chave da aplicação
- ✅ `php artisan migrate` - Cria estrutura do banco
- ✅ `npm install` - Instala dependências JavaScript
- ✅ `npm run build` - Compila assets

### 🔧 Setup Manual (Passo a Passo)

```bash
# 1. Clone o repositório
git clone https://github.com/seu-usuario/neuro-educa-api.git
cd neuro-educa-api

# 2. Instale as dependências
composer install
npm install

# 3. Configure o ambiente
cp .env.example .env
php artisan key:generate

# 4. Configure o banco de dados no .env
# DB_CONNECTION=pgsql
# DB_HOST=127.0.0.1
# DB_PORT=5432
# DB_DATABASE=neuro_educa
# DB_USERNAME=seu_usuario
# DB_PASSWORD=sua_senha

# 5. Execute as migrations e seeders
php artisan migrate --seed

# 6. Compile os assets
npm run build
```


---

## 🌐 Servidor de Desenvolvimento

### Serviços Individuais

```bash
php artisan serve
```

---

## 📚 Documentação da API

### Documentação Interativa (Swagger/OpenAPI)

A API possui **documentação automática** gerada via Scramble, com interface interativa para testar endpoints:

🔗 **URL**: http://localhost:8000/docs/api

### Recursos da Documentação

- ✅ **Listagem completa de endpoints**
- ✅ **Parâmetros de requisição** (query, body, path)
- ✅ **Estrutura de resposta** com exemplos
- ✅ **Validações** de cada campo
- ✅ **Autenticação** - Suporte para Bearer Token
- ✅ **Try it out** - Teste os endpoints direto no navegador

### Exportar Especificação OpenAPI

```bash
php artisan scramble:export
# Gera o arquivo api.json com a especificação completa
```

---

## 🔐 Autenticação

A API utiliza **JWT (JSON Web Tokens)** para autenticação stateless.

### 1. Login

```http
POST /api/auth/login
Content-Type: application/json

{
  "cpf": "12345678900",
  "password": "senha123"
}
```

**Resposta:**
```json
{
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGc...",
  "token_type": "bearer",
  "expires_in": 3600,
  "user": {
    "id": 1,
    "nome": "João Silva",
    "cpf": "12345678900",
    "tipo": "educador"
  }
}
```

### 2. Usar o Token

Inclua o token em todas as requisições autenticadas:

```http
GET /api/alunos
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGc...
```

### 3. Obter Dados do Usuário Logado

```http
GET /api/auth/me
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGc...
```

---

## 📂 Estrutura do Projeto

```
neuro-educa-api/
│
├── 📁 app/
│   ├── Enum/                    # Enums do sistema
│   │   └── InventarioHabilidadesEnum.php
│   ├── Http/
│   │   ├── Controllers/         # Controllers (18 arquivos)
│   │   ├── Middleware/          # Middlewares personalizados
│   │   └── Requests/            # Form Requests para validação (31 arquivos)
│   ├── Models/                  # Models Eloquent (16 modelos)
│   ├── Repositories/            # Camada de acesso a dados (17 repositórios)
│   ├── Services/                # Lógica de negócio (17 services)
│   ├── Rules/                   # Regras de validação customizadas
│   └── Support/                 # Classes auxiliares
│
├── 📁 database/
│   ├── migrations/              # Migrações do banco (22 arquivos)
│   └── seeders/                 # Seeders para popular dados (17 arquivos)
│
├── 📁 routes/
│   └── api.php                  # Definição de rotas da API
│
├── 📁 config/                   # Arquivos de configuração
├── 📁 tests/                    # Testes automatizados
├── 📁 storage/                  # Arquivos gerados
└── 📁 public/                   # Ponto de entrada público
```

### Principais Entidades (Models)

- 🏫 **Secretaria** - Secretarias de educação
- 🏢 **Escola** - Escolas vinculadas
- 👨‍🏫 **Educador** - Professores e educadores
- 👦 **Aluno** - Estudantes
- 👨‍👩‍👧 **Responsavel** - Familiares/responsáveis
- 🩺 **Diagnostico** - Laudos e diagnósticos
- 📋 **InventarioHabilidade** - Avaliação de habilidades
- 🎯 **Meta** - Metas educacionais
- 📝 **Planejamento** - Planejamentos pedagógicos
- 📊 **PlanoTrimestral** - Planos trimestrais
- 📖 **RegistroPedagogico** - Registros diários
- 💡 **OrientacaoPedagogica** - Orientações
- 🏆 **Habilidade** - Catálogo de habilidades
- 👪 **EntrevistaFamiliar** - Entrevistas com famílias
- 📎 **Anexo** - Documentos e arquivos

---

## 🛠️ Comandos Úteis

### Desenvolvimento

```bash
# Servidor de desenvolvimento completo
composer dev

# Apenas o servidor Laravel
php artisan serve

# Processar filas
php artisan queue:listen

# Visualizar logs em tempo real
php artisan pail
```

### Database

```bash
# Executar migrations
php artisan migrate

# Resetar banco e popular dados
php artisan migrate:fresh --seed

# Executar seeders
php artisan db:seed

# Acessar tinker (REPL)
php artisan tinker
```

### Build

```bash
# Build de produção
npm run build

# Build de desenvolvimento
npm run dev
```

---

## 🎯 Endpoints Principais

### Autenticação
```
POST   /api/auth/login          # Login
GET    /api/auth/me             # Dados do usuário logado
```

### Dashboard
```
GET    /api/dashboard/statistics # Estatísticas gerais
```

### Alunos
```
GET    /api/alunos              # Listar alunos
GET    /api/alunos/{id}         # Detalhes do aluno
GET    /api/alunos/{id}/detalhes # Detalhes completos com relacionamentos
POST   /api/alunos              # Criar aluno
PUT    /api/alunos/{id}         # Atualizar aluno
DELETE /api/alunos/{id}         # Deletar aluno
```

### Inventário de Habilidades
```
GET    /api/inventario-habilidades           # Listar inventários
GET    /api/inventario-habilidades/{id}      # Detalhes do inventário
POST   /api/inventario-habilidades           # Criar inventário
```

### Diagnósticos
```
GET    /api/diagnosticos        # Listar diagnósticos
POST   /api/diagnosticos        # Criar diagnóstico
PUT    /api/diagnosticos/{id}   # Atualizar diagnóstico
DELETE /api/diagnosticos/{id}   # Deletar diagnóstico
```

### Orientações Pedagógicas
```
GET    /api/orientacoes-pedagogicas     # Listar orientações
POST   /api/orientacoes-pedagogicas     # Criar orientação
PUT    /api/orientacoes-pedagogicas/{id} # Atualizar
DELETE /api/orientacoes-pedagogicas/{id} # Deletar
```

### Metas
```
GET    /api/metas               # Listar metas
POST   /api/metas               # Criar meta
PUT    /api/metas/{id}          # Atualizar meta
DELETE /api/metas/{id}          # Deletar meta
```

### Planejamentos
```
GET    /api/planejamentos       # Listar planejamentos
POST   /api/planejamentos       # Criar planejamento
PUT    /api/planejamentos/{id}  # Atualizar
DELETE /api/planejamentos/{id}  # Deletar
```

### Registros Pedagógicos
```
GET    /api/registros-pedagogicos       # Listar registros
POST   /api/registros-pedagogicos       # Criar registro
PUT    /api/registros-pedagogicos/{id}  # Atualizar
DELETE /api/registros-pedagogicos/{id}  # Deletar
```

*Para a lista completa de endpoints, acesse a [documentação interativa](http://localhost:8000/docs/api).*

---

## 🚀 Deploy

### Requisitos de Produção

- PHP >= 8.2 com extensões: PDO, pgsql, mbstring, openssl, tokenizer, xml, ctype, json, bcmath
- PostgreSQL >= 13
- Nginx ou Apache
- Composer
- Node.js + NPM (para build de assets)

### Variáveis de Ambiente Importantes

```env
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:...

DB_CONNECTION=pgsql
DB_HOST=seu-host
DB_DATABASE=neuro_educa
DB_USERNAME=usuario
DB_PASSWORD=senha

JWT_SECRET=sua-chave-secreta-jwt

AWS_ACCESS_KEY_ID=...
AWS_SECRET_ACCESS_KEY=...
AWS_DEFAULT_REGION=...
AWS_BUCKET=...
```

### Otimizações

```bash
# Cache de configuração
php artisan config:cache

# Cache de rotas
php artisan route:cache

# Cache de views
php artisan view:cache

# Otimizar autoloader
composer install --optimize-autoloader --no-dev
```

---

## 💡 Diferenciais Técnicos

### 🏆 Pontos Fortes

- ✅ **Arquitetura Limpa**: Separação clara de responsabilidades
- ✅ **Type Safety**: Uso extensivo de tipagem PHP 8.2+
- ✅ **Documentação Automática**: OpenAPI 3.1 gerado automaticamente
- ✅ **Testes Automatizados**: Garantia de qualidade
- ✅ **Code Style**: Padrão PSR-12 com Laravel Pint
- ✅ **Injeção de Dependências**: Código testável e desacoplado
- ✅ **Migrations Versionadas**: Controle de versão do schema
- ✅ **Seeders**: Dados de exemplo para desenvolvimento
- ✅ **Queue System**: Processamento assíncrono
- ✅ **Storage Cloud**: Integração com AWS S3

### 🎨 Boas Práticas

- 📦 **Repository Pattern**: Abstração de acesso a dados
- 🛡️ **Form Requests**: Validação centralizada
- 🔐 **JWT Authentication**: Segurança stateless
- 📝 **Enum Types**: Tipos seguros para constantes
- 🔄 **RESTful API**: Padrões REST bem definidos
- 🧪 **TDD Ready**: Estrutura preparada para testes

---

## 📈 Roadmap Futuro

### 🎯 Próximas Implementações

- [ ] **Gráficos de Evolução** - Visualização do progresso dos alunos
- [ ] **API de IA** - Sugestões de atividades baseadas em IA
- [ ] **App Mobile** - Aplicativo nativo para responsáveis
- [ ] **Webhooks** - Integração com sistemas externos
- [ ] **Calculo de evasão** - Calcular a chance de evasão / desistência daquele aluno

---

## 👥 Equipe

**Desenvolvido durante o Hackathon [Nome do Hackathon] 2025**

- 👨‍💻 **Rian** - Desenvolvedor
- 👨‍💻 **Igor** - Desenvolvedor Backend
- 👩‍💻 **Lucas** - Desenvolvedor
- 👨‍💻 **Sergio** - Desenvolvedor

---

<div align="center">

**Feito com ❤️ para transformar a educação especializada**

</div>
