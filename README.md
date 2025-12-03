# BBY Tech - Blog & Portfolio

Site oficial da BBY Tech com blog integrado, desenvolvido com Symfony 7.2 e Twig Components.

## 🚀 Características

- **Landing Page Profissional**: Apresentação da empresa e produtos
- **Blog Integrado**: Sistema de posts sem banco de dados (arquivos Twig)
- **Componentes Reutilizáveis**: Navbar, Footer e ProductCard abstraídos com Symfony UX Twig Components
- **Design Moderno**: TailwindCSS com tema dark (slate/indigo)
- **SEO Otimizado**: Meta tags e estrutura semântica
- **Segurança**: Configurado contra vulnerabilidades comuns

## 📦 Tecnologias

- PHP 8.2+
- Symfony 7.2
- Symfony UX Twig Component
- TailwindCSS
- Twig Templates

## 🏗️ Estrutura

```
src/
├── Controller/
│   ├── HomeController.php      # Landing page
│   └── BlogController.php       # Listagem e posts
└── Twig/Components/
    ├── Navbar.php               # Componente de navegação
    ├── Footer.php               # Componente de rodapé
    └── ProductCard.php          # Card de produtos

templates/
├── base.html.twig               # Template base
├── components/                  # Templates dos componentes
├── home/
│   └── index.html.twig          # Landing page
└── blog/
    ├── index.html.twig          # Listagem de posts
    ├── post_base.html.twig      # Template base para posts
    └── posts/                   # Posts individuais (Twig)
        └── primeiro-post.html.twig
```

## 🎯 Como Adicionar Novos Posts

1. Crie um arquivo `.html.twig` em `templates/blog/posts/`
2. Use o template base `post_base.html.twig`
3. Adicione o post no array `$posts` do `BlogController::index()`

Exemplo:

```twig
{% extends 'blog/post_base.html.twig' %}

{% block title %}Título do Post | Blog BBY Tech{% endblock %}
{% block post_title %}Título do Post{% endblock %}
{% block post_date_iso %}2024-12-02{% endblock %}
{% block post_date %}02 de Dezembro de 2024{% endblock %}

{% block post_content %}
    <p>Conteúdo do seu post aqui...</p>
{% endblock %}
```

## 🔧 Instalação Local

```bash
# Instalar dependências
composer install

# Iniciar servidor de desenvolvimento
symfony server:start

# Ou usando PHP built-in server
php -S localhost:8000 -t public
```

## 🔒 Segurança

- Headers de segurança configurados
- Sem banco de dados (reduz superfície de ataque)
- Validação de rotas e parâmetros
- Content Security Policy pronto para produção

## 📝 Produtos BBY Tech

- **Gatepass**: Sistema de gestão de ingressos e eventos
- **MenuFácil**: Cardápio digital para restaurantes (em desenvolvimento)

## 👨‍💻 Desenvolvedor

Jonathan Bufon - Estudante de Ciência da Computação @ Unochapecó

- GitHub: [@JonathanBufon](https://github.com/JonathanBufon)
- LinkedIn: [Jonathan Bufon](https://www.linkedin.com/in/jonathan-bufon-892287247/)
- Email: suporte@bbytech.com.br

## 📄 Licença

Proprietary - BBY Tech © 2024
