create database Furniture_Online; 
use Furniture_Online;

create table Customers_F(
	Customer_Id int primary key not null,
	First_Name varchar(25),
	Surname varchar(50),
	Address varchar(50) ,
	Contact_Number varchar(10),
	Email varchar(60)
);


create table Employees_F(
	Employee_Id varchar(7) primary key not null,
	First_Name varchar(25),
	Surname varchar(50),
	Contact_Number varchar(10),
	Position varchar(30),
	Address varchar(50) ,
	Email varchar(60)
);


create table Delivery_F(
	Delivery_Id decimal(3) primary key not null,
	Description varchar(60),
	Dispatch_Date Date ,
	Delivery_Date Date 
);


create table Returns_F(
Return_Id varchar(6) primary key ,
Return_Date Date,
Reason varchar(70)
);


create table Products_F(
	Product_Id int primary key not null,
	Product varchar(50),
	Price int,
	Quantity int
);


create table Billings_F(
Bill_Id int primary key not null,
Customer_Id int,
Bill_Date Date,
Employee_Id varchar(7),
constraint fk_cust Foreign key (Customer_Id) references Customers_F(Customer_Id),
constraint fk_emp Foreign key (Employee_Id) references Employees_F(Employee_Id)
);


create table Product_Billings_F(
	Delivery_Id decimal(3) ,
	Return_Id varchar(6),
	Product_Id int,
	Bill_Id int,
	constraint fk_del Foreign key (Delivery_Id) references Delivery_F(Delivery_Id),
	constraint fk_ret Foreign key (Return_Id) references Returns_F(Return_Id),
	constraint fk_prod Foreign key (Product_Id) references Products_F(Product_Id),
	constraint fk_bill Foreign key (Bill_Id) references Billings_F(Bill_Id)

);

/*customer insert*/

insert into Customers_F values(11012,'jeffery','smith','18 water rd',0877277521,'jef@isat.com');
insert into Customers_F values(11013,'alex','hendricks','22 water rd',0863257857,'ah@mcom.co.za');
insert into Customers_F values(11014,'johnson','clark','101 summer lane',0834567891,'jclark@mcom.co.za');
insert into Customers_F values(11015,'henry','jones','55 mountain way',0612547895,'hj@isat.co.za');
insert into Customers_F values(11011,'andre','williams','5 main rd',0827238521,'aw@mcai.co.za');


/*employee insert*/

insert into Employees_F values('emp101','roan','davis',0877277521,'sales','10 main rd','rd@isat.com');
insert into Employees_F values('emp102','billy','marks',0837377522,'marketing','18 water rd','bmark@isat.com');
insert into Employees_F values('emp103','chadwin','andrews',0817117523,'sales','21 circle lane','ca@isat.com');
insert into Employees_F values('emp104','wayne','dryer',0797215244,'sales','1 sea rd','dryer@isat.com');
insert into Employees_F values('emp105','jaci','samson',0827122255,'manager','12 main rd','samjax@isat.com');


/* delivery insert*/

insert into Delivery_F values(511,'delivery contains glass items-fragile','10 may 2017','15 may 2017');
insert into Delivery_F values(512,'delivery of wooden items','12 may 2017','15 may 2017');
insert into Delivery_F values(513,'no description available','12 may 2017','17 may 2017');
insert into Delivery_F values(514,'delivery contains glass items-fragile','12 may 2017','15 may 2017');
insert into Delivery_F values(515,'delivery contains glass items-fragile','18 may 2017','19 may 2017');
insert into Delivery_F values(516,'no description available','20 may 2017','25 may 2017');
insert into Delivery_F values(517,'delivery of wooden items','25 may 2017','27 may 2017');


/* returns insert*/

insert into Returns_F values('ret001','25 may 2017','customer not satisfied with product');
insert into Returns_F values('ret002','25 may 2017','product missing part');


/*product insert*/

insert into Products_F values(7111,'four piece wall unit',10999,10);
insert into Products_F values(7112,'plasma stand unit',7999,8);
insert into Products_F values(7113,'leather recliner',5999,8);
insert into Products_F values(7114,'leather lazy boy',7999,5);
insert into Products_F values(7115,'6 piece fabric suite',17999,15);
insert into Products_F values(7116,'6 piece leather suite',27999,12);
insert into Products_F values(7117,'6 seater oak dinning table',11999,3);


/*bill insert*/

insert into Billings_F values(8111,11011,'15 may 2017','emp103');
insert into Billings_F values(8112,11013,'15 may 2017','emp101');
insert into Billings_F values(8113,11012,'17 may 2017','emp101');
insert into Billings_F values(8114,11015,'17 may 2017','emp102');
insert into Billings_F values(8115,11011,'17 may 2017','emp102');
insert into Billings_F values(8116,11015,'18 may 2017','emp103');
insert into Billings_F values(8117,11012,'19 may 2017','emp101');
insert into Billings_F values(8118,11013,'19 may 2017','emp105');


/* product billing insert*/

insert into Product_Billings_F values(512,null,7113,8115);
insert into Product_Billings_F values(511,null,7111,8111);
insert into Product_Billings_F values(512,null,7111,8114);
insert into Product_Billings_F values(514,'ret001',7113,8113);
insert into Product_Billings_F values(516,null,7115,8112);
insert into Product_Billings_F values(515,'ret002',7114,8113);
insert into Product_Billings_F values(517,null,7113,8115);
insert into Product_Billings_F values(511,null,7112,8118);
insert into Product_Billings_F values(513,null,7111,8117);
insert into Product_Billings_F values(512,null,7115,8116);

select *
from Products_F;

/*---------------------------------------------------------------*/

/*question 4 done*/

select c.first_name || c.surname as customer,b.employee_id,d.description,p.product,b.bill_date
from product_billings_f pb join billings_f b on
pb.bill_id = b.bill_id join products_f p on
pb.product_id = p.product_id join delivery_f d on
pb.delivery_id = d.delivery_id join customers_f c on
b.customer_id = c.customer_id
where b.bill_date = '15/may/17';


/*---------------------------------------------------------------*/
/* question 5 done*/

alter table products_f
add stock_value int;
create view information as
select product,price,quantity ,price * quantity as stock_value
from products_f
where  price * quantity > 100000 
order by quantity;

select *
from information;

/*---------------------------------------------------------------*/

/* question 6 fixed*/
set serveroutput on;
declare
vproduct products_f.product%type;
vcustname customers_f.first_name%type;
vcustsurname customers_f.surname%type;

cursor c_data is
select c.first_name ,c.surname,p.product
from customers_f c join billings_f b 
on c.customer_id = b.customer_id join
product_billings_f pb on b.bill_id = pb.bill_id
join products_f p on pb.product_id = p.product_id
where price >= 10000;
begin
open c_data;
loop
fetch c_data 
into vcustname,vcustsurname,vproduct;

dbms_output.put_line('_________________________________________________');
dbms_output.put_line('CUSTOMER: '|| vcustname||' '|| vcustsurname);
dbms_output.put_line('PRODUCT: '|| vproduct);
exit when c_data%notfound;
end loop;
close c_data;
end;

/*---------------------------------------------------------------*/

/* question 7 */
declare
vname customers_f.first_name%type;
vsurname customers_f.surname%type;
vproduct products_f.product%type;
vreason returns_f.reason%type;
cursor cur_company is 
select c.first_name ,c.surname ,r.reason,p.product
from product_billings_f pb join billings_f b on
pb.bill_id = b.bill_id join returns_f r on
pb.return_id = r.return_id join customers_f c on
b.customer_id = c.customer_id join products_f p on
pb.product_id = p.product_id;
begin
open cur_company;
loop
fetch cur_company 
into vname,vsurname,vreason,vproduct;
dbms_output.put_line('_________________________________________________');
dbms_output.put_line('CUSTOMER: '|| vname||vsurname);
dbms_output.put_line('PRODUCT: '|| vproduct);
dbms_output.put_line('RETURN REASON: '|| vreason);
exit when cur_company%notfound;
end loop;
close cur_company;
end;
/*---------------------------------------------------------------*/


/*---------------------------------------------------------------*/
/* question 8 needs to get fixed*/

select p.product,p.price,d.description
from product_billings_f pb join products_f p on
pb.product_id = p.product_id join delivery_f d on
pb.delivery_id = d.delivery_id


set serverouput on;
declare
vname customers_f.first_name%type;
vsurname customers_f.surname%type;
vproduct products_f.product%type;
vprice products_f.price%type;
vdesc delivery_f.description%type;

begin
select p.product,p.price,d.description
from product_billings_f pb join products_f p on
pb.product_id = p.product_id join delivery_f d on
pb.delivery_id = d.delivery_id
if(p.price >= 15000)
then
dbms_output.put_line('PRODUCT CATEGORY: '|| 'PREMIUM');
else
dbms_output.put_line('PRODUCT CATEGORY: '|| 'NON-PREMIUM');
end if;
dbms_output.put_line('_____________________________________________');
dbms_output.put_line('PRODUCT: '|| vproduct);
dbms_output.put_line('PRICE: '|| vprice);
dbms_output.put_line('DESCRIPTION: '|| vdesc);
end;

