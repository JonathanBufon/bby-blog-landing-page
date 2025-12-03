# 🔒 Guia de Segurança - BBY Tech Blog

Este documento descreve as medidas de segurança implementadas no projeto.

## 🛡️ Medidas Implementadas

### 1. Headers de Segurança HTTP

Implementados via `SecurityHeadersSubscriber`:

- **X-Content-Type-Options: nosniff** - Previne MIME type sniffing
- **X-Frame-Options: DENY** - Previne clickjacking
- **X-XSS-Protection: 1; mode=block** - Proteção contra XSS (navegadores antigos)
- **Referrer-Policy: strict-origin-when-cross-origin** - Controle de informações de referência
- **Content-Security-Policy** - Controle de recursos carregados
- **Strict-Transport-Security** - Força HTTPS (em produção)
- **Permissions-Policy** - Desabilita APIs sensíveis

### 2. Proteção de Arquivos Sensíveis

Via `.htaccess`:

- Bloqueio de acesso a arquivos `.env`
- Bloqueio de `composer.json` e `composer.lock`
- Desabilitação de listagem de diretórios
- Restrição de execução de PHP (apenas `index.php`)

### 3. Arquitetura Sem Banco de Dados

- **Nenhum dado sensível armazenado** - Posts são arquivos estáticos
- **Sem SQL Injection** - Não há queries de banco
- **Superfície de ataque reduzida** - Menos pontos de falha

### 4. Validação e Sanitização

- Validação de rotas com Symfony Routing
- Tratamento de exceções para posts não encontrados
- Escape automático no Twig

### 5. Dependências Atualizadas

- PHP 8.2+ (versão segura e mantida)
- Symfony 7.2 (última versão stable)
- Composer com lock file para reprodutibilidade

## ⚠️ Checklist de Segurança para Produção

Antes de fazer deploy em produção:

- [ ] Alterar `APP_ENV=prod` no `.env`
- [ ] Gerar novo `APP_SECRET` para produção
- [ ] Configurar HTTPS no servidor
- [ ] Habilitar HSTS no `.htaccess`
- [ ] Verificar permissões de arquivos (644 para arquivos, 755 para diretórios)
- [ ] Garantir que `/var` não seja público
- [ ] Configurar logs adequados
- [ ] Implementar rate limiting (se necessário)
- [ ] Configurar firewall do servidor
- [ ] Fazer backup regular dos arquivos

## 🚨 Reportar Vulnerabilidades

Se você encontrar alguma vulnerabilidade de segurança, por favor **NÃO** abra uma issue pública.

Entre em contato diretamente via:
- Email: suporte@bbytech.com.br
- Assunto: [SECURITY] Descrição breve

## 📚 Referências

- [OWASP Top 10](https://owasp.org/www-project-top-ten/)
- [Symfony Security Best Practices](https://symfony.com/doc/current/security.html)
- [Mozilla Web Security Guidelines](https://infosec.mozilla.org/guidelines/web_security)

## 🔄 Atualizações de Segurança

Mantenha as dependências atualizadas:

```bash
composer update
```

Verifique vulnerabilidades conhecidas:

```bash
symfony check:security
```

---

**Última atualização**: Dezembro 2024
