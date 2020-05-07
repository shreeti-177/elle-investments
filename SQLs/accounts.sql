use pupone_Analyster;
use pupone_PM;
use pupone_Summarizer;
use pupone_dovislex;


show tables;

select * from log;

select * from accounts;
select * from Members;

insert into accounts values (11,"Anh", "developer");

update accounts set
username = "pupone_Anh"
 where id = 13;

delete from accounts where id  in (14);



drop  table Reports_2017_3_20;

select * from main_table where symbol = 'AAOI';
update main_table 
set  symbol = 'VAL'
where symbol = 'ESV';

select notes from main_table where symbol = 'AAOI';

select * from backup_main_table t1, BackUpTable_2018_07_09_02_32_18am t2;


insert into main_table select * from BackUpTable_2018_07_09_02_32_18am where symbol = 'AAOI';

select * from temp_stock_price_table where symbol = 'CRM';

select * from main_table where symbol = 'SBBP';


alter table backup_main_table drop column id;


insert main_table select * from backup_main_table where symbol = 'CRM';

select * from backup_main_table where symbol = 'CRM';


insert into main_table set symbol = 'SBBP';

