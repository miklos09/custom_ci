### amscentralv2
	* project started on 12/16/13
	* project end on **/*/14

### Reminders and system requirements questions
	1. Implementing menus
		* do we need to use the old menu creation method or retain the onte like menu?
	2. User creation
		* Is there a need to create user account in all
			third party games?
		*  
	3. Teir, Structure etc. implementation
		* need to clarify all of these....
	4. Api library reconstruction
	5. Login
		* Where to login as agent?
		* Where to login as user?
		* Is there a need to retain the user creation?
	6. Sh, Sma, Ma, A Product management.
		1. Account type that has a permission/credentials to
			choose product for their player?
	7. UI design/template
		1. what is plan regarding on UI design?
		2. who is going to create?
	8. API
		1. Kelangan ko nung response status nung api
	
### Project Scope



#### 12/16/13 messaging long polling session solution

	* in messaging, instead of storing all the
	unread messages in the session or cookie,
	just save the max replyid then compare it in the
	query data and get only the reply with the larger
	replyid.

note!
	* what if meron nalang isang whole request that gets all the
	necessary data for javascript and used it in the whole client side
	data with the json response...
	ex. {'userdata':{'uname.....}, 'lang':"un", timezone:""......} diba?
	instead na create ng napakaraming hidden input.
	
	
	