A Mini CRM App built in Laravel.
</br></br>
 
Commands to run to insert some test data in database:
</br></br>
                                                            
php artisan migrate </br>
php artisan db:seed --class=CustomersTableSeeder</br>
php artisan db:seed --class=UserLevelsTableSeeder</br>
 </br></br>

Also you can change the level of one user to create an admin.
(Users with userlevel_id equal to '1' are considered admins)