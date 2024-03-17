# Use the existing Tomcat base image
FROM tomcat:8.0.20-jre8

# Install PHP and Apache
RUN apt-get update && \
    apt-get install -y php apache2 libapache2-mod-php && \
    rm -rf /var/lib/apt/lists/*

# Copy your WAR file to Tomcat webapps directory
COPY target/maven-new.war /usr/local/tomcat/webapps/maven-new.war

# Expose ports
EXPOSE 8080

# Start Tomcat
CMD ["catalina.sh", "run"]
