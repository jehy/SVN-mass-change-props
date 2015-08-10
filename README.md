# SVN-mass-change-props
Script for mass changing your svn repository log

Imagine that you have to mass edit your SVN repository history. Dangerous and difficult task but sometimes it should be done.

Let's make an example which changes all usernames to "userX", where X is some number.    
To make it, we need to:

1. Export SVN history log with command
```svn log file:////opt/csvn/data/repositories/repo_name >>log.txt```
2. Create script which will change history as we wish with prepare.php script file
3. Run prepare script using ```php prepare.php``` command
4. Run generated script with `./do.sh` command


Note that for changing revision properties, you need change hook, located in **repo_name/hooks/pre-revprop-change** file.    
To accept changes, it should contain a line ```exit 0``` - it says to accept all changes.
