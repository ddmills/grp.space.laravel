# grp.space
Space for group hangout and collaboration. [grp.space](http://grp.space).

# development setup

1. clone
2. cd `grp.space`
3. create `.env`
4. create `Homestead.yaml`
5. `vagrant up`
6. add `192.168.15.10 grp.space.dev` to `hosts` file.
7. browse to `grp.space.dev`


# run migrations

**dev database**: `php artisan migrate:refresh --seed`

**test database**: `php artisan migrate:refresh --database=testing --seed`
