alias up="docker compose up -d"
alias down="docker-compose stop"
alias first="cd src/frontend && npm install && cd ../.." 
alias second="php artisan migrate && sed -i~ '/^DB_HOST=/s/=.*/=mysql/' .env && cd ../.." 
alias start="first && up && sleep 10 && cd src/backend && sed -i~ '/^DB_HOST=/s/=.*/=127.0.0.1/' .env && second"