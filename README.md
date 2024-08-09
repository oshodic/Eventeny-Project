Instructions to run the app:
- Clone the repo
- Run `docker compose up --build`
- Navigate to localhost:80 to view the Foodventeny application

Creating or editing tables:
- Navigate to localhost:8001 to log into PHPMyAdmin
- Username = 'user' and Password = 'password'

Logging into the Organizers Page:
- Password = '45678'

I used PHPMyAdmin to create my data tables. I exported the tables and added the SQL files to the db folder.
I chose to create a login page for the Organizers to view all application submissions and update their status.
Initially, I wanted to make separate login pages for Organizers and Vendors, but had to change the logic due to time constraints.
Instead I chose to make one login for all organizers to use and one 'check status' page for all vendors. This way only 2 tables
were needed in order to store applications and their types.

Eventeny Vendors:
- Vendors can click the 'Submit an Application' link and are navigated to the application. They will need to choose their application type,
input the Vendor name and add a description before submitting.
- Upon submission, they are provided with their application ID. They will use this ID to check the status of their application.
- Vendors can check the status of their application by clicking the 'Check Application Status' button on the homepage or by using the check status
  link which is displayed upon successfully submitting an application.

Eventeny Organizers:
- Organizers can click the 'Organizer Login' link on the homepage. They will need to input the password (45678) to view the Organizers Page.
- If the correct password is input, Organizers will be routed to the Organizers Page to view all application submissions and update their status.
- Upon status update, Organizers can either route to the homepage or back to the Organizers Page to update more applications.

Future Refactoring:
- I would like to add additional login functionality. Ideally, there would be an Organizer for each Event Type with a separate login as well as
  new login information created for Vendors which would be stored in the Vendors table.
- I've added comments within my files to reference other refactoring ideas such as updating multiple applications at once.

Thank you for viewing my Foodventeny app! I'm looking forward to speaking with you & showcasing my project!
