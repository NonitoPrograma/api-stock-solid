Cositas importantes para ejecutarlo:
1. Abrir XAMPP
2. En Apache, ir a config, httpd.conf.
3. Dentro de ahi, modificar las siguentes lineas: Listen 80 por Listen 3000
4. ServerName localhost:80 por ServerName localhost:3000
5. Ahora prende el Apache
6. Abre el CMD y entra al directorio del Proyecto SOLID. cd C:\Users\TU_RUTA_DEL_ARCHIVO\Proyecto API Solid
7. Pon C:\xampp\php\php.exe -S localhost:3000 
8. Si dice "Development Server (http://localhost:3000) started", minimizalo y vamos bien
9. Abre otro CMD
10. Pon curl -X POST -H "Content-Type: application/json" -d "{\"ventaId\":154872,\"fecha\":\"2026-09-24T16:20:35-03:00\",\"cajeroId\":42,\"productos\":[{\"codigo\":\"7791234567890\",\"cantidad\":2,\"precioUnitario\":1250.50},{\"codigo\":\"7799876543210\",\"cantidad\":1,\"precioUnitario\":3500.00}]}" http://localhost:3000/index.php
11. Tuvo que haber tirado el post :D : {"ok":true,"referencia":"VENTA-154872"}
12. Eso es todo :D
