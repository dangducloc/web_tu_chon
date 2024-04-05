# Use Ubuntu as the base image
FROM ubuntu:latest

# Set noninteractive mode and configure time zone
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=Asia/Ho_Chi_Minh

# Install Apache, PHP, MySQLi, and other dependencies
RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Put flag on somewhere
RUN echo "Flag{Cờ đây chắc thế}" > /tmp/flag.txt

# Set working directory
WORKDIR /var/www/html/
COPY . .

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache server
CMD ["apache2ctl", "-D", "FOREGROUND"]
