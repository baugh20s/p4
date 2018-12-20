# Project 4: 
+ By: Sarah Baughman
+ Production URL: <http://p4.baugh20s.me>

## Outside resources
+ The way I'm querying on two fields:<https://stackoverflow.com/questions/19325312/how-to-create-multiple-where-clause-query-using-laravel-eloquent>

## Notes for instructor
+ Contact record management system - this is inspired by the type of online software my company builds for our clients (nonprofits, political campaigns, labor unions). We have a database that each organization's users can log into and use to manage their supporter universe. This project is meant to simulate the supporter management system and understand a bit about the table relationships.
+ Consists of two primary tables: contacts and hobbies
+ Can add, view, edit, and remove contacts
+ Can add hobbies

## Future development
+ I would improve the UI, particularly changing the layout of the form fields and changing phone type and email type to drop-downs.
+ If I were to continue working on this project, I would build out more tables to accommodate having multiple emails, addresses, and phone numbers for each individual. So there would be an emails table with a column for email type and the actual email address, and two more tables like that for phone numbers and physical addresses.
+ I would also add a Relationship field for this contact database. In the context of this project, it would be the relationship between the user logging in, and the contact. In the context of my company's software, it would have to be a relationship between one contact and another (many to many).
