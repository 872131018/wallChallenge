*@! DEPLOYMENT INSTRCTIONS !@*
1. place /wallChallenge into the local htdocs directory
2. from terminal run /PHP/wallDeployment.php to init database and table
3. go to http://localhost/wallChallenge/HTML/theWall.html
4. start putting bricks in the wall!

Note 1:
	If the database is empty (first post ever), then the wall says its empty
	Upon submission of the first comment, it is prepended to the wall
	It continues to show the nothing to display contents
Bug 1:
	Empty html before inserting first comment

Note 2:
	In requirements document, section 3 item 6
	Logic contradiction with section 3 item 4
	Name is required, so a post will always have a name
	Should name be link to email or website?
	Potentially a typo? Maybe should say if user submits email AND website?
	
Note 3:
	Clicking the order button blanks the current wall
	Result in a tiny flash 
