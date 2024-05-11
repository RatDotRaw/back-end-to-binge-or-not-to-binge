> [!CAUTION]
> DO NOT USE CODE IN ANY WAY IN PRODUCTION!

# features checklist:
basic login systeem
profielpagina:
- [x] - naam en bio aanpassen
- [x] - video geschiedenis

video pagina:
- [x] - creepy meter
- [x] - next/previous episode selection
- [ ] - comment section???

homepage:
- [ ] - zoekbalk en filters
- [x] - random video button
- [x] - creepy pasta van de dag
- [x] - popular sectie

# Sources & documentation: 
- https://laravel.com/docs/11.x
- lesson materials
- ..?

# notes
Just some notes i made so i don't have to search it up every time.

## create new laravel project:
`composer create-project laravel/laravel example-app`

## create controller:
`php artisan make:controller ExamplController`

## starting server:
`php artisan serve`

# migrations:
## Running Migrations
`php artisan migrate`

## Generating Migrations
`php artisan make:migration create_flights_table`

If you would like to generate a database migration when you generate the model:
`php artisan make:model Flight --migration`

## Rolling back Migrations:
`php artisan migrate:rollback`

## Roll Back and Migrate Using a Single Command
The migrate:refresh command will roll back all of your migrations and then execute the migrate command. This command effectively re-creates your entire database:
`php artisan migrate:refresh`

# Seeding:
## Running seeders
`php artisan db:seed`

### Run specific seeder
`php artisan db:seed --class=SeederName`
