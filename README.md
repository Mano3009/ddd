# Automotive Service Management System (ASMS)
The Automotive Service Management System (ASMS) is a user-friendly application designed to help automobile service centers efficiently manage their operations. Whether you’re a mechanic, service advisor, or business owner, ASMS simplifies tasks related to customer management, job cards, and invoicing.

# Features
1. User-Friendly Interface:
•	ASMS has an easy-to-use interface built with HTML, CSS, and JavaScript.
•	It’s responsive, so you can access it from any device.

3. Customer Management:
•	Store customer details, including names, phone numbers, and email addresses.
•	Keep track of vehicle information (registration numbers, chassis numbers, etc.).

5. Job Cards and Invoices:
•	Create job cards for each service request.
•	Generate professional invoices with itemized details.

7. Service Types:
•	Define different service types (e.g., oil change, brake repair).
•	Assign service types to job cards.

# Technical Details
1. Frontend:
•	We used HTML, CSS, and JavaScript to build the user interface.
•	Bootstrap framework ensures a clean and responsive design.
2. Backend:
•	PHP handles server-side scripting.
•	MySQL database stores all data (customer info, job cards, invoices).

# Deployment
1. Azure Virtual Machine (VM):
•	We hosted ASMS on an Ubuntu VM in Azure.
•	Installed Apache web server and PHP.
2. Database Setup:
•	MySQL database is hosted on Azure.
•	Created tables for login, customer, invoice, and more.
3. Public Access:
•	The application is accessible via the VM’s IP address: [172.205.232.115].
•	To make it user-friendly, consider mapping a domain name to this IP address.
4. CI/CD Pipeline:
•	GitLab CI/CD automatically deploys updates whenever you push new code.
•	This ensures your application is always up-to-date.

# Conclusion
ASMS streamlines service center operations, making life easier for mechanics and service advisors.
