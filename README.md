A marketing CRUD system with Roles based permission to access routes. 
Users can see listed marketing channels but they cannot create, delete or update except an admin assigns them the "marketer" role

#### Set up:

Clone the project and install packages using composer install 

create a `.env` and copy the `.env.example` to it while adjusting the database settings

Run `php artisan migrate` to create database

#### Populate database with users and one admin
There is a seeder for this
run `php artisan db:seed`  . it creates about 10 users and one user with the adminstrator role 

Run `php artisan serve`

#### Test
For test, open another terminal and run `php artisan test`


![Screenshot from 2024-03-17 18-03-10](https://github.com/jovialcore/Apex/assets/32295501/de4caf95-8b8c-455f-a143-8c258efea0a2)
![Screenshot from 2024-03-17 19-48-37](https://github.com/jovialcore/Apex/assets/32295501/ad10bee2-dbdf-4f13-b4f5-ffe1496fff57)
![Screenshot from 2024-03-18 13-21-53](https://github.com/jovialcore/Apex/assets/32295501/a28e8800-d36c-4e59-90c6-063a1ede4c2b)
![Screenshot from 2024-03-18 13-22-26](https://github.com/jovialcore/Apex/assets/32295501/054af7f5-eb51-48fe-8460-255f6dc1e531)
![Screenshot from 2024-03-18 14-19-58](https://github.com/jovialcore/Apex/assets/32295501/80f060ab-3844-42d4-8beb-53cb67d468cb)
![Screenshot from 2024-03-18 14-20-36](https://github.com/jovialcore/Apex/assets/32295501/541f5ad9-60ab-4b80-bb90-dac6481f8946)
![Screenshot from 2024-03-18 14-25-20](https://github.com/jovialcore/Apex/assets/32295501/44933877-948f-4863-82bc-5d8d1420b5fa)
![Screenshot from 2024-03-18 14-29-50](https://github.com/jovialcore/Apex/assets/32295501/286dd214-623d-4b68-8bc3-cd570c176c5d)
![Screenshot from 2024-03-18 14-29-59](https://github.com/jovialcore/Apex/assets/32295501/f34f691b-c783-4c94-b49c-ee92dbe6b388)
![Screenshot from 2024-03-18 14-36-43](https://github.com/jovialcore/Apex/assets/32295501/36ee3ad9-7a76-400a-af04-d7a1771ac0de)
