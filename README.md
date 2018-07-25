# questions
This is a simple demo php MVC framework made by standard php.
With I want to show my php skills and coding style.


BUSINESS RULES
-----------------------------------

This application does the following.
The database contains questions and answers by different users.
The questions may have different versions.
(For example question with ID 1 has version 1 with text "What is you favorite color?"
and version 2 "What is you favorite color today?"


With this application you can filter the the answers of the users to different questions.
You can filter by date and by language.

In the results you see the replies in the selected language and time period.
Also you it shows the version of the question.


CODE
-----------------------------------
Here I use a simple MVC framework.


Here I explain my file structure.







<b>Lib/Controllers</b>     Here I have all have the controllers.
                    They all inherit from one base controller,
                    which has the common functions for all controllers, 
                    like reading the request parameters, possible login and
                    authorization etc.
 

<b>Lib/Models</b>          Here I include all business rules. For simplicity I don't 
                    use entity classes. All models inherit from the database
                    class. (Which would normally be in entity class)
                    I don't use database abstraction but direct SQL, because it is not realizable
                    to write a good DAL library by one person. You should
                    you a third part library for this.

        

<b>Public</b>       Here I have only one file index.php which calls the bootstrap file.
                    This would also include possible css, Javascript and images.


<b>Views</b>               The html templates. I try to keep the files short and put as much
                    possible to partial to keep HTML clear.