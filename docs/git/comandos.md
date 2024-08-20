GIT & GITHUB (BITBUCKET, GITLAB)

## Descargar e instalar
- https:/git-sm.com

## Crear una cuenta en (Github)
- https://github.com
- crear un repositorio [direccion remota]
---

### Comandos iniciales de GIT (para proyectos)
- para (proyectos - repositorios) existentes
```
git clone //clonar un repositorio que ya existe
```
- para inicializar un nuevo repositorio

```
git init //proyecto nuevo
```
- para realizar una referencia del repo Local al remoto 
```
git remote add origin https://github.com/Cesar311/backend_laravel_vue_vite.git
```

### Comandos comunes ()
```
git add .
git commit -m "Nuevos cambios"
git push origin master
```


### Clonar un proyecto
```
C:\laragon\www\github>git clone https://github.com/cchura94/backend_laravel_vue_vite.git
```
- ingresar a la carpeta creada 
```
C:\laragon\www\github>cd backend_laravel_vue_vite


1. Copiar y pegar el archivo (.env.example)
2. renombrar en archivo a (.env)
3. Ejecutar el comando composer update apra actualizar las dependencias o paquetes de composer
    composer update
4. Ejecutar el comando 
    php artisan key:generate
```
