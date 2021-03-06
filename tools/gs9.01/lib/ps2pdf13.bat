@echo off
@rem $Id: ps2pdf13.bat 11743 2010-09-25 02:08:22Z alexcher $

rem Convert PostScript to PDF 1.3 (Acrobat 4-and-later compatible).

set LIBDIR=%~dp0

echo -dCompatibilityLevel#1.3 >"%TEMP%\_.at"
goto bot

rem Pass arguments through a file to avoid overflowing the command line.
:top
echo %1 >>"%TEMP%\_.at"
shift
:bot
rem Search for leading '-'
echo %1 | findstr /b /C:- >nul 2>&1
if ERRORLEVEL 1 goto proc
goto top
:proc
call "%LIBDIR%ps2pdfxx.bat" %1 %2
