# The_Looper

## Description
The objective of this project is to make a copy of a given website.

The said website: https://stormy-plateau-54488.herokuapp.com

## prerequisites
- Composer
- MariaDB
- PHP 8
- Sass

## project configuration
- After clonning the project, please run `composer i` in the terminal at the project root.
- After that, please run the following SQL script in your favorite SQL editor tool. You will have to have a pre-created database as the script only create tables and test datas.
- The project uses SCSS for the styles. You will have to compile it with sass.
  - The command to compile: 
    ```
    sass View/Style/SCSS/Global.scss View/Style/CSS/Global.css
    ```

  - You can configure a file watcher with these parameters too
    ```
    File type : SCSS style sheet

    Program : sass
    Arguments : $FileName$:$ProjectFileDir$\View\Style\CSS\$FileNameWithoutExtension$.css
    Output paths to refresh : $FileName$:$ProjectFileDir$\View\Style\CSS\$FileNameWithoutExtension$.css$FileNameWithoutExtension$.css:$FileNameWithoutExtension$.css.map
    ```

## Config files
 Please copy the `Config/.env.example.php` file and past it with the `.env.php` in the same directory. After that, please set your database connection infos in the file.

## Running tests
- To run the tests, please run the following command in your terminal at the project root: 
  ```
  php ./vendor/phpunit/phpunit/phpunit ./
  ```
