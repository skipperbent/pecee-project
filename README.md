# README #

This is a sample-project that is created using PHP using the Pecee-framework.

### Quick checklist ###

- Projects is placed inside the folder app/[NAME-OF-PROJECT].

- Configuration is placed inside the folder app/[NAME-OF-PROJECT]/config

- You can add as many projects as you like.

- Namespace should be the same as app folder name and can be changed directly from config.php (app/[NAME-OF-PROJECT]/config/config.php)

- Point the webserver to the www folder of the app you would like to be accesible from the web (example app/Demo/www/).

Open source MVC PHP framework based on Microsoft MVVM.

Features:

- Fully customisable template engine. Overwrite render() method to add your own templating engine or create your own using the Taglib class.

- Every template has class, called a Widget, behind it. From here you can set properties, create methods and you can even render widgets inside a widget - this makes it super easy the create small pieces of functionality, that can be reused wherever you like.

- Because every template is basiclly a class, you can extend functionality from other widgets and reuse the same functionality or overwrite the things you want to change.

- Don't like something? Everything is 100% object oriented, so every little piece of code can be easily extended. A great example is PeceeCamp which uses some of the functionality of PeceeCamp, but completely rewrites the way routing is working.

## Samle app ##

For a demonstration app, please look inside the app folder. This folder is not used by the framework and can be removed at any time.

## Installation ##

```
cd /path/to/project
git clone https://github.com/skipperbent/pecee-project.git
composer install
```

Point your webserver to /path/to/project/app/www

## The MIT License (MIT)

Copyright (c) 2015 Simon Sessingø / Pecee

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
