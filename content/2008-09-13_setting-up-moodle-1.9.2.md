Title: Setting up moodle 1.9.2
Date: 2008-09-13 17:23
Slug: setting-up-moodle-1.9.2

Since I encountered some problems when setting up moodle 1.9.2 for my
company, I googled it and found the solution. I am going to post the
problem and solution hope to help someone.

I was installing moodle 1.9.2 official release built, the generic
package. On windows server 2003 with php 2.5.6, mysql 5.

**The problem:**  
I ran the installation script after I pull everything on the server.
After filling in database setting and hit next, returned a blank page,
no matter the database had been created manually or not.

**Reason:**  
The installation script has bug.

**Solution:**  
Manually create the setting file "config.php" and filled in values of
database, data folder etc. as mentioned in the following site:  

<http://senese.wordpress.com/2007/06/07/install-moodle-18-under-apachevista/>
