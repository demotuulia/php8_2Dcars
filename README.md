# 2Dcars

This is an example, which I have done with my own frame work with standard PHP8 and Phpstan and Codesniffer standards.




Application
=======================================================================================

This application is used to defined the positions of a cars in a map after the instructions to move.

As intial arguments I give:

1) Size if the map (max coordianets)
2) Intial position (coordinates) and direction of the car
3) the instructions to move:
   F = move 1 unit forward to current direction<br<br>
   R = turn right L = turn left

Forexample:
Map size :  20 20 Intial position 10,15 North Instuction to move: FFFFFRFFRFLFF

As a final result I get 4,4 Eeast







Code
======================================================================================

Structure
----------
I have build this to my MVC framework of my own with standard PHP. To get results for a position of car I the run a
console script with arguments. If you look at my file structure I follow more or less the standard MVC structure.
(In our case, there are no views, but there is controller for the console commando)

The original task is very simple. In my solution I make it easily extendable for future changes. My style of programming
is to make everything generic and reusable.

The main classes of the project are ‘map’ and ‘car’. I have built this so that there Is first an abstract class and
these are extended by specific classes. I have us classes ‘standard map’ and ‘standard car’ In real world we could
extend that we have 2 types of cars: cars with a plate numbers of a car and cars with a plate number of a moped. And
these need 2 different maps, because you are allowed to drive on different rows.

Below a class diagram of a car. (The map has a similar structure
![alt text](https://github.com/demotuulia/2Dcars/blob/master/UML.jpeg)

Most important folders
Docker: docker files
code: php code
 code/Console
 code/Lib/Controllers
 code/Lib/Models
 code/Tests

Tests
======================================================================================
This project has been done with Test Driven Development with Phpunit. All tests are found on the in tests folder.

Framework
=======================================================================================

I have used Docker and Composer as open source tools.
