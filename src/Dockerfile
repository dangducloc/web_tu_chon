# Use Ubuntu as the base image
FROM ubuntu:20.04

# Set noninteractive mode and configure time zone
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=Asia/Ho_Chi_Minh

# Install Apache, PHP, MySQLi, and other dependencies
RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql wget nano apt-transport-https gnupg2 curl && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*
# Install Filebeat to send data log access to ELK Stalk
RUN wget -qO - https://artifacts.elastic.co/GPG-KEY-elasticsearch | apt-key add - && \
    echo "deb https://artifacts.elastic.co/packages/7.x/apt stable main" | tee -a /etc/apt/sources.list.d/elastic-7.x.list && \
    apt-get update && \
    apt-get install filebeat packetbeat libpcap0.8 && \
    apt-get clean && \ 
    rm -rf /var/lib/apt/lists/*
# Config hosts to connect ELK with HTTPS and TLS (after config ELK HTTPS and somethings else)
RUN echo "192.168.56.104 kibana.local elasticsearch.local" | tee -a /etc/hosts

# Set working directory
WORKDIR /var/www/html/
RUN rm -rf index.html
COPY ./WEB .

# Change permissions
RUN chown -R www-data:www-data /var/www/html/images/
RUN chmod -R 777 /var/www/html/images/

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache server
CMD ["apache2ctl", "-D", "FOREGROUND"]
