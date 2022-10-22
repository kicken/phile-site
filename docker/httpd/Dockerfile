FROM httpd:latest

COPY httpd.conf /usr/local/apache2/conf/httpd.conf

ENV user=app
ENV uid=1000
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
 && mkdir -p /home/$user \
 && chown -R $user:$user /home/$user

