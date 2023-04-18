create database tpc;
use tpc;
create table login(
id varchar(10),
passw varchar(10),
entity varchar(5));
alter table login add primary key(id);

insert into login values("2101CS71", "sampreety","stud");
insert into login values("2101AI39","lahari", "stud");
insert into login values("2101AI42","mamta", "stud");
insert into login values("2101AI53","nishita", "stud");
insert into login values("2101CS33","jasmine", "stud");
insert into login values("2101CS40","shanmukha", "stud");
insert into login values("2101CS37","khushi", "stud");

insert into login values("ATL", "atlassian","comp");
insert into login values("GGL", "google","comp");
insert into login values("JPMC", "jpmorgan","comp");
insert into login values("MCB", "mercedes","comp");

insert into login values("1401CS01", "a","alum");
insert into login values("1401CS02","b", "alum");
insert into login values("1601CS02","c", "alum");
insert into login values("1901CS01","d", "alum");
insert into login values("1901CS03","e", "alum");
insert into login values("1901CS04","f", "alum");
insert into login values("1901CS05","g", "alum");

insert into login values("TPC001","abhay","tpcm");
insert into login values("TPC002","yash","tpcm");



create table student_details(
rollno varchar(10) ,
name varchar(50),
semester int,
cpi double,
grade10 int,
grade12 int,
branch varchar(10),
age int,
interest varchar(50),
batch_year int,
placed char(1));


alter table student_details add foreign key (rollno) references login(id);



create table companies(
ccode varchar(10) ,
cname varchar(20),
min_sem int,
min_cpi double,
package int,
mode varchar(20),
yor int);

alter table companies add foreign key(ccode) references login(id);


create table placements(
rollno varchar(10),
ccode varchar(10),
ctc int,
psem int);

alter table placements add foreign key(rollno) references student_details(rollno);
alter table placements add foreign key (ccode) references companies(ccode);



insert into student_details values("2101CS71","Sampreety Pillai",
 4, 7.61, 94, 94, "CSE", 19, "Machine Learning", 2025, "Y");
insert into student_details values("2101CS37","Khushi Singh", 
5, 9.4, 97, 98, "CSE", 19, "Competitive Programming", 2024, "Y");
insert into student_details values("2101CS40","M Shanmukha Priya", 
6, 9.2, 96, 98, "CSE", 20, "Internet of Things", 2024, "Y");
insert into student_details values("2101AI53","Nishita Lath", 
4, 9.5, 97, 91, "AI", 19, "Management", 2025, "N");
insert into student_details values("2101AI42","Mamta Kanwar", 
5, 8.2, 95, 90, "AI", 20, "NCC", 2024, "N");
insert into student_details values("2101CS33","Jasmine Srivastava", 
7, 8.67, 91, 98, "CSE", 21, "Competitive Programming", 2023, "Y");
insert into student_details values("2101AI39","K Lahari",
6, 8.5, 91, 96,  "AI", 20, "Cybersecurity", 2024, "Y");


insert into companies values(
"GGL",  "Google India", 4, 8.0, 6000000, "online", 2019);
insert into companies values(
"MCB",  "Mercedes Benz", 5, 7.0, 9000000, "offline", 2015);
insert into companies values(
"ATL",  "Atlassian", 6, 8.0, 10000000, "online", 2014);
insert into companies values(
"JPMC",  "JP Morgan", 6, 7.5, 6000000, "online", 2018);


insert into placements values(
"2101CS71", "JPMC", 6000000, 4);
insert into placements values(
"2101CS33", "JPMC", 6000000, 5);
insert into placements values(
"2101CS40", "GGL", 6000000, 5);
insert into placements values(
"2101CS37", "ATL", 10000000, 5);
insert into placements values(
"2101AI39", "MCB", 9000000, 6);


create table alumnus(
rollno varchar(10),
ccode varchar(10),
ctc int,
area varchar(20),
position varchar(20),
tenure int);

alter table alumnus add foreign key (ccode) references companies(ccode);
alter table alumnus add foreign key (rollno) references login(id);


insert into alumnus values(
"1401CS01", "GGL",6000000,"California","SDE",3);
insert into alumnus values("1601CS02", "GGL",7000000,"Bangalore","Data Analyst",4);
insert into alumnus values("1401CS02", "JPMC",8000000,"Massachusetts","SDE",2);
insert into alumnus values("1901CS01", "MCB",6000000,"Delhi","SDE",3);
insert into alumnus values("1901CS03", "ATL",10000000,"California","ML Scientist",3);
insert into alumnus values("1901CS04", "ATL",8000000,"Hong Kong","Ads",5);
insert into alumnus values("1901CS05", "JPMC",7000000,"Riyadh","UX engineer",3);

alter table placements add column pyear int;

update placements set pyear = 2023 where rollno like "2101%";


alter table alumnus add column pyear int;


update alumnus set pyear = 2014 where rollno like "14%";
update alumnus set pyear = 2015 where rollno like "15%";
update alumnus set pyear = 2016 where rollno like "16%";
update alumnus set pyear = 2017 where rollno like "17%";
update alumnus set pyear = 2018 where rollno like "18%";
update alumnus set pyear = 2019 where rollno like "19%";
update alumnus set pyear = 2020 where rollno like "20%";


create table skills(
ccode varchar(10),
ml bool,
cp bool,
iot bool,
mng bool,
ncc bool,
cybsec bool,
dsa bool,
network bool,
db bool,
software bool);
insert into skills values("GGL", true, true, false, false, false, false, true, false, true, false);
insert into skills values(
"JPMC", false, true, false, true, true, false, true, false, true, true);
insert into skills values(
"MCB", true, true, false, true, true, true, true, false, true, true);
insert into skills values(
"ATL", true, true, true, true, true, true, true, true, true, true);

alter table companies add primary key (ccode);
alter table skills add foreign key (ccode) references login(id);


update student_details set interest = "ml" where interest = "Machine Learning" and rollno like "2101%";
update student_details set interest = "cp" where interest = "Competitive Programming" and rollno like "2101%";
update student_details set interest = "iot" where interest = "Internet of Things" and rollno like "2101%";
update student_details set interest = "mng" where interest = "Management" and rollno like "2101%";
update student_details set interest = "cybsec" where interest = "Cybersecurity" and rollno like "2101%";
update student_details set interest = "ncc" where interest = "NCC" and rollno like "2101%";


alter table student_details add primary key (rollno);
alter table student_details add column transcript varchar(200);
update student_details set transcript = "https://www.google.com/" where rollno like "2101%";


insert into login values ("2101CS99", "rashmi","stud");
insert into login values ("2101EE99", "reva","stud");
insert into login values ("1401EP99", "dhananjay","alum");
insert into login values ("1801CS99", "rohan","alum");
insert into login values ("BARC", "barc","comp");
insert into login values ("TATA", "tata","comp");
insert into login values ("2201MM23", "ajay","stud");
insert into login values ("2201CS23", "pranav","stud");

insert into student_details values("2101EE99", "Reva Arya", 3,7.64,99,98,"EE",18, "network",2025, "Y", "hello.com");
insert into student_details values("2101CS99", "Rashmi Bhattacharjee", 4,8.64,91,98,"CSE",19,"cybsec", 2025, "N", "hello.com");
insert into student_details values("2201CS23", "Pranav Batta", 3,7.64,99,98,"EE",18, "network",2025, "Y", "hello.com");
insert into student_details values("2201MM23", "Ajay Gawde", 4,8.64,91,98,"CSE",19,"cybsec", 2025, "Y", "hello.com");

insert into companies values(
"BARC", "Bhabha Research", 4,9.5, 6000000, "online",2014);
insert into companies values("TATA", "Tata motors",5, 6.5, 8000000, "offline", 2008);

insert into placements values("2101EE99", "BARC", 5000000, 3, 2022);
insert into placements values("2201CS23", "JPMC", 5000000, 3, 2022);
insert into placements values("2201MM23", "GGL", 5000000, 3, 2022);

insert into alumnus values("1401EP99", "GGL", 5000000,"Bangalore","SDE", 3,2018);
insert into alumnus values("1801CS99", "TATA", 5000000,"Bangalore","SDE", 3,2018);


insert into login values ("2001CS99", "aditya","stud");
insert into login values ("2001EE99", "akash","stud");
insert into login values ("1411EP99", "navya","alum");
insert into login values ("1811CS99", "kavya","alum");
insert into login values ("2001MM23", "pragati","stud");
insert into login values ("2001CS23", "sushma","stud");

insert into student_details values("2001EE99", "Aditya Navkar", 3,9.8,99,98,"EE",18, "dsa",2025, "Y", "hello.com");
insert into student_details values("2001CS99", "Akash Prakash", 4,3.4,91,98,"CSE",19,"mng", 2025, "N", "hello.com");
insert into student_details values("2001CS23", "Pragati Vinay", 3,9.7,99,98,"EE",20, "ncc",2025, "Y", "hello.com");
insert into student_details values("2001MM23", "Sushma Kumari", 4,8.4,91,98,"CSE",19,"cp", 2025, "Y", "hello.com");

insert into placements values("2001EE99", "ATL", 5000000, 3, 2022);
insert into placements values("2001CS23", "GGL", 8000000, 3, 2023);
insert into placements values("2001MM23", "GGL", 9000000, 4, 2022);

insert into alumnus values("1411EP99", "GGL", 5000000,"Bangalore","Senior Head", 3,2018);
insert into alumnus values("1811CS99", "ATL", 5000000,"Bangalore","SDE", 4,2018);


insert into login values ("2011CS99", "drishti","stud");
insert into login values ("2011EE99", "pratha","stud");
insert into login values ("1421EP99", "riya","alum");
insert into login values ("1831CS99", "rakesh","alum");
insert into login values ("2011MM23", "vaidehi","stud");
insert into login values ("2011CS23", "sushma","stud");

insert into student_details values("2011EE99", "Drishti Nath Roy", 3,9.8,99,98,"EE",18, "dsa",2025, "Y", "example.com");
insert into student_details values("2011CS99", "Pratha Ganguly", 5,6.8,94,98,"CSE",21,"dsa", 2023, "N", "example.com");
insert into student_details values("2011CS23", "Vaidehi Sharma", 7,9.13,99,98,"EE",17, "cp",2025, "Y", "example.com");
insert into student_details values("2011MM23", "Sushma Sankhla", 4,8.5,91,99,"CSE",19,"cp", 2022, "Y", "example.com");

insert into placements values("2011EE99", "ATL", 10000000, 3, 2022);
insert into placements values("2011CS23", "GGL", 8000000, 5, 2021);
insert into placements values("2011MM23", "GGL", 9000000, 4, 2022);




insert into alumnus values("1421EP99", "MCB", 7000000,"Delhi","Senior Head", 3,2018);



insert into login values("ADM001","abhay","admin");
insert into login values("ADM002","neeraj","admin");
insert into login values("ADM003","prabhat","admin");




insert into login values ("2101CS01", "poornash","stud");
insert into login values ("2101CS02", "abhijeet","stud");
insert into login values ("2101CS03", "acchada","stud");
insert into login values ("2101CS06", "aishez","stud");
insert into login values ("2101CS07", "ali","stud");



insert into student_details values("2101CS01", "A.S. Poornash", 4,7.8,99,98,"CSE",18, "dsa",2025, "Y", "google.com");
insert into student_details values("2101CS02", "Abhijeet Kumar", 5,7.8,94,98,"CSE",21,"dsa", 2023, "N", "google.com");
insert into student_details values("2101CS03", "Acchada Hiren", 6,9.83,99,90,"CSE",17, "cp",2025, "Y", "google.com");
insert into student_details values("2101CS06", "Aishez Singh", 7,8.5,90,99,"CSE",19,"cp", 2022, "Y", "google.com");
insert into student_details values("2101CS07", "Ali Haider", 3,9.5,91,99,"CSE",19,"cp", 2022, "Y", "google.com");


insert into placements values("2101CS01", "ATL", 10000000, 3, 2022);
insert into placements values("2101CS03", "JPMC", 8000000, 5, 2021);
insert into placements values("2101CS06", "MCB", 7000000, 4, 2020);
insert into placements values("2101CS07", "MCB", 7000000, 4, 2019);


insert into login values ("2101AI01", "aadit","stud");
insert into login values ("2101AI02", "anurag","stud");
insert into login values ("2101AI03", "archit","stud");
insert into login values ("2101AI04", "ashutosh","stud");
insert into login values ("2101AI05", "atul","stud");

insert into student_details values("2101AI01", "Aadit Nayyar", 4,7.8,99,98,"AI",18, "dsa",2025, "Y", "google.com");
insert into student_details values("2101AI02", "Anurag Deo", 5,7.8,94,98,"AI",21,"dsa", 2023, "N", "google.com");
insert into student_details values("2101AI03", "Archit Sharma", 6,9.83,99,90,"AI",17, "cp",2025, "Y", "google.com");
insert into student_details values("2101AI04", "Ashutosh Kumar", 7,8.5,90,99,"AI",19,"cp", 2022, "Y", "google.com");
insert into student_details values("2101AI05", "Atul Kumar", 3,9.5,91,99,"AI",19,"cp", 2022, "Y", "google.com");


insert into placements values("2101AI01", "ATL", 12000000, 3, 2022);
insert into placements values("2101AI03", "JPMC", 9000000, 5, 2021);
insert into placements values("2101AI04", "GGL", 7000000, 4, 2020);
insert into placements values("2101AI05", "GGL", 7000000, 4, 2019);

insert into login values ("2001CE01", "abhraneel","stud");
insert into login values ("2001CE02", "alekh","stud");
insert into login values ("2001CE03", "aman","stud");
insert into login values ("2001CE04", "anand","stud");
insert into login values ("2001CE05", "anjana","stud");

insert into student_details values("2001CE01", "Abhraneel Saha", 4,7.8,99,98,"CE",18, "dsa",2022, "Y", "google.com");
insert into student_details values("2001CE02", "Alekh Srivastava", 5,9.6,94,98,"CE",21,"ml", 2023, "N", "google.com");
insert into student_details values("2001CE03", "Aman Raj", 6,9.83,100,90,"CE",17, "network",2024, "Y", "google.com");
insert into student_details values("2001CE04", "Anand Kumar", 7,8.5,90,99,"CE",19,"ml", 2022, "Y", "google.com");
insert into student_details values("2001CE05", "Anjana Pathari", 3,9.5,91,99,"CE",19,"mng", 2022, "Y", "google.com");


insert into placements values("2001CE01", "ATL", 12000000, 3, 2022);
insert into placements values("2001CE01", "JPMC", 9000000, 5, 2021);
insert into placements values("2001CE01", "TATA", 7000000, 4, 2020);
insert into placements values("2001CE01", "BARC", 7000000, 4, 2019);

insert into login values ("2111ME01", "sarvesh","alum");
insert into login values ("2111ME02", "prashan","alum");
insert into login values ("2111ME03", "tripti","alum");
insert into login values ("2111ME04", "kavya","alum");
insert into login values ("2111ME05", "vyakta","alum");

insert into alumnus values("2111ME01", "TATA", 6000000,"Pune","UI engineer", 3,2018);
insert into alumnus values("2111ME02", "BARC", 10000000,"Washington","Data Analyst", 4,2019);
insert into alumnus values("2111ME03", "TATA", 5000000,"Gurgaon","ML Scientist", 3,2018);
insert into alumnus values("2111ME04", "BARC", 6000000,"Singapore","Ads", 4,2019);
insert into alumnus values("2111ME05", "TATA", 7500000,"Mumbai","Ads", 3,2018);

insert into skills values("TATA",1,1,1,1,1,1,1,1,0,0);
insert into skills values("BARC",0,1,1,1,1,1,1,1,0,0);

create table skills_pass_grade( ccode varchar (10), ml double, cp double, iot double, mng double, ncc double, cybsec double, dsa double, network double,
db double,software double);

insert into skills_pass_grade values("GGL", 8,8,100,100,100,100,9,100,9,100);
insert into skills_pass_grade values("JPMC", 100, 7.6, 100, 8,9, 100,7.8,100, 5,6);
insert into skills_pass_grade values("MCB",8,8,100,6,7,8,9,100,7,7);
insert into skills_pass_grade values("ATL",7,7,7,7,7,7,7,7,7,7);
insert into skills_pass_grade values("BARC",8,8,8,8,8,8,8,8,100,100);
insert into skills_pass_grade values("TATA",100,8,8,8,8,8,8,8,100,100);

alter table skills_pass_grade add foreign key (ccode) references companies(ccode);

create table branch_credits(branch varchar(10),sem1 int,sem2 int,sem3 int,sem4 int,sem5 int,sem6 int,sem7 int,sem8 int);

insert into branch_credits values("CSE",41,46,44,38,33,35,31,25);
insert into branch_credits values( "AI",41,46,48,35,33,35,30,25);
insert into branch_credits values( "CE",41,46,34,31,29,25,20,25);
insert into branch_credits values( "EE",41,46,38,35,40,35,30,30);

alter table branch_credits add primary key (branch);
alter table student_details add foreign key (branch) references branch_credits(branch);
alter table student_details add column interest_grade double;
update student_details set interest_grade = 8 where rollno like "2101CS%";
update student_details set interest_grade = 9 where rollno like "2201%";
update student_details set interest_grade = 7.5 where rollno like "2001%";
update student_details set interest_grade = 9.5 where rollno like "2101CE%";
update student_details set interest_grade = 9 where rollno like "2%" and transcript = "hello.com";
update student_details set interest_grade = 9 where rollno like "2%" and transcript = "example.com";
update student_details set interest_grade = 9 where rollno like "2%" and branch = "AI";
alter table skills_pass_grade add primary key (ccode);


