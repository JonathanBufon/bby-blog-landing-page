# 🚀 Guia de Deploy - BBY Tech Blog

## Preparação para Produção

### 1. Configurar Variáveis de Ambiente

Crie um arquivo `.env.local` (não commitado) com:

```bash
APP_ENV=prod
APP_SECRET=GERE_UM_NOVO_SECRET_AQUI
DEFAULT_URI=https://bbytech.com.br
```

Para gerar um novo secret:
```bash
php -r "echo bin2hex(random_bytes(32));"
```

### 2. Limpar e Otimizar Cache

```bash
# Limpar cache de desenvolvimento
php bin/console cache:clear

# Gerar cache de produção
APP_ENV=prod php bin/console cache:warmup

# Otimizar autoloader do Composer
composer dump-autoload --optimize --classmap-authoritative
```

### 3. Compilar Assets (se necessário)

Se no futuro você migrar do TailwindCSS via CDN para local:

```bash
php bin/console asset-map:compile
```

## Deploy Manual (Servidor Compartilhado)

### Pré-requisitos
- PHP 8.2 ou superior
- Composer instalado
- Acesso SSH ou FTP

### Passos

1. **Upload dos arquivos**
   ```bash
   # Via RSYNC (recomendado)
   rsync -avz --exclude 'var/*' --exclude '.env.local' \
         ./ usuario@servidor:/caminho/do/site/
   
   # Ou via FTP
   # Envie todos os arquivos exceto: var/, .env.local
   ```

2. **No servidor, instalar dependências**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

3. **Configurar permissões**
   ```bash
   chmod 644 .env
   chmod 755 bin/console
   chmod -R 775 var/
   ```

4. **Configurar Document Root**
   
   O document root do servidor deve apontar para `/public`
   
   Exemplo no Apache (.htaccess ou VirtualHost):
   ```apache
   DocumentRoot /var/www/bbytech/public
   ```

5. **Limpar cache**
   ```bash
   php bin/console cache:clear --env=prod --no-debug
   ```

## Deploy via Git (VPS)

### Setup inicial

```bash
# Clone o repositório
git clone https://github.com/seu-usuario/bby-blog.git
cd bby-blog

# Instalar dependências
composer install --no-dev --optimize-autoloader

# Configurar .env.local
cp .env .env.local
# Edite .env.local com as configurações de produção

# Configurar permissões
chmod -R 775 var/
```

### Configurar Nginx

```nginx
server {
    listen 80;
    server_name bbytech.com.br www.bbytech.com.br;
    root /var/www/bbytech/public;

    location / {
        try_files $uri /index.php$is_args$args;
    }

    location ~ ^/index\.php(/|$) {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        internal;
    }

    location ~ \.php$ {
        return 404;
    }
}
```

### Configurar Apache

```apache
<VirtualHost *:80>
    ServerName bbytech.com.br
    ServerAlias www.bbytech.com.br
    DocumentRoot /var/www/bbytech/public

    <Directory /var/www/bbytech/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/bbytech_error.log
    CustomLog ${APACHE_LOG_DIR}/bbytech_access.log combined
</VirtualHost>
```

### Atualizar aplicação

```bash
#!/bin/bash
# update.sh - Script de atualização

git pull origin main
composer install --no-dev --optimize-autoloader
php bin/console cache:clear --env=prod --no-debug
```

## HTTPS com Let's Encrypt

```bash
# Instalar Certbot
sudo apt install certbot

# Para Nginx
sudo certbot --nginx -d bbytech.com.br -d www.bbytech.com.br

# Para Apache
sudo certbot --apache -d bbytech.com.br -d www.bbytech.com.br

# Renovação automática já está configurada
```

## Checklist Pré-Deploy

- [ ] `APP_ENV=prod` configurado
- [ ] `APP_SECRET` único gerado
- [ ] Dependências instaladas com `--no-dev`
- [ ] Cache de produção gerado
- [ ] Permissões de arquivos corretas
- [ ] HTTPS configurado
- [ ] Headers de segurança habilitados
- [ ] Logs configurados e monitorados
- [ ] Backup configurado

## Troubleshooting

### Erro 500
```bash
# Ver logs de erro
tail -f var/log/prod.log

# Verificar permissões
ls -la var/
```

### Cache não atualiza
```bash
# Limpar completamente
rm -rf var/cache/*
php bin/console cache:warmup --env=prod
```

### Problemas com componentes Twig
```bash
# Verificar se os componentes estão registrados
php bin/console debug:twig-component
```

## Performance

### OPcache (Recomendado)

Adicione ao `php.ini`:

```ini
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=10000
opcache.revalidate_freq=60
opcache.fast_shutdown=1
```

### CDN

Configure um CDN (Cloudflare, etc) para:
- Cache de assets estáticos
- Proteção DDoS
- Compressão automática

---

**Dúvidas?** Contate: suporte@bbytech.com.br
