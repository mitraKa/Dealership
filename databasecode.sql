CREATE TABLE seller(
  id int(6) NOT NULL PRIMARY KEY,
  dealer_name varchar(20) NOT NULL,
  auction varchar(3) NOT NULL,
  location varchar(20) NOT NULL
    );

CREATE TABLE car_warehouse(
  sn int(9) NOT NULL PRIMARY KEY,
  make varchar(10) NOT NULL,
  model varchar(20) NOT NULL,
  year INT(4) not null,
  color varchar(10) NOT NULL,
  miles int(6) NOT NULL,
  cond varchar(10) NOT NULL,
  book_price numeric(12,2) NOT NULL,
  purchase_date numeric(12,2) NOT NULL,
  id int(6),
  FOREIGN key (id) REFERENCES seller(id)


);

CREATE TABLE repair_info(
 repair_id int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 problem varchar(40) NOT NULL,
 est_cost numeric(10,2),
 act_cost numeric(10,2),
 sn int(9) NOT NULL,
 FOREIGN KEY (sn) REFERENCES car_warehouse(sn)

);

CREATE TABLE customer(
    cust_id int(6) NOT null PRIMARY KEY,
    first_name varchar(20) not null,
    last_name varchar(20) not null,
    phone int(12) not null,
    address varchar(120) not null,
    city varchar(20) not null,
    state varchar(10)  not null,
    zip int(6) not null
 );

 CREATE TABLE employment_history(
   employment_id int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
   employer_name varchar(20)  NOT NULL,
   title varchar(20)  NOT NULL,
   supervisor varchar(20)  NOT NULL,
   phone int(10)  NOT NULL,
   address varchar(20) NOT NULL,
   cust_id int(6) NOT NULL,
   start_date int(8),
   FOREIGN KEY (cust_id) REFERENCES customer(cust_id)
 );

 Create TABLE payments(
    pmt_id int(10) not null primary key AUTO_INCREMENT,
    cust_id int(6) NOT null,
    pmt_date int(8)  NOT NULL,
    paid_date int(8)  NOT NULL,
    amount numeric(12,2)  NOT NULL,
    bank_account int(10)  NOT NULL,
    FOREIGN KEY (cust_id) REFERENCES customer(cust_id)

 );

 CREATE TABLE employee_info(
     emp_id int(9) not null PRIMARY KEY AUTO_INCREMENT,
     first_name varchar(12) not null,
     last_name varchar(12) not null,
     phone int(110)
     );

  ALTER TABLE employee AUTO_INCREMENT = 100000001

  CREATE TABLE waranty(
         waranty_id int(5) not null PRIMARY KEY,
         items_covered varchar(120),
         deductible numeric(12,2)
 );

 CREATE TABLE car_sale(
  sn int(9) not null,
  cust_id int(6) not null,
  emp_id int(9) not null,
  sale_date int(8) not null,
  total_due numeric(12,2) not null,
  down_payment numeric(12 , 2) not null,
  finance_amount numeric(12 ,2) not null,
  commition numeric(12 ,2),
  PRIMARY KEY (sn , cust_id , emp_id),
  FOREIGN KEY (sn) REFERENCES car_warehouse(sn),
  FOREIGN KEY (cust_id) REFERENCES customer(cust_id),
  FOREIGN KEY (emp_id) REFERENCES employee(emp_id)
);

INSERT INTO payments(pmt_date ,paid_date,amount,bank_account,cust_id)
                 VALUES ( "20170306","20170307" ,"500" ,"123456789","100000" );
CREATE TABLE waranty_sale(
  wSaleId int(9)  NOT NULL primary KEY AUTO_INCREMENT,
  sn int(9) NOT NULL,
  emp_id int(9) NOT NULL,
  waranty_id int(5) NOT NULL,
  cust_id int(6)  NOT NULL,
  saleDate int(8)  NOT NULL,
  co_signer varchar(20) ,
  monthly_cost numeric(12,2) ,
  start_date int(8) NOT NULL,
  length int(6) NOT NULL,
  total_cost numeric(12,2) ,
  FOREIGN KEY (sn) REFERENCES car_warehouse(sn),
  FOREIGN KEY (emp_id) REFERENCES employee_info(emp_id),
  FOREIGN KEY (waranty_id) REFERENCES waranty(waranty_id),
  FOREIGN KEY (cust_id) REFERENCES customer(cust_id)




);
