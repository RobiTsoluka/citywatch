<?php

// site information  



// nom du site 

define("SITE_NAME", "CityWatch");


// url du site

define("SITE_URL", "http://localhost/citywatch");


// où seront stocker les photos des users 

define('UPLOAD_DIR',$_SERVER['DOCUMENT_ROOT'] . '/citywatch/assets/img/uploads/');

//Taille maximale des photos uploader

define('MAX_FILE_SIZE', 5 * 1024 * 1024);


//roles

define("ROLE_ADMIN", "admin");
define("ROLE_CITOYEN", "citoyen");

