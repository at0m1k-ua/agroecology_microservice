use agro;

drop table if exists fields_1995;
create table fields_1995 (
	name tinytext,
	area tinytext,
	grade tinytext,
	ph tinytext,
	humus tinytext,
	n tinytext,
	p2o5 tinytext,
	k2o tinytext,
	mn tinytext,
	cu tinytext,
	co tinytext,
	zn tinytext,
	pb tinytext,
	cs tinytext,
	sr tinytext
);

LOAD DATA INFILE '/var/lib/mysql-files/agroecology_1995.csv' 
INTO TABLE fields_1995 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
;

drop table if exists fields_2000;
create table fields_2000(
	name tinytext,
	area tinytext,
	grade tinytext,
	ph tinytext,
	humus tinytext,
	n tinytext,
	p2o5 tinytext,
	k2o tinytext,
	mn tinytext,
	co tinytext,
	cu tinytext,
	zn tinytext,
	pb tinytext,
	cs tinytext,
	sr tinytext
);

LOAD DATA INFILE '/var/lib/mysql-files/agroecology_2000.csv' 
INTO TABLE fields_2000
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
;

drop table if exists fields;
create table fields (
	name tinytext,
	year smallint,
	area tinytext,
	grade tinytext,
	ph tinytext,
	humus tinytext,
	n tinytext,
	p2o5 tinytext,
	k2o tinytext,
	mn tinytext,
	cu tinytext,
	co tinytext,
	zn tinytext,
	pb tinytext,
	cs tinytext,
	sr tinytext
);

insert into fields (name, year, area, grade, ph, humus, n, p2o5, k2o, mn, cu, co, zn, pb, cs, sr)
select name, 1995 as year, area, grade, ph, humus, n, p2o5, k2o, mn, cu, co, zn, pb, cs, sr
from fields_1995;

drop table fields_1995;

insert into fields (name, year, area, grade, ph, humus, n, p2o5, k2o, mn, cu, co, zn, pb, cs, sr)
select name, 2000 as year, area, grade, ph, humus, n, p2o5, k2o, mn, cu, co, zn, pb, cs, sr
from fields_2000;

drop table fields_2000;

