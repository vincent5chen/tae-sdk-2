@echo off

setlocal

set DCSDK_HOME=%~dp0..

for %%x in ("%DCSDK_HOME%") do set DCSDK_HOME=%%~sx

if not exist "%DCSDK_HOME%\upgrade_temp\upgrade.rdy" goto start
call "Upgrade.bat"

:start
set TEMP_JAVA_HOME=%DCSDK_HOME%\jre

if exist "%TEMP_JAVA_HOME%\bin\java.exe" set JAVA_HOME=%TEMP_JAVA_HOME%
if exist "%JAVA_HOME%\bin\java.exe" goto JavaFound
echo JAVA_HOME does not point at a JDK or JRE.  Either set the JAVA_HOME environment variable or specify a JDK.
goto end 

:JavaFound
set DEBUG_OPTS=-Xdebug -Xrunjdwp:transport=dt_socket,server=y,suspend=n,address=5005
set JETTY_HOME=%DCSDK_HOME%\lib\jetty
set JAVA_OPTS=-DDCSDK_HOME=%DCSDK_HOME%
set JAVA_OPTS=%JAVA_OPTS% -Dfile.encoding=GBK
set JAVA_OPTS=%JAVA_OPTS% -Dmain.class=com.taobao.tae.sdk.platform.Main
set JAVA_OPTS=%JAVA_OPTS% -DSTART=%DCSDK_HOME%\conf\start.config
set JAVA_OPTS=%JAVA_OPTS% -Djava.io.tmpdir=%DCSDK_HOME%\temp
set JAVA_OPTS=%JAVA_OPTS% -Duser.home=%DCSDK_HOME%\temp
set JAVA_OPTS=%JAVA_OPTS% -Duser.dir=%DCSDK_HOME%\temp

set JAVA_OPTS=%JAVA_OPTS% -Dassets.host=a.tbcdn.cn
set JAVA_OPTS=%JAVA_OPTS% -Dkissy.uri=/s/kissy/1.2.0/kissy-min.js
set JAVA_OPTS=%JAVA_OPTS% -Dsystem.module.common.js.uri=/apps/taesite/platinum/scripts/common/mods/
set JAVA_OPTS=%JAVA_OPTS% -Dcaja.service.uri=http://zxn.taobao.com/tbcajaService.htm
set JAVA_OPTS=%JAVA_OPTS% -Dsite.admin.root.url=http://siteadmin.taobao.com
set JAVA_OPTS=%JAVA_OPTS% -Duser.nick=c�����˺�154

set JAVA_OPTS=%JAVA_OPTS% -Ddevelopment.mode=false
set JAVA_OPTS=%JAVA_OPTS% -Denable.sdk.mode=true




 
for %%a in (%JETTY_HOME%\start*.jar) do  set START_JAR=%%a
if not "%START_JAR%"=="" goto StartJarFound
echo start.jar was not found.  Check your SDK installation.
goto end 

:StartJarFound
set JETTY_OPTS=-jar %START_JAR%  %DCSDK_HOME%\conf\jetty.xml
goto JettyOptsSet

:JettyOptsSet
if defined JAVA_OPTS set JETTY_OPTS=%JAVA_OPTS% %DEBUG_OPTS% %JETTY_OPTS%

set PWD=%CD%
cd /d "%JETTY_HOME%"

"%JAVA_HOME%\bin\java.exe" %JETTY_OPTS%

cd /d "%PWD%"

goto end 

:end