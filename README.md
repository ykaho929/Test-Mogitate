# Mogitate  
## 環境開発  
Dockerビルド  
 git@github.com :ykaho929/Test-Contactform.git  
 docker-compose を起動 -d -build  

Laravel環境の構築  
 docker-compose exec php bush  
 composer install  
 env.exampleファイルから.envを作成し、環境変数を変更  
 php artisan key:generate  
 php artisan migrate  
 php artisan db:seed  

## 使用技術（実行環境）  
・PHP 8.3.8  
・Laravel 8.83.8  
・MySQL 8.0.39  
## ER図

## URL  
・開発環境：http://localhost  
・phpMyAdmin: http://localhost:8080/  
