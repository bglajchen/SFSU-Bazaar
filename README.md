# SFSU Bazaar

## Executive Summary

There are many storefront websites in today’s market ranging from Amazon,
Ebay, Craigslist, and our very own SFSU Bookstore. However, what if we can take all
the benefits of these sites and bring them together into one cohesive website for everyone
at San Francisco State University? SFSU Bazaar will give users the ability to exchange
items and currency in person like Craigslist, but within the accessibility and security of
the San Francisco State campus. It will also specifically cater to only to San Francisco
State students and staff in a way that other similar websites cannot.

With Craigslist’s convenience, Ebay’s selling system, with auctions and buy
nows, and Amazon’s beautiful design and streamlined method of showing products to
customers, SFSU Bazaar will be a website that caters to the needs of students of San
Francisco State University. It will provide a platform that gives a safe human interaction
between the seller and buyer. To further the ease of trading and selling we will have the
customer’s major information and class textbook and supplies listed so, with a simple
filter, the customer can find all of the textbooks and supplies he or she need for a class.
With the information of what the buyer has bought and his or her major we can highlight
other products he or she might wish to buy based on the classes he or she had, along with
other products they have bought in the past. With this information we can gain insight
into correlating products to majors and classes, so we can advertise more products to
them.

The team working on this project would consist of Adison Lee, Karen Hanko,
Edward Yao, Brandon Glajchen, Guan Lin, and Gilbert Bui. Each member of the team
has their own skill set and or experience that can be a great help to the project. Adison,
has experience with databases and a great team player being active in meetings. Karen,
has industry experience interning at startups and would provide great help in the back
end. Edward, has artistic talent and knowledge in design from creating an Android app,
would be helpful in creating the front end. Guan, has previous experience creating a
website in a MVC framework and would be tech lead. Brandon, currently working in the
industry has a good idea about the tech and would assist Guan on the tech. Gilbert, has
experience managing for several years and would help keep the team on track. This team
has a wide range of skills and experience that would help this project succeed.
  


## Use Cases

- Joseph is an incoming Freshman, who forgot to buy his textbooks before the first
day of class! His teacher says that they’re going to have a quiz on Chapter One during
their next class, but the bookstore is out of stock on that particular textbook. What’s
worse, is that Amazon won’t be able to get it to him for at least a few more days! Joseph
decides to check to see if anyone on campus has a copy of his textbook from a past
semester, and finds a Junior who’s trying to get rid of his old supplies. Joseph buys the
textbook, and arranges to meet the Junior later that day. The two of them meet on
campus, and the transaction is made.  
  
- John finds out that a new edition of textbook he needs doesn’t have much
significant changes, but costs a lot more and the teacher did not require the latest edition.
John’s friend recommended him SFSU Bazaar to find earlier versions of the textbook.
While John is browsing for his textbook, he also noticed textbooks from his other classes
are also available for the right price. So he decided to buy them and arrange to meet up
with the sellers on SFSU campus. After a pleasant meeting with one of his seller, John
finds out the seller is his future classmate. Not only was John able to find his textbook on
SFSU Bazaar, he also gained a new friend.  
  
- Dilbert is an employee in SFSU Bazaar’s corporate office, and has recently been
assigned to the administrative team managing their web service. After gaining all of the
proper permissions for his account, Dilbert goes about checking on the site. A couple of
spammers are posting on the site, so he bans them and deletes the posts that are
considered to be spam. Then Dilbert encounters a user that posted inappropriate item, so
Dilbert swiftly removed the post, messaged, and issued a warning to the user. Due to the
fact Dilbert has been doing a great job managing the site his boss bought him donuts.

## Data Definition

- **Registered Users:** Users who have an account, and are logged into it, that are
using the site. Registered Users can be both buyers and sellers.

- **Guest Users:** Users who do not have an account, and can only browse the
site without being able to post items for sale or buy items.

- **Buyer:** User who has an account, and is buying an item.

- **Seller:** User who has an account, and is selling an item.

- **Administrators:** Users that have special privileges, and have the ability to
remove posts from the site, remove items, issue warnings and bans from the site,
and generally enforce the Code of Conduct for the site. Administrators also are
responsible for helping users when needed.

- **Items/Services:** Any object which is for sale, or for purchase on the site.

## Functional specs

| Priority | Specification |
| :------: | :------------ |
| 1        | Guest Users shall be able to browse the site, being able to search for items and view them, but not be able to post items or respond to sellers.|
| 2        | The site shall display featured items and/or new postings.|
| 1        | The site shall allow the user to filter their search based on a list of qualities of the items.|
| 1        | Users shall be able to register and create an account.|
| 1        | Items shall be required to have a minimum level of detail when being posted, such as a description, pictures, and a rating of quality.|
| 2        | The site shall display the rating of a seller, based on the votes of Registered Users that have bought items in the past from them.|
| 2        | The site shall display a history of past sales for sellers, indicating to buyers how reputable the seller is.|
| 3        | The site shall give sellers the ability to set up a storefront on their profile, allowing them to sell more items in a dedicated area belonging to them.|
| 3        | The site shall allow Registered Users to subscribe to other Users, and be alerted when Users make new posts.|
| 3        | Users shall be able to compose a list of wanted items, and can be notified when anyone posts that item up for sale.|
| 2        | The site shall make recommendations to Registered Users on what to buy based on previous purchases and viewed items.and create an account.|
| 1        | Users shall be able to put items into a shopping list to purchase later.|
| 1        | Users shall be able to post items for sell.|
| 1        | Admins shall be able to remove post.|
| 1        | Admins shall be able to issue warnings and bans to Users.|

## Unique functions:

| Priority | Specification |
| :------: | :------------ |
| 1        | The site shall allow sellers to sell items by selling them at a fixed price.|
| 3        | The site shall allow sellers to auctioning items.|
| 2        | The site shall allow sellers to trade items.|
| 1        | Sellers shall be able to offer tutoring services in exchange for a fixed hourly rate.|
| 3        | Registered Users shall be able to integrate their schedule into the site, allowing buyers and sellers to see mutually available times without revealing what their schedules are.|
| 2        | The user shall be able to generate a list of needed textbooks based on their classes.|
| 1        | The site shall provide a minimum detailed profile of Registered Users, such as their first name, a picture of the user, their major, and their year.|

## Non-functional specs
1. Application shall be developed using class provided LAMP stack  
2. Application shall be developed using pre-approved set of SW development and 
collaborative tools provided in the class. Any other tools or frameworks have to 
be explicitly approved by Marc Sosnick on a case by case basis.  
3. Application shall be hosted and deployed on Amazon Web Services as specified
in the class  
4. Application shall be optimized for a standard desktop/laptop browsers, and shall
render correctly on the two latest versions of all major browsers: Mozilla, Safari,
Chrome and IE. It shall degrade nicely for different sized windows using class
approved programming technology and frameworks  
5. Data shall be stored in the database on the class server in the team's account  
6. Application shall be served from the team's account  
7. No more than 50 concurrent users shall be accessing the application at any time  
8. Privacy of users shall be protected and all privacy policies will be appropriately
communicated to the users.  
9. The language used shall be English.  
10. Application shall be very easy to use and intuitive. No prior training shall be
required to use the website.  
11. Google analytics shall be added for major site functions.  
12. Messaging between users shall be done only by class approved methods to avoid
issues of security with email services.  
13. Pay functionality (how to pay for good): shall be simulated this with proper UI,
no backed.  
14. Messaging between buyers and sellers: ways to do this to be specified in the class.
Due to security of servers we cannot use email.  
15. Site security: basic best practices to be applied (as covered in the class)  
16. Modern SE processes and practices must be used as specified in the class,
including collaborative and continuous SW development, using the tools
approved by instructors  
17. The website shall prominently display the following text on all pages
"SFSU/FAU/Fulda Software Engineering Project, Summer 2016. For
Demonstration Only". (Important so as to not confuse this with a real application).

## Competitive analysis

|                         | SFSU Bazzar |  Ebay  | Amazon | Craigslist | SFSU Bookstore |
| :--------------         | :---------: | :----: | :----: | :--------: | :------------: |
| Local                   | +           | --     | --     | +          | +              |
| Ease of Use             | +           | +      | +      | --         | --             |
| Dynamic Pricing Option  | +           | +      | +      | +          | --             |
| No-Tax Opportunities    | +           | --     | --     | +          | --             |
| Shopping Cart           | +           | +      | +      | --         | +              |
| Easy Scheduling         | +           | --     | --     | --         | --             |
| Face to Face Transaction| +           | --     | --     | +          | +              |
+ + feature exists; -- feature does not exist  
  
*SFSU Bazaar* has some distinct advantages over its competitors. Its location on the San
Francisco State University campus allows students to circumvent the shipping costs of
other websites. Since students can meet face to face, they also have the option of paying
in person, which allows them to bypass taxes. *Bazaar’s* Easy Scheduling feature, which
no competitor included in their products, allows users to easily figure out a time to
pickup items. Along with an intuitive website interface, these features will set *SFSU
Bazaar* apart from its competitors.

## Highlevel system architecture

**L** - Linux Operating System  

**A** - Apache Web Server  

**M** - MySQL Database  

**P** - PHP programming/scripting language  
  

Deployment: Amazon Cloud
* Great reliable service

Dynamic Interaction: JavaScript/jQuery
* Interactive front end
* Dynamic coding scripts

Database: MySQL
* Industry standard for database
* Used in L.A.M.P software bundle

UI: Bootstrap
* Supports popular browsers like chrome, internet Explorer
* Built in scaling
* Minium html needed
* Contains HTML, CSS< and JavaScript based templates

MVC Framework: Mini Framework
* Industry standard
* Minimalistic MVC framework in PHP

## Team

- **Gilbert Bui:** Team Leader
- **Guan Lin:** Tech Leader
- **Brandon Glajchen:** Backend
- **Adison Lee:** Backend
- **Karen Hanko:** Backend
- **Edward Yao:** Front End Developer/ Ux Designer
