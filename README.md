![image](https://github.com/muhammad-dicky/semakar_adventure/assets/58357765/1a1f1ff4-68be-4e2f-8034-d84bb3f04211)
![image](https://github.com/muhammad-dicky/semakar_adventure/assets/58357765/98bcb95a-6029-4bd1-a6c9-b2f08980b35f)
![image](https://github.com/muhammad-dicky/semakar_adventure/assets/58357765/c942644b-7abf-4d2f-8cc8-001768443c70)


HOW TO DISABLE FOREIGN KEY
SET GLOBAL FOREIGN_KEY_CHECKS=0;


######################
CARA PAKAI :
1. Letakkan file di htdocs
2. Import Database yang ada di file DATABASE
3. Sesuaikan nama database dengan settingan di application/config/database.php
4. Konfigurasi Email di Home.php & Pelanggan_login.php
 						'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'contoh@gmail.com',
            'smtp_pass' => 'ganti sama password autentikasi 2 faktor',
5. Admin dapat diakses dengan menambahkan auth/login dibelakang

INFO LOGIN
ADMIN - semakar-adventure/auth/login
admin@gmail.com
12345
USER -
registrasi aja


##############################################

###################
FITUR SEMAKAR ADVENTURE
###################
Client Page :
- Login/Register
- Home
- About
- Product
- Contact
- Kelola Profile
- Kelola Pesanan
- Pengaduan Pelanggan

Admin Page :
- Login/Register
- Home
- Kelola Data User
- Kelola Profile
- Kelola Produk = Type = Merk = Produk
- Kelola Transaksi
- Kelola Bank
- Kelola Pelanggan
- Kelola Pengaduan Pelanggan




###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/userguide3/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Contributing Guide <https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
