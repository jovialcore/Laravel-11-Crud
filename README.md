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

If run into passport issues, something like  `Call to a member function getKey() on null` you can run this: 
`php artisan passport:client --personal` then copy the required [passport credentials to your .env ](https://laravel.com/docs/11.x/passport#creating-a-personal-access-client) followed by `php artisan optimize` command

#### Test
For test, open another terminal and run `php artisan test`


### Some Screeenshots and examples of crud. 
#### login 
![Screenshot from 2024-03-18 14-20-36](https://github.com/jovialcore/Apex/assets/32295501/541f5ad9-60ab-4b80-bb90-dac6481f8946)

### Admin assinging marketer roles (admin can assign multiple users if they like )
![Screenshot from 2024-03-18 14-19-58](https://github.com/jovialcore/Apex/assets/32295501/80f060ab-3844-42d4-8beb-53cb67d468cb)

### non Admin trying to  assing marketer role 
![Screenshot from 2024-03-18 14-25-20](https://github.com/jovialcore/Apex/assets/32295501/44933877-948f-4863-82bc-5d8d1420b5fa)

### listing all created market channels

![Screenshot from 2024-03-18 14-29-50](https://github.com/jovialcore/Apex/assets/32295501/286dd214-623d-4b68-8bc3-cd570c176c5d)

### creating market  market channels
![Screenshot from 2024-03-18 14-29-59](https://github.com/jovialcore/Apex/assets/32295501/f34f691b-c783-4c94-b49c-ee92dbe6b388)


### viewing single market channel 
![Screenshot from 2024-03-18 14-36-43](https://github.com/jovialcore/Apex/assets/32295501/36ee3ad9-7a76-400a-af04-d7a1771ac0de)


### updating a market channel 

![Screenshot from 2024-03-18 17-03-22](https://github.com/jovialcore/Apex/assets/32295501/a8aa7715-33c4-4b5e-a24a-109017cb3b1d)

#### Deleting a market channel 
![image](https://github.com/jovialcore/Apex/assets/32295501/d0b30214-f5ac-4dcd-b068-6cf70642b652)

#### After delete: 

![image](https://github.com/jovialcore/Apex/assets/32295501/8665981c-25cf-409d-a997-7039d2c486d3)


