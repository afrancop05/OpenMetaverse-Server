#!/bin/bash

php artisan serve --host "192.168.33.20" &
npm run dev &
sleep 1
echo "> Pulas Enter para salir <"
read
killall php
kill $(ps | grep node | cut -d " " -f4)
