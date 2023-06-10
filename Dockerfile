FROM centos:7.9.2009

RUN yum -y update && \
    yum -y install sudo httpd httpd-tools epel-release && \
    yum -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm && \
    yum -y install https://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
    yum -y install yum-utils && \
    yum-config-manager --enable remi-php74 && \
    yum -y install php php-cli php-fpm php-mysqlnd php-zip php-devel php-gd php-mcrypt php-mbstring php-curl php-xml php-pear php-bcmath vim nano wget git openjdk8 openjdk11 nc mysql ansible mailx docker postfix && \
    yum clean all

COPY index.php /var/www/html/
COPY entrypoint.sh /usr/local/bin/

RUN chmod 755 /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

EXPOSE 80

CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

