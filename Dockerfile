FROM tomcat:8.0.20-jre8
MAINTAINER Srikanth <ashok@oracle.com>
EXPOSE 8080

# Install PHP and Apache
RUN apt-get update && \
    apt-get install -y --force-yes php apache2 libapache2-mod-php && \
    rm -rf /var/lib/apt/lists/*

# Copy WAR file to Tomcat webapps directory
COPY target/maven-new.war /usr/local/tomcat/webapps/maven-new.war

# Start Apache and MySQL services
CMD service apache2 start && \
    service mysql start && \
    catalina.sh run
