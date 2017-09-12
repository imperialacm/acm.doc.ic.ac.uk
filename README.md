Imperial College London ACM Student Chapter website
===================================================

The website is statically generated using [Wintersmith](http://wintersmith.io/).

Webpages are written using [Jade](http://jade-lang.com/) templates (``.jade``)
which are populated with information from markdown (``.md``) or JSON files
(``.json``).

Installing dependencies
-----------------------

First install NodeJS.

Now in the root of this project run the following.

```
$ npm install
```

This will locally install the required dependencies into a ``node_modules``  directory.

Note that the ``grunt`` tool (``grunt-cli`` package) is used to perform tasks so it
is useful to put ``/node_modules/grunt-cli/bin/`` in your ``PATH``.

Development
-----------

You can automatically see a preview of the generated website by running

```
$ node_modules/grunt-cli/bin/grunt preview
Running "wintersmith:preview" (wintersmith) task
  server running on: http://localhost:8080/
...
```

Now you can visit ``http://localhost:8080`` in your web browser to see a
generated preview of the website. Wintersmith will monitor for changes to
files and will automatically regenerate pages when necessary so you can
just leave ``grunt preview'' running whilst you make changes and refresh
your browser when you make changes to files.

Deployment
----------

You must first email CSG to get access to ``/vol/www-virtual/acm``

Once you are happy with your changes push them to this repository and then deploy by
running

```
$ node_modules/grunt-cli/bin/grunt deploy
```

Maintain and Edit
-----------------
#### Events/News

Each event or new is in seperate directory except seminars, which are grouped by the years, and all of them are under ```eventsnews``` directory.
For those who use markdown, the template for ```index.md``` is as the follows:
```markdown
---
title: title 
date: MM/DD/YYYY HH/MIN
template: event.jade
---
The main body that shows up as intro.

<span class="more"></span>

The rest.
```
Note that month is at the beginning followed by date in the ``date`` field.
The ```<span class="more"></span>``` is used to split the main body, above which will be considered as intro and will show up in the Events/News page.
It is recommended to include all other resources, for example images, within the same directory.

#### People
There are two parts under ```people``` directory, current officers of the chapter and honourable members.
Each current officer is in in separate directory.
For those who use markdown, the template for ```index.md``` is as the follows:
```markdown
---
name: name
position: position
order: 1
email: email
photo: photo-file-name
website: website
template: person.jade
---
Short intro.
```
The ```order``` decides the order in the ```People``` page.
All the photos MUST be saved in ```/img/people/``` directory.
ONLY PUT the file name in the ```photo``` field but no path is needed.



MIT License
------------

Copyright (c) 2013 Imperial College London ACM Student Chapter

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
