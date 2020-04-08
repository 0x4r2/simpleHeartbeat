@echo off
rem "Heartbeat v1 - 4r2"
rem "Modificar direccion ip en la variable SRV "
rem "Modificar subred en la consulta findstr "
rem   "ejemplo (subred 192.168.1.0/24) -> findstr 192.168.10.0)"


setlocal ENABLEEXTENSIONS & set "i=0.0.0.0" & set "j="
for /f "tokens=4" %%a in ('route print^|findstr 10.20.30.0') do (
  if not defined j for %%b in (%%a) do set "i=%%b" & set "j=1")
endlocal & set "dip=%i%"

set "SRV=192.168.xx.xx"

curl -i -s --connect-timeout 5 "http://%SRV%/reg.php?host=%computername%&ip=%dip%&username=%username%"
