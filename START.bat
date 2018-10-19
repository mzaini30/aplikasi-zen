@echo off

set port=7569
set proyek=zen

title %proyek%

copy php\php.template.ini php\php.ini
echo extension_dir = "%cd%\php\ext" >> php\php.ini

start chrome http://localhost:%port%

cd %proyek%
..\php\php -S localhost:%port%