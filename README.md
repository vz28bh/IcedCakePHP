IcedCakePHP
===========

A default app for CakePHP with Bootstrap bake files, Ajax enabled dialogs, menus, multi-language.

Introduction
============

Have you gotten tired of looking at the plain app that you get from bake?  Here is a baseline app
that uses Twitter Bootstrap to look great and has a few Jquery sprinkles on top. 

- Add/edit functions are in Ajax dialogs
- Auto-complete demo
- Date/Time picker demos
- Twitter navbar with drop down menus
- Multi-language support using a language option in the url

Instructions
============

Download the files into an app folder.  Setup a website to point to webroot, just like a normal app.
To start, create a database, import the my_app.sql in the schema folder, create a database.cfg for 
your database, and navigate to /app/carmodels/.  Then behold the goodness!

Now to use your own db, just update the database.cfg and run cake bake and you will get Bootstrapped
view files and controllers.  Note that if you have a lot of models, the navbar will overflow and things
will get wonky, but just edit/replace the menus.ctp element.

Future
======

I would like to improve this default app with all the things that the majority of web developers
keep asking about when they start using CakePHP. 
 
- User auth login (Facebook, OpenID, etc...)
- Facebook feeds
- Twitter feeds
- All sorts of Jquery goodies

So instead of spending days with Google, you can download a fully functioning app that does tons of
things you need and tons you don't and your job is just to remove the ones you don't want!

It would be great if we could get a CakePHP approved IDE that is fully integrated with CakePHP.
NetBeans is pretty good, but xdebug is kind of lame.  Just imagine if you could download a fully
compatible IDE with a great debugger, code hinting, Git compatibility and a great base app all
on the first day of working with CakePHP...the time that would have saved me!
