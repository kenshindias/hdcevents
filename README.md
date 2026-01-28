# HDC Events

> Meu primeiro projeto com Laravel! Uma aplicação web para gerenciar e descobrir eventos.

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-v12-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-v8.2-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-00758F?style=for-the-badge&logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

**Desenvolvido por** [Ighor Dias](https://github.com/kenshindias) | Cientista da Computação & Aspirante a Programador

</div>

---

## 📋 Sobre o Projeto

**HDC Events** é uma plataforma web desenvolvida como primeiro projeto prático com Laravel, baseada no excelente curso de Matheus Battisti do canal [Hora de Codar](https://www.youtube.com/@MatheusBattisti) no YouTube.

O projeto demonstra os fundamentos essenciais do desenvolvimento web com Laravel, incluindo:
- Autenticação e autorização de usuários
- Relacionamentos entre modelos (One-to-Many, Many-to-Many)
- CRUD completo de eventos
- Dashboard pessoal
- Sistema de participação em eventos

---

## ✨ Funcionalidades Principais

- 👤 **Autenticação de Usuários** - Registro, login e gerenciamento de perfil com Fortify
- 🎯 **Criar Eventos** - Usuários podem criar seus próprios eventos com descrição, data, local e itens
- 🔍 **Descobrir Eventos** - Busca e filtro de eventos disponíveis
- 📸 **Upload de Imagens** - Adicione capas aos seus eventos
- ✅ **Participar de Eventos** - Confirme presença em eventos de outros usuários
- 📊 **Dashboard Pessoal** - Visualize seus eventos criados e eventos que você participa
- 🚪 **Sair de Eventos** - Remova-se da participação de um evento
- 🛡️ **Autenticação JWT** - Integração com Laravel Sanctum para APIs seguras

---

## 🛠️ Tecnologias Utilizadas

### Backend
- **Laravel 12** - Framework PHP moderno
- **MySQL** - Banco de dados relacional
- **Eloquent ORM** - Manipulação de dados
- **Laravel Fortify** - Autenticação integrada
- **Laravel Jetstream** - Scaffolding de UI/Autenticação avançada
- **Laravel Sanctum** - Autenticação API

### Frontend
- **Blade Templates** - Motor de template Laravel
- **Livewire 3** - Componentes dinâmicos sem deixar PHP
- **Tailwind CSS** - Framework CSS utility-first
- **Bootstrap 5** - Framework CSS responsivo
- **Vite** - Build tool moderno

### DevOps & Testing
- **PHPUnit** - Framework de testes
- **Laravel Pint** - Code style fixer

---

## 🚀 Como Executar Localmente

### Pré-requisitos
- PHP 8.2+
- Composer
- Node.js 16+
- MySQL 8.0+

### Instalação

1. **Clone o repositório**
```bash
git clone https://github.com/kenshindias/hdcevents.git
cd hdcevents
```

2. **Instale as dependências PHP**
```bash
composer install
```

3. **Configure o arquivo .env**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure o banco de dados** no arquivo `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hdceventscurso
DB_USERNAME=root
DB_PASSWORD=
```

5. **Execute as migrations**
```bash
php artisan migrate
```

6. **Instale as dependências frontend**
```bash
npm install
```

### Desenvolvimento

**Opção 1: Setup automático (recomendado)**
```bash
composer run setup
```

**Opção 2: Manual**
```bash
# Terminal 1 - Servidor Laravel
php artisan serve

# Terminal 2 - Queue listener
php artisan queue:listen --tries=1

# Terminal 3 - Logs em tempo real
php artisan pail

# Terminal 4 - Build do Vite
npm run dev
```

### Testing

```bash
composer test
```

---

## 📁 Estrutura do Projeto

```
hdcevents/
├── app/
│   ├── Http/Controllers/EventController.php    # Lógica dos eventos
│   ├── Models/
│   │   ├── Event.php                          # Modelo Event
│   │   └── User.php                           # Modelo User
│   └── Providers/
├── database/
│   ├── migrations/                            # Schema do BD
│   └── factories/                             # Factories para testes
├── resources/
│   ├── css/                                   # Estilos personalizados
│   ├── js/                                    # JavaScript customizado
│   └── views/                                 # Templates Blade
├── routes/
│   ├── web.php                                # Rotas web
│   └── api.php                                # Rotas API
└── config/                                    # Configurações da aplicação
```

---

## 📚 O que Aprendi

Este projeto me permitiu praticar e consolidar conhecimentos em:

✅ Arquitetura MVC no Laravel  
✅ Relacionamentos Eloquent (hasMany, belongsToMany)  
✅ Autenticação e Autorização  
✅ Migrations e Schema Builder  
✅ Form handling e validação  
✅ Upload de arquivos  
✅ CRUD operations  
✅ Views com Blade Templates  
✅ Routing no Laravel  
✅ Boas práticas em desenvolvimento web  

---

## 🎓 Créditos

Este projeto foi desenvolvido seguindo o curso **"Gerenciador de Eventos com Laravel"** do professor **Matheus Battisti** do canal [Hora de Codar](https://www.youtube.com/@matheusbattisti).

Um grande obrigado ao professor por compartilhar conhecimento de qualidade! 🙏

---

## 💬 Entre em Contato

Se você tiver dúvidas, sugestões ou quiser discutir sobre desenvolvimento, sinta-se livre para abrir uma issue ou me contatar!

**GitHub:** [@kenshindias](https://github.com/kenshindias)

**E-mail:** [@ighordias@outlook.com](ighordias@outlook.com)

---

<div align="center">

**Feito com dedicação por [Ighor Dias](https://github.com/kenshindias)**

*Cientista da Computação | Aspirante a Programador | Entusiasta de Tecnologia*

</div>
