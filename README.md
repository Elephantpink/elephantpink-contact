# elephantpink-contact
 
## Install package

```
 composer require elephantpink/contact 
```

## Database: migrations and seeders

```
 php artisan vendor:publish --tag=epink-contact-migrations
```

After this, you'll find the migrations under the main database/migrations folder.

To run them run:

```
 php artisan migrate
```

If you want sample data on the database run:

```
 php artisan db:seed --class=ContactSeeder
```

## Frontend

In order to use these components you'll need to install the following node packages:

To do so execute:

```
 npm install lang.js laravel-mix-svg-vue svg-vue vue vue-router vuex ...
```


You can use directly the components from the vendor folder, or if you need to customize them, simply publish them to the resource folder:

```
 php artisan vendor:publish --tag=epink-contact-assets 
```

This will create two separate "contact" folders under resources/js and resources/sass.

#### Router import example:

```
import contactAdminRoutes from './contact/router'

let routes = [other routes]

routes = routes.concat(blogAdminRoutes, contactAdminRoutes, eventsAdminRoutes)

const router = new VueRouter({ 
  routes: routes 
})
```

#### Store import example:

```
import Vue from 'vue'
import Vuex from 'vuex'
import contactStore from './contact/store'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    contact: contactStore,
  },
  ...
})
```

#### Translations import example:

```
import Lang from 'lang.js';
import contactTranslations from './contact/translations'

let lang = new Lang();
let fullTranslations = Object.assign({}, contactTranslations [, other translation files ])
lang.setMessages(fullTranslations)
```
