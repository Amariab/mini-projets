@echo off
setlocal

:: Demander le nom du projet
set /p PROJECT=Nom du projet (ex: htmltopdf):

:: Définir les chemins
set ROOT_PATH=C:\wamp64\www\monprojet\%PROJECT%
set PUBLIC_PATH=%ROOT_PATH%\public
set VHOST_FILE=C:\wamp64\bin\apache\apache2.4.54\conf\extra\httpd-vhosts.conf
set HOSTS_FILE=%SystemRoot%\System32\drivers\etc\hosts

:: Vérifie si le dossier public existe
if not exist "%PUBLIC_PATH%" (
    echo ❌ Erreur : Le dossier "%PUBLIC_PATH%" n'existe pas.
    pause
    exit /b
)

:: Ajouter VirtualHost à httpd-vhosts.conf
echo.>> "%VHOST_FILE%"
echo ^<VirtualHost *:80^> >> "%VHOST_FILE%"
echo     ServerName %PROJECT%.local >> "%VHOST_FILE%"
echo     DocumentRoot "%PUBLIC_PATH%" >> "%VHOST_FILE%"
echo     ^<Directory "%PUBLIC_PATH%"^> >> "%VHOST_FILE%"
echo         AllowOverride All >> "%VHOST_FILE%"
echo         Require all granted >> "%VHOST_FILE%"
echo     ^</Directory^> >> "%VHOST_FILE%"
echo ^</VirtualHost^> >> "%VHOST_FILE%"

echo ✅ VirtualHost ajouté à %VHOST_FILE%

:: Ajouter dans le fichier hosts
findstr /C:"%PROJECT%.local" "%HOSTS_FILE%" >nul
if errorlevel 1 (
    echo 127.0.0.1 %PROJECT%.local >> "%HOSTS_FILE%"
    echo ✅ %PROJECT%.local ajouté au fichier hosts
) else (
    echo ⚠️ %PROJECT%.local est déjà présent dans hosts
)

:: Rappel pour redémarrer Apache
echo 🔁 N'oublie pas de redémarrer Apache via WAMP.
pause
endlocal
