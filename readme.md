Commands to run to insert some test data in database:
                                                            
php artisan migrate
php artisan db:seed --class=CustomersTableSeeder
php artisan db:seed --class=UserLevelsTableSeeder

Also you can change the level of one user to make it admin.
(Users with userlevel_id equal to '1' are considered admins)