# Use Ubuntu as the base image
FROM ubuntu:20.04

# Set environment variables for noninteractive mode and time zone
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=Asia/Ho_Chi_Minh

# Install Apache, PHP, MySQLi, and other dependencies
RUN apt-get update && \
    apt-get install -y g++ flex bison curl apache2-dev \
        doxygen libyajl-dev ssdeep liblua5.2-dev \
        libgeoip-dev libtool dh-autoreconf \
        libcurl4-gnutls-dev libxml2 libpcre++-dev \
        libxml2-dev git wget tar apache2 php \
        libapache2-mod-php php-mysql nano apt-transport-https gnupg2 \
        autoconf automake pkg-config && \
    wget -qO - https://artifacts.elastic.co/GPG-KEY-elasticsearch | apt-key add - && \
    echo "deb https://artifacts.elastic.co/packages/7.x/apt stable main" | tee -a /etc/apt/sources.list.d/elastic-7.x.list && \
    apt-get update && \
    apt-get install -y filebeat packetbeat libpcap0.8 && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*
# Download LibModsecurity 
RUN git clone https://github.com/owasp-modsecurity/ModSecurity.git
# Initialize and update git submodules to get libInjection
RUN cd ModSecurity && \
    git submodule init && \
    git submodule update
    # Compile and Install LibModsecurity
RUN cd ModSecurity && \
./build.sh && ./configure && \
make && make install

# Install ModSecurity-Apache Connector
RUN cd ~ && git clone https://github.com/SpiderLabs/ModSecurity-apache

RUN cd ~/ModSecurity-apache && \
    ./autogen.sh && \
    ./configure --with-libmodsecurity=/usr/local/modsecurity/ && \
    make && \
    make install
# Load the Apache ModSecurity Connector Module
RUN echo "LoadModule security3_module /usr/lib/apache2/modules/mod_security3.so" >> /etc/apache2/apache2.conf

#Configure ModSecurity
RUN mkdir /etc/apache2/modsecurity.d && \
    cp ModSecurity/modsecurity.conf-recommended /etc/apache2/modsecurity.d/modsecurity.conf && \
    cp ModSecurity/unicode.mapping /etc/apache2/modsecurity.d/ && \
    sed -i 's/SecRuleEngine DetectionOnly/SecRuleEngine On/' /etc/apache2/modsecurity.d/modsecurity.conf
ADD modsec_rules.conf /etc/apache2/modsecurity.d/

# Install OWASP ModSecurity Core Rule Set (CRS) on Ubuntu
RUN git clone https://github.com/SpiderLabs/owasp-modsecurity-crs.git /etc/apache2/modsecurity.d/owasp-crs && \
    cp /etc/apache2/modsecurity.d/owasp-crs/crs-setup.conf.example /etc/apache2/modsecurity.d/owasp-crs/crs-setup.conf

# Activate ModSecurity
RUN mv /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf.old
ADD 000-default.conf /etc/apache2/sites-available/


# Copy file cert to filebeat and somethings
COPY ./ca/ca.crt /etc/filebeat/
COPY ./ca/ca.crt /etc/packetbeat/
# RUN filebeat modules enable apache 
# Set working directory
WORKDIR /var/www/html/

# Copy website files to the container
COPY ./WEB .

# Remove default Apache index.html file
RUN rm -rf /var/www/html/index.html

# Change permissions for the images directory
RUN chown -R www-data:www-data /var/www/html/images/ && \
    chmod -R 777 /var/www/html/images/

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache server in the foreground
CMD ["apache2ctl", "-D", "FOREGROUND"]
