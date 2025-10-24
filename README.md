> [!NOTE]
> Hello stranger!
> This repository is an **archive** of a school project I made in **Laravel** in 2024.
> The only changes i've made since are very small touchups.

> [!CAUTION]
> DO NOT USE CODE IN ANY WAY IN PRODUCTION!

## How to Run the Project:

### requirements:
- docker
- docker-compose
- git

### Prepare A .env File:

The project comes with an `.env.example` in `./code`, it can be used as an example.

If you just want to quickly demo the project, renaming `.env.example` to `.env` in  `./code` will do.

### host on docker:
1. clone the repository
2. run `docker-compose up -d`
3. ~~run `docker exec -it laravel bash`~~

## Seeding The Database:

The database does not get automatically seeded.

Instead of a very complex way entering the docker container and doing all sorts of shenanigans.
I was too tired to figure out how to do it properly, and I couldn't be bothered to do it the right way.

1. go to [host]:8081 to the phpmyadmin page
2. login with the following credentials:
   - server: db
   - username: root
   - password: changeme
3. create a new database with the name you specified in the .env file (`laravel` by default).
4. go to the import tab and import the export.sql from `./database_export` folder
5. The database should now be seeded with example data.

---

> [!NOTE]
> The readme ens here.
> From here on, its some notes and whatnot I wrote back then.

# TODO

> [!NOTE]
> The following was written by the teacher, a checklist of what this project needs to achieve.

## Features
- [ ] Develop a streaming site focused on DIY enthusiasts and hobbyists.
- [ ] Implement a unique selling point (USP) - a feature not found on existing streaming services.
- [x] Embed videos hosted externally (e.g., Vimeo or YouTube) using iframes.
- [ ] Conduct a thorough analysis of the features to implement:
  - [x] Dedicate sufficient time to this analysis before starting to code.
  - [x] Utilize knowledge from other courses if applicable (e.g., design thinking, domain modeling).
  - [x] Ensure a well-developed set of features to showcase your expertise. A basic Netflix clone is insufficient.
- [ ] Think from the user's perspective and identify essential features:
  - [ ] Search by cast.
  - [x] Profile pages.
  - [x] Any other feature that enhances user experience.

## Technical Requirements
- [x] Use a MySQL database.
- [x] Apply correct relationship types in your database and code.
- [x] Follow best practices in Laravel as taught in the lessons.
- [x] Ensure sufficient depth in the project; a minimal MVC structure is not enough.
- [x] Maintain clean, readable, and efficient code to facilitate future modifications.
- [x] Provide a relevant error page for disallowed situations instead of letting the application crash.

## Submission Requirements
- [x] Submit a video demonstrating all features, explaining the implementation, and highlighting improvements since the first version.
- [x] Provide the repository link as a comment on Canvas, created using the provided Classroom link. The repository should contain:
  - [x] An export of the database.
  - [x] A schema of the database.
- [x] Include a comment with the link to your live site. (Big thanks to [@ewoudje](https://github.com/ewoudje))

> [!NOTE]
> From here on everything was written by me. The following is a checklist of what to implement per page.

## features checklist:

- [x] basic login system

Profile page:
- [x] - Ability to change name and bio
- [x] - Video watch history

Video page:
- [x] - Creepy meter (my USP)
- [x] - Next/previous episode selection 
- [x] - Personal notes (my USP)
- [x] - Tools list (my USP?)

Homepage:
- [ ] - Searchbar and filters
- [x] - Random video button
- [x] - Handy video of the day
- [x] - Popular section

### Sources & documentation: 
- https://laravel.com/docs/11.x
- lesson materials
- https://stackoverflow.com/questions/32485581/php-nested-loop-break-inner-loops-and-continue-the-main-loop
- https://laravel.com/docs/5.0/eloquent?c=atila?c=atila#working-with-pivot-tables
- https://medium.com/@prevailexcellent/laravel-many-to-many-relationship-complete-tutorial-16025acd5450
- https://css-tricks.com/snippets/css/a-guide-to-flexbox/

---

## notes
Just some notes i made so i don't have to search it up every time.

### create new laravel project:
`composer create-project laravel/laravel example-app`

### create controller:
`php artisan make:controller ExamplController`

### starting server:
`php artisan serve`

## migrations:
### Running Migrations
`php artisan migrate`

### Generating Migrations
`php artisan make:migration create_flights_table`

If you would like to generate a database migration when you generate the model:
`php artisan make:model Flight --migration`

### Rolling back Migrations:
`php artisan migrate:rollback`

### Roll Back and Migrate Using a Single Command
The migrate:refresh command will roll back all of your migrations and then execute the migrate command. This command effectively re-creates your entire database:
`php artisan migrate:refresh`

## Seeding:
### Running seeders
`php artisan db:seed`

#### Run specific seeder
`php artisan db:seed --class=VideoSeeder`

> [!NOTE]
> Looking back on this project, I have come a far way...
