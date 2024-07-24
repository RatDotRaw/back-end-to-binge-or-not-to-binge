> [!CAUTION]
> DO NOT USE CODE IN ANY WAY IN PRODUCTION!

# TODO

## Features
- [ ] Develop a streaming site focused on DIY enthusiasts and hobbyists.
- [ ] Implement a unique selling point (USP) - a feature not found on existing streaming services.
- [x] Embed videos hosted externally (e.g., Vimeo or YouTube) using iframes.
- [ ] Conduct a thorough analysis of the features to implement:
  - [ ] Dedicate sufficient time to this analysis before starting to code.
  - [ ] Utilize knowledge from other courses if applicable (e.g., design thinking, domain modeling).
  - [ ] Ensure a well-developed set of features to showcase your expertise. A basic Netflix clone is insufficient.
- [ ] Think from the user's perspective and identify essential features:
  - [ ] Search by cast.
  - [x] Profile pages.
  - [ ] Any other feature that enhances user experience.

## Technical Requirements
- [x] Use a MySQL database.
- [x] Apply correct relationship types in your database and code.
- [ ] Follow best practices in Laravel as taught in the lessons.
- [ ] Ensure sufficient depth in the project; a minimal MVC structure is not enough.
- [ ] Maintain clean, readable, and efficient code to facilitate future modifications.
- [x] Provide a relevant error page for disallowed situations instead of letting the application crash.

## Submission Requirements
- [ ] Submit a video demonstrating all features, explaining the implementation, and highlighting improvements since the first version.
- [ ] Provide the repository link as a comment on Canvas, created using the provided Classroom link. The repository should contain:
  - [ ] An export of the database.
  - [x] A schema of the database.
- [ ] Include a comment with the link to your live site.

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
- [x] - handy video van de dag
- [x] - popular sectie

# Sources & documentation: 
- https://laravel.com/docs/11.x
- lesson materials
- https://stackoverflow.com/questions/32485581/php-nested-loop-break-inner-loops-and-continue-the-main-loop
- https://laravel.com/docs/5.0/eloquent?c=atila?c=atila#working-with-pivot-tables
- https://medium.com/@prevailexcellent/laravel-many-to-many-relationship-complete-tutorial-16025acd5450

---

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
`php artisan db:seed --class=VideoSeeder`
