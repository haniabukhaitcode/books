# php_mysql
```bash
sudo chmod -R 777 /var/www/
```

```bash
sudo apt install php7.2-mysql
```

```bash
sudo nano /etc/php/7.2/apache2/php.ini
```


- search for error_reporting and make it error_reporting = E_ALL
- search for display_errors and make it display_errors = On

```bash
sudo service apache2 restart
```


- https://www.digitalocean.com/community/tutorials/how-to-add-swap-space-on-ubuntu-18-04
