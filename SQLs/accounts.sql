use pupone_Analyster;
use pupone_PM;
use pupone_Summarizer;
use pupone_dovislex;


show tables;

select * from log;

select * from accounts;
select * from Members;

insert into accounts values (6,"Chenpei", "viewer");

update accounts set
username = "Bella"
 where id = 21;

delete from accounts where id  in (14);



drop  table Reports_2017_3_20;

select * from main_table where symbol = 'AAOI';
update main_table 
set  symbol = 'VAL'
where symbol = 'ESV';

t1, BackUpTable_2018_07_09_02_32_18am t2

select notes from main_table where symbol = 'AAOI';

select * from backup_main_table t1, BackUpTable_2018_07_09_02_32_18am t2;

delete from main_table where symbol = 'AAOI';

insert into main_table select * from BackUpTable_2018_07_09_02_32_18am where symbol = 'AAOI';