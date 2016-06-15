## Laravel Blog 
### 地址:115.28.155.116/laravel-blog/public
使用laravel进行编写

前端使用:

[MaterialDesignBootstrap](http://fezvrasta.github.io/bootstrap-material-design/)

[Pjax](https://github.com/defunkt/jquery-pjax)

Markdown编辑器使用Vue.js与Showdown.js

服务端使用:

不管是Nginx还是Apache都需要进行重写

MySQL
##使用说明
下载:
```
$ git clone https://github.com/cheerplaceless/laravel-blog.git
```
加载依赖:
```
$ cd laravel-blog
$ composer install
$ cd public
$ bower install
```
目录权限配置:
```
$ cd public
$ mkdir upload
$ chmod -R 777 upload
$ cd ..
$ chmod -R 777 storge
$ chmod -R 777 bootstrap/cache
```
数据库配置:
```
vim .env

DB_CONNECTION=mysql
DB_HOST=yourhost
DB_PORT=3306
DB_DATABASE=your databasename
DB_USERNAME=root
DB_PASSWORD=
```
创建数据库:
```
不管用什么方式创建都可以,但是需要与.env中的DB_DATABASE设置保持一致
```
创建表:
```
$ php artisan migrate
```
Rewrite:
```
.htaccess:
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>
    Options +FollowSymLinks
    RewriteEngine On

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)/$ /$1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
</IfModule>

nginx:
  location /laravel-blog/public/ {
  if (!-e $request_filename)
  {
       rewrite  ^/laravel-blog/public/(.*)$  /laravel-blog/public/index.php?s=$1  last;
  }
            #try_files $uri $uri/ /index.php?$query_string;
  }
```
##发布到服务器
个人blog 修改app/Http/route.php 注释掉auth路由Route::auth();仅仅保留login和logout
##关于
因为仅仅写了一个多星期,所以还有些地方存在不足,会在后续进行一些更改