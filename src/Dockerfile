# Use Ubuntu as the base image
FROM ubuntu:20.04

# Set environment variables for noninteractive mode and time zone
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=Asia/Ho_Chi_Minh

# Install Apache, PHP, MySQLi, and other dependencies
RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql tzdata && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html/

# Copy website files to the container
COPY ./WEB .

# Remove default Apache index.html file
RUN rm -f /var/www/html/index.html

# Change permissions for the images directory
RUN chown -R www-data:www-data /var/www/html/images/ && \
    chmod -R 777 /var/www/html/images/

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache server in the foreground
CMD ["apache2ctl", "-D", "FOREGROUND"]
