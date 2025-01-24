# Usar imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instalar extensões do PHP necessárias para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar todo o conteúdo da aplicação para o diretório de trabalho
COPY . /var/www/html

# Conceder permissões para o Apache acessar os arquivos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Expor a porta 80 para o Apache
EXPOSE 80

# Iniciar o Apache
CMD ["apache2-foreground"]
