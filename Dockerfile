FROM tomcat:8.0.20-jre8
MAINTAINER Srikanth <ashok@oracle.com>
EXPOSE 8080
COPY target/maven-new.war /usr/local/tomcat/webapps/maven-new.war
