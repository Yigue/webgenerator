#!/bin/bash


mkdir $1
cd $1
echo  echo "<?php echo 'Pagina $1;' ?>"|cat>>index.php
 mkdir css
 cd css
 mkdir user
 cd user
 echo css|cat > estilo.css
cd ..
mkdir admin
cd admin
 echo css|cat > estilo.css
cd ..
cd ..
mkdir img
cd img
mkdir avatars
mkdir buttons
mkdir productos
mkdir pets
cd ..
mkdir js
cd js
mkdir validations
cd validations
echo login|cat > login.js
echo register|cat > register.js
cd ..
mkdir effects
cd effects
echo panels|cat > panels.js
cd ..
cd ..
mkdir tpl
cd tpl
echo main|cat > main.tpl
echo login|cat > login.tpl
echo register|cat > register.tpl
echo panel|cat > panel.tpl
echo profile|cat > profile.tpl
echo crud|cat > crud.tpl
cd ..
mkdir php
cd php
echo create|cat > create.php
echo read|cat > read.php
echo update|cat > update.php
echo delete|cat > delete.php
echo dbconect|cat > dbconect.php
cd ..



