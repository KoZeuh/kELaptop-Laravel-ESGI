<h1 align="center"> kELaptop </h1> <br>
<p align="center">
  <a href="https://gitpoint.co/">
    <img alt="GitPoint" title="GitPoint" src="logo.gif" width="450">
  </a>
</p>

<p align="center">
  ECommerce in your pocket. Built with Laravel 11, Bootstrap 5.3 & Vite 5.0.
</p>

<p align="center">
  <a href="#">
    <img alt="Download on the App Store" title="App Store" src="http://i.imgur.com/0n2zqHD.png" width="140">
  </a>

  <a href="#">
    <img alt="Get it on Google Play" title="Google Play" src="http://i.imgur.com/mtGRPuM.png" width="140">
  </a>
</p>

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
## Table of Contents

- [Introduction](#introduction)
- [Previews](#previews)
- [Features](#features)
- [Feedback](#feedback)
- [Contributors](#contributors)
- [Build Process](#build-process)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Introduction

[![Build Status](https://img.shields.io/travis/gitpoint/git-point.svg?style=flat-square)](https://travis-ci.org/KoZeuh/kELaptop-Laravel-ESGI)
[![All Contributors](https://img.shields.io/badge/all_contributors-1-orange.svg?style=flat-square)](./CONTRIBUTORS.md)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com)
[![Gitter chat](https://img.shields.io/badge/chat-on_gitter-008080.svg?style=flat-square)](https://gitter.im/kELaptop-Laravel-ESGI)

Opening your own IT business has never been easier with this project! Take advantage of a basic but effective design and the basic functionality of an ECommerce web application.

## Previews

<details>
  <summary><strong>➡️ View</strong></summary>
  <br/>
  <img align="left" src="" width="280" target="_blank"/>
  <img src="" width="280" target="_blank"/>
  <br/>
  <img align="left" src="" width="280" target="_blank"/>
  <img src="" width="280" target="_blank"/>
</details>

## Features

A few of the things you can do with ELaptop :

### Website 🌐

* General presentation of the site, possibly including a carousel and promotions.
* Secure authentication system with the addition of a Google connection/registration option.
* Display of a list of products with a filter system based on category, brand, etc.
* Detailed display of a selected product.
* Display of the average rating of a product's reviews, with the option of adding a review only if it has been purchased and the order validated.
* Shopping cart system with modification/removal of selected products.
* Order validation and confirmation system.
* Promotional code system.
* Contact system with a pretty visual when the message is received by e-mail.
* Detailed display of past orders.

### Management panel ✏️ (Lib: `Backpack`)

* All "entities" have a CRUD.
* `laravel-permission` is used here to manage access.

## Feedback

Feel free to send us feedback -> [file an issue](https://github.com/KoZeuh/kELaptop-Laravel-ESGI/issues/new). Feature requests are always welcome. If you wish to contribute, please take a quick look at the [guidelines](./CONTRIBUTING.md)!

## Contributors

[@KoZeuh](https://github.com/KoZeuh)

## Build Process

- Follow the [Laravel Native Guide](https://laravel.com/docs/11.x) for getting started building a project with native code.
- Clone or download the repo.
- `npm update` or `yarn update` to install dependencies
- `composer update` to install Composer dependencies.
- Import SQL file. (`database/db.sql`)
- Config ENV file. (`.env`)
- `npm run dev` or `yarn run dev` for UI in development mode.
- `npm run prod` or `yarn run prod` for UI in prod mode.
- `php artisan storage:link` create a symbolic link between stored images (downloaded for products, for example) and the public directory

**Development Keys**: The `CLIENT_ID` and `CLIENT_SECRET` in `.env` are for development purposes and do not represent the actual application keys. Feel free to use them or use a new set of keys by creating an [OAuth application](https://developers.google.com/identity/protocols/oauth2?hl=fr) of your own.

**Mail Contact**: To make the "Contact" page and mail reception functional, you must edit the `MAIL_` in the `.env` file.

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


