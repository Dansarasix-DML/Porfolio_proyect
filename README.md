Importa la base de datos y añade el siguiente Virtual Host para probarlo:

```
<VirtualHost porfolio.es:80>
    DocumentRoot "C:/xampp/htdocs/DWES/Ud5/act_eval/proyecto/public/"
    ServerName porfolio.es
    <Directory C:/xampp/htdocs/DWES/Ud5/act_eval/proyecto/>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Y añade esta línea a tu host: ``127.0.0.1 porfolio.es``

**Para iniciar sesión**

- Laura: root
- Freddy: Admin1234
- Daniel: 1234
