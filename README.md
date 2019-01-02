# Laravel 5 Simple CMS
Basic boilerplate content management system for starters, supports Laravel 5.7.

-----
## Table of Contents

* [Features](#item1)
* [Quick Start](#item2)
* [Installation Guide](#item3)
* [User Guide](#item4)
* [Screenshots](#item5)

-----
<a name="item1"></a>
## Features:
* Admin Panel
  * Custom template with Bulma
  * Google Analytics API integrated dashboard
  * Server side oriented datatables
  * Page, category, and article management
  * [Trumbowyg](https://alex-d.github.io/Trumbowyg/) as the WYSIWYG editor
  * [elFinder](https://studio-42.github.io/elFinder/) as the file manager
  * [Ionicons](https://ionicons.com/) as the icon package
* Front-end
  * Custom template with Bulma
  * View pages, articles and categories

-----
<a name="item2"></a>
## Quick Start:

Clone this repository and install the dependencies.

    $ git clone https://github.com/ozdemirburak/laravel-5-simple-cms.git && cd laravel-5-simple-cms
    $ composer install

Run the command below to initialize. Do not forget to configure your .env file. 

    $ php artisan cms:initialize --seed

Install node and npm following one of the techniques explained in 
this [link](https://gist.github.com/isaacs/579814) to create and compile the assets of the 
application.
    
    $ npm install
    $ npm run production

Finally, serve the application.

    $ php artisan serve

Open [http://localhost:8000](http://localhost:8000) from your browser. 
To access the admin panel, hit the link 
[http://localhost:8000/admin](http://localhost:8000/admin) from your browser.
The application comes with default user with email address `admin@admin.com` and `123456`.

-----
<a name="item3"></a>
## Installation Guide:

* [Step 1: Download the Repository](#step1)
* [Step 2: Initialize Application](#step2)
* [Step 3: Serve](#step3)
* [Step 4: Extras](#step4)

-----
<a name="step1"></a>
### Step 1: Download the Repository

Either Clone the repository using git clone: `git clone https://github.com/ozdemirburak/laravel-5-simple-cms.git` 
or install via <a target="_blank" href="https://github.com/ozdemirburak/laravel-5-simple-cms/archive/master.zip">zip</a> and extract 
to any of your folders you wish.

-----
<a name="step2"></a>
### Step 2: Initialize the Application

To install the composer dependencies you need to have composer installed, if you don't have composer installed, 
then [follow these instructions](https://getcomposer.org/download/). Finally run, `composer install` in the `laravel-5-simple-cms` directory.

Run `php artisan cms:initialize --seed` which will ask you to create a database to migrate and seed our boilerplate application 
with fake data. Do not forget that all variables with `DB_` prefixes in your `.env` file relates to your database configuration. 
After configuring your `.env` file, with the proper data, you need to create the assets.

If you do not have node and npm installed, follow one of the techniques explained in this [link](https://gist.github.com/isaacs/579814).
Then, to install our boilerplate project's asset dependencies, run `npm install`. Finally to combine the 
javascript and style files run `npm run production`.

-----
<a name="step3"></a>
### Step 3: Serve

To serve the application, you can use `php artisan serve`, then open [http://localhost:8000](http://localhost:8000) 
from your browser. To access the admin panel, hit the link [http://localhost:8000/admin](http://localhost:8000/admin) 
from your browser. The application comes with default user with email address `admin@admin.com` and `123456`.

-----
<a name="step4"></a>
### Step 4: Extras

If you want to use the Gmail client to send emails, you need to change the `MAIL_USERNAME` variable as your 
Gmail username without `@gmail.com` and password as your Gmail password, `MAIL_FROM_ADDRESS` is your 
Gmail account with `@gmail.com` and `MAIL_FROM_NAME` is your name that is registered to that Gmail account.

To use the Analytics API, and have all the features of the dashboard, 
follow the instructions explained in detail [here](https://github.com/spatie/laravel-analytics#how-to-obtain-the-credentials-to-communicate-with-google-analytics).
You will also need a key for Google Javascript API, has the instructions [here](https://developers.google.com/maps/documentation/javascript/get-api-key). Also if you want to use CAPTCHA in the login form, you will also need to secrets and keys from [here](https://www.google.com/recaptcha).

Finally, if you need to re-initialize our simple boilerplate CMS, just run the command below where it will also 
update the assets for you.

    $ php artisan cms:initialize --seed --node

-----

<a name="item4"></a>
## User Guide

* [How to Create a New Resource](#u1)
* [How to Deploy](#u2)

-----
<a name="u1"></a>
### How to Create a New Resource

Lets assume we want to create a new resource for fruits where it will have title, description and content attributes.

    $ php artisan cms:resource fruit --migrate

You will see an output like below. The CMS generator will do **ALL** the boring stuff for you, 
it will create a migration file with a title, description, content, and slug columns by default, 
also the respecting Controller and Model files, it will also add the resource to routes, RouteServiceProvider,
even it will add the basic language key value pairs to the language file.

Just check and edit the files below to proceed.

```
Created file: database/migrations/2018_10_19_000000_create_fruits_table.php
Created file: app/Models/Fruit.php
Created file: app/Http/Controllers/Admin/DataTables/FruitDataTable.php
Created file: app/Http/Controllers/Admin/FruitController.php
Created file: resources/views/admin/forms/fruit.blade.php
Added route to: routes/admin.php
Added resource language key to: resources/lang/en/resources.php
Added model binding to: app/Providers/RouteServiceProvider.php
```

-----
<a name="u2"></a>
### How to Deploy 

I have showed all the required steps in detail for a deployment with Git and Capistrano from scratch on my blog.
You can check it on: [https://ozdemirburak.com/a/deploying-laravel-projects-with-git-and-capistrano-to-nginx-server](https://ozdemirburak.com/a/deploying-laravel-projects-with-git-and-capistrano-to-nginx-server)

-----
<a name="item5"></a>
## Screenshots

![Index](https://ozdemirburak.com/i/upload/cms/index.png)
![Admin Auth](https://ozdemirburak.com/i/upload/cms/login.png)
![Admin Dashboard](https://ozdemirburak.com/i/upload/cms/dashboard.png)
![Admin Datatables](https://ozdemirburak.com/i/upload/cms/datatables.png)
![Admin Dashboard](https://ozdemirburak.com/i/upload/cms/editor.png)
![Admin File Manager](https://ozdemirburak.com/i/upload/cms/file-manager.png)



## Laravel 5 Translation Manager

This solution was imported and adopted from https://github.com/barryvdh/laravel-translation-manager package.
It does not replace the Translation system, only import/export the php files to a database and make them editable through a webinterface.
The workflow would be:

    - Import translations: Read all translation files and save them in the database
    - Find all translations in php/twig sources
    - Optionally: Listen to missing translation with the custom Translator
    - Translate all keys through the webinterface
    - Export: Write all translations back to the translation files.

This way, translations can be saved in git history and no overhead is introduced in production.

![Screenshot](http://i.imgur.com/4th2krf.png)

## Installation


The configuration file by default only includes the `auth` middleware, but the latests changes in Laravel 5.2 makes it that session variables are only accessible when your route includes the `web` middleware. In order to make this package work on Laravel 5.2, you will have to change the route/middleware setting from the default 

```
    'route' => [
        'prefix' => 'translations',
        'middleware' => 'auth',
    ],
```

to

```
    'route' => [
        'prefix' => 'translations',
        'middleware' => [
	        'web',
	        'auth',
		],
    ],
```

**NOTE:** *This is only needed in Laravel 5.2 (and up!)*

## Usage

### Web interface

When you have imported your translation (via buttons or command), you can view them in the webinterface (on the url you defined with the controller).
You can click on a translation and an edit field will popup. Just click save and it is saved :)
When a translation is not yet created in a different locale, you can also just edit it to create it.

Using the buttons on the webinterface, you can import/export the translations. For publishing translations, make sure your application can write to the language directory.

You can also use the commands below.

### Import command

The import command will search through app/lang and load all strings in the database, so you can easily manage them.

    $ php artisan translations:import

Translation strings from app/lang/locale.json files will be imported to the __json_ group.
    
Note: By default, only new strings are added. Translations already in the DB are kept the same. If you want to replace all values with the ones from the files, 
add the `--replace` (or `-R`) option: `php artisan translations:import --replace`

### Find translations in source

The Find command/button will look search for all php/twig files in the app directory, to see if they contain translation functions, and will try to extract the group/item names.
The found keys will be added to the database, so they can be easily translated.
This can be done through the webinterface, or via an Artisan command.

    $ php artisan translations:find
    
If your project uses translation strings as keys, these will be stored into then __json_ group. 

### Export command

The export command will write the contents of the database back to app/lang php files.
This will overwrite existing translations and remove all comments, so make sure to backup your data before using.
Supply the group name to define which groups you want to publish.

    $ php artisan translations:export <group>

For example, `php artisan translations:export reminders` when you have 2 locales (en/nl), will write to `app/lang/en/reminders.php` and `app/lang/nl/reminders.php`

To export translation strings as keys to JSON files , use the `--json` (or `-J`) option: `php artisan translations:import --json`. This will import every entries from the __json_ group.

### Clean command

The clean command will search for all translation that are NULL and delete them, so your interface is a bit cleaner. Note: empty translations are never exported.

    $ php artisan translations:clean

### Reset command

The reset command simply clears all translation in the database, so you can start fresh (by a new import). Make sure to export your work if needed before doing this.

    $ php artisan translations:reset



### Detect missing translations

Most translations can be found by using the Find command (see above), but in case you have dynamic keys (variables/automatic forms etc), it can be helpful to 'listen' to the missing translations.
To detect missing translations, we can swap the Laravel TranslationServiceProvider with a custom provider.
In your `config/app.php`, comment out the original TranslationServiceProvider and add the one from this package:

    //'Illuminate\Translation\TranslationServiceProvider',
    'Barryvdh\TranslationManager\TranslationServiceProvider',

This will extend the Translator and will create a new database entry, whenever a key is not found, so you have to visit the pages that use them.
This way it shows up in the webinterface and can be edited and later exported.
You shouldn't use this in production, just in development to translate your views, then just switch back.






