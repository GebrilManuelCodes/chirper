# 🐦 Chirper — Laravel Social Platform

Uma aplicação web de rede social desenvolvida com **Laravel**, construída a partir do zero como projeto de aprendizagem e prática de desenvolvimento web moderno.

O projeto implementa autenticação de utilizadores, autorização, operações CRUD, persistência de dados numa base de dados e uma interface responsiva utilizando **Blade, Tailwind CSS e DaisyUI**.

---

## 📸 Sobre o projeto

O **Chirper** é uma pequena plataforma social onde os utilizadores podem criar uma conta, iniciar sessão e publicar mensagens.

O projeto foi desenvolvido para colocar em prática conceitos fundamentais do ecossistema Laravel, desde a criação da aplicação até à sua implementação em produção.

---

## ✨ Funcionalidades

* 🔐 Registo e autenticação de utilizadores
* 👤 Sistema de utilizadores
* 🛡️ Autorização e controlo de acesso
* 📝 Criação de publicações
* ✏️ Edição de publicações
* 🗑️ Eliminação de publicações
* 💾 Persistência de dados através de base de dados
* 🗃️ Models e Migrations do Laravel
* 🔒 Proteção CSRF
* 🔑 Hash seguro de palavras-passe
* 📱 Interface responsiva
* 🎨 Tailwind CSS
* 🌼 DaisyUI
* 🚀 Deploy em produção
* 🔄 Deploy automático

---

## 🛠️ Tecnologias utilizadas

### Backend

* **PHP**
* **Laravel**
* **Eloquent ORM**
* **Blade**
* **Laravel Migrations**
* **Laravel Authentication & Authorization**

### Frontend

* **Blade**
* **Tailwind CSS**
* **DaisyUI**
* **HTML5**
* **CSS3**

### Base de dados

* SQL
* Laravel Eloquent ORM

### Ferramentas

* Git
* GitHub
* Composer
* NPM
* Laravel Cloud

---

## 🏗️ Arquitetura

O projeto utiliza a arquitetura padrão do Laravel, aproveitando a separação de responsabilidades entre os principais componentes da framework:

```text
app/
├── Http/
│   ├── Controllers/
│   └── Requests/
│
├── Models/
│
resources/
├── views/
│   ├── layouts/
│   ├── chirps/
│   └── ...
│
database/
├── migrations/
└── factories/

routes/
└── web.php
```

---

## 🔐 Autenticação

A aplicação possui um sistema completo de autenticação que permite aos utilizadores:

* Criar uma conta
* Iniciar sessão
* Terminar sessão
* Aceder a funcionalidades protegidas
* Gerir as suas próprias publicações

O Laravel também fornece mecanismos de segurança importantes, como **hashing de palavras-passe e proteção CSRF**.

---

## 📝 CRUD de publicações

Os utilizadores podem gerir as suas publicações através das operações CRUD:

| Operação | Descrição                 |
| -------- | ------------------------- |
| Create   | Criar uma nova publicação |
| Read     | Visualizar publicações    |
| Update   | Editar uma publicação     |
| Delete   | Eliminar uma publicação   |

As operações são realizadas através dos Controllers, Models e Views do Laravel.

---

## 🎨 Interface

A interface foi desenvolvida utilizando:

* **Blade** para renderização das páginas
* **Tailwind CSS** para estilização
* **DaisyUI** para componentes de interface

A aplicação possui um design responsivo, permitindo a utilização em diferentes tamanhos de ecrã.

---

## 🚀 Instalação e execução local

### 1. Clonar o repositório

```bash
git clone https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git
```

Entrar na pasta:

```bash
cd SEU-REPOSITORIO
```

### 2. Instalar dependências PHP

```bash
composer install
```

### 3. Instalar dependências JavaScript

```bash
npm install
```

### 4. Criar o ficheiro `.env`

```bash
cp .env.example .env
```

No Windows, também podes simplesmente copiar o `.env.example` e renomeá-lo para:

```text
.env
```

### 5. Gerar a chave da aplicação

```bash
php artisan key:generate
```

### 6. Configurar a base de dados

Edite o ficheiro `.env` e configure as credenciais da sua base de dados.

Exemplo:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chirper
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Executar as migrations

```bash
php artisan migrate
```

### 8. Compilar os assets

Durante o desenvolvimento:

```bash
npm run dev
```

### 9. Iniciar o servidor Laravel

Noutro terminal:

```bash
php artisan serve
```

A aplicação estará disponível normalmente em:

```text
http://127.0.0.1:8000
```

---

## 🌐 Deploy

A aplicação foi preparada para ser executada em produção utilizando **Laravel Cloud**, permitindo realizar deploy e disponibilizar a aplicação na internet.

O projeto também pode ser adaptado para outras plataformas de hospedagem compatíveis com Laravel.

---

## 📚 O que aprendi com este projeto

Este projeto permitiu colocar em prática vários conceitos importantes do desenvolvimento com Laravel:

* Estrutura de uma aplicação Laravel
* Routing
* Controllers
* Models
* Eloquent ORM
* Migrations
* Blade Templates
* Form Requests
* Autenticação
* Autorização
* CRUD
* Relacionamentos com base de dados
* Validação de dados
* Proteção CSRF
* Hashing de palavras-passe
* Tailwind CSS
* DaisyUI
* Gestão de dependências com Composer e NPM
* Git e GitHub
* Deploy de aplicações Laravel

Mais do que simplesmente seguir um tutorial, este projeto serviu para compreender como diferentes partes do Laravel trabalham juntas para construir uma aplicação web completa.

---

## 🎯 Objetivo

O principal objetivo deste projeto foi aprofundar os meus conhecimentos em **Laravel e desenvolvimento web full-stack**, construindo uma aplicação funcional do início ao fim.

Este projeto representa uma etapa importante na minha jornada de aprendizagem e servirá como base para projetos Laravel mais complexos no futuro.

---

## 🔮 Próximas melhorias

Algumas funcionalidades que podem ser adicionadas futuramente:

* ❤️ Sistema de likes
* 💬 Comentários
* 👥 Seguir outros utilizadores
* 🔔 Notificações
* 🖼️ Upload de imagens
* 👤 Perfil personalizado
* 🔎 Pesquisa de utilizadores e publicações
* 🌙 Dark mode
* 📊 Dashboard administrativo
* 📱 Melhorias para dispositivos móveis
* 🧪 Testes automatizados
* 🔌 API REST

---

## 👨‍💻 Autor

**Gebril Manuel**

Desenvolvedor interessado em **Laravel, PHP, JavaScript e desenvolvimento web**.

---

## ⭐ Contribuição

Este projeto foi desenvolvido principalmente para fins de aprendizagem.

Sugestões, melhorias e contribuições são bem-vindas.

Se o projeto foi útil para ti, considera deixar uma ⭐ no repositório.

---

## 📄 Licença

Este projeto está disponível para fins educacionais e de aprendizagem.
