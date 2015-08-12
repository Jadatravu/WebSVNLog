1. Install pysvn, BeautifulSoup, httplib2 python modules, also install php, php support packages for apache2/httpd

2. Create directory with read,write permissions for apache2/httpd user "/usr/local/share/WebSVNLog/"

3. Place the files in apache2/httpd default folder for example "/var/www/html"

4. Place the SVN path and access credentials(user_name,path) in svn_log.py and svn_branches.py files 

5. Run the svn_branches.py, will create/update svn_branches.json file in   "/usr/local/share/WebSVNLog/" directory

6. Access the WebSVNLog from the browser http://127.0.0.1/Web_Log.php

Note: This is tested in linux OS, needs configuration changes in to enable in other OS. Also this scripts can be placed in SVN server or any other machine which has access to the Subversion server.
