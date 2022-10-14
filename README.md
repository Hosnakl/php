This is a 5-page application that I did for my Web application course at Algonquin college
This application consist of; Index.php, Disclaimer.php, CustomerInfo.php, DepositCalculator.php and Complete.php.


# Objective
1. Understand and use PHP session management.
2. Define and use PHP common components.


# Disclaimer.php #
On this page, the user must check the checkbox “I have read and agree ...” before clicking the Start button. Otherwise, an error message will be displayed.

# CustomerInfo.php #
If a user tries to access this page directly, bypassing the disclaimer page, by entering this page’s URL into the browser’s address field, or clicking the top menu item Customer Information, the user will be redirected to the disclaimer page.
This page collects the user’s contact information. When the user clicks Next > button, the user entered data subject to the validation rules. If the data fail to pass the validations, the page shows the error messages next to the invalid field(s).
If the data pass the validation, the user is presented with application navigates to the next page DepositCalculator.php

# DepositCalculator.php #
The user entered data will be preserved so that the user can modify one or more entries and click Calculate button to get the new results for the modified input(s), subjecting to passing the rule validations.
When the < Previous button is clicked the application navigates to the previous page CustomerInfo.php page for the user to modify the entered customer information. The web controls on the page will be pre-filled (-set) with the user previously entered data so that the user only need to modify the entered as needed.
After the user modifies the customer information on the CustomerInfo.php page and clicks the Next > button, subject to passing rule validations, the application will come back to this page again with fields pre-filled (-set) with the user’s entries before clicking the < Previous button.
When the user clicks the menu item Complete, the application navigates to Complete.php page


All pages of the application have a top menu with the following menu items:
* Home – Links to Index.php page
* Terms and Conditions – Links to Disclaimer.php page
* Customer Information – Links to CustomerInfo.php page
* Calculator – Links to DepositCalculator.php page
* Complete – Links to Complete.php page


