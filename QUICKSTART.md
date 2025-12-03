# ⚡ Quick Start - BBY Tech Blog

## 🚀 Iniciar Desenvolvimento

```bash
# Iniciar servidor de desenvolvimento
symfony server:start

# Ou usando PHP built-in
php -S localhost:8000 -t public
```

Acesse: http://localhost:8000 (ou porta indicada)

## ✍️ Adicionar Novo Post

### 1. Criar arquivo do post

Crie um arquivo em `templates/blog/posts/seu-post.html.twig`:

```twig
{% extends 'blog/post_base.html.twig' %}

{% block title %}Título do Post | Blog BBY Tech{% endblock %}
{% block post_title %}Título do Post{% endblock %}
{% block post_date_iso %}2024-12-02{% endblock %}
{% block post_date %}02 de Dezembro de 2024{% endblock %}

{% block post_content %}
    <p>Seu conteúdo aqui...</p>
{% endblock %}
```

💡 **Dica**: Use o arquivo `.template-example.html.twig` como base!

### 2. Adicionar na listagem

Edite `src/Controller/BlogController.php` e adicione no array `$posts`:

```php
[
    'slug' => 'seu-post',
    'title' => 'Título do Post',
    'excerpt' => 'Resumo curto do post.',
    'date' => new \DateTime('2024-12-02'),
    'author' => 'Jonathan Bufon'
]
```

### 3. Acessar

Visite: http://localhost:8000/blog/seu-post

## 🎨 Modificar Produtos

Edite `src/Controller/HomeController.php`:

```php
$products = [
    [
        'title' => 'Nome do Produto',
        'description' => 'Descrição...',
        'status' => 'available', // ou 'development'
        'url' => 'https://produto.com.br'
    ]
];
```

## 📁 Estrutura Importante

```
templates/
├── base.html.twig           # Layout base (Navbar + Footer)
├── components/              # Componentes reutilizáveis
│   ├── Navbar.html.twig
│   ├── Footer.html.twig
│   └── ProductCard.html.twig
├── home/
│   └── index.html.twig      # Landing page
└── blog/
    ├── index.html.twig      # Lista de posts
    ├── post_base.html.twig  # Base para posts
    └── posts/               # Seus posts aqui!
```

## 🔧 Comandos Úteis

```bash
# Limpar cache
php bin/console cache:clear

# Ver rotas
php bin/console debug:router

# Ver componentes Twig
php bin/console debug:twig-component

# Verificar segurança
symfony check:security

# Parar servidor
symfony server:stop
```

## 🎯 Páginas Principais

- **Home**: http://localhost:8000/
- **Blog**: http://localhost:8000/blog
- **Post exemplo**: http://localhost:8000/blog/primeiro-post

## 🔒 Segurança

✅ Headers de segurança configurados
✅ Proteção contra XSS, CSRF, Clickjacking
✅ Sem banco de dados = Sem SQL Injection
✅ APP_SECRET configurado

Veja `SECURITY.md` para mais detalhes.

## 📚 Documentação Completa

- **README.md** - Visão geral do projeto
- **SECURITY.md** - Medidas de segurança
- **DEPLOY.md** - Guia de deploy para produção

## 🆘 Problemas?

### Porta já em uso
```bash
symfony server:start --port=8001
```

### Cache não atualiza
```bash
php bin/console cache:clear
```

### Componente não aparece
```bash
# Verificar se está registrado
php bin/console debug:twig-component

# Limpar cache
php bin/console cache:clear
```

---

**Desenvolvido com ❤️ por BBY Tech**
